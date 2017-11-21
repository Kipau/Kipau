@extends('Layout.layout')
@section('title','Profile Alamat')
@section('content')
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="{{route('shop.index')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
			<li class="active">Profile</li>
		</ol>
	</div>
</div>
<!-- //breadcrumbs -->
<!-- contact -->
<div class="about">
	<div class="w3_agileits_contact_grids">
		<div class="col-md-4 products-left">
			<div class="categories">
				<h2>Action</h2>
				<ul class="cate">

					<li><a href="{{URL::to('profile')}}"><i class="fa fa-arrow-right" aria-hidden="true"></i>Profile</a></li>
					<li><a href="{{URL::to('profile_password')}}"><i class="fa fa-arrow-right" aria-hidden="true"></i>Password</a></li>
					<li><a href="{{URL::to('profile_alamat')}}"><i class="fa fa-arrow-right" aria-hidden="true"></i>Alamat</a></li>

				</ul>
			</div>																																												
		</div>
		<div class="col-md-6 w3_agileits_contact_grid_right">
			<h2 class="w3_agile_header">Profile<span></span></h2>

			<form action="{{route('profile_alamat.update', Session::get('customer_id'))}}" method="post" name="form1" enctype="multipart/form-data">
				<input name="_method" type="hidden" value="PATCH">
				{{csrf_field()}}

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
				<div class=" form-group">
					<label>Kota :</label>
					<select onchange="GetVal();" name="origin" id="origin" class="form-control" >
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
				<input type="hidden" name="valprov" id="valprov" value="{{$provnama}}">
				<input type="hidden" name="valkota" id="valkota" value="{{$kotanama}}">
				@foreach($alamats as $alamat)
				<div class=" form-group">
					<label>Kecamatan :</label>
					<input type="text" name="kecamatan" id="kecamatan" class="form-control" value="{{$alamat->customer_kecamatan}}">
				</div>


				<div class=" form-group">
					<label>Kelurahan :</label>
					<input type="text" name="kelurahan" id="kelurahan" class="form-control" value="{{$alamat->customer_kelurahan}}">
				</div>

				<div class=" form-group">
					<label>Kodepos :</label>
					<input type="text" name="kodepos" id="kodepos" class="form-control" value="{{$alamat->customer_kodepos}}">
				</div>


				<div class=" form-group">
					<label>Alamat :</label>
					<textarea class="form-control" name="alamat" id="alamat" rows="4" cols="100" placeholder="alamat...">{{$alamat->customer_alamat}}</textarea>
				</div>
				@endforeach
			</span>

			<input type="submit" value="Submit">
		</form>
	</div>
	<div class="clearfix"> </div>
</div>
</div>
<!-- contact -->
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
		// document.getElementById("merk").innerHTML = op;
		// alert(produk);
	});



	function getSelectedText(elementId) {
		var elt = document.getElementById(elementId);

		if (elt.selectedIndex == -1)
			return null;

		return elt.options[elt.selectedIndex].text;
	}

	function GetCity()
	{
		document.getElementById("valprov").value = getSelectedText('provinsi_asal');

		var c = document.getElementById("provinsi_asal").value;
		$.post('http://localhost:8000/getcity', {
			_token: $('meta[name=csrf-token]').attr('content'),
			prov: c
		}
		)
		.done(function(data) {
			$('#origin').html(data);
			document.getElementById("valkota").value = getSelectedText('origin');
		})
		.fail(function() {
			alert( "error" );
		});
	}

	function GetVal()
	{
		document.getElementById("valkota").value = getSelectedText('origin');
	}

</script>
@endsection