@extends('layouts.auth.app', ['title' => 'Register'])

@section('content')
    <div class="card-body">
        <p class="login-box-msg">Masukan Data Pribadi Anda.</p>

        <form action="{{ route('register.step1.post') }}" method="post">
            @csrf
            <div class="mb-3 input-group">
                <input type="text" class="form-control @error('nik') is-invalid @enderror" placeholder="NIK" name="nik"
                    value="{{ old('nik') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-id-card"></span>
                    </div>
                </div>
                @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 input-group">
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama dan Gelar"
                    name="name" value="{{ old('name') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 input-group">
                <input type="text" class="form-control @error('birthplace') is-invalid @enderror"
                    placeholder="Tempat Lahir" name="birthplace" value="{{ old('birthplace') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-flag"></span>
                    </div>
                </div>
                @error('birthplace')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 input-group">
                <input type="date" class="form-control @error('birthdate') is-invalid @enderror"
                    placeholder="Tanggal Lahir" name="birthdate" value="{{ old('birthdate') }}">
                @error('birthdate')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 input-group">
                <textarea class="form-control @error('address') is-invalid @enderror" placeholder="Alamat" name="address"
                    value="">{{ old('address') }}</textarea>
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-block">Selanjutnya</button>
        </form>
        <div class="mt-4">
            <p class="mb-0">
                <a href="{{ route('login') }}" class="text-center">Already have one</a>
            </p>
        </div>
    </div>
@endsection
