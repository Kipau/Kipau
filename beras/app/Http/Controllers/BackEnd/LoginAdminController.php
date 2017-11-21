<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use Session;
use App\Admin_Model;
class LoginAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.login_admin');
    }

    public function logout(Request $request)
    {
        Session::forget("admin_username");
        Session::forget("admin_nama");
        Session::forget("admin_foto");
        // $request->session()->regenrate();
        $request->session()->flush();
        // session_destroy();
        return redirect('/login_admin');

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
        $use = Admin_Model::findOrFail($request->username);
        if (Admin_Model::where('admin_username', '=', $request->username)->count() > 0) 
        {
            if (Hash::check($request->password, $use->admin_password)&&$use->admin_super=="yes") 
            {
             echo '<script language="javascript">';
             echo 'alert("Berhasil Login")';
             echo '</script>';

             session(['admin_username' => $request->username]);
             session(['admin_nama' => $use->admin_nama]);
             session(['admin_foto' => $use->admin_foto]);
             session(['admin_super' => $use->admin_super]);
             
             return view('SuperAdmin.dashboard');
         }
         else if(Hash::check($request->password, $use->admin_password)&&$use->admin_super=="no")
         {
             echo '<script language="javascript">';
             echo 'alert("Berhasil Login")';
             echo '</script>';

             session(['admin_username' => $request->username]);
             session(['admin_nama' => $use->admin_nama]);
             session(['admin_foto' => $use->admin_foto]);
             session(['admin_super' => $use->admin_super]);

             return view('Admin.dashboard');
         }

     }
     echo '<script language="javascript">';
     echo 'alert("Gagal Login")';
     echo '</script>';
     return view('Admin.login_admin');
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
