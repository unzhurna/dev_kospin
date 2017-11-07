@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('vendors/datatables/css/jquery.dataTables.min.css') }}">
@endsection

@section('title', 'Rincian Simpanan Anggota')

@section('content')
<a data-toggle="modal" href="#formModal" class="btn btn-float btn-danger m-btn"><i class="zmdi zmdi-plus"></i></a>
<div class="row">
    <div class="col-md-3">
        <div class="card profile-view">
            <div class="pv-header">
                @if($saving->member->avatar)
                    <img src="{{ asset('media/user/'.$$saving->member->avatar) }}" class="pv-main" alt="{{ $saving->member->nama }}" />
                @else
                    <img src="{{ asset('media/user/no-user-image.png') }}" class="pv-main" alt="{{ $saving->member->nama }}" />
                @endif
            </div>
            <div class="pv-body">
                <h2>{{ $saving->member->nama }}</h2>
                <small>{{ $saving->member->alamat.', '.$saving->member->kota }}</small>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="table-responsive">
            <table id="data-table" class="table table-striped">
                <thead>
                    <tr>
                        <th rowspan="2">Tanggal</th>
                        <th colspan="3" class="text-center">Simpanan</th>
                        <th rowspan="2">Total</th>
                    </tr>
                    <tr>
                        <th>Pokok</th>
                        <th>Wajib</th>
                        <th>Sukarela</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saving->deposit as $deposit)
                        <tr>
                            <td>{{ $deposit->created_at->format('d/m/Y') }}</td>
                            <td>{{ number_format($deposit->sim_pokok, 0, ',', '.') }}</td>
                            <td>{{ number_format($deposit->sim_wajib, 0, ',', '.') }}</td>
                            <td>{{ number_format($deposit->sim_sukarela, 0, ',', '.') }}</td>
                            <td>{{ number_format($deposit->sim_pokok + $deposit->sim_wajib + $deposit->sim_sukarela, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Simpanan</h4>
            </div>
            <div class="modal-body">
                <form id="FormSetoran" action="{{ route('deposit.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group fg-line">
                        <label>Simpanan Pokok</label>
                        <input type="text" class="hidden" name="id_simpanan" value="{{ $saving->id }}">
                        <input type="text" class="form-control simpanan" name="sim_pokok" data-validation="number">
                    </div>
                    <div class="form-group fg-line">
                        <label>Simpanan Wajib</label>
                        <input type="text" class="form-control simpanan" name="sim_wajib" data-validation="number">
                    </div>
                    <div class="form-group fg-line">
                        <label>Simpanan Sukarela</label>
                        <input type="text" class="form-control simpanan" name="sim_sukarela" data-validation="number">
                    </div>
                    <div class="form-group fg-line">
                        <label>Simpanan Total</label>
                        <input type="text" class="form-control" id="sim_total" name="sim_total" readonly>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" id="submit">Simpan</button>
                <button type="button" class="btn btn-link" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script src="{{ asset('vendors/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/form-validator/jquery.form-validator.min.js') }}"></script>
    <script>
        $.validate();

        $(document).ready(function() {
            $('#data-table').DataTable();
        });

        $(document).on('keyup', '.simpanan', function() {
            SimTotal = 0;
            $('.simpanan').each(function() {
                SimTotal += Number($(this).val());
            });
            $('#sim_total').val(SimTotal);
        });

        $(document).on('click', '#submit', function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            dataForm = $('#FormSetoran').serialize();
            actionUrl = $('#FormSetoran').attr('action');

            $.ajax({
                url         : actionUrl,
                method      : 'POST',
                data        : dataForm,
                dataType    : 'json',
                success     : function(data) {
                    $('#formModal').modal('hide');
                    swal("Berhasil!", "Anggota tersebut telah di diaktifkan.", "success");
                    window.location.replace('{{ url()->current() }}');
                }
            });


        });

        $(document).on('click', '.activate', function(e) {

            e.preventDefault();

            actionUrl = $(this).attr('href');
            tableColumn = $(this).parent();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            swal({
                title : "Apa anda yakin?",
                type : "warning",
                text : "Member aktif dapat kembali melakukan simpanan dan pinjaman!",
                showCancelButton : true,
                cancelButtonText : "Batal",
                confirmButtonText : 'Aktifkan',
            }).then(function() {
                $.ajax({
                    url         : actionUrl,
                    method      : 'POST',
                    data        : {'_method' : 'put', 'status' : 1},
                    dataType    : 'json',
                    success     : function(data) {
                        console.log('member status set to be : '+data.status);
                        swal("Berhasil!", "Anggota tersebut telah di diaktifkan.", "success");
                        tableColumn.html('<a href="'+actionUrl+'" class="btn btn-xs btn-info waves-effect deactivate">Aktif</a>');
                    }
                });
            })

        });

        $(document).on('click', '.deactivate', function(e) {

            e.preventDefault();

            actionUrl = $(this).attr('href');
            tableColumn = $(this).parent();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            swal({
                title : "Apa anda yakin?",
                type : "warning",
                text : "Member non-aktif tidak dapat melakukan simpanan dan pinjaman!",
                showCancelButton : true,
                cancelButtonText : "Batal",
                confirmButtonText : "Non-Aktifkan",
            }).then(function() {
                $.ajax({
                    url         : actionUrl,
                    method      : 'POST',
                    data        : {'_method' : 'put', 'status' : 0},
                    dataType    : 'json',
                    success     : function(data) {
                        console.log('member status set to be : '+data.status);
                        swal("Berhasil!", "Anggota tersebut telah di dinon-aktifkan.", "success");
                        tableColumn.html('<a href="'+actionUrl+'" class="btn btn-xs btn-danger waves-effect activate">Non-Aktif</a>');
                    }
                });
            })

        });

    </script>
@endsection
