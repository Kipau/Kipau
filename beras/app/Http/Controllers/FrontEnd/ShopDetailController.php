<?php

namespace App\Http\Controllers\FrontEnd;
use App\Produk_Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class ShopDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cruds =  DB::select('SELECT
        produk_id,
        produk_nama ,produk_foto ,produk_harga
        FROM
        produk
        Limit 4');
       $nav =  DB::select('SELECT
        produk_id,
        produk_nama ,produk_foto ,produk_harga
        FROM
        produk
        ');
       $isi = DB::select('SELECT
        produk_id,
        produk_nama ,produk_foto ,produk_harga,produk_info
        FROM
        produk
        where produk_id = '.Session::get('idprod').'
        ');
       return view('product_detail',compact('cruds','nav','isi'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
