@extends('layouts.backend.app', ['title' => 'Dashboard'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="alert alert-dark">
                <i class="mr-1 fas fa-user"></i> Selamat Datang Kembali,
                <span class="text-danger">
                    {{ Auth::user()->name }}
                </span>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>
                        {{ $pelatihan }}
                    </h3>
                    <p>Pelatihan</p>
                </div>
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-2" width="48"
                        height="48" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14 4h6v6h-6z"></path>
                        <path d="M4 14h6v6h-6z"></path>
                        <circle cx="17" cy="17" r="3"></circle>
                        <circle cx="7" cy="7" r="3"></circle>
                    </svg>
                </div>
                <a href="{{ route('admin.pelatihan.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-navy">
                <div class="inner">
                    <h3>
                        {{ $member }}
                    </h3>
                    <p>Member</p>
                </div>
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users text-secondary"
                        width="48" height="48" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                    </svg>
                </div>
                <a href="{{ route('admin.user.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>
                        {{ $pendaftaranSuccess }}
                    </h3>
                    <p>Pendaftaran</p>
                </div>
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt" width="48"
                        height="48" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2m4 -14h6m-6 4h6m-2 4h2">
                        </path>
                    </svg>
                </div>
                <a href="{{ route('admin.pendaftaran.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-12">
        @if ($pendaftarans->count() == 0)
            <div class="alert alert-info d-flex align-items-center" role="alert">
                <i class="mr-2 fas fa-info-circle fa-lg"></i>
                Saat ini belum ada pendaftaran
            </div>
        @else
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="mr-2 fas fa-info-circle fa-lg"></i>
                Saat ini terdapat {{ $pendaftarans->count() }} pendaftaran menunggu verifikasi.
                <a href="{{ route('admin.pendaftaran.index') }}" class="ml-1">Lihat Detail Pendaftaran</a>
            </div>
        @endif
    </div>
@endsection
