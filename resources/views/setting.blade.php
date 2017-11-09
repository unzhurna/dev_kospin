@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2>Anggota Terbaru <small>5 Anggota yang baru mendaftar</small></h2>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach ($members as $member)
                            <a class="list-group-item media" href="#">
                                <div class="pull-left">
                                    @if ($member->avatar)
                                        <img class="lgi-img" src="{{ asset('media/user/'.$member->avatar) }}" alt="{{ $member->nama }}">
                                    @else
                                        <img class="lgi-img" src="{{ asset('media/user/no-user-image.png') }}" alt="{{ $member->nama }}">
                                    @endif
                                </div>
                                <div class="media-body">
                                    <div class="lgi-heading">{{ $member->nama }}</div>
                                    <small class="lgi-text">{{ $member->alamat.', '.$member->kota}}</small>
                                </div>
                            </a>
                        @endforeach
                        <a class="view-more" href="{{ route('member.index') }}">Semua Anggota</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
