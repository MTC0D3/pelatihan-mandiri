@extends('layouts.backend.app', ['title' => 'Pendaftaran'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <form action="{{ route('admin.pendaftaran.update', $pendaftaran->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-card-form title="EDIT PENDAFTARAN" url="{{ route('admin.pendaftaran.index') }}"
                    titleBtn="Update Pendaftaran">
                    <x-input title="Nama Lengkap dan Gelar" type="text" name="name" placeholder="Enter Your Name"
                        :value="$pendaftaran->name" />
                    <x-input title="NIP" type="number" name="nip" placeholder="Enter your NIP" :value="$pendaftaran->nip" />
                    <x-input title="Tempat Lahir" type="text" name="birthplace" placeholder="Enter Your Birth of Place"
                        :value="$pendaftaran->birthplace" />
                    <x-input title="Tanggal Lahir" type="date" name="birthdate" placeholder="" :value="$pendaftaran->birthdate" />
                    <x-input title="Jabatan" type="text" name="position" placeholder="Enter Your Position"
                        :value="$pendaftaran->position" />
                    <x-input title="Instansi" type="text" name="agency" placeholder="Enter Your Agency"
                        :value="$pendaftaran->agency" />
                    <x-textarea title="Alamat" name="agency_address" placeholder="Enter Your Agency Address"
                        value="{{ old('agency_address') }}">
                        {{ $pendaftaran->agency_address }}</x-textarea>
                    <x-input title="Nomor HP" type="text" name="phone" placeholder="Enter Your Phone Number"
                        :value="$pendaftaran->phone" />
                    <x-textarea title="Alamat" name="address" placeholder="Enter Your Address" value="{{ old('address') }}">
                        {{ $pendaftaran->address }}</x-textarea>
                    <x-select title="Pelatihan" name="pelatihan_id">
                        <option selected disabled>Select Pelatihan</option>
                        @foreach ($pelatihans as $pelatihan)
                            <option value="{{ $pelatihan->id }}" @selected($pendaftaran->pelatihan_id == $pelatihan->id)>
                                {{ $pelatihan->name }}
                            </option>
                        @endforeach
                    </x-select>
                    <x-select title="Status Pendaftaran" name="status">
                        <option selected disabled>Select Status Pendaftaran</option>
                        <option value="Belum Terverifikasi"
                            {{ $pendaftaran->status == 'Belum Terverifikasi' ? 'selected' : '' }}>Belum
                            Terverifikasi</option>
                        <option value="Terverifikasi" {{ $pendaftaran->status == 'Terverifikasi' ? 'selected' : '' }}>
                            Terverifikasi
                        </option>
                        <option value="Gagal" {{ $pendaftaran->status == 'Gagal' ? 'selected' : '' }}>Gagal
                        </option>
                    </x-select>
                </x-card-form>
            </form>
        </div>
    </div>
@endsection
