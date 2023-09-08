@extends('layouts.backend.app', ['title' => 'Pendaftaran'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <form action="{{ route('member.pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-card-form title="CREATE NEW PENDAFTARAN" url="{{ route('member.pendaftaran.index') }}"
                    titleBtn="Create Pelatihan">
                    <x-input title="Nama Lengkap dan Gelar" type="text" name="name" placeholder="Enter Your Name"
                        :value="auth()->user()->name" />
                    <x-input title="NIP" type="text" name="nip" placeholder="Enter Your NIP" :value="auth()->user()->nip" />
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="number" name="nik" class="form-control" value="{{ auth()->user()->nik }}"
                            disabled>
                    </div>
                    <x-input title="Tempat Lahir" type="text" name="birthplace" placeholder="Enter Your Birth of Place"
                        :value="auth()->user()->birthplace" />
                    <x-input title="Tanggal Lahir" type="date" name="birthdate" placeholder="" :value="auth()->user()->birthdate" />
                    <x-input title="Jabatan" type="text" name="position" placeholder="Enter Your Position"
                        :value="auth()->user()->position" />
                    <x-input title="Nama Instansi" type="text" name="agency" placeholder="Enter Your Agency"
                        :value="auth()->user()->agency" />
                    <x-textarea title="Alamat Instansi" name="agency_address" placeholder="Enter Your Agency Address"
                        value="">{{ auth()->user()->agency_address }}</x-textarea>
                    <x-input title="Nomor HP" type="text" name="phone" placeholder="Enter Your Phone Number"
                        :value="auth()->user()->phone" />
                    <x-textarea title="Alamat" name="address" placeholder="Enter Your Address" value="">
                        {{ auth()->user()->address }}</x-textarea>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}"
                            disabled>
                    </div>
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
