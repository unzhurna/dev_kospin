@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('vendors/chosen/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/dropify/css/dropify.min.css') }}">
@endsection

@section('title', 'Tambah Anggota')

@section('content')
<form action="{{ route('member.update', $member->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-3">
            <div class="form-group fg-line">
                <input type="file" class="dropify" name="image" data-default-file="{{ asset('media/user/'.$member->avatar) }}">
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body card-padding">
                    <div class="form-group fg-line">
                        <label>No. Anggota</label>
                        <input type="text" class="form-control" name="reg_number" value="{{ $member->reg_number }}" readonly>
                    </div>

                    <div class="form-group fg-line">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name" value="{{ $member->name }}">
                    </div>

                    <div class="form-group fg-line">
                        <label>Telepon</label>
                        <input type="text" class="form-control" name="phone" value="{{ $member->phone }}">
                    </div>

                    <div class="form-group fg-line">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $member->email }}">
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="fg-line form-group">
                                <label>Alamat</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="fg-line form-group">
                                <textarea class="form-control" name="address" rows="3">{{ $member->address }}</textarea>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary waves-effect">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('script')
    <script src="{{ asset('vendors/chosen/chosen.jquery.js') }}"></script>
    <script src="{{ asset('vendors/dropify/js/dropify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
@endsection
