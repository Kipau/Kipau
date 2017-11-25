	@extends('Layout.layout')
	@section('title','Checkout')
	@section('content')
	<?php
	$kode = "";
	if (session()->has('konfirmasi'))
	{
		echo '<script language="javascript">';
		echo 'alert("Anda telah mengKonfirmasi bahwa barang pesanan anda sudah diterima")';
		echo '</script>';

		$kode = Session::get('konfirmasi');
	}
	if (session()->has('ulasan'))
	{
		echo '<script language="javascript">';
		echo 'alert("Anda telah memberikan ulasan")';
		echo '</script>';

		$kode = Session::get('ulasan');
	}
	?>
	

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
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-4 products-left">
				<div class="categories">
					<h2>list Transaksi</h2>
					<ul class="cate">
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i>TR001 : 2017/11/01-Beras Melati 1x</li>
					</ul>
				</div>																																												
			</div>
			<div class="col-sm-3">
				<div class=" form-group">
					<label>Kode Transaksi</label>
					<input type="text" id="kode" class="form-control" value="{{$kode}}">
				</div>
				<a href="#" class="btn btn-danger" onclick="GetTrans();">Cek</a>
			</div>

			<div class="col-sm-9">
				<div class=" form-group">
					
				</div>
			</div>
		</div>
	</div>
</div>

<div id="cek" name="cek">
	<div class="checkout">
		<div class="container">
			<div class="checkout-right" >
			<!-- <div id="cek" name="cek">

			</div> -->


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

<div class="clearfix"> </div>






</div> 
</div>
</div>

<!-- <div class="w3_agileits_contact_grids">
	<div class="brands">
		<div class="col-md-6 w3_agileits_contact_grid_left"  >
			<h2 class="w3_agile_header">Tips <span> Menulis Ulasan</span></h2>
			
			<ol style="margin-top: 10%;margin-left: 10%">
				<li>
					<h4>Kesesuaian dengan deskripsi</h4>
					<p>Cth: Ukuran dan warna sesuai dengan foto.</p>
				</li>
				<br>
				<li>
					<h4>Fungsionalitas Produk</h4>
					<p>Cth: Produk bekerja dengan baik & kuat</p>
				</li>
				<br>
				<li>
					<h4>Keinginan merekomendasikan produk ini </h4>
					<p>
					Cth: Barang bagus, cepat sampai, recommended!</p>
				</li>
			</ol>







		</div>
		<div class="col-md-6 w3_agileits_contact_grid_right">
			<h2 class="w3_agile_header">Berikan <span> Ulasan</span></h2>

			<form action="{{route('cek_status.update', 0)}}" method="post" name="form1" enctype="multipart/form-data">
				<input name="_method" type="hidden" value="PATCH">
				{{csrf_field()}}
				<textarea name="ulasan" placeholder="Your message here..." required=""></textarea>
				<input type="submit" value="Submit">
			</form>
		</div>
		<div class="clearfix"> </div>
	</div>
</div> -->
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
		// document.getElementById("merk").innerHTML = op;
		// alert(produk);
		if (document.getElementById("kode").value != "")
			GetTrans();
	});

	function GetTrans()
	{
		var d = document.getElementById("kode").value;
		$.post('http://localhost:8000/gettrans', {
			_token: $('meta[name=csrf-token]').attr('content'),
			kode: d
		}
		)
		.done(function(data) {
			$('#cek').replaceWith(data);
		})
		.fail(function() {
			alert( "error" );
		});
	}
</script>
@endsection

