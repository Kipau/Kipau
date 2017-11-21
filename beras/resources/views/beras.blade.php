@extends('Layout.layout')
@section('title','Beras')
@section('content')
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="{{route('shop.index')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
			<li class="active">Produk</li>
		</ol>
	</div>
</div>
<!-- //breadcrumbs -->

<div class="products">
	<div class="container">
		@include('Layout.side')
		<div class="col-md-8 products-right">
			<div class="products-right-grid">
				<div class="products-right-grids">
					<div class="sorting">
						<select id="country" onchange="change_country(this.value)" class="frm-field required sect">
							<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Default sorting</option>
							<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sort by popularity</option> 
							<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sort by average rating</option>					
							<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sort by price</option>								
						</select>
					</div>
					<div class="sorting-left">
						<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
							<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Item on page 9</option>
							<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Item on page 18</option> 
							<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Item on page 32</option>					
							<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>All</option>								
						</select>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="agile_top_brands_grids">
				@foreach($cruds as $crud)
				<div class="col-md-4 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive">
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="{{route('shop_detail.index')}}"><img title=" " alt=" " src="/uploads/produk/{{$crud->produk_foto}}" width="150" height="150"></a>
											<?php  session(['idprod' => $crud->produk_id]);?>		
											<p>{{$crud->produk_nama}}</p>
											<h4>Rp {{$crud->produk_harga}}</h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart">
													<input type="hidden" name="add" value="1">
													<input type="hidden" name="business" value=" ">
													<input type="hidden" name="item_name" value="{{$crud->produk_nama}}">
													<input type="hidden" name="amount" value="{{$crud->produk_harga}}">
													
													<input type="hidden" name="currency_code" value="IDR">
													<input type="hidden" name="return" value=" ">
													<input type="hidden" name="cancel_return" value=" ">
													<input type="submit" name="submit" value="Add to cart" class="button">
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<div class="clearfix"> </div>
			</div>
			<nav class="numbering">
				<ul class="pagination paging">
					<li>
						<a href="#" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li>
					<li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li>
						<a href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
@endsection