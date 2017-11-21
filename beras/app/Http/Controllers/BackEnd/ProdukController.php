<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Produk_Model;
use App\Http\Requests\Produk\StoreRequest;
use App\Http\Requests\Produk\UpdateRequest;
use App\Http\Requests\Produk\UpdateStockRequest;
use File;
use Session;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds = Produk_Model::all();
        if (Session::get('admin_super') == "yes")
        {
            return view('SuperAdmin.product',compact('cruds'));
        }
        else if (Session::get('admin_super') == "no")
        {          
            return view('Admin.product',compact('cruds'));
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
            return view('SuperAdmin.product_add');
        }
        else if (Session::get('admin_super') == "no")
        {
            return view('Admin.product_add');
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
        $cruds = new Produk_Model();
        $cruds->produk_nama = $request->nama;
        $cruds->produk_stok = $request->stok;
        $cruds->produk_harga = $request->harga;
        $cruds->produk_info = $request->info;

        $destination = base_path() . '/public/uploads/produk';
        $request->file('foto')->move($destination, $request->nama.".png");

        $cruds->produk_foto = $request->nama.".png";
        $cruds->save();

        return redirect()->route('sproduct.index')->with('alert-success', 'Data Berhasil Disimpan.');
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
        $cruds = Produk_Model::findOrFail($id);
        if (Session::get('admin_super') == "yes")
        {
            return view('SuperAdmin.product_update',compact('cruds'));
        }
        else if (Session::get('admin_super') == "no")
        {
            return view('Admin.product_update',compact('cruds'));
        }
        
    }

    public function editstok($id)
    {
        $cruds = Produk_Model::findOrFail($id);
        return view('Admin.product_add_stock',compact('cruds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updatestok(UpdateStockRequest $request, $id)
    {
        $cruds = Produk_Model::findOrFail($id);

        $cruds->produk_stok = $request->stok;
        
        $cruds->save();

        return redirect()->route('sproduct.index')->with('alert-success', 'Data Berhasil Diubah.');
    }

    public function update(UpdateRequest $request, $id)
    {
        $cruds = Produk_Model::findOrFail($id);

        $cruds->produk_nama = $request->nama;
        $cruds->produk_stok = $request->stok;
        $cruds->produk_harga = $request->harga;
        $cruds->produk_info = $request->info;

        if ($_FILES['foto']['size'] != 0 )
        {
            $image_path = base_path() . '/public/uploads/produk/'.$cruds->produk_foto; 
            if(File::exists($image_path)) 
                File::delete($image_path);
            
            $destination = base_path() . '/public/uploads/produk';
            $request->file('foto')->move($destination, $request->nama.".png");

            $cruds->produk_foto = $request->nama.".png";
        }

        
        $cruds->save();

        return redirect()->route('sproduct.index')->with('alert-success', 'Data Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cruds = Produk_Model::findOrFail($id);

        $image_path = base_path() . '/public/uploads/produk/'.$cruds->produk_foto; 
        if(File::exists($image_path)) 
            File::delete($image_path);

        $cruds->delete();

        return redirect()->route('sproduct.index')->with('alert-success', 'Data Berhasil Dihapus.');

    }
}
