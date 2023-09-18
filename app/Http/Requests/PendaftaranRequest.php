<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class PendaftaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
    
      if(request()->isMethod('POST')){
        $data = [
          'pelatihan_id' => [
          'required',
        function ($attribute, $value, $fail) {
            // Mendapatkan pengguna yang saat ini masuk
            $user = Auth::user();

            // Periksa apakah pengguna sudah mendaftar pelatihan yang sama
            $existingRegistration = DB::table('pendaftarans')
                ->where('user_id', $user->id)
                ->where('pelatihan_id', $value)
                ->first();

            if ($existingRegistration) {
                $fail("Anda sudah mendaftar pelatihan ini sebelumnya.");
            }
        },
    ],
];
      }elseif(request()->isMethod('PUT')){
        $data = [
            'name' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:255'],
            'agency' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'agency_address' => ['required', 'string'],
            'birthplace' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date'],
            'address' => ['required', 'string'],
        ];
      }
    
      return $data;
    }
}
