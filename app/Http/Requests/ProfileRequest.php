<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


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
             'name' => ['required', 'string', 'max:255'],
             'nip' => ['required', 'string', 'max:255'],
             'agency' => ['required', 'string', 'max:255'],
             'position' => ['required', 'string', 'max:255'],
             'agency_address' => ['required', 'string', 'max:500'],
             'birthplace' => ['required', 'string', 'max:255'],
             'birthdate' => ['required', 'date'],
             'address' => ['required', 'string', 'max:500'],
             'avatar' => ['mimes:png,jpg,jpeg', 'max:2048']
        ];
    }
}
