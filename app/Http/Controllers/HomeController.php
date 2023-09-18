<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelatihan;

class HomeController extends Controller
{
    public function __invoke()
    {
         $datenow = date('Y-m-d');
        /*
            tampung semua data pelatihan kedalam variabel $pelatihans, kemudian kita memanggil relasi menggunakan withcount, selanjutnya pada saat melakukan pemanggilan relasi details yang kita ubah namanya menjadi enrolled, disini kita melakukan sebuah query untuk mengambil data transaksi yang memiliki status "success", disini kita melakukan pembatasan data yang kita ambil hanya sebanyak 6 data dan juga kita urutkan datanya dari yang paling baru.
        */
        $pelatihans = Pelatihan::where("start_date","<=",$datenow)->where("end_date",">=",$datenow)
        ->limit(6)
        ->latest()
        ->get();
      

        // tampung seluruh data user yang memiliki role "member" kedalam variabel $user.
        $user = User::role('member')->get();

        // passing variable $course, $user, $avgRating kedalam view.
        return view('landing.home', compact('user', 'pelatihans'));
    }
}