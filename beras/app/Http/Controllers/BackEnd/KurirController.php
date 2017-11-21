<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Kurir_Model;
use App\Http\Requests\Kurir\StoreRequest;
use App\Http\Requests\Kurir\UpdateRequest;
use Session;
use File;

class KurirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds = Kurir_Model::all();
        if (Session::get('admin_super') == "yes")
        {
            return view('SuperAdmin.courier',compact('cruds'));
        }
        else if (Session::get('admin_super') == "no")
        {

            return view('Admin.courier',compact('cruds'));
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
            return view('SuperAdmin.courier_add');
        }
        else if (Session::get('admin_super') == "no")
        {
            return view('Admin.courier_add');
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
        try
        {
            $cruds = new Kurir_Model();
            $cruds->kurir_nama = $request->nama;

            if ($_FILES['foto']['size'] != 0 )
            {
                $image_path = base_path() . '/public/uploads/kurir/'.$cruds->kurir_foto; 
                if(File::exists($image_path)) 
                    File::delete($image_path);

                $destination = base_path() . '/public/uploads/kurir';
                $request->file('foto')->move($destination, $request->nama.".png");

                $cruds->kurir_foto = $request->nama.".png";
            }

            $test = $cruds->save();
        } 
        catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->route('scourier.create')->with('alert-warning', 'Nama Sudah Ada.');
        }

        return redirect()->route('scourier.index')->with('alert-success', 'Data Berhasil Disimpan.');
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
        $cruds = Kurir_Model::findOrFail($id);
        if (Session::get('admin_super') == "yes")
        {
            return view('SuperAdmin.courier_update',compact('cruds'));
        }
        else if (Session::get('admin_super') == "no")
        {

            return view('Admin.courier_update',compact('cruds'));
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
        $cruds = Kurir_Model::findOrFail($id);
        $cruds->kurir_nama = $request->nama;

        if ($_FILES['foto']['size'] != 0 )
        {
            $image_path = base_path() . '/public/uploads/kurir/'.$cruds->kurir_foto; 
            if(File::exists($image_path)) 
                File::delete($image_path);

            $destination = base_path() . '/public/uploads/kurir';
            $request->file('foto')->move($destination, $request->nama.".png");

            $cruds->kurir_foto = $request->nama.".png";
        }

        $cruds->save();

        return redirect()->route('scourier.index')->with('alert-success', 'Data Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cruds = Kurir_Model::findOrFail($id);
        $cruds->delete();
        return redirect()->route('scourier.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
}
