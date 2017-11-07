@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('vendors/chosen/chosen.css') }}">
@endsection

@section('title', 'Tambah Simpanan')

@section('content')
<form action="{{ route('saving.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body card-padding">
                    <div class="form-group fg-line">
                        <label>No. Pinjaman</label>
                        <input type="text" class="form-control" value="{{ genSaveNumber() }}" disabled>
                        <input type="text" class="hidden" name="no_simpanan" value="{{ genSaveNumber() }}">
                    </div>

                    <div class="form-group fg-line">
                        <label>Tanggal</label>
                        <input type="text" class="form-control" value="{{ date('d/m/Y') }}" disabled>
                    </div>

                    <div class="form-group fg-line">
                        <label>Nama Anggota</label>
                        <select class="chosen" name="id_anggota" data-placeholder="Pilih Anggota">
                            @foreach ($members as $member)
                                <option value="{{ $member->id }}">{{ $member->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary waves-effect">Submit</button>
                    <a href="{{ route('saving.index') }}" class="btn btn-default waves-effect">Batal</a>
                </div>
            </div>
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
