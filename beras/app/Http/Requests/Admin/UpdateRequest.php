<?php

namespace App\Http\Requests\Admin;


use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'username' => 'Required',
        'nama' => 'Required',
        ];
    }
    public function messages()
    {
        return [
        'nama.required' => 'Nama Tidak Boleh Kosong.',
        'username.required' => 'Username Tidak Boleh Kosong.',
        
        ];
    }
}
