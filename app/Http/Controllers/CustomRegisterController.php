<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomRegisterController extends Controller
{
    public function showStep1Form()
    {
        return view('auth.register.step1');
    }

    public function postStep1(Request $request)
    {
         // Tambahkan aturan validasi untuk langkah 1
        $validatedData = $request->validate([
           'nik' => [
                'required',
                'numeric',
                'digits:16',
                Rule::unique(User::class),
            ],

            'name' => ['required', 'string', 'max:255'],

            'birthplace' => ['required', 'string', 'max:255'],

            'birthdate' => ['required', 'date'],

            'address' => ['required', 'string', 'max:500'],
        ]);

        // Simpan data langkah 1 ke dalam sesi
        Session::put('step1_data', $validatedData);

        return redirect()->route('register.step2');
    }

    // step 2
    public function showStep2Form()
    {
        return view('auth.register.step2');
    }

    public function postStep2(Request $request)
    {
          // Tambahkan aturan validasi untuk langkah 2
        $validatedData = $request->validate([
           'nip' => ['required', 'string', 'max:255'],

           'agency' => ['required', 'string', 'max:255'],

          'position' => ['required', 'string', 'max:255'],

           'agency_address' => ['required', 'string', 'max:500'],  
        ]);

        // Simpan data langkah 1 ke dalam sesi
        Session::put('step2_data', $validatedData);

        return redirect()->route('register.step3');
    }

    

// step 3
    public function showStep3Form()
    {
        return view('auth.register.step3');
    }

    public function postStep3(Request $request)
    {
        $validatedData = $request->validate([
           'password' => ['required', 'string', 'min:8'],

           'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],

            'phone' => [
                'required',
                'regex:/^[0-9]{10,13}$/',
                Rule::unique(User::class),
            ],
            // Tambahkan aturan validasi untuk langkah 2
        ]);

        // Dapatkan data langkah 1 dari sesi
        $step1Data = Session::get('step1_data');

        // Dapatkan data langkah 1 dari sesi
        $step2Data = Session::get('step2_data');

        // Gabungkan data langkah 1 dan langkah 2, dan buat pengguna
        $userData = array_merge($step1Data,$step2Data,$validatedData);

        $role = Role::where('name', 'member')->first();

        // Buat pengguna baru
        $user = User::create([
            'nik'=> $userData['nik'],
            'name' => $userData['name'],
            'birthplace'=> $userData['birthplace'],
            'birthdate'=> $userData['birthdate'],
            'address'=> $userData['address'],
            'nip'=> $userData['nip'],
            'agency'=> $userData['agency'],
            'agency_address'=> $userData['agency_address'],
            'position'=> $userData['position'],
            'phone' => $userData['phone'],
            'email' => $userData['email'],
            'password' => Hash::make($userData['password']),
            // Tambahkan bidang lain sesuai kebutuhan
        ]);

         $user->assignRole($role);

        // Hapus data sesi
        Session::forget('step1_data', 'step2_data');

        auth()->login($user);

        return redirect()->route('home')->with('success', 'Pendaftaran selesai! Anda sekarang masuk ke akun Anda.');
    }

    // Tambahkan langkah-langkah dan metode sesuai kebutuhan
}

