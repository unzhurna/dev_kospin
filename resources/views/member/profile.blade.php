@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
<form action="#" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-3">
            <div class="thumbnail">
                <img src="{{ asset('media/user/no-user-image.png') }}" class="img-circle" alt="Nama Anggota" />
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body card-padding">

                    <div class="form-group fg-line">
                        <label>Nama calon anggota</label>
                        <input type="text" class="form-control" name="nama" value="{{ $user->name }}" data-validation="required">
                    </div>

                    <!-- <div class="form-group fg-line">
                        <label>Photo Anggota</label>
                        <input type="file" name="image">
                    </div>

                    <div class="form-group fg-line">
                        <label>No telepon</label>
                        <input type="text" class="form-control" name="telepon" data-validation="number">
                    </div> -->

                    <div class="form-group fg-line">
                        <label>Alamat email</label>
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}" data-validation="email">
                    </div>

                    <button type="submit" class="btn btn-primary waves-effect">Submit</button>
                    <a href="{{ route('home') }}" class="btn btn-default waves-effect">Batal</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('script')
    <script src="{{ asset('vendors/form-validator/jquery.form-validator.min.js') }}"></script>
    <script>
        $.validate();
    </script>
@endsection
