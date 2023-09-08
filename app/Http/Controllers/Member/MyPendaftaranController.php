<?php

namespace App\Http\Controllers\Member;


use App\Http\Controllers\Controller;
use App\Http\Requests\PendaftaranRequest;
use App\Models\Pelatihan;
use App\Models\Pendaftaran;

use Illuminate\Http\Request;

class MyPendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

         $pendaftarans = Pendaftaran::where('user_id', $user->id)
         ->search('name')
        //  ->multiSearch('pelatihan', 'name')
         ->latest()
         ->paginate(10);

        return view('member.pendaftaran.index', compact('pendaftarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datenow = date('Y-m-d');

         $dataJadwal = Pelatihan::where("start_date","<=",$datenow)->where("end_date",">=",$datenow)->where("activity","Pendaftaran")->get();
         $pelatihans = Pelatihan::with('user')->get();

        // passing variabel $categories kedalam view.
        return view('member.pendaftaran.create', compact('pelatihans', 'dataJadwal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PendaftaranRequest $request)
    {
        $request->user()->pendaftarans()->create([
            'name' => $request->name,
            'nip' => $request->nip,
            'birthplace' => $request->birthplace,
            'birthdate' => $request->birthdate,
            'position' => $request->position,
            'agency' => $request->agency,
            'agency_address' => $request->agency_address,
            'phone' => $request->phone,
            'address' => $request->address,

            'status' => 'Belum Terverifikasi',
            'registration_date' => now(),

            'pelatihan_id' => $request->pelatihan_id,
           
        ]);
        // kembali kehalaman admin/course/index dengan membawa toastr.
        return redirect(route('member.pendaftaran.index'))->with('toast_success', 'Pendaftaran Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran $pendaftaran)
    {
        $pelatihans = Pelatihan::all();

        return view('member.pendaftaran.show', compact('pendaftaran','pelatihans'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();

        // kembali kehalaman sebelumnya dengan membawa toastr.
        return back()->with('toast_success', 'Pendaftaran Deleted');
    }

     
}
