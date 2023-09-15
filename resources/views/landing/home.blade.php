@extends('layouts.frontend.app', ['title' => 'Homepage'])

@section('content')
    @include('layouts.frontend.partials.hero')
    <section class="w-full p-10 bg-slate-600">
        <div class="flex flex-col items-center gap-2 mb-10 text-center">
            <h1 class="text-2xl font-bold text-white">PELATIHAN BERJALAN</h1>
            <div class="h-1 mt-2 w-60 bg-slate-800"></div>
        </div>
        <div class="container grid items-start grid-cols-1 gap-8 mx-auto my-5 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($pelatihans as $pelatihan)
                <x-landing.pelatihan-item :pelatihan="$pelatihan" />
            @endforeach
        </div>
    </section>
    @guest
        <section class="w-full p-6 bg-white">
            <div class="flex flex-col items-center justify-center p-4 space-y-8 md:p-10 md:px-24 xl:px-48">
                <h1 class="text-2xl font-bold leading-none text-center text-indigo-950 md:text-3xl">
                    TUNGGU APA LAGI ?
                </h1>
                <p class="text-sm font-medium text-center text-indigo-950 md:text-base">
                    Mari segera bergabung bersama kami di pelatihan mandiri BBPKH Cinagara
                </p>
                <div class="flex flex-col space-y-4 sm:space-y-0 sm:flex-row sm:space-x-8">
                    <a href="{{ route('register') }}"
                        class="flex items-center gap-2 px-4 py-2 text-base text-white border rounded-lg bg-slate-800 hover:scale-110 hover:duration-200 border-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            <path d="M16 11h6m-3 -3v6"></path>
                        </svg>
                        Sign Up
                    </a>
                </div>
            </div>
        </section>
    @endguest
@endsection
