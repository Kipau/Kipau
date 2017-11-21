<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Customer_Model;

class CustAlamatController extends Controller
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

        $alamats =  DB::select('SELECT
            customer.customer_kecamatan,
            customer.customer_kelurahan,
            customer.customer_kodepos,
            customer.customer_kota,
            customer.customer_provinsi,
            customer.customer_alamat
            FROM
            customer
            WHERE
            customer.customer_id ="'.Session::get('customer_id').'"
            ');

        $provinsi = "";

        foreach ($alamats as $alamat) 
        {
            $provinsi = $alamat->customer_provinsi;
        }


        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: 3d58848a23645fbc004d0627e1c2b298"
        ),
      ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
      } else {
          $prov = json_decode($response, true);
      }

      for ($i=0; $i < count($prov['rajaongkir']['results']); $i++)
      {
        if ($prov['rajaongkir']['results'][$i]['province'] == $provinsi)
        {
            $provinsi = $prov['rajaongkir']['results'][$i]['province_id'];
        }   
    }

      //************************ KOTA

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$provinsi,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: 3d58848a23645fbc004d0627e1c2b298"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
  } else {
      $kotas = json_decode($response, true);
  }

  return view('customer_alamat',compact('nav', 'prov', 'kotas', 'alamats'));
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
        $cruds = Customer_Model::findOrFail($id);
        $cruds->customer_provinsi = $request->valprov;    
        $cruds->customer_kota = $request->valkota;    
        $cruds->customer_kecamatan = $request->kecamatan;
        $cruds->customer_kelurahan = $request->kelurahan;
        $cruds->customer_alamat = $request->alamat;
        $cruds->customer_kodepos = $request->kodepos;

        $cruds->save();

        return redirect()->route('profile_alamat.index');
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
