<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PendaftaranRequest;
use App\Models\Pelatihan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendaftarans = Pendaftaran::with(['pelatihan', 'user'])->search('name')->multiSearch('pelatihan', 'name')->latest()->paginate(10);

        return view('admin.pendaftaran.index', compact('pendaftarans'));
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        $pelatihans = Pelatihan::all();

        return view('admin.pendaftaran.edit', compact('pendaftaran','pelatihans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PendaftaranRequest $request, Pendaftaran $pendaftaran)
    {
         $pendaftaran->update([
            'name' => $request->name,
            'nip' => $request->nip,
            'birthplace' => $request->birthplace,
            'birthdate' => $request->birthdate,
            'position' => $request->position,
            'agency' => $request->agency,
            'agency_address' => $request->agency_address,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'status' => $request->status,

            'pelatihan_id' => $request->pelatihan_id,
        ]);

        return redirect(route('admin.pendaftaran.index'))->with('toast_success', 'Pendaftaran Updated');
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
