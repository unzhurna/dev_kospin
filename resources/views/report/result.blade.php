@extends('layouts.app')

@section('title', 'Laporan SHU')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Rincian Alokasi SHU {{ InstallmentSec(1) }}</h2>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Aloksi SHU</th>
                    <th>Presentasi</th>
                    <th>Username</th>
                    <th>Nickname</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Nicholas</td>
                    <td>Walmart</td>
                    <td>@mwalmart</td>
                    <td>Spike</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
