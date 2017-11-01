@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('vendors/datatables/css/jquery.dataTables.min.css') }}">
@endsection

@section('title', 'Data Anggota')

@section('content')
<a href="{{ route('member.create') }}" class="btn btn-float btn-danger m-btn"><i class="zmdi zmdi-accounts-add"></i></a>
<div class="card">
    <div class="table-responsive">
        <table id="data-table-basic" class="table table-striped">
            <thead>
            <tr>
                <th>No Anggota</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>No Anggota</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            </tfoot>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{ $member->no_anggota }}</td>
                        <td>{{ $member->nama }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->telepon }}</td>
                        <td>{{ $member->alamat }}</td>
                        <td><label class="label label-info">aktif</label></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-primary waves-effect" name="button"><i class="zmdi zmdi-edit"></i></button>
                                <button type="button" class="btn btn-xs btn-danger waves-effect" name="button"><i class="zmdi zmdi-delete"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('vendors/datatables/js/jquery.dataTables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#data-table-basic').DataTable();
    });
</script>
@endsection
