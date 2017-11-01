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
                <th>Registrasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>No Anggota</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Registrasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            </tfoot>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{ $member->reg_number }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>{{ $member->created_at->format('d-m-Y') }}</td>
                        <td>
                            @if ($member->status === 1)
                                <label class="label label-info">aktif</label>
                            @else
                                <label class="label label-danger">tidak aktif</label>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('member.edit', $member->id) }}" class="btn btn-xs btn-primary waves-effect" name="button"><i class="zmdi zmdi-edit"></i></a>
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
