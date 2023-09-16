@extends('layouts.auth.app', ['title' => 'Register'])

@section('content')
    <div class="card-body">
        <p class="login-box-msg">Masukan Data Pekerjaan Anda.</p>

        <form action="{{ route('register.step2.post') }}" method="post">
            @csrf
            <div class="mb-3 input-group">
                <input type="text" class="form-control @error('nip') is-invalid @enderror" placeholder="NIP" name="nip"
                    value="{{ old('nip') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-credit-card"></span>
                    </div>
                </div>
                @error('nip')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 input-group">
                <input type="text" class="form-control @error('agency') is-invalid @enderror" placeholder="Instansi"
                    name="agency" value="{{ old('agency') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-building"></span>
                    </div>
                </div>
                @error('agency')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 input-group">
                <input type="text" class="form-control @error('position') is-invalid @enderror" placeholder="Jabatan"
                    name="position" value="{{ old('position') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user-tie"></span>
                    </div>
                </div>
                @error('position')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 input-group">
                <textarea class="form-control @error('agency_address') is-invalid @enderror" placeholder="Alamat Instansi"
                    name="agency_address" value="">{{ old('agency_address') }}</textarea>
                @error('agency_address')
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
