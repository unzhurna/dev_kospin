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
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>No Anggota</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Registrasi</th>
                <th>Status</th>
            </tr>
            </tfoot>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td><a href="{{ route('member.edit', $member->id) }}">{{ $member->reg_number }}</a></td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>{{ $member->created_at->format('d-m-Y') }}</td>
                        <td>
                            @if ($member->status === 1)
                                <button type="button" class="btn btn-xs btn-info waves-effect">aktif</button>
                            @else
                                <button type="button" class="btn btn-xs btn-danger waves-effect">tidak aktif</button>
                            @endif
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

    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        actionUrl = $(this).attr('href');
        alert(actionUrl);
    });
</script>
@endsection
