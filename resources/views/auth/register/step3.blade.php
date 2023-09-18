@extends('layouts.auth.app', ['title' => 'Register'])

@section('content')
    <div class="card-body">
        <p class="login-box-msg">Masukan Kontak Anda.</p>

        <form action="{{ route('register.step3.post') }}" method="post">
            @csrf
            <div class="mb-3 input-group">
                <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Nomor HP"
                    name="phone" value="{{ old('phone') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                    </div>
                </div>
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 input-group">
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                    name="email" value="{{ old('email') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 input-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Password Baru" name="password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </form>
        <div class="mt-4">
            <p class="mb-0">
                <a href="{{ route('login') }}" class="text-center">Already have one</a>
            </p>
        </div>
    </div>
@endsection
