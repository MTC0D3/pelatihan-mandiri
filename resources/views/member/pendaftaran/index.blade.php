@extends('layouts.backend.app', ['title' => 'Pendaftaran'])

@section('content')
    <div class="row">
        <div class="col-12">
            <x-input-search placeholder="Search pendaftaran.." :url="route('member.pendaftaran.index')" />
        </div>
        <div class="col-12">
            <x-button-create title="TAMBAH PENDAFTARAN" :url="route('member.pendaftaran.create')" />
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
                                    <div
                                        class="{{ $pendaftaran->status == 'Terverifikasi' ? '' : 'row justify-content-between' }}">
                                        <x-button-show :url="route('member.pendaftaran.show', $pendaftaran->id)" />
                                        @if ($pendaftaran->status != 'Terverifikasi')
                                            <x-button-delete :id="$pendaftaran->id" :url="route('member.pendaftaran.destroy', $pendaftaran->id)" />
                                        @endif
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
