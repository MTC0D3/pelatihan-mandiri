<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\PelatihanRequest;
use App\Models\Pelatihan;
use Illuminate\Support\Facades\Storage;

class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
            tampung seluruh data category kedalam variabel $categories,
            selanjutnya kita pecah data category yang kita tampilkan hanya 10 per halaman
            dengan urutan terbaru.
        */
        $datenow = date('Y-m-d');
        $pelatihans = Pelatihan::search('name')->latest()->paginate(10);

        // passing varibel $categories kedalam view.
        return view('admin.pelatihan.index', compact('pelatihans','datenow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pelatihan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PelatihanRequest $request)
    {
        // tampung request file image kedalam variable $image.
        $image = $request->file('image');
        // request yang telah kita tampung kedalam variabel, kita masukan kedalam folder public/categories.
        $image?->storeAs('public/pelatihans', $image->hashName());

        // masukan data baru category kedalam database.
        Pelatihan::create([
            'name' => $request->name,
            'activity' => $request->activity,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'image' => $image?->hashName(),
        ]);

        // kembali kehalaman admin/category/index dengan membawa toastr.
        return redirect(route('admin.pelatihan.index'))->with('toast_success', 'Pelatihan Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelatihan $pelatihan)
    {
        // passing varibel $category kedalam view.
        return view('admin.pelatihan.edit', compact('pelatihan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PelatihanRequest $request, Pelatihan $pelatihan)
    {
        // update data category berdasarkan id.
        $pelatihan->update([
             'name' => $request->name,
             'activity' => $request->activity,
             'start_date' => $request->start_date,
             'end_date' => $request->end_date,
        ]);

        // cek apakah user mengirimkan request file image.
        if($request->file('image')){
            // hapus image category yang sebelumnya.
            Storage::disk('local')->delete('public/pelatihans/'.basename($pelatihan->image));
            // tampung request file image kedalam variabel $image.
            $image = $request->file('image');
            // request yang telah kita tampung kedalam variabel kita masukan kedalam folder public/categories.
            $image->storeAs('public/pelatihans', $image->hashName());
            // update data category image berdasarkan id.
            $pelatihan->update([
                'image' => $image->hashName(),
            ]);
        }

        // kembali kehalaman admin/category/index dengan membawa toastr.
        return redirect(route('admin.pelatihan.index'))->with('toast_success', 'Pelatihan Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelatihan $pelatihan)
    {
        // hapus image category berdasarkan id.
        Storage::disk('local')->delete('public/pelatihans/'.basename($pelatihan->image));

        // hapus data category berdasarkan id.
        $pelatihan->delete();

        // kembali kehalaman sebelumnya dengan membawa toastr.
        return back()->with('toast_success', 'Pelatihan Deleted');
    }
}