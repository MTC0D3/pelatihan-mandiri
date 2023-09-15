@extends('layouts.backend.app', ['title' => 'Pendaftaran'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <form action="{{ route('admin.pelatihan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-card-form title="CREATE NEW PELATIHAN" url="{{ route('admin.pelatihan.index') }}" titleBtn="Buat Pelatihan">
                    <x-input title="Nama Pelatihan" type="text" name="name" placeholder="Enter pelatihan title"
                        :value="old('name')" />
                    <x-select title="Jenis Kegiatan" name="activity">
                        <option selected disabled>Select Jenis Kegiatan</option>
                        <option value="Pendaftaran">
                            Pendaftaran
                        </option>
                    </x-select>
                    <x-input title="Tanggal Awal" type="date" name="start_date" placeholder="" :value="old('start_date')" />
                    <x-input title="Tanggal Akhir" type="date" name="end_date" placeholder="" :value="old('end_date')" />
                    <x-upload-file title="Gambar" name="image" :value="old('image')" />
                </x-card-form>
            </form>
        </div>
    </div>
@endsection
