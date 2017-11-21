<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Customer_Model;
use Session;
use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\UpdateRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds = Customer_Model::all();
        if (Session::get('admin_super') == "yes")
        {
            return view('SuperAdmin.customers',compact('cruds'));
        }
        else if (Session::get('admin_super') == "no")
        {

            return view('Admin.customers',compact('cruds'));
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
    public function store(StoreRequest $request)
    {
        $cruds = new Customer_Model();
        $cruds->customer_nama = $request->nama;
        $cruds->customer_email = $request->email;
        $cruds->customer_nohp = $request->nohp;
        $cruds->customer_alamat = $request->alamat;
        $cruds->customer_kecamatan = $request->kecamatan;
        $cruds->customer_kelurahan = $request->kelurahan;
        $cruds->customer_kota = $request->kota;
        $cruds->customer_kodepos = $request->kodepos;
        $cruds->customer_provinsi = $request->provinsi;

        $cruds->save();

        return redirect()->route('scustomers.index')->with('alert-success', 'Data Berhasil Disimpan.');
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
        $cruds = Customer_Model::findOrFail($id);
        return view('SuperAdmin.customers_update',compact('cruds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $cruds = Customer_Model::findOrFail($id);
        $cruds->customer_nama = $request->nama;
        $cruds->customer_email = $request->email;
        $cruds->customer_nohp = $request->nohp;
        $cruds->customer_alamat = $request->alamat;
        $cruds->customer_kecamatan = $request->kecamatan;
        $cruds->customer_kelurahan = $request->kelurahan;
        $cruds->customer_kota = $request->kota;
        $cruds->customer_kodepos = $request->kodepos;
        $cruds->customer_provinsi = $request->provinsi;

        $cruds->save();

        return redirect()->route('scustomers.index')->with('alert-success', 'Data Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cruds = Customer_Model::findOrFail($id);
        $cruds->delete();
        return redirect()->route('customers.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
}
