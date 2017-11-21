<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        'email' => 'Required',
        'nohp' => 'Required',
        'alamat' => 'Required',
        'kelurahan' => 'Required',
        'kecamatan' => 'Required',
        'provinsi' => 'Required',
        'kota' => 'Required',
        'kodepos' => 'Required',
        ];
    }
    public function messages()
    {
        return [
        'nama.required' => 'Nama Tidak Boleh Kosong.',
        'email.required' => 'Email Tidak Boleh Kosong.',
        'nohp.required' => 'No HP Nama Tidak Boleh Kosong.',
        'alamat.required' => 'Alamat Tidak Boleh Kosong.',
        'kelurahan.required' => 'kelurahan Tidak Boleh Kosong.',
        'kecamatan.required' => 'kecamatan Tidak Boleh Kosong.',
        'provinsi.required' => 'provinsi Tidak Boleh Kosong.',
        'kota.required' => 'kota Tidak Boleh Kosong.',
        'kodepos.required' => 'kodepos Tidak Boleh Kosong.',
        ];
    }
}
