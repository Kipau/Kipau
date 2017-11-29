<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Company_Profile_Model;

class Company_Background_Controller extends Controller
{
    public function update(Request $request, $id)
    {
        $cruds = Company_Profile_Model::findOrFail('1');

        $cruds->profile_judul = $request->judul;
        $cruds->profile_isi = $request->isi;

        $cruds->save();

        return redirect()->route('edit_contact.index')->with('alert-success', 'Company Background Diubah.');
    }
}
