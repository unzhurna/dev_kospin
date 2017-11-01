@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('vendors/dropify/css/dropify.min.css') }}">
@endsection

@section('title', 'Tambah Anggota')

@section('content')
<form action="#" method="POST">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group fg-line">
                <input type="file" class="dropify" name="image"/>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body card-padding">
                    <div class="form-group fg-line">
                        <label>No. Anggota</label>
                        <input type="text" class="form-control" name="name" value="ABC00001" readonly>
                    </div>

                    <div class="form-group fg-line">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="form-group fg-line">
                        <label>Telepon</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="form-group fg-line">
                        <label>Email</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="form-group fg-line">
                        <label>Alamat</label>
                        <textarea class="form-control" name="address" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary waves-effect">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('script')
<script src="{{ asset('vendors/dropify/js/dropify.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.dropify').dropify();
    });
</script>
@endsection
