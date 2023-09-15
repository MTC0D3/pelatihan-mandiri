<?php

namespace App\Exports;

use App\Models\Pendaftaran;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;

class ExportPendaftaran implements FromView
{
    use Exportable;

    protected $fromDate;
    protected $toDate;

    public function __construct($fromDate, $toDate)
    {
        // Ubah konstruktor untuk mengambil tanggal dari input yang diberikan
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
    }

    public function view():View
    {
        // Gunakan $this->fromDate dan $this->toDate
        $fromDate = $this->fromDate;
        $toDate = $this->toDate;

        $data = Pendaftaran::with(['pelatihan', 'user'])
            ->whereDate('created_at', '>=', $fromDate)
            ->whereDate('created_at', '<=', $toDate)
            ->where('status', 'Terverifikasi')
            ->get();

        return view('admin.report.table', ['data' => $data, 'fromDate' => $fromDate, 'toDate' => $toDate]);
    }
}
