<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;

class OngkirController extends Controller
{
	public function index()
	{
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
			$data = json_decode($response, true);
		}
		return view('ongkir',compact('data'));
	}

	public function GetCost(Request $request)
	{
		$output = array();
		$asal = $request->input('valcity');
		$kurir = $request->input('kurir');
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=".$asal."&destination=153&weight=1700&courier=".$kurir."",
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
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
    // echo $response;
		for ($i=0; $i < count($data['rajaongkir']['results']); $i++)
		{
			for ($j=0; $j< count($data['rajaongkir']['results'][$i]['costs']); $j++)
			{
				$value = $data['rajaongkir']['results'][$i]['costs'][$j]['service'];
				$deskripsi = $data['rajaongkir']['results'][$i]['costs'][$j]['description'];
				$harga = $data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['value'];
				$isi = '<option value="'.$deskripsi.'">'.$value.' ('.$deskripsi.')</option>';

				$output[] = array("isi" =>$isi, "harga" => $harga);
				// echo '<option value="'.$value.'">'.$value.' ('.$deskripsi.')</option>';
				// echo json_encode(Array(
				// 	'name' => $isi;
				// 	));

			}
		}
		header("Content-Type: application/json; charset=UTF-8");
		echo json_encode($output);
	}
}
