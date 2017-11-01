@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('vendors/chosen/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/dropify/css/dropify.min.css') }}">
@endsection

@section('title', 'Tambah Anggota')

@section('content')
<form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-3">
            <div class="form-group fg-line">
                <input type="file" class="dropify" name="image" data-default-file="{{ asset('media/user/no-user-image.png') }}">
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body card-padding">
                    <div class="form-group fg-line">
                        <label>No. Anggota</label>
                        <input type="text" class="form-control" name="reg_number" value="ABC00001" readonly>
                    </div>

                    <div class="form-group fg-line">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name" data-validation="required">
                    </div>

                    <div class="form-group fg-line">
                        <label>Telepon</label>
                        <input type="text" class="form-control" name="phone" data-validation="number">
                    </div>

                    <div class="form-group fg-line">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" data-validation="email">
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="fg-line form-group">
                                <label>Alamat</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="fg-line form-group">
                                <select class="chosen" name="province" data-placeholder="Pilih propinsi">
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}<option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="fg-line form-group">
                                <select class="chosen" name="province" data-placeholder="Pilih propinsi">
                                    @foreach ($regencies as $regency)
                                        <option value="{{ $regency->id }}">{{ $regency->name }}<option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="fg-line form-group">
                                <select class="chosen" name="province" data-placeholder="Pilih propinsi">
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}<option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="fg-line form-group">
                                <textarea class="form-control" name="address" rows="3" data-validation="required"></textarea>
                            </div>
                        </div>
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
    <script src="{{ asset('vendors/chosen/chosen.jquery.js') }}"></script>
    <script src="{{ asset('vendors/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('vendors/form-validator/jquery.form-validator.min.js') }}"></script>
    <script>
        $.validate();

        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
@endsection
