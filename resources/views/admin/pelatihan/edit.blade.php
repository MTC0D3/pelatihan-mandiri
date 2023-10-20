@extends('layouts.backend.app', ['title' => 'Pelatihan'])

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <form action="{{ route('admin.pelatihan.update', $pelatihan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-card-form title="PEMBARUAN PELATIHAN" url="{{ route('admin.pelatihan.index') }}" titleBtn="Update Peatihan">
                    <x-input title="Nama Pelatihan" type="text" name="name" placeholder="Enter pelatihan title"
                        :value="$pelatihan->name" />
                    <x-input title="Jenis Kegiatan" type="text" name="activity" placeholder="Enter pelatihan title"
                        :value="$pelatihan->activity" />
                    <x-input title="Tanggal Awal" type="date" name="start_date" placeholder="" :value="$pelatihan->start_date" />
                    <x-input title="Tanggal Akhir" type="date" name="end_date" placeholder="" :value="$pelatihan->end_date" />
                    <x-upload-file title="Gambar" name="image" :value="$pelatihan->image" />
                </x-card-form>
            </form>
        </div>
    </div>
@endsection
