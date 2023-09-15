<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class PelatihanRequest extends FormRequest
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
      'name' => 'required|unique:pelatihans',
      'activity' => 'required',
      'start_date' => 'required|date',
      'end_date' => 'required|date',
      'image' => 'required|mimes:png,jpg,jpeg|max:2048',
    ];
  }elseif(request()->isMethod('PUT')){
    $data = [
      'name' => 'required','unique:pelatihans,name'.$this->id,
      'activity' => 'nullable',
      'start_date' => 'nullable|date',
      'end_date' => 'nullable|date',
      'image' => 'mimes:png,jpg,jpeg|max:2048',
    ];
  }

  return $data;
}
}
