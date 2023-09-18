<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    <link rel="shortcut icon" href="{{ asset('logo.png') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="text-center card-header">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('logo.png') }}" class="icon icon-tabler icon-tabler-brand-tabler" width="40"
                        height="40" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                </a>
                <h4 class="mt-3 text-bold">BBPKH CINAGARA</h4>
            </div>
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>

</html>
