<?php

namespace App\Http\Controllers\BackEnd;

use App\Order_Model;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::get('admin_super') == "yes")
        {
            $cruds = Order_Model::all();
            return view('SuperAdmin.buyers_data',compact('cruds'));
        }
        else if (Session::get('admin_super') == "no")
        {
            $cruds = DB::select('SELECT
                transaksi.trans_kode,
                produk.produk_nama,
                order_produk.order_qty,
                produk.produk_harga,
                order_produk.order_total,
                DATE_FORMAT(transaksi.created_at,"%a, %e %b %Y %k:%i:%S") as created_at
                FROM
                order_produk
                INNER JOIN transaksi ON order_produk.trans_id = transaksi.trans_id
                INNER JOIN produk ON order_produk.produk_id = produk.produk_id 
                ORDER BY
                transaksi.created_at DESC');

            return view('Admin.buyers_data',compact('cruds'));
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
        //
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
        //
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
