@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('vendors/datatables/css/jquery.dataTables.min.css') }}">
@endsection

@section('title', 'Data Pinjaman')

@section('content')
<a href="{{ route('loan.create') }}" class="btn btn-float btn-danger m-btn"><i class="zmdi zmdi-plus"></i></a>
<div class="card">
    <div class="table-responsive">
        <table id="data-table" class="table table-striped">
            <thead>
                <tr>
                    <th>No. Pinjaman</th>
                    <th>Nama Anggota</th>
                    <th>Tgl. Pinjam</th>
                    <th>Total Pinjaman</th>
                    <th>Tenor</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('vendors/datatables/js/jquery.dataTables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#data-table').DataTable();
    });
</script>
@endsection
