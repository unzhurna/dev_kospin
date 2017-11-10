@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('vendors/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('title', 'Laporan SHU Total')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body card-padding">
                    <form action="{{ route('total.shu') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group lg-line">
                            <label>Cari Tanggal</label>
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                <div class="dtp-container">
                                    <input type='text' class="form-control date-picker" name="date" placeholder="Click here...">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary waves-effect">Submit</button>
                        <a href="{{ route('home') }}" class="btn btn-default waves-effect">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('vendors/moment/moment.min.js') }}"></script>
    <script src="{{ asset('vendors/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection
