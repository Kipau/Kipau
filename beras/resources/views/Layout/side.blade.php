<div class="col-md-4 products-left">
	<div class="categories">
		<h2>Categories</h2>
		<ul class="cate">
			@foreach($nav as $crud)
			<li><a href="{{route('shop.edit', $crud->produk_id)}}"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{$crud->produk_nama}}</a></li>
			@endforeach
		</ul>
	</div>																																												
</div>