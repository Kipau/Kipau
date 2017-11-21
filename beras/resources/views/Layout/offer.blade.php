<div class="newproducts-w3agile">
	<div class="container">
		<h3>New offers</h3>
		<div class="agile_top_brands_grids">
			@foreach($cruds as $crud)
			<div class="col-md-3 top_brand_left-1">
				<div class="hover14 column">
					<div class="agile_top_brand_left_grid">
						<div class="agile_top_brand_left_grid_pos">
							<img src="images/offer.png" alt=" " class="img-responsive">
						</div>
						<div class="agile_top_brand_left_grid1">
							<figure>
								<div class="snipcart-item block">
									<div class="snipcart-thumb">
									<center>
										<img title=" " alt=" " src="/uploads/produk/{{$crud->produk_foto}}" width="150" height="150">
										</center>		
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
	</div>
</div>