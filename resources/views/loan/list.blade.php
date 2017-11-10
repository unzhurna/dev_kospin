@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('vendors/datatables/css/jquery.dataTables.min.css') }}">
@endsection

@section('title', 'Data Pinjaman')

@section('content')
<a href="{{ route('loan.create') }}" class="btn btn-float btn-danger m-btn"><i class="zmdi zmdi-plus"></i></a>
<div class="table-responsive">
    <table id="data-table" class="table table-striped">
        <thead>
            <tr>
                <th>No Kontrak</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Pinjaman</th>
                <th>Jasa</th>
                <th>Angsuran</th>
                <th>Tenor</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($loans as $loan)
                <tr>
                    <td><a href="{{ route('loan.show', $loan->id) }}"><strong>{{ $loan->no_pinjaman }}</strong></a></td>
                    <td>{{ $loan->member->nama }}</td>
                    <td>{{ $loan->created_at->format('d/m/Y') }}</td>
                    <td>{{ number_format($loan->ttl_pinjaman, 0, ',', '.') }}</td>
                    <td>{{ number_format($loan->jasa_pinjaman, 0, ',', '.') }}</td>
                    <td>{{ number_format($loan->angs_pinjaman, 0, ',', '.').' /bln' }}</td>
                    <td>{{ $loan->tenor.' bln' }}</td>
                    <td>
                        @if($loan->status != 1)
                            <label class="label label-danger">Belum Lunas</label>
                        @else
                            <label class="label label-info">Lunas</label>
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
            $('#data-table').DataTable();
        });
    </script>
@endsection
