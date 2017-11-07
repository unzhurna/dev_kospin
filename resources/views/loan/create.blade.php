@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('vendors/chosen/chosen.css') }}">
@endsection

@section('title', 'Tambah Anggota')

@section('content')
<form action="#" method="POST">
    <div class="card">
        <div class="card-body card-padding">
            <div class="form-group fg-line">
                <label>No. Pinjaman :</label>
                <input type="text" class="form-control" name="name" value="PJM00012" disabled>
                <input type="text" class="hidden" name="name" value="PJM00012" disabled>
            </div>

            <div class="form-group fg-line">
                <label>Nama Anggota :</label>
                <select class="chosen" name="id_anggota" data-placeholder="Cari nama anggota">
                    @foreach ($members as $member)
                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                    @endforeach
                </select>
            </div>
            

            <div class="form-group fg-line">
                <label>Tanggal Pinjaman :</label>
                <input type="text" class="form-control" name="name" value="">
            </div>

            <div class="form-group fg-line">
                <label>Email</label>
                <div class="form-group fg-line">
                    <label>Nama Anggota :</label>
                    <select class="chosen" name="id_anggota" data-placeholder="Cari nama anggota">
                        <option></option>
                        <option></option>
                        <option></option>
                    </select>
                </div>
            </div>

            <div class="form-group fg-line">
                <label>Alamat</label>
                <textarea class="form-control" name="address" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary waves-effect">Submit</button>
        </div>
    </div>
</form>
@endsection

@section('script')
<script src="{{ asset('vendors/chosen/chosen.jquery.js') }}"></script>
<script src="{{ asset('vendors/form-validator/jquery.form-validator.min.js') }}"></script>
<script>
    $.validate();
</script>
@endsection
