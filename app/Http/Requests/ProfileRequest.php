<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
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
        return [
             'name' => ['nullable', 'string', 'max:255'],
             'username' => ['nullable', 'string', 'max:255'],
             'nip' => ['nullable', 'string', 'max:255'],
             'agency' => ['nullable', 'string', 'max:255'],
             'position' => ['nullable', 'string', 'max:255'],
             'agency_address' => ['nullable', 'string'],
             'birthplace' => ['nullable', 'string', 'max:255'],
             'birthdate' => ['nullable', 'date'],
             'address' => ['nullable', 'string'],
             'avatar' => ['mimes:png,jpg,jpeg', 'max:2048']
        ];
    }
}
