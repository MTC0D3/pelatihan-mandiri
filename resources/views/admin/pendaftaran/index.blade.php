@extends('layouts.backend.app', ['title' => 'Pendaftaran'])

@section('content')
    <div class="row">
        <div class="col-12">
            <x-input-search placeholder="Search pendaftaran.." :url="route('admin.pendaftaran.index')" />
        </div>
        <div class="col-12">
            <x-card title="LIST PENDAFTARAN">
                <x-table>
                    <thead>
                        <tr>
                            <th style="width: 10px">NO</th>
                            <th>NAME</th>
                            <th>NIP</th>
                            <th>NIK</th>
                            <th>INSTANSI</th>
                            <th>PHONE</th>
                            <th>PELATIHAN</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftarans as $i => $pendaftaran)
                            <tr>
                                <td>{{ $pendaftarans->firstItem() + $i }}</td>
                                <td>{{ $pendaftaran->name }}</td>
                                <td>{{ $pendaftaran->nip }}</td>
                                <td>{{ $pendaftaran->user->nik }}</td>
                                <td>{{ $pendaftaran->agency }}</td>
                                <td>{{ $pendaftaran->phone }}</td>
                                <td>{{ $pendaftaran->pelatihan->name }}</td>
                                <td>
                                    @if ($pendaftaran->status == 'Terverifikasi')
                                        <span class="badge badge-success">Terverifikasi</span>
                                    @elseif($pendaftaran->status == 'Belum Terverifikasi')
                                        <span class="badge badge-warning">Belum Terverifikasi</span>
                                    @else
                                        <span class="badge badge-danger">Gagal</span>
                                    @endif
                                </td>
                                <td>
                                    <x-button-edit :url="route('admin.pendaftaran.edit', $pendaftaran->id)" />
                                    <x-button-delete :id="$pendaftaran->id" :url="route('admin.pendaftaran.destroy', $pendaftaran->id)" />
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
