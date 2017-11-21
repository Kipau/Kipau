	@extends('Layout.layout')
	@section('title','Checkout')
	@section('content')
	<meta name="csrf-token" content="{{ Session::token() }}">
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="{{route('shop.index')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Checkout Page</li>
			</ol>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<h2>Your shopping cart contains: <span>3 Products</span></h2>
			<div class="checkout-right">
				<table class="timetable_sub" id="keranjang" name="keranjang">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product</th>
							<th>Quantity</th>
							<th>Product Name</th>

							<th>Price</th>
							<th>Remove</th>
						</tr>
					</thead>
					<?php 
					$i = 0; 
					$total = 0;
					?>
					@foreach ($cruds as $crud)

					<tr class="rem1">
						<td class="invert">{{$i+1}}</td>
						<td class="invert-image"><a href="single.html"><img src="/uploads/produk/{{$crud->produk_foto}}" width="2" height="100" alt=" "  /></a></td>
						<td class="invert">
							<div class="quantity"> 
								<div class="quantity-select">                           
									<!-- <div class="entry value-minus">&nbsp;</div> -->
									<div class="entry value"><span>{{$qtys[$i]}}</span></div>
									<!-- <div class="entry value-plus active">&nbsp;</div> -->
								</div>
							</div>
						</td>
						<td class="invert"><p id="merk">{{$crud->produk_nama}} </p></td>

						<td class="invert">{{$crud->produk_harga*$qtys[$i]}}</td>
						<td class="invert">
							<div class="rem">
								<div class="close1"> </div>
							</div>
							<script>$(document).ready(function(c) {
								$('.close1').on('click', function(c){
									$('.rem1').fadeOut('slow', function(c){
										$('.rem1').remove();
									});
								});	  
							});
						</script>
					</td>
				</tr>
				<?php 
				$total += $crud->produk_harga*$qtys[$i];
				$i++; 
				
				?>
				@endforeach

				<tr class="rem1">
					<td colspan="4">SUBTOTAL</td>
					<td colspan="2">{{$total}}</td>
				</tr>
				<!--quantity-->
<!-- 	<script>
		$('.value-plus').on('click', function(){
			var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
			divUpd.text(newVal);
		});

		$('.value-minus').on('click', function(){
			var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
			if(newVal>=1) divUpd.text(newVal);
		});
	</script> -->
	<!--quantity-->
</table>
</div>



<br>

</div>
<form action="{{route('checkout.store')}}" method="post" name="form1" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="container brands">
		<div class="col-sm-6 form-group ">
			<label>User</label><i class="fa fa-map-marker" style="margin-left: 0.5%"></i>
			<label><a href="" data-toggle="modal" data-target="#myModal	">Tambah alamat</a></label>
			<label  class="breadcrumb" id="alamat_lengkap" style="width: 100%;
			height: 145px;
			padding: 6px 12px;
			font-size: 14px;
			line-height: 1.42857143;">Alamat Belum Ada.</label>
		</div>
		<div class="col-sm-6">
			<div class=" form-group">
				<label>Catatan Untuk Penjual :</label>
				<textarea class="form-control" name="note" id="note" rows="6" cols="30" placeholder="note..."></textarea>
			</div>
		</div>

		<div class="col-sm-3">
			<div class=" form-group">
				<label>Pilih Bank</label>
				<select class="form-control" id="bank" name="bank">
					@foreach ($banks as $bank)
					<option value="{{$bank->bank_id}}">{{$bank->bank_nama}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-sm-9">
			<div class=" form-group">
				<label>A/N</label>
				<label style="width: 100%;
				height: 34px;
				padding: 6px 12px;
				font-size: 14px;
				line-height: 1.42857143;color: grey">KIPAY</label>
			</div>
		</div>
		
		<div class="col-sm-3 form-group">
			<label>Kurir Pengiriman</label>
			<select onchange="GetOngkir();" class="form-control" id="kurir" name="kurir">
				<option value="1">-- Pilih Ekspedisi --</option>
				@foreach ($kurirs as $kurir)
				<option value="{{$kurir->kurir_id}}">{{$kurir->kurir_nama}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-sm-3 form-group">
			<label>Paket Pengiriman</label>
			<select onchange="GetHarga();" class="form-control" id="paket" name="paket">
				<option>-- Pilih Paket --</option>
			<!-- <option>REGULER</option>
				<option>EXPRESS</option> -->
			</select>
		</div>

		<!-- <input type="text" name="valcity" id="valcity" value="" class="form-control"> -->

		<div class="col-sm-3 form-group">
			<label>Biaya Asuransi</label>
			<select class="form-control">
				<option>YA</option>
				<option>TIDAK</option>
			</select>
		</div>
		<div class="col-sm-3 form-group">
			<label>Ongkos Kirim</label>
			<label id="ongkir1" name="ongkir1" style="width: 100%;
			height: 34px;
			padding: 6px 12px;
			font-size: 14px;
			line-height: 1.42857143;color: grey">0</label>
		</div>
	</div>
	<input type="hidden" name="valongkir" id="valongkir" value="">
	<div id="biaya" name="biaya">

	</div>
</div>



<div class="container">




	<div class="checkout-left">	
		<div class="checkout-left-basket">
			<h4>Continue to basket</h4>
			<ul>
				<li>SubTotal <i>-</i> <span>{{$total}}</span></li>
				<li>Ongkos Kirim <i>-</i> <span id="ongkir2">0</span></li>
				<li><i></i> <span> </span></li>
				<li><i></i> <span> </span></li>
				<li>Total Pembayaran<i>-</i> <span id="totalharga">{{$total}}</span></li>
				<input type="hidden" name="valtotal" id="valtotal" value="">
			</ul>
		</div>
		<div class="checkout-right-basket">
			<button type="submit" style="padding: 3px 28px 3px 20px;
			color: #fff;
			font-size: 1em;
			background: #212121;
			text-decoration: none;font-family: 'Raleway', sans-serif;
			margin: 0;
			font-weight: 700;"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</button>
		</div>
		<div class="checkout-right-basket" style="margin-right:1%">
			<a href="{{route('shop.index')}}" style="padding: 0px 28px 10px 20px;"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
		</div>
	</div>

</form>
<div class="clearfix"> </div>
<!--modal-->




<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog-sm" style="position: relative;
	overflow-y: auto;
	max-height: 400px;
	padding: 5%;">

	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" onclick="GetAlamat();" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Address</h4>
		</div>
		<div class="modal-body">
			<div class="container">
				<div class="col-md-3">
					<div class=" form-group">
						<label>Provinsi :</label>
						<select onchange="GetCity();" name="provinsi_asal" id="provinsi_asal" class="form-control">
							<?php 
							foreach ($alamats as $alamat) 
							{
								$provnama = $alamat->customer_provinsi;
								$kotanama = $alamat->customer_kota;
							}
							for ($i=0; $i < count($prov['rajaongkir']['results']); $i++)
							{

								if ($prov['rajaongkir']['results'][$i]['province'] == $provnama)
								{
									echo '<option value="'.$prov['rajaongkir']['results'][$i]['province_id'].'" selected>'.$prov['rajaongkir']['results'][$i]['province'].'</option>';
								}


								echo '<option value="'.$prov['rajaongkir']['results'][$i]['province_id'].'">'.$prov['rajaongkir']['results'][$i]['province'].'</option>';
							}
							?>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class=" form-group">
						<label>Kota :</label>
						<select name="origin" id="origin" class="form-control" >
							<?php 

							for ($i=0; $i < count($kotas['rajaongkir']['results']); $i++)
							{
								if ($kotas['rajaongkir']['results'][$i]['city_name'] == $kotanama)
								{
									echo '<option value="'.$kotas['rajaongkir']['results'][$i]['city_id'].'" selected>'.$kotas['rajaongkir']['results'][$i]['city_name'].'</option>';
								}

								echo '<option value="'.$kotas['rajaongkir']['results'][$i]['city_id'].'">'.$kotas['rajaongkir']['results'][$i]['city_name'].'</option>';
							}
							?>

						</select>
					</div>
				</div>
				@foreach($alamats as $alamat)
				<div class="col-md-2">
					<div class=" form-group">
						<label>Kecamatan :</label>
						<input type="text" name="kecamatan" id="kecamatan" class="form-control" value="{{$alamat->customer_kecamatan}}">
					</div>
				</div>
				<div class="col-md-2">
					<div class=" form-group">
						<label>Kelurahan :</label>
						<input type="text" name="kelurahan" id="kelurahan" class="form-control" value="{{$alamat->customer_kelurahan}}">
					</div>
				</div>
				<div class="col-md-2">
					<div class=" form-group">
						<label>Kodepos :</label>
						<input type="text" name="kodepos" id="kodepos" class="form-control" value="{{$alamat->customer_kodepos}}">
					</div>
				</div>
				<div class="col-md-12">
					<div class=" form-group">
						<label>Alamat :</label>
						<textarea class="form-control" name="alamat" id="alamat" rows="4" cols="100" placeholder="note...">{{$alamat->customer_alamat}}</textarea>
					</div>
				</div>
				@endforeach

			</div>

		</div>

		<div class="modal-footer">
			<!-- <a type="submit" class="btn btn-danger" href="{{URL::to('checkout_berhasil')}}">Kembali</a> -->


		</div>
	</div>

</div>
</div> 
</div>
</div>
</div>
<script type="text/javascript">
	var harga = [];
	$(window).load(function() 
	{
		 // alert(paypal.minicart.cart.items);
		 var produk = [];
		 var items = paypal.minicart.cart.items();
		// alert(items[1].get("item_name"));
		for (i = 0; i < items.length; i++)
		{
			produk.push(items[i].get("item_name"));
		}

		if (document.getElementById("kecamatan").value != "")
		{
			GetAlamat();
		}
		// document.getElementById("merk").innerHTML = op;
		// alert(produk);
	});

	function GetAlamat()
	{
		//provinsi
		var prov = document.getElementById("provinsi_asal");
		var a = "<pre>Provinsi  : "+prov.options[prov.selectedIndex].text+"<br>";
		//kota
		var kota = document.getElementById("origin");
		var b = "Kota      : "+kota.options[kota.selectedIndex].text+"<br>";
		//kecamatan
		var kec = document.getElementById("kecamatan");
		var c = "Kecamatan : "+kec.value+"<br>";
		//kelurahan
		var kel = document.getElementById("kelurahan");
		var d = "Kelurahan : "+kel.value+"<br>";
		//kodepos
		var pos = document.getElementById("kodepos");
		var e = "Kodepos   : "+pos.value+"<br>";
		//alamat
		var alamat = document.getElementById("alamat");
		var f = "Alamat    : "+alamat.value+"</pre>";

		document.getElementById("alamat_lengkap").innerHTML = a+b+c+d+e+f;
	}

	function GetCity()
	{
		var c = document.getElementById("provinsi_asal").value;
		$.post('http://localhost:8000/getcity', {
			_token: $('meta[name=csrf-token]').attr('content'),
			prov: c
		}
		)
		.done(function(data) {
			$('#origin').html(data);
		})
		.fail(function() {
			alert( "error" );
		});
	}

	function GetHarga()
	{
		var a = document.getElementById("paket").selectedIndex-1;

		document.getElementById("ongkir1").innerHTML = document.getElementById("harga"+a).value;
		document.getElementById("ongkir2").innerHTML = document.getElementById("harga"+a).value;
		document.getElementById("valongkir").value = document.getElementById("harga"+a).value;

		var SubTotal = Number(document.getElementById("totalharga").innerHTML) + Number(document.getElementById("ongkir2").innerHTML);

		document.getElementById("totalharga").innerHTML = SubTotal;
		document.getElementById("valtotal").value = SubTotal;
	}

	function GetOngkir()
	{
		var c = $('#kurir option:selected').html().toLowerCase();
		var d = document.getElementById("origin").value;
		$.post('http://localhost:8000/getongkir', {
			_token: $('meta[name=csrf-token]').attr('content'),
			kurir: c,
			valcity: d
		}
		)
		.done(function(data) {
			$('#paket').html('<option>-- Pilih Paket --</option>');
			$('#biaya').html('');
			for(x in data)
			{
				$('#paket').append(data[x].isi);
				$('#biaya').append('<input type="hidden" id="harga'+x+'" value="'+data[x].harga+'">');
			}

		})
		.fail(function() {
			alert( "error" );
		});
	}
</script>
@endsection

