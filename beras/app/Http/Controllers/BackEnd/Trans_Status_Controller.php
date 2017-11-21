<?php

namespace App\Http\Controllers\BackEnd;

use App\Transaksi_Model;
use App\Produk_Model;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class Trans_Status_Controller extends Controller
{
    // $this->test = "coba2";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds = DB::select('SELECT
            transaksi.trans_kode,
            transaksi.trans_id,
            transaksi.trans_status_pembayaran,
            transaksi.trans_status_pengiriman,
            transaksi.trans_resi,
            DATE_FORMAT(transaksi.updated_at,"%a, %e %b %Y %k:%i:%S") as updated_at
            FROM
            transaksi
            ORDER BY
            transaksi.updated_at DESC');    
        return view('Admin.transaction_status',compact('cruds'));
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
        $cruds = DB::select('SELECT
            transaksi.trans_id,
            transaksi.trans_status_pembayaran,
            transaksi.trans_status_pengiriman,
            transaksi.trans_resi
            FROM
            transaksi
            WHERE
            transaksi.trans_kode = "'.$id.'"');    
        return view('Admin.transaction_update_status',compact('cruds'));
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
        $cruds = Transaksi_Model::findOrFail($id);
        
        $cruds->trans_status_pembayaran = $_POST['pembayaran'];
        $cruds->trans_status_pengiriman = $_POST['pengiriman'];
        $cruds->trans_resi = $request->resi;
        
        $cruds->save();

        if($request->status != "1" && $_POST['pembayaran'] == "Success")
        {
            $orders = DB::select('SELECT
                order_produk.produk_id,
                order_produk.order_qty
                FROM
                order_produk
                WHERE
                order_produk.trans_id = "'.$cruds->trans_id.'"');

            foreach ($orders as $order) 
            {
                $stok = Produk_Model::findOrFail($order->produk_id);

                $stok->produk_stok = $stok->produk_stok-$order->order_qty; //kurangin stok

                $stok->save();

            }
        }

        return redirect()->route('transaction_status.index')->with('alert-success', 'Data Berhasil Diubah.');

        // if(isset($_POST['pembayaran']))
        // {
        //     echo $_POST['pembayaran'];
        // }
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
