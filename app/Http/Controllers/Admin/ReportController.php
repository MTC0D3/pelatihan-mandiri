<?php

namespace App\Http\Controllers\Admin;

use PDF;
use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\TransactionDetail;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $fromDate = $request->from_date;
        $toDate = $request->to_date;

        return view('admin.report.index', compact('fromDate', 'toDate'));
    }

    public function filter(Request $request)
    {
        $fromDate = $request->from_date;
        $toDate = $request->to_date;

        $reports = Pendaftaran::with(['pelatihan', 'user'])
            ->whereDate('created_at', '>=', $fromDate)
            ->whereDate('created_at', '<=', $toDate)
            ->where('status', 'Terverifikasi')
            ->get();

        return view('admin.report.index', compact('fromDate', 'toDate', 'reports'));
    }

    public function pdf($fromDate, $toDate)
    {
        $reports = Pendaftaran::with(['pelatihan', 'user'])
            ->whereDate('created_at', '>=', $fromDate)
            ->whereDate('created_at', '<=', $toDate)
            ->where('status', 'Terverifikasi')
            ->get();


        $pdf = PDF::loadView('admin.report.report', compact('fromDate', 'toDate', 'reports'))->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Data Pendaftaran - '.Carbon::parse($fromDate)->format('d M Y').' - '.Carbon::parse($toDate)->format('d M Y').'.pdf');
    }
}