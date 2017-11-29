<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Bukti_Model;
use App\Transaksi_Model;


class CheckTransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = DB::select('SELECT
            transaksi.trans_kode,
            DATE_FORMAT(transaksi.created_at,"%a, %e %b %Y %k:%i:%S") as created_at
            FROM
            transaksi
            WHERE
            transaksi.trans_status_pembayaran != "Canceled" AND
            transaksi.trans_status_pengiriman != "Delivered" AND
            transaksi.customer_id = "1"
            ORDER BY
            transaksi.created_at DESC
            '); 
        $nav =  DB::select('SELECT
            produk_id,
            produk_nama ,produk_foto ,produk_harga
            FROM
            produk
            ');


        return view('cek_transaksi',compact('nav', 'lists'));
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
        $deliv = "";
        $ulasan = "";
        $cust = Session::get('customer_id');
        $kode = $request->input('kode');
        $cruds = DB::select('SELECT
            transaksi.trans_id,
            transaksi.trans_kode,
            DATE_FORMAT(transaksi.created_at,"%a, %e %b %Y %k:%i:%S") as created_at,
            transaksi.trans_total,
            transaksi.trans_status_pembayaran,
            transaksi.trans_status_pengiriman,
            transaksi.trans_resi,
            transaksi.trans_ulasan
            FROM
            transaksi
            WHERE
            transaksi.trans_kode = "'.$kode.'"
            AND
            transaksi.customer_id = "'.$cust.'"');

        foreach ($cruds as $crud) 
        {
            $id = $crud->trans_id;   
            $deliv = $crud->trans_status_pengiriman;
            $bayar = $crud->trans_status_pembayaran;
            $use = Bukti_Model::where('trans_id', '=', $id)->first();
            echo '
            <div class="checkout">
            <div class="container">
            <div class="checkout-right">
            <table class="timetable_sub" id="keranjang" name="keranjang">
            <thead>
            <tr>
            <th>Trans Kode</th> 
            <th>Tanggal Order</th>
            <th>Total Harga</th>
            <th>Status Pembayaran</th>
            <th>Status Pengiriman</th>
            ';
            if ($bayar != "Canceled")
                echo "<th>Bukti Pembayaran</th>";

            if ($deliv != "Delivered" && $bayar != "Canceled" && $use)
            {
                echo '<th>Konfirmasi</th>';
            }

            
            echo '</tr>
            </thead>

            <tr class="rem1">

            <td class="invert">'.$crud->trans_kode.'</td>
            <td class="invert">'.$crud->created_at.'</td>
            <td class="invert">'.'Rp. '.strrev(implode('.',str_split(strrev(strval($crud->trans_total)),3)))."".'</td>
            <td class="invert">'.$crud->trans_status_pembayaran.'</td>';

            if (!empty($crud->trans_resi))
            {
                echo '<td class="invert"><b>'.$crud->trans_status_pengiriman.'</b><br> No Resi : 98765432</td>';
            }
            else
            {
                echo '<td class="invert">'.$crud->trans_status_pengiriman.'</td>';
            }
            
            
            $ulasan = $crud->trans_ulasan; 
            

        }
        

        if ($use) //cek udh upload bukti blm
        {
            echo '<td><a class="example-image-link" href="uploads/bukti/'.$use->bukti_foto.'" data-lightbox="example-1"><img class="example-image" src="uploads/bukti/'.$use->bukti_foto.'" height="100" width="100" alt="image-1" /></td>
            ';
            if ($deliv != "Delivered" && $bayar != "Canceled")
            {
                echo '
                <td class="invert">
                <form action="'.route('konfirmasi.update', $id).'" method="post" name="form1" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PATCH">
                '.csrf_field().'
                <input type="submit" value="Konfirmasi" class="btn btn-warning" />
                </td>
                </form';
            }
            echo '</tr>';

        }
        else if ($bayar != "Canceled")
        {
            echo '<td class="invert"><a href="http://localhost:8000/cek_status/'.$id.'" class="btn btn-warning">Upload</a></td> </tr>'; //manggil method SHOW()

            
        }

        echo '</table>
        </div>



        <br>

        </div>

        <div class="clearfix"> </div>


        </div> 
        </div>
        </div>';

        if (empty($ulasan) && $deliv == "Delivered")
        {
         echo '<div class="w3_agileits_contact_grids">
         <div class="brands">
         <div class="col-md-6 w3_agileits_contact_grid_left"  >
         <h2 class="w3_agile_header">Tips <span> Menulis Ulasan</span></h2>

         <ol style="margin-top: 10%;margin-left: 10%">
         <li>
         <h4>Kesesuaian dengan deskripsi</h4>
         <p>Cth: Ukuran dan warna sesuai dengan foto.</p>
         </li>
         <br>
         <li>
         <h4>Fungsionalitas Produk</h4>
         <p>Cth: Produk bekerja dengan baik & kuat</p>
         </li>
         <br>
         <li>
         <h4>Keinginan merekomendasikan produk ini </h4>
         <p>
         Cth: Barang bagus, cepat sampai, recommended!</p>
         </li>
         </ol>

         </div>
         <div class="col-md-6 w3_agileits_contact_grid_right">
         <h2 class="w3_agile_header">Berikan <span> Ulasan</span></h2>

         <form action="'.route('cek_status.update', $id).'" method="post" name="form1" enctype="multipart/form-data">
         <input name="_method" type="hidden" value="PATCH">
         '.csrf_field().'
         <textarea name="ulasan" placeholder="Your message here..." required=""></textarea>
         <input type="submit" value="Submit">
         </form>
         </div>
         <div class="clearfix"> </div>
         </div>
         </div>';
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
        $cruds = Transaksi_Model::findOrFail($id);
        // $kode = $request->input('kode');
        $cruds->trans_ulasan = $request->input('ulasan');
        $cruds->trans_read = "ula";
        // DB::table('transaksi')
        // ->where('trans_kode', $kode)
        // ->update(['trans_ulasan' => $ulasan]);
        $cruds->save();

        return redirect()->route('cek_status.index')->with('ulasan', $cruds->trans_kode);
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
