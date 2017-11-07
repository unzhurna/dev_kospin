@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('vendors/datatables/css/jquery.dataTables.min.css') }}">
@endsection

@section('title', 'Data Pinjaman')

@section('content')
<a href="{{ route('saving.create') }}" class="btn btn-float btn-danger m-btn"><i class="zmdi zmdi-plus"></i></a>
<div class="table-responsive">
    <table id="data-table-basic" class="table table-striped">
        <thead>
            <tr>
                <th>No Kontrak</th>
                <th>Nama</th>
                <th>Tgl. Pinjaman</th>
                <th>Tenor</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($savings as $saving)
                <tr>
                    <td><strong>{{ $saving->no_simpanan }}</strong></td>
                    <td>{{ $saving->member->nama }}</td>
                    <td>{{ $saving->created_at->format('d/m/Y') }}</td>
                    <td>{{ '12'.' bln' }}</td>
                    <td>
                        @if($saving->status != 1)
                            <label class="label label-danger">Non-Aktif</label>
                        @else
                            <label class="label label-info">Aktif</label>
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('script')
    <script src="{{ asset('vendors/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#data-table-basic').DataTable();
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
