@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('vendors/chosen/chosen.css') }}">
@endsection

@section('title', 'Form Pinjaman')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body card-padding">
                <form action="{{ route('loan.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group fg-line">
                        <label>No. Pinjaman</label>
                        <input type="text" class="form-control" value="{{ genLoanNumber() }}" disabled>
                        <input type="text" class="hidden" name="no_pinjaman" value="{{ genLoanNumber() }}">
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

                    <div class="form-group fg-line">
                        <label>Jumlah Pinjaman</label>
                        <input type="text" class="form-control" id="loanTotal" name="ttl_pinjaman" data-validation="number">
                        <input type="text" class="hidden loanInstall" name="angs_pinjaman">
                        <input type="text" class="hidden loanJasa" name="jasa_pinjaman">
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label>Jenis Pinjaman</label>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="fg-line">
                                    <input type="text" class="form-control" id="loanTenor" name="tenor" placeholder="Tenor Pinjaman" data-validation="number">
                                </div>
                                <span class="input-group-addon last">bulan</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group fg-line">
                                <select class="form-control" name="jenis_pinjaman" id="loanType" data-placeholder="Jenis Pinjaman">
                                    <option>Pilih Jenis Pinjaman</option>
                                    <option value="0.014">Reguler</option>
                                    <option value="0.03">Berjangaka</option>
                                </select>
                                <input type="text" class="hidden loanRate" name="bunga_pinjaman">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary waves-effect">Submit</button>
                    <a href="{{ route('loan.index') }}" class="btn btn-default waves-effect">Batal</a>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h2>Rincian Pinjaman</h2>
            </div>
            <div class="card-body card-padding" id="summary">

                <div class="form-group fg-line">
                    <label>Jumlah Pijaman</label>
                    <input type="text" class="form-control loanTotal" disabled>
                </div>

                <div class="form-group fg-line">
                    <label>Tenor Pijaman</label>
                    <input type="text" class="form-control loanTenor" disabled>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group fg-line">
                            <label>Jenis Pijaman</label>
                            <input type="text" class="form-control loanType" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group fg-line">
                            <label>Bunga Pijaman</label>
                            <input type="text" class="form-control loanRate" disabled>
                        </div>
                    </div>
                </div>

                <div class="form-group fg-line">
                    <label>Angsuran per-bulan</label>
                    <input type="text" class="form-control loanInstall" disabled>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('vendors/chosen/chosen.jquery.js') }}"></script>
    <script src="{{ asset('vendors/form-validator/jquery.form-validator.min.js') }}"></script>
    <script>
        $.validate();

        $(document).on('change', '#loanTotal', function() {
            $('.loanTotal').val($(this).val());
        });

        $(document).on('change', '#loanTenor', function() {
            $('.loanTenor').val($(this).val());
        });

        $(document).on('change', '#loanType', function() {

            //label
            lTotal = $('.loanTotal').val();
            lTenor = $('.loanTenor').val();
            lType = $(this).find(':selected').text();
            lRate = $(this).val();

            $('.loanType').val(lType);
            $('.loanRate').val(lRate);

            cPokok = lTotal / lTenor;
            cBunga = (lTotal * lRate) / lTenor;
            cBulan = cPokok + cBunga;

            $('.loanJasa').val(cBunga.toFixed(0));
            $('.loanInstall').val(cBulan.toFixed(0));
        });
    </script>
@endsection
