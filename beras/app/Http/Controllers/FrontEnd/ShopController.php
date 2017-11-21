<?php

namespace App\Http\Controllers\FrontEnd;
use App\Produk_Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Collection;

use App\Customer_Model;

class ShopController extends Controller
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
        return view('index',compact('cruds','nav'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //store to Cart
    {
        $produk = $request->input('produk');
        echo "string";
    }

    public function login(Request $request) //login customer
    {
        if (Customer_Model::where('customer_email', '=', $request->username)->count() > 0) 
            {
                return redirect()->route('shop.index');
            }
        }

    public function addcart(Request $request) //store to Cart
    {
        session()->forget('idproduk');
        session()->forget('qty');

        $produk = $request->input('produk');
        $qty = $request->input('qty');
        $arrlength = count($produk);
        // $_session['idproduk'] = array();
        $idproduk = collect([]);
        $qtyproduk = collect([]);
        for ($i = 0; $i < $arrlength; $i++)
        {
            // $_session['idproduk'][] = array($produk[$i]);
            // array_push($_session['idproduk'], $produk[$i]);
            $idproduk->push($produk[$i]);
            $qtyproduk->push($qty[$i]);
        }
        Session()->put('idproduk', $idproduk);
        Session()->put('qty', $qtyproduk);
       // echo Session::get('qty')[0];
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
      $nav =  DB::select('SELECT
        produk_id,
        produk_nama ,produk_foto ,produk_harga
        FROM
        produk
        ');
      $cruds = DB::select('SELECT
        produk_id,
        produk_nama ,produk_foto ,produk_harga
        FROM
        produk
        where produk_id = '.$id.'
        ');
      return view('beras',compact('cruds','nav'));
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
