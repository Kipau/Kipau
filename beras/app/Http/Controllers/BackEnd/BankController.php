<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Bank_Model;
use App\Http\Requests\Bank\StoreRequest;
use App\Http\Requests\Bank\UpdateRequest;
use Session;
use File;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds = Bank_Model::all();
        if (Session::get('admin_super') == "yes")
        {
            return view('SuperAdmin.bank',compact('cruds'));
        }
        else if (Session::get('admin_super') == "no")
        {
            return view('Admin.bank',compact('cruds'));
        }
        else
        {
            return view('Admin.dashboard');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Session::get('admin_super') == "yes")
        {
            return view('SuperAdmin.bank_add');
        }
        else if (Session::get('admin_super') == "no")
        {
            return view('Admin.bank_add');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $cruds = new Bank_Model();
        $cruds->bank_nama = $request->nama;
        $cruds->bank_norek = $request->norek;
        $cruds->bank_an = $request->an;

        if ($_FILES['foto']['size'] != 0 )
        {
            $image_path = base_path() . '/public/uploads/bank/'.$cruds->bank_foto; 
            if(File::exists($image_path)) 
                File::delete($image_path);
            
            $destination = base_path() . '/public/uploads/bank';
            $request->file('foto')->move($destination, $request->nama.".png");

            $cruds->bank_foto = $request->nama.".png";
        }
        $cruds->save();

        return redirect()->route('sbank.index')->with('alert-success', 'Data Berhasil Disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cruds = Bank_Model::findOrFail($id);
        if (Session::get('admin_super') == "yes")
        {
            return view('SuperAdmin.bank_update',compact('cruds'));
        }
        else if (Session::get('admin_super') == "no")
        {
            return view('Admin.bank_update',compact('cruds'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $cruds = Bank_Model::findOrFail($id);
        $cruds->bank_nama = $request->nama;
        $cruds->bank_norek = $request->norek;
        $cruds->bank_an = $request->an;
        $cruds->save();

        return redirect()->route('sbank.index')->with('alert-success', 'Data Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cruds = Bank_Model::findOrFail($id);
        $cruds->delete();
        return redirect()->route('sbank.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
}
