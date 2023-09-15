@extends('layouts.backend.app', ['title' => 'Transaction Detail'])

@section('content')
    <div class="row">
        <div class="col-12">
            {{-- <div class="mb-2 d-flex justify-content-end">
                <a href="{{route('member.cetak') }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-download" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                        <path d="M12 17v-6"></path>
                        <path d="M9.5 14.5l2.5 2.5l2.5 -2.5"></path>
                    </svg>
                    Cetak Laporan
                </a>
            </div> --}}
            <x-card title="DETAIL PENDAFTARAN">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td width="30%">NIK</td>
                            <td>
                                {{ $pendaftaran->nik }}
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">Nama Lengkap dan Gelar</td>
                            <td>
                                {{ $pendaftaran->name }}
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">NIP</td>
                            <td>
                                {{ $pendaftaran->nip }}
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">Nama Instansi</td>
                            <td>
                                {{ $pendaftaran->agency }}
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">Jabatan</td>
                            <td>
                                {{ $pendaftaran->position }}
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">Alamat Instansi</td>
                            <td>
                                {{ $pendaftaran->agency_address }}
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">Tempat Lahir</td>
                            <td>
                                {{ $pendaftaran->birthplace }}
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">Tanggal Lahir</td>
                            <td>
                                {{ $pendaftaran->birthdate }}
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">Nomor HP</td>
                            <td>
                                {{ $pendaftaran->phone }}
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">Email</td>
                            <td>
                                {{ $pendaftaran->email }}
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">Alamat</td>
                            <td>
                                {{ $pendaftaran->address }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </x-card>
        </div>
        <div class="col-12">
            <x-card title="DETAIL PELATIHAN">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td width="30%">PELATIHAN</td>
                            <td>
                                {{ $pendaftaran->pelatihan->name }}
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">STATUS</td>
                            <td>
                                @if ($pendaftaran->status == 'Terverifikasi')
                                    <span class="badge badge-success">Terverifikasi</span>
                                @elseif($pendaftaran->status == 'Belum Terverifikasi')
                                    <span class="badge badge-warning">Belum Terverifikasi</span>
                                @else
                                    <span class="badge badge-danger">Gagal</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </x-card>
        </div>
    </div>
@endsection
