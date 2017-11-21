<?php

namespace App\Http\Controllers\BackEnd;
use App\Transaksi_Model;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class TransaksiController extends Controller
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
            $cruds = Transaksi_Model::all();
            return view('SuperAdmin.transaction',compact('cruds'));
        }
        else if (Session::get('admin_super') == "no")
        {      
            $cruds = DB::select('SELECT
                transaksi.trans_kode,
                customer.customer_nama,
                transaksi.trans_status_pembayaran,
                transaksi.trans_status_pengiriman,
                DATE_FORMAT(transaksi.created_at,"%a, %e %b %Y %k:%i:%S") as created_at
                FROM
                transaksi
                INNER JOIN customer ON transaksi.customer_id = customer.customer_id
                ORDER BY
                transaksi.created_at DESC');    
            return view('Admin.transaction',compact('cruds'));
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
        $trans = DB::select('SELECT
            transaksi.trans_id,
            transaksi.trans_kode,
            transaksi.trans_status_pembayaran,
            transaksi.trans_status_pengiriman,
            transaksi.trans_ongkir,
            transaksi.trans_total - transaksi.trans_ongkir as subtotal,
            transaksi.trans_total,
            transaksi.trans_resi,
            transaksi.trans_ulasan,
            customer.customer_nama,
            customer.customer_email,
            customer.customer_nohp,
            customer.customer_alamat,
            customer.customer_kodepos,
            customer.customer_provinsi,
            customer.customer_kota,
            customer.customer_kecamatan,
            customer.customer_kelurahan,
            DATE_FORMAT(transaksi.created_at,"%a, %e %b %Y %k:%i:%S") as created_at,
            bank.bank_norek,
            bank.bank_an,
            bank.bank_foto,
            kurir.kurir_nama,
            kurir.kurir_foto
            FROM
            customer
            INNER JOIN transaksi ON transaksi.customer_id = customer.customer_id
            INNER JOIN order_produk ON order_produk.trans_id = transaksi.trans_id
            INNER JOIN produk ON order_produk.produk_id = produk.produk_id
            INNER JOIN bank ON transaksi.bank_id = bank.bank_id
            INNER JOIN kurir ON transaksi.kurir_id = kurir.kurir_id
            WHERE
            transaksi.trans_kode ="'.$id.'"
            LIMIT 1');

        $produk = DB::select('SELECT
            produk.produk_nama,
            produk.produk_harga,
            order_produk.order_qty,
            order_produk.order_total
            FROM
            produk
            INNER JOIN order_produk ON order_produk.produk_id = produk.produk_id
            INNER JOIN transaksi ON order_produk.trans_id = transaksi.trans_id
            WHERE
            transaksi.trans_kode ="'.$id.'"');    

        DB::table('transaksi')
            ->where('trans_kode', $id)
            ->update(['trans_read' => 'yes']);

        return view('Admin.transaction_detail',compact('trans', 'produk'));
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
        $trans = DB::select('SELECT
            transaksi.trans_id,
            transaksi.trans_kode,
            transaksi.trans_status_pembayaran,
            transaksi.trans_status_pengiriman,
            transaksi.trans_ongkir,
            transaksi.trans_total - transaksi.trans_ongkir as subtotal,
            transaksi.trans_total,
            transaksi.trans_resi,
            customer.customer_nama,
            customer.customer_email,
            customer.customer_nohp,
            customer.customer_alamat,
            customer.customer_kodepos,
            customer.customer_provinsi,
            customer.customer_kota,
            customer.customer_kecamatan,
            customer.customer_kelurahan,
            DATE_FORMAT(transaksi.created_at,"%a, %e %b %Y %k:%i:%S") as created_at,
            bank.bank_norek,
            bank.bank_an,
            bank.bank_foto,
            kurir.kurir_nama,
            kurir.kurir_foto
            FROM
            customer
            INNER JOIN transaksi ON transaksi.customer_id = customer.customer_id
            INNER JOIN order_produk ON order_produk.trans_id = transaksi.trans_id
            INNER JOIN produk ON order_produk.produk_id = produk.produk_id
            INNER JOIN bank ON transaksi.bank_id = bank.bank_id
            INNER JOIN kurir ON transaksi.kurir_id = kurir.kurir_id
            WHERE
            transaksi.trans_kode ="'.$id.'"
            LIMIT 1');

        $produk = DB::select('SELECT
            produk.produk_nama,
            produk.produk_harga,
            order_produk.order_qty,
            order_produk.order_total
            FROM
            produk
            INNER JOIN order_produk ON order_produk.produk_id = produk.produk_id
            INNER JOIN transaksi ON order_produk.trans_id = transaksi.trans_id
            WHERE
            transaksi.trans_kode ="'.$id.'"');    

        return view('Admin.transaction_detail',compact('trans', 'produk'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cruds = Transaksi_Model::findOrFail($id);

        $cruds->delete();

        return redirect()->route('stransaction.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
}
