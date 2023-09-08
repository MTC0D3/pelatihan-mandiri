<?php

namespace App\Http\Controllers\Member;

use App\Models\Review;
use App\Models\Showcase;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;
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
        // tampung data user yang sedang login kedalam variabel $user.
        $user = $request->user();


        // // tampung jumlah data transaction user yang sedang login dan memiliki status "success" kedalam variabel $transaction.
        $pendaftaran = Pendaftaran::where('user_id', $user->id)
            ->where('status', 'Terverifikasi')->count();


        // passing variabel $course, $review, $transaction, dan $showcase kedalam view.
        return view('member.dashboard', compact('pendaftaran'));
    }
}