<x-table>
    <thead>
        <tr>
            <th style="width: 10px">NO</th>
            <th>NIK</th>
            <th>NAMA DAN GELAR</th>
            <th>NIP</th>
            <th>INSTANSI</th>
            <th>JABATAN</th>
            <th>ALAMAT INSTANSI</th>
            <th>TEMPAT LAHIR</th>
            <th>TANGGAL LAHIR</th>
            <th>PHONE</th>
            <th>EMAIL</th>
            <th>ALAMAT</th>
            <th>PELATIHAN</th>
            <th>STATUS</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $i => $report)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $report->nik }}</td>
                <td>{{ $report->name }}</td>
                <td>{{ $report->nip }}</td>
                <td>{{ $report->agency }}</td>
                <td>{{ $report->position }}</td>
                <td>{{ $report->agency_address }}</td>
                <td>{{ $report->birthplace }}</td>
                <td>{{ $report->birthdate }}</td>

                <td>{{ $report->phone }}</td>
                <td>{{ $report->email }}</td>
                <td>{{ $report->address }}</td>
                <td>{{ $report->pelatihan->name }}</td>
                <td>
                    @if ($report->status == 'Terverifikasi')
                        <span class="badge badge-success">Terverifikasi</span>
                    @elseif($report->status == 'Belum Terverifikasi')
                        <span class="badge badge-warning">Belum Terverifikasi</span>
                    @else
                        <span class="badge badge-danger">Gagal</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</x-table>
