<?php

namespace App\Http\Controllers\Admin;

use PDF;
use Carbon\Carbon;
use App\Models\Pelatihan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Exports\ExportPendaftaran;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $fromDate = $request->from_date;
        $toDate = $request->to_date;

        return view('admin.report.index',[
            'fromDate' => $fromDate,
            'toDate' => $toDate,
        ]);
    }

    public function filter(Request $request)
    {
        $fromDate = $request->from_date;
        $toDate = $request->to_date;

        $data = Pendaftaran::with(['pelatihan', 'user'])
            ->whereDate('created_at', '>=', $fromDate)
            ->whereDate('created_at', '<=', $toDate)
            ->where('status', 'Terverifikasi')
            ->get();

        return view('admin.report.index', compact('fromDate', 'toDate', 'data'));
    }

    public function export_excel($fromDate, $toDate)
    {
        return Excel::download(new ExportPendaftaran($fromDate, $toDate), 'Laporan Data Pendaftaran - '.Carbon::parse($fromDate)->format('d M Y').' - '.Carbon::parse($toDate)->format('d M Y').'.xlsx');
    }
}