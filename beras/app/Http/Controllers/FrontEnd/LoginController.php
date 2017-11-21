<?php

namespace App\Http\Controllers\FrontEnd;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use Session;
use App\Customer_Model;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
      Session::forget("customer_id");
      Session::forget("customer_nama");
      Session::forget("customer_email");

      $nav =  DB::select('SELECT
        produk_id,
        produk_nama ,produk_foto ,produk_harga
        FROM
        produk
        ');
      return view('login',compact('nav'));


    }

    public function logout(Request $request)
    {
      Session::forget("customer_id");
      Session::forget("customer_nama");
      Session::forget("customer_email");
        // $request->session()->regenrate();
      $request->session()->flush();
        // session_destroy();
      return redirect('/login');

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
      $use = Customer_Model::where('customer_email', '=', $request->email)->first();

      if ($use) 
      {
        if (Hash::check($request->password, $use->customer_password))
          {
           echo '<script language="javascript">';
           echo 'alert("Berhasil Login")';
           echo '</script>';

           session(['customer_id' => $use->customer_id]);
           session(['customer_nama' => $use->customer_nama]); 
           session(['customer_email' => $use->customer_email]);                  

           return redirect()->route('shop.index');
         }
       }



       echo '<script language="javascript">';
       echo 'alert("Gagal Login")';
       echo '</script>';
       
       $nav =  DB::select('SELECT
        produk_id,
        produk_nama ,produk_foto ,produk_harga
        FROM
        produk
        ');
       return view('login',compact('nav'));
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
