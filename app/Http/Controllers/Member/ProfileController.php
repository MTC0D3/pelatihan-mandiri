<?php

namespace App\Http\Controllers\Member;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // tampung data user yang sedang login kedalam variabel $user.
        $user = $request->user();

        // passing varibel $user kedalam view.
        return view('member.profile.index', compact('user'));
    }

    public function updateProfile(ProfileRequest $request, User $user)
    {
        // update data user bedasarkan id.
        $user->update([
            'name' => $request->name,
            'nip' => $request->nip,
            'birthplace' => $request->birthplace,
            'birthdate' => $request->birthdate,
            'position' => $request->position,
            'agency' => $request->agency,
            'agency_address' => $request->agency_address,
            'address' => $request->address,
        ]);

        // cek apakah user mengirimkan request file avatar.
        if($request->file('avatar')){
            // hapus avatar user sebelumnya.
            Storage::disk('local')->delete('public/avatar/'.basename($user->avatar));
            // tampung request file avatar kedalam variabel $avatar.
            $avatar = $request->file('avatar');
            // request yang telah kita tampung kedalam variabel kita masukan kedalam folder public/avatar.
            $avatar->storeAs('public/avatar/', $avatar->hashName());
            // update data user avatar.
            $user->update([
                'avatar' => $avatar->hashName(),
            ]);
        }

        // kembali kehalaman sebelumnya dengan membawa toastr.
        return back()->with('toast_success', 'Profile Updated');
    }

    public function updatePassword(Request $request, User $user)
    {
        // validasi request password sebelum kita masukan kedalam database.
        $request->validate([
            'password' => 'confirmed|required|min:8',
        ]);

        // kita lakukan pengecekan apakah password yang lama sesuai dengan password yang kita masukan.
        if(!(Hash::check($request->get('current_password'), $user->password))){
            // kembali kehalaman sebelumnya dengan sebuah toastr.
            return back()->with('toast_error', 'Your Old Password Wrong');
        }else{
            // update data password user bedasarkan id.
            $user->update([
                'password' => Hash::make($request->get('password')),
            ]);
        }

        // kembali kehalaman sebelumnya dengan sebuah toastr.
        return back()->with('toast_success', 'Password Changed');
    }
}