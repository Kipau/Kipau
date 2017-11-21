<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Admin_Model;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\StoreRequest;
use App\Http\Requests\Admin\UpdateRequest;
use File;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds = Admin_Model::all();
        return view('SuperAdmin.admin',compact('cruds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SuperAdmin.admin_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if ($request->password != $request->password2)
        {
            return redirect()->route('sadmin.create')->with('alert-warning', 'Password Tidak Cocok !');
        }
        else
        {
            $cruds = new Admin_Model();
            $cruds->admin_username = $request->username;
            $cruds->admin_password = Hash::make($request->password);
            $cruds->admin_nama = $request->nama;
            $cruds->admin_super = $_POST['superadmin'];

            $destination = base_path() . '/public/uploads/admin';
            $request->file('foto')->move($destination, $request->username.".png");

            $cruds->admin_foto = $request->username.".png";
            $cruds->save();

            return redirect()->route('sadmin.index')->with('alert-success', 'Data Berhasil Disimpan.');
        }
        
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
        $cruds = Admin_Model::findOrFail($id);
        return view('SuperAdmin.admin_update',compact('cruds'));
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
        $cek = 0;
        if ($request->password != "")
        {  
            if ($request->password != $request->password2)
                return redirect()->route('sadmin.edit', $id)->with('alert-warning', 'Password Tidak Cocok !');
            else
                $cek = 1;
        }      
        
        $cruds = Admin_Model::findOrFail($id);
        $cruds->admin_username = $request->username;
        if ($cek == 1)
            $cruds->admin_password = Hash::make($request->password);
        $cruds->admin_nama = $request->nama;

        if ($_FILES['foto']['size'] != 0 )
        {
            $image_path = base_path() . '/public/uploads/admin/'.$cruds->admin_foto; 
            if(File::exists($image_path)) 
                File::delete($image_path);

            $destination = base_path() . '/public/uploads/admin';
            $request->file('foto')->move($destination, $request->username.".png");

            $cruds->admin_foto = $request->username.".png";
        }


        $cruds->save();

        return redirect()->route('sadmin.index')->with('alert-success', 'Data Berhasil Diubah.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cruds = Admin_Model::findOrFail($id);
        $cruds->delete();
        return redirect()->route('sadmin.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
}
