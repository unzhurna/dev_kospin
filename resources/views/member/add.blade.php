@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
<form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label>No. Anggota</label>
                        <input type="text" class="form-control" value="{{ genRegNumber() }}" disabled>
                        <input type="text" class="hidden" name="no_anggota" value="{{ genRegNumber() }}">
                    </div>

                    <div class="form-group fg-line">
                        <label>Photo Anggota</label>
                        <input type="file" name="image">
                    </div>

                    <div class="form-group fg-line">
                        <label>Nama calon anggota</label>
                        <input type="text" class="form-control" name="nama" data-validation="required">
                    </div>

                    <div class="form-group fg-line">
                        <label>No telepon</label>
                        <input type="text" class="form-control" name="telepon" data-validation="number">
                    </div>

                    <div class="form-group fg-line">
                        <label>Alamat email</label>
                        <input type="text" class="form-control" name="email" data-validation="email">
                    </div>

                    <div class="form-group fg-line">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" data-validation="required">
                    </div>

                    <div class="form-group fg-line">
                        <label>Alamat sesuai KTP</label>
                        <input type="text" class="form-control" name="kota" placeholder="Kota" data-validation="required">
                        <textarea class="form-control m-t-10" name="alamat" rows="3" data-validation="required" placeholder="Nama jalan, no, dll..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary waves-effect">Submit</button>
                    <a href="{{ route('member.index') }}" class="btn btn-default waves-effect">Batal</a>
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
