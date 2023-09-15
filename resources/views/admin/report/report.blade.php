<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <style>
        table {
            width: 100%;
            color: rgb(107 114 128);
            border-top-width: 1px;
            border-bottom-width: 0px;
            border-color: rgb(229 231 235);
            font-family: Arial, Helvetica, sans-serif;
        }

        thead {
            color: #374151;
            background-color: #d1d5db;
            text-transform: uppercase;
            font-size: 0.75rem;
            line-height: 1rem;
        }

        th {
            padding-left: 1rem;
            padding-right: 1rem;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }

        tbody {
            border-top-width: 1px;
            border-bottom-width: 0px;
            border-color: rgb(229 231 235);
        }

        td {
            padding-left: 1rem;
            padding-right: 1rem;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            white-space: nowrap;
            border-bottom: 1px solid rgb(229 231 235);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            font-weight: 500;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        Laporan Data Pendaftaran
        <br>
        <div style="margin-top:10px">
            {{ Carbon\Carbon::parse($fromDate)->format('d M Y') }}
            -
            {{ Carbon\Carbon::parse($toDate)->format('d M Y') }}
        </div>
    </div>
    <table>
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
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $i => $report)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $report->name }}</td>
                    <td>{{ $report->nip }}</td>
                    <td>{{ $report->user->nik }}</td>
                    <td>{{ $report->agency }}</td>
                    <td>{{ $report->phone }}</td>
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
    </table>
</body>

</html>
