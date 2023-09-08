@extends('layouts.backend.app', ['title' => 'Pelatihan'])

@section('content')
    <div class="row">
        <div class="col-12">
            <x-input-search placeholder="Search pelatihan.." :url="route('admin.pelatihan.index')" />
        </div>
        <div class="col-12">
            <x-button-create title="ADD NEW PELATIHAN" :url="route('admin.pelatihan.create')" />
            <x-card title="LIST PELATIHAN">
                <x-table>
                    <thead>
                        <tr>
                            <th style="width: 10px">NO</th>
                            <th>NAME</th>
                            <th>JENIS PELATIHAN</th>
                            <th>TANGGAL AWAL</th>
                            <th>TANGGAL AKHIR</th>
                            <th>GAMBAR</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelatihans as $i => $pelatihan)
                            <tr>
                                <td>{{ $pelatihans->firstItem() + $i }}</td>
                                <td>{{ $pelatihan->name }}</td>
                                <td>{{ $pelatihan->activity }}</td>
                                <td>{{ $pelatihan->start_date }}</td>
                                <td>{{ $pelatihan->end_date }}</td>
                                <td>
                                    <img src="{{ $pelatihan->image }}" class="img-fluid" width="50">
                                </td>
                                <td>
                                    @if ($pelatihan->start_date <= $datenow && $pelatihan->end_date >= $datenow)
                                        <span class="badge light badge-primary">
                                            Berjalan
                                        </span>
                                    @elseif($pelatihan->start_date < $datenow)
                                        <span class="badge light badge-danger">
                                            Berakhir
                                        </span>
                                    @else
                                        <span class="badge light badge-info">
                                            Akan Berjalan
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <x-button-edit :url="route('admin.pelatihan.edit', $pelatihan->id)" />
                                    <x-button-delete :id="$pelatihan->id" :url="route('admin.pelatihan.destroy', $pelatihan->id)" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card>
            <div class="d-flex justify-content-end">{{ $pelatihans->links() }}</div>
        </div>
    </div>
@endsection
