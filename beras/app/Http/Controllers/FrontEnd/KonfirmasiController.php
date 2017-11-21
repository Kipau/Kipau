<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use App\Transaksi_Model;

class KonfirmasiController extends Controller
{
	public function update(Request $request, $id)
	{
		$cruds = Transaksi_Model::findOrFail($id);
		$cruds->trans_status_pengiriman = "Delivered";

		$cruds->save();

		echo '<script language="javascript">';
		echo 'alert("Anda telah mengKonfirmasi bahwa barang pesanan anda sudah diterima")';
		echo '</script>';
		return redirect()->route('cek_status.index')->with('konfirmasi', $cruds->trans_kode);
	}
}
