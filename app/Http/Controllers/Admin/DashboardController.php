<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pelatihan;
use App\Models\Pendaftaran;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // tampung jumlah data category kedalam variabel $category.
        $pelatihan = Pelatihan::count();

        // tampung jumlah data user kedalam variabel $member.
        $member = User::count();

        // tampung jumlah data transaction yang memiliki status "success" kedalam variabel $transaction.
        $pendaftaranSuccess = Pendaftaran::where('status', 'Terverifikasi')->count();

        $pendaftarans = Pendaftaran::where('status', 'Belum Terverifikasi')->get();

        
        return view('admin.dashboard', compact('pelatihan', 'member', 'pendaftarans',  'pendaftaranSuccess'));
    }
}