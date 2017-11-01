@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('vendors/datatables/css/jquery.dataTables.min.css') }}">
@endsection

@section('title', 'Data Simpanan')

@section('content')
<a href="{{ route('member.create') }}" class="btn btn-float btn-danger m-btn"><i class="zmdi zmdi-accounts-add"></i></a>
<div class="card">
    <div class="table-responsive">
        <h1>Ini belum selesai</h1>
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
