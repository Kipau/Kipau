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
                    $tgl = True;
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

                    return view('Admin.buyers_data',compact('cruds', 'tgl'));
                }
                else
                {
                    return view('Admin.dashboard');
                }
            }

            public function GetRange(Request $request) 
            {
                // $cust = Session::get('customer_id');
                // $kode = $request->input('kode');
                $cruds = DB::select('SELECT
                    transaksi.trans_kode,
                    produk.produk_nama,
                    order_produk.order_qty,
                    produk.produk_harga,
                    order_produk.order_total,
                    DATE_FORMAT( transaksi.created_at, "%a, %e %b %Y %k:%i:%S" ) AS created_at 
                    FROM
                    order_produk
                    INNER JOIN transaksi ON order_produk.trans_id = transaksi.trans_id
                    INNER JOIN produk ON order_produk.produk_id = produk.produk_id 
                    WHERE
                    transaksi.created_at BETWEEN "2017-08-24" 
                    AND "2017-10-08 23:59"
                    ORDER BY
                    transaksi.created_at DESC');

                foreach ($cruds as $crud) 
                {
                    echo '

                    <tr>
                    <td>'.$crud->trans_kode.'</td>
                    <td>'.$crud->produk_nama.'</td>
                    <td>'.$crud->order_qty.'</td>
                    <td>'.$crud->produk_harga.'</td>
                    <td>'.$crud->order_total.'</td>
                    <td>'.$crud->created_at.'</td>
                    </tr>
                    
                    ';           

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
        $dari = $request->dari;
        $sampai = $request->sampai;
        $cruds = DB::select('SELECT
            transaksi.trans_kode,
            produk.produk_nama,
            order_produk.order_qty,
            produk.produk_harga,
            order_produk.order_total,
            DATE_FORMAT( transaksi.created_at, "%a, %e %b %Y %k:%i:%S" ) AS created_at 
            FROM
            order_produk
            INNER JOIN transaksi ON order_produk.trans_id = transaksi.trans_id
            INNER JOIN produk ON order_produk.produk_id = produk.produk_id 
            WHERE
            transaksi.created_at BETWEEN "'.$dari.'" 
            AND "'.$sampai.'"
            ORDER BY
            transaksi.created_at DESC');

        $tgl = True;

        return view('Admin.buyers_data',compact('cruds', 'dari', 'sampai','tgl'));
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
