<?php

namespace App\Http\Requests\Produk;


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
        'nama' => 'Required',
        // 'stok' => 'Required',
        'harga' => 'Required',
        'info' => 'Required',
        ];
    }
    public function messages()
    {
        return [
        'nama.required' => 'Nama Tidak Boleh Kosong.',
        // 'stok.required' => 'Norek Tidak Boleh Kosong.',
        'harga.required' => 'Harga Nama Tidak Boleh Kosong.',
        'info.required' => 'Info Tidak Boleh Kosong.',        
        ];
    }
}
