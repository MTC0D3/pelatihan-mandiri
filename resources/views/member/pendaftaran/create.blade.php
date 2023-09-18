@extends('layouts.backend.app', ['title' => 'Pendaftaran'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <form action="{{ route('member.pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-card-form title="CREATE NEW PENDAFTARAN" url="{{ route('member.pendaftaran.index') }}"
                    titleBtn="Create Pelatihan">
                    {{-- NIK --}}
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control" value="{{ auth()->user()->nik }}" disabled>
                    </div>
                    {{-- Nama dan Gelar --}}
                    <div class="form-group">
                        <label>Nama dan Gelar</label>
                        <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}"
                            disabled>
                    </div>
                    {{-- NIP --}}
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" name="nip" class="form-control" value="{{ auth()->user()->nip }}"
                            disabled>
                    </div>
                    {{-- Nama Instansi --}}
                    <div class="form-group">
                        <label>Nama Instansi</label>
                        <input type="text" name="agency" class="form-control" value="{{ auth()->user()->agency }}"
                            disabled>
                    </div>
                    {{-- Jabatan --}}
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" name="position" class="form-control" value="{{ auth()->user()->position }}"
                            disabled>
                    </div>
                    {{-- Alamat Instansi --}}
                    <div class="form-group">
                        <label>Alamat Instansi</label>
                        <textarea type="text" name="agency_address" class="form-control" value="" disabled>{{ auth()->user()->agency_address }}</textarea>
                    </div>
                    {{-- Tempat Lahir --}}
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="birthplace" class="form-control"
                            value="{{ auth()->user()->birthplace }}" disabled>
                    </div>
                    {{-- Tanggal Lahir --}}
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="birthdate" class="form-control" value="{{ auth()->user()->birthdate }}"
                            disabled>
                    </div>
                    {{-- Nomor HP --}}
                    <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="number" name="phone" class="form-control" value="{{ auth()->user()->phone }}"
                            disabled>
                    </div>
                    {{-- Email --}}
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}"
                            disabled>
                    </div>
                    {{-- Alamat --}}
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea type="text" name="address" class="form-control" value="" disabled>{{ auth()->user()->address }}</textarea>
                    </div>
                    {{-- Pelatihan --}}
                    <x-select title="Pelatihan" name="pelatihan_id">
                        <option selected disabled>Select Pelatihan</option>
                        @foreach ($dataJadwal as $pelatihan)
                            <option value="{{ $pelatihan->id }}">
                                {{ $pelatihan->name }}
                            </option>
                        @endforeach
                    </x-select>
                </x-card-form>
            </form>
        </div>
    </div>
@endsection
