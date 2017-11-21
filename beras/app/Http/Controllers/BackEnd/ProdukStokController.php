<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Produk_Model;
use App\Http\Requests\Produk\UpdateStockRequest;
use Session;

class ProdukStokController extends Controller
{
    public function index()
    {
      
    }

    public function edit($id)
    {
        $cruds = Produk_Model::findOrFail($id);
        return view('Admin.product_add_stock',compact('cruds'));
    }

    public function update(UpdateStockRequest $request, $id)
    {
        $cruds = Produk_Model::findOrFail($id);

        $cruds->produk_stok = $request->stok;
        
        $cruds->save();

        return redirect()->route('sproduct.index')->with('alert-success', 'Data Berhasil Diubah.');
    }
}
