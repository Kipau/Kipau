<?php

namespace App\Http\Controllers\FrontEnd;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Transaksi_Model;
use App\Order_Model;
use App\Kurir_Service_Model;
use Exception;
use Session;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Session::get('customer_id') == "")
        {
          header("Location: http://localhost:8000/login");
          exit();
        }

        if(Session::get('idproduk') == "[]")
          {
            // session(['nocart' => 'yes']);

            header("Location: http://localhost:8000/shop");
            exit();
          }

          $id = "";
          $idproduk = Session::get('idproduk');
          $arrlength = count($idproduk);
          for ($i = 0; $i < $arrlength; $i++)
          {
            if ($i == 0)
              $id .= '"'.$idproduk[$i].'"';
            else
              $id .= ',"'.$idproduk[$i].'"';
          }

          $nav =  DB::select('SELECT
            produk_id,
            produk_nama ,produk_foto ,produk_harga
            FROM
            produk
            ');
          $cruds =  DB::select('SELECT
            produk.produk_id,
            produk.produk_nama,
            produk.produk_harga,
            produk.produk_foto
            FROM
            produk
            WHERE
            produk.produk_nama in ('.$id.')
            ORDER BY
            FIELD(produk.produk_nama,'.$id.');
            ');

          $qtys = Session::get('qty');

          $banks =  DB::select('SELECT
            bank.bank_id,
            bank.bank_nama
            FROM
            bank');

          $kurirs =  DB::select('SELECT
            kurir.kurir_id,
            kurir.kurir_nama
            FROM
            kurir');



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

          if ($provinsi != "")
          {
            for ($i=0; $i < count($prov['rajaongkir']['results']); $i++)
            {
              if ($prov['rajaongkir']['results'][$i]['province'] == $provinsi)
              {
                $provinsi = $prov['rajaongkir']['results'][$i]['province_id'];
              }   
            }
          }
          else
          {
            $provinsi = 1;
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

        ////////////////////////////////


          return view('checkout',compact('nav', 'cruds', 'qtys', 'prov', 'banks', 'kurirs', 'kotas', 'alamats'));
        }

        public function GetCity(Request $request) 
        {
          $prov = $request->input('prov');
          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$prov,
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
            $data = json_decode($response, true);
          }

          for ($i=0; $i < count($data['rajaongkir']['results']); $i++)
          {

           echo '<option value="'.$data['rajaongkir']['results'][$i]['city_id'].'">'.$data['rajaongkir']['results'][$i]['city_name'].'</option>';
         }
      // return $data;
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
      date_default_timezone_set('Asia/Jakarta');
        //insert table transaksi
      $trans_kode = "";
      try
      {
        $uses = DB::select('SELECT
          kurir_service.kurir_service_id
          FROM
          kurir_service
          WHERE
          kurir_service.kurir_id = "'.$request->kurir.'" AND
          kurir_service.kurir_service_nama = "'.$request->paket.'"');

        $cruds = new Transaksi_Model();
        $cruds->trans_kode = "TR".mt_rand(1,1000);
        $trans_kode = $cruds->trans_kode;
        $cruds->customer_id = Session::get('customer_id');
        $cruds->bank_id = $request->bank;
        $cruds->kurir_id = $request->kurir;
        foreach ($uses as $use) {
          $cruds->kurir_service_id = $use->kurir_service_id;
        }


        $cruds->trans_ongkir = $request->valongkir;
        $cruds->trans_total = $request->valtotal;
        $cruds->trans_note = $request->note;
        $cruds->trans_status_pembayaran = "Waiting";


        $cruds->save();

      }

      catch(Exception $e)
      {

        $uses = DB::select('SELECT
          kurir_service.kurir_service_id
          FROM
          kurir_service
          WHERE
          kurir_service.kurir_id = "'.$request->kurir.'" AND
          kurir_service.kurir_service_nama = "'.$request->paket.'"');

        $cruds = new Transaksi_Model();
        $cruds->trans_kode = "TR".mt_rand(1,1000);
        $trans_kode = $cruds->trans_kode;
        $cruds->customer_id = Session::get('customer_id');
        $cruds->bank_id = $request->bank;
        $cruds->kurir_id = $request->kurir;
        foreach ($uses as $use) {
          $cruds->kurir_service_id = $use->kurir_service_id;
        }


        $cruds->trans_ongkir = $request->valongkir;
        $cruds->trans_total = $request->valtotal;
        $cruds->trans_note = $request->note;
        $cruds->trans_status_pembayaran = "Waiting";


        $cruds->save();
      }
      
        //insert table order_produk

      $trans_id = Transaksi_Model::where('trans_kode', '=', $trans_kode)->first();
      $qtys = Session::get('qty');

        $idproduk = Session::get('idproduk');       //nama produk
        $arrlength = count($idproduk);

        $id = "";
        for ($i = 0; $i < $arrlength; $i++)
        {
          if ($i == 0)
            $id .= '"'.$idproduk[$i].'"';
          else
            $id .= ',"'.$idproduk[$i].'"';
        }

        $produks =  DB::select('SELECT
          produk.produk_id,
          produk.produk_harga
          FROM
          produk
          WHERE
          produk.produk_nama in ('.$id.')
          ORDER BY
          FIELD(produk.produk_nama,'.$id.');
          ');

        $i = 0;
        foreach ($produks as $produk) 
        {

          $order = new Order_Model();
          $order->trans_id = $trans_id->trans_id;
          $order->produk_id = $produk->produk_id;
          $order->order_qty = $qtys[$i];


          $order->order_total = $produk->produk_harga*$qtys[$i];

          $order->save();
          $i++;
        }

        //Display Informasi Checkout

        $infos = DB::select('SELECT
          transaksi.trans_id,
          transaksi.trans_kode,
          bank.bank_foto,
          bank.bank_an,
          bank.bank_norek,
          transaksi.trans_total,
          transaksi.created_at
          FROM
          transaksi
          INNER JOIN bank ON transaksi.bank_id = bank.bank_id
          WHERE
          transaksi.trans_kode = "'.$trans_kode.'"');

        $nav =  DB::select('SELECT
          produk_id,
          produk_nama ,produk_foto ,produk_harga
          FROM
          produk
          ');

        DB::unprepared('CREATE EVENT '.$trans_kode.'
          ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL "5" MINUTE 
          DO UPDATE transaksi
          SET trans_status_pembayaran="Canceled", trans_status_pengiriman="Canceled"
          WHERE trans_id="'.$trans_id->trans_id.'";');

        return view('checkout_berhasil',compact('nav', 'infos'));
        

        
        // echo date( "Y-m-d H:i:s", strtotime("now +1minute")); 
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
