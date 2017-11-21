<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Bukti_Model;


class CheckTransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nav =  DB::select('SELECT
            produk_id,
            produk_nama ,produk_foto ,produk_harga
            FROM
            produk
            ');


        return view('cek_transaksi',compact('nav'));
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
        $nav =  DB::select('SELECT
            produk_id,
            produk_nama ,produk_foto ,produk_harga
            FROM
            produk
            ');

        return view('upload_bukti',compact('id', 'nav'));
    }

    public function GetTrans(Request $request) 
    {
        $cust = Session::get('customer_id');
        $kode = $request->input('kode');
        $cruds = DB::select('SELECT
            transaksi.trans_id,
            transaksi.trans_kode,
            DATE_FORMAT(transaksi.created_at,"%a, %e %b %Y %k:%i:%S") as created_at,
            transaksi.trans_total,
            transaksi.trans_status_pembayaran,
            transaksi.trans_status_pengiriman
            FROM
            transaksi
            WHERE
            transaksi.trans_kode = "'.$kode.'"
            AND
            transaksi.customer_id = "'.$cust.'"');

        foreach ($cruds as $crud) 
        {
            echo '<table class="timetable_sub" id="keranjang" name="keranjang">
            <thead>
            <tr>
            <th>Trans Kode</th> 
            <th>Tanggal Order</th>
            <th>Total Harga</th>
            <th>Status Pembayaran</th>
            <th>Status Pengiriman</th>
            <th>Bukti Pembayaran</th>
            <th>Konfirmasi</th>
            </tr>
            </thead>

            <tr class="rem1">

            <td class="invert">'.$crud->trans_kode.'</td>
            <td class="invert">'.$crud->created_at.'</td>
            <td class="invert">'.'Rp. '.strrev(implode('.',str_split(strrev(strval($crud->trans_total)),3)))."".'</td>
            <td class="invert">'.$crud->trans_status_pembayaran.'</td>

            <td class="invert">'.$crud->trans_status_pengiriman.'</td>
            ';


            $id = $crud->trans_id;            

        }
        $use = Bukti_Model::where('trans_id', '=', $id)->first();

        if ($use)
        {
            echo '<td><a class="example-image-link" href="uploads/bukti/'.$use->bukti_foto.'" data-lightbox="example-1"><img class="example-image" src="uploads/bukti/'.$use->bukti_foto.'" height="100" width="100" alt="image-1" /></td>
             <td class="invert"><a class="btn btn-warning">Konfirmasi</a></td>
            </tr>';

        }
        else
        {
            echo '<td class="invert"><a href="http://localhost:8000/cek_status/'.$id.'" class="btn btn-warning">Upload</a></td> </tr>'; //manggil method SHOW()

            
        }
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
