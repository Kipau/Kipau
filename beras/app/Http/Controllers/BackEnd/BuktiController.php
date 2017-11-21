<?php

namespace App\Http\Controllers\BackEnd;

use App\Bukti_Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class BuktiController extends Controller
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
            $cruds = DB::select('SELECT
            bukti.bukti_id,
            bukti.bukti_foto,
            transaksi.trans_id,
            transaksi.trans_kode,
            DATE_FORMAT(bukti.created_at,"%a, %e %b %Y %k:%i:%S") as created_at,
            customer.customer_nama
            FROM
            bukti
            INNER JOIN transaksi ON bukti.trans_id = transaksi.trans_id
            INNER JOIN customer ON transaksi.customer_id = customer.customer_id
            ORDER BY
            transaksi.created_at DESC');
            
            return view('SuperAdmin.payment',compact('cruds'));
        }
        else if (Session::get('admin_super') == "no")
        {
            $cruds = DB::select('SELECT
            bukti.bukti_foto,
            transaksi.trans_kode,
            DATE_FORMAT(bukti.created_at,"%a, %e %b %Y %k:%i:%S") as created_at,
            customer.customer_nama
            FROM
            bukti
            INNER JOIN transaksi ON bukti.trans_id = transaksi.trans_id
            INNER JOIN customer ON transaksi.customer_id = customer.customer_id
            ORDER BY
            transaksi.created_at DESC');

            return view('Admin.payment',compact('cruds'));
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
        $cruds = Bukti_Model::findOrFail($id);
        $cruds->delete();
        return redirect()->route('spayment.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
}
