@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('vendors/datatables/css/jquery.dataTables.min.css') }}">
@endsection

@section('title', 'Rincian pinjaman Anggota')

@section('content')
<a data-toggle="modal" href="#formModal" class="btn btn-float btn-danger m-btn"><i class="zmdi zmdi-plus"></i></a>
<div class="row">
    <div class="col-md-3">
        <div class="card profile-view">
            <div class="pv-header">
                @if($loan->member->avatar)
                    <img src="{{ asset('media/user/'.$$loan->member->avatar) }}" class="pv-main" alt="{{ $loan->member->nama }}" />
                @else
                    <img src="{{ asset('media/user/no-user-image.png') }}" class="pv-main" alt="{{ $loan->member->nama }}" />
                @endif
            </div>
            <div class="pv-body">
                <h2>{{ $loan->member->nama }}</h2>
                <h4>{{ $loan->no_pinjaman }}</h4>
                <small>{{ $loan->member->alamat.', '.$loan->member->kota }}</small>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="table-responsive">
            <table id="data-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Anggsuran Ke</th>
                        <th>Anggsuran</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th colspan="2" style="text-align:right">Total:</th>
                        <th style="text-align:right"></th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($loan->installment as $installment)
                        <tr>
                            <td>{{ $installment->created_at->format('d/m/Y') }}</td>
                            <td><span class="badge">{{ $installment->pembayaran_ke }}</span></td>
                            <td>{{ number_format($installment->pembayaran, 0, ',', '.') }}</td>
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
                <h4 class="modal-title">Form Pembayaran Angsuran</h4>
            </div>
            <div class="modal-body">
                <form id="FormSetoran" action="{{ route('pay.loan') }}">
                    {{ csrf_field() }}
                    <div class="form-group fg-line">
                        <label>Tanggal</label>
                        <input type="text" class="form-control" value="{{ date('d/m/Y') }}" disabled>
                        <input type="text" class="hidden" name="id_pinjaman" value="{{ $loan->id }}">
                    </div>
                    <div class="form-group fg-line">
                        <label>Angsuran</label>
                        <input type="text" class="form-control" value="{{ number_format($loan->angs_pinjaman, 0, ',', '.') }}" disabled>
                        <input type="text" class="hidden" name="pembayaran" value="{{ $loan->angs_pinjaman}}">
                    </div>
                    <div class="form-group fg-line">
                        <label>Angsuran Ke</label>
                        <p><label class="label label-info">{{ InstallmentSec($loan->id) }}</label></p>
                        <input type="text" class="hidden" name="pembayaran_ke" value="{{ InstallmentSec($loan->id) }}">
                    </div>
                    <div class="form-group fg-line">
                        <label>Sisa Angsuran</label>
                        <p><label class="label label-info">{{ $loan->tenor - InstallmentSec($loan->id) }}</label></p>
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
            $('#data-table').DataTable( {
                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,.]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column( 2 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 2, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 2 ).footer() ).html(
                        pageTotal +' ( '+ total +' total)'
                    );
                }
            } );
        } );

        $(document).on('keyup', '.simpanan', function() {
            SimTotal = 0;
            $('.simpanan').each(function() {
                SimTotal += Number($(this).val());
            });
            $('#sim_total').val(SimTotal);
        });

        $(document).on('click', '#submit', function() {

            dataForm = $('#FormSetoran').serialize();
            actionUrl = $('#FormSetoran').attr('action');

            $.ajax({
                url         : actionUrl,
                method      : 'POST',
                data        : dataForm,
                dataType    : 'json',
                success     : function(data) {
                    $('#formModal').modal('hide');
                    swal("Berhasil!", "Pembayaran tela berhasil dilakukan.", "success");
                    window.location.replace('{{ url()->current() }}');
                }
            });


        });

    </script>
@endsection
