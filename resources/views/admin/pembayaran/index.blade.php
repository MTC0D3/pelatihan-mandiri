@extends('layouts.backend.app', ['title' => 'Pembayaran'])

@section('content')
    <div class="row">
        <div class="col-12">
            <x-button-create title="ADD NEW PEMBAYARAN" :url="route('admin.pembayaran.create')" />
            <x-card title="LIST PEMBAYARAN">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>NAME</th>
                            <th>NIP</th>
                            <th>NIK</th>
                            <th>INSTANSI</th>
                            <th>PHONE</th>
                            <th>BUKTI PEMBAYARAN</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembayarans as $i => $pembayaran)
                            <tr>
                                <td>{{ $pembayarans->firstItem() + $i }}</td>
                                <td>{{ $pendaftaran->name }}</td>
                                <td>{{ $pendaftaran->nip }}</td>
                                <td>{{ $pembayaran->pendaftaran->nik }}</td>
                                <td>{{ $pembayaran->pendaftaran->agency }}</td>
                                <td>{{ $pembayaran->pendaftaran->phone }}</td>
                                <td>{{ $pembayaran->bukti_pembayaran }}</td>
                                <td>
                                    @if ($pendaftaran->status_pendaftaran == 'Terverifikasi')
                                        <span class="badge badge-success">Terverifikasi</span>
                                    @elseif($pendaftaran->status_pendaftaran == 'Belum Terverifikasi')
                                        <span class="badge badge-warning">Belum Terverifikasi</span>
                                    @else
                                        <span class="badge badge-danger">Gagal</span>
                                    @endif
                                </td>
                                <td>
                                    <x-button-edit :url="route('admin.pembayaran.edit', $pembayaran->id)" />
                                    <x-button-delete :id="$pembayaran->id" :url="route('admin.pembayaran.destroy', $pembayaran->id)" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-card>
            <div class="d-flex justify-content-end">{{ $pembayarans->links() }}</div>
        </div>
    </div>
@endsection
