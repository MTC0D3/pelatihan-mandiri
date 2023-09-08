<?php

namespace App\Http\Requests;

use DB;
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
          'name' => 'required',
          'nip' => 'required',
          'birthplace' => 'required',
          'birthdate' => 'required|date',
          'position' => 'required',
          'agency' => 'required',
          'agency_address' => 'required',
          'phone' => 'required',
          'address' => 'required',
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
            'name' => 'nullable',
            'nip' => 'nullable',
            'birthplace' => 'nullable',
            'birthdate' => 'nullable|date',
            'position' => 'nullable',
            'agency' => 'nullable',
            'agency_address' => 'nullable',
            'phone' => 'nullable',
            'address' => 'nullable',
        ];
      }
    
      return $data;
    }
}
