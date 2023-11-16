@extends('layouts.backend.app', ['title' => 'Pendaftaran'])

@section('content')
    <div class="row">
        <div class="col-12">
            <x-input-search placeholder="Search pendaftaran.." :url="route('admin.pendaftaran.index')" />
        </div>
        <div class="col-12">
            <x-card title="DAFTAR PENDAFTARAN">
                <x-table>
                    <thead class="text-center">
                        <tr>
                            <th style="width: 10px">NO</th>
                            <th>NIK</th>
                            <th>NAMA DAN GELAR</th>
                            <th>NIP</th>
                            <th>INSTANSI</th>
                            <th>NOMOR HP</th>
                            <th>PELATIHAN</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($pendaftarans as $i => $pendaftaran)
                            <tr>
                                <td>{{ $pendaftarans->firstItem() + $i }}</td>
                                <td>{{ $pendaftaran->nik }}</td>
                                <td>{{ $pendaftaran->name }}</td>
                                <td>{{ $pendaftaran->nip }}</td>
                                <td>{{ $pendaftaran->agency }}</td>
                                <td>{{ $pendaftaran->phone }}</td>
                                <td>{{ $pendaftaran->pelatihan->name }}</td>
                                <td>
                                    @if ($pendaftaran->status == 'Terverifikasi')
                                        <span class="badge badge-success">Terverifikasi</span>
                                    @elseif($pendaftaran->status == 'Belum Terverifikasi')
                                        <span class="badge badge-warning">Belum Terverifikasi</span>
                                    @else
                                        <span class="badge badge-danger">Membatalkan</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="row justify-content-between">
                                        <x-button-edit :url="route('admin.pendaftaran.edit', $pendaftaran->id)" />
                                        <x-button-delete :id="$pendaftaran->id" :url="route('admin.pendaftaran.destroy', $pendaftaran->id)" />
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card>
            <div class="d-flex justify-content-end">{{ $pendaftarans->links() }}</div>
        </div>
    </div>
@endsection
