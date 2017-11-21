@extends('Layout.layout')
@section('title','Detail Product')
@section('content')
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="{{route('shop.index')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
			<li class="active">Detail Product</li>
		</ol>
	</div>
</div>
<!-- //breadcrumbs -->
<div class="products">
	<div class="container">
		@foreach($isi as $crud)
		<div class="agileinfo_single">
			
			<div class="col-md-4 agileinfo_single_left">
				<img id="example" src="/uploads/produk/{{$crud->produk_foto}}" width="300" height="300" alt=" " class="img-responsive">
			</div>
			<div class="col-md-8 agileinfo_single_right">
				<h2>{{$crud->produk_nama}} - Mlatiharjo</h2>
				<!-- <div class="rating1">
					<span class="starRating">
						<input id="rating5" type="radio" name="rating" value="5">
						<label for="rating5">5</label>
						<input id="rating4" type="radio" name="rating" value="4">
						<label for="rating4">4</label>
						<input id="rating3" type="radio" name="rating" value="3" checked="">
						<label for="rating3">3</label>
						<input id="rating2" type="radio" name="rating" value="2">
						<label for="rating2">2</label>
						<input id="rating1" type="radio" name="rating" value="1">
						<label for="rating1">1</label>
					</span>
				</div> -->
				<div class="w3agile_description">
					<h4>Deskripsi :</h4>
					<p>{{$crud->produk_info}}</p>
				</div>
				<div class="snipcart-item block">
					<div class="snipcart-thumb agileinfo_single_right_snipcart">
						<h4 class="m-sing">Rp {{$crud->produk_harga}}</h4>

					</div>
					<div class="snipcart-details agileinfo_single_right_details">
						<form action="#" method="post">
							<fieldset>
								<input name="_method" type="hidden" value="PATCH">
								{{csrf_field()}}
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="add" value="1">
								<input type="hidden" name="business" value=" ">
								<input type="hidden" name="item_name" value="{{$crud->produk_nama}}">
								<input type="hidden" name="amount" value="{{$crud->produk_harga}}">

								<input type="hidden" name="currency_code" value="USD">
								<input type="hidden" name="return" value=" ">
								<input type="hidden" name="cancel_return" value=" ">
								<input type="submit" name="submit" value="Add to cart" class="button">
							</fieldset>
						</form>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		@endforeach
	</div>
</div>
<!-- new -->
@include('Layout.offer')
<!-- //new -->
@endsection