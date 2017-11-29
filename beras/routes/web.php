<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| 
*/

Route::get('/', function () {
    return view('welcome');
});


//Login
Route::get('/login_admin');
Route::resource('login_admin', 'BackEnd\LoginAdminController');

//Admin
Route::get('/dashboard', function () {
    return view('Admin.dashboard');
});
Route::get('/edit_contact');
Route::resource('edit_contact', 'BackEnd\Company_Profile_Controller');
Route::get('/edit_background');
Route::resource('edit_background', 'BackEnd\Company_Background_Controller'); //Edit latar perusahaan
Route::get('/customers');
Route::resource('customers', 'BackEnd\CustomerController');
Route::get('/bank');
Route::resource('bank', 'BackEnd\BankController');
Route::get('/courier');
Route::resource('courier', 'BackEnd\KurirController');
Route::get('/product');
Route::resource('product', 'BackEnd\ProdukController');
Route::get('/product_stock');
Route::resource('product_stock', 'BackEnd\ProdukStokController');
Route::get('/transaction');
Route::resource('transaction', 'BackEnd\TransaksiController');
Route::get('/transaction_status');
Route::resource('transaction_status', 'BackEnd\Trans_Status_Controller');
Route::get('/payment');
Route::resource('payment', 'BackEnd\BuktiController');
Route::get('/buyers_data');
Route::resource('buyers_data', 'BackEnd\OrderController');

Route::post('getrange','BackEnd\OrderController@GetRange');


//Super Admin
Route::get('/sdashboard', function () {
    return view('SuperAdmin.dashboard');
});
Route::get('/scustomers_add', function () {
    return view('SuperAdmin.customers_add');
});
Route::get('/stransaction', function () {
    return view('SuperAdmin.transaction');
});

Route::get('/sbuyers_data');
Route::resource('sbuyers_data', 'BackEnd\OrderController');
Route::get('/stransaction');
Route::resource('stransaction', 'BackEnd\TransaksiController');
Route::get('/scustomers');
Route::resource('scustomers', 'BackEnd\CustomerController');
Route::get('/sadmin');
Route::resource('sadmin', 'BackEnd\AdminController');
Route::get('/sproduct');
Route::resource('sproduct', 'BackEnd\ProdukController');
Route::get('/sbank');
Route::resource('sbank', 'BackEnd\BankController');
Route::get('/scourier');
Route::resource('scourier', 'BackEnd\KurirController');
Route::get('/spayment');
Route::resource('spayment', 'BackEnd\BuktiController');

Route::post('logout_admin','BackEnd\LoginAdminController@logout');

//FrontEnd
Route::get('/checkout_berhasil', function () {
    $nav =  DB::select('SELECT
    produk_id,
    produk_nama ,produk_foto ,produk_harga
    FROM
    produk
    ');
    return view('checkout_berhasil',compact('nav'));
});
Route::get('/upload_bukti', function () {
    $nav =  DB::select('SELECT
    produk_id,
    produk_nama ,produk_foto ,produk_harga
    FROM
    produk
    ');
    return view('upload_bukti',compact('nav'));
});

Route::get('/register', function () {
 $nav =  DB::select('SELECT
    produk_id,
    produk_nama ,produk_foto ,produk_harga
    FROM
    produk
    ');
 return view('register',compact('nav'));
});

Route::post('logout_customer','FrontEnd\LoginController@logout');
Route::get('/login');
Route::resource('login', 'FrontEnd\LoginController');
Route::get('/custshop');
Route::resource('custshop', 'FrontEnd\CustomerController');
Route::get('/shop');
Route::resource('shop', 'FrontEnd\ShopController');
Route::get('/shop_detail');
Route::resource('shop_detail', 'FrontEnd\ShopDetailController');
Route::get('/checkout');
Route::resource('checkout', 'FrontEnd\CheckoutController');
Route::get('/cek_status');
Route::resource('cek_status', 'FrontEnd\CheckTransController');

Route::post('addcart','FrontEnd\ShopController@addcart');
Route::post('getongkir','FrontEnd\OngkirController@GetCost');
Route::post('getcity','FrontEnd\CheckoutController@GetCity');
Route::post('gettrans','FrontEnd\CheckTransController@GetTrans');

//Member

Route::get('/contact');
Route::resource('contact', 'FrontEnd\ContactController');
Route::get('/product_detail', function () {
    return view('product_detail');
});

Route::get('/profile');
Route::resource('profile', 'FrontEnd\CustProfileController');
Route::get('/profile_alamat');
Route::resource('profile_alamat', 'FrontEnd\CustAlamatController');
Route::get('/profile_password');
Route::resource('profile_password', 'FrontEnd\CustPassController');
Route::get('/bukti');
Route::resource('bukti', 'FrontEnd\BuktiController');
Route::get('/konfirmasi');
Route::resource('konfirmasi', 'FrontEnd\KonfirmasiController');


// Route::get('/beras', function () {
//     return view('beras');
// });
Route::get('/faqs', function () {
     $nav =  DB::select('SELECT
        produk_id,
        produk_nama ,produk_foto ,produk_harga
        FROM
        produk
        ');
    return view('faqs',compact('nav'));
});