@extends('Layout.admin_layout')
@section('title','Add Stock')
@section('c','class=active')
@section('content')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Add Stock
		</h1>
		
	</section>
	@if(Session::has('alert-success')) 
	<div class="alert alert-success"> 
		{{ Session::get('alert-success') }} 
	</div> 
	@endif
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-6">
				<div class="box box-danger">
					<form action="{{route('product_stock.update', $cruds->produk_id)}}" method="post" enctype="multipart/form-data">
						<input name="_method" type="hidden" value="PATCH">
						{{csrf_field()}}
						<div class="box-header">
							<h3 class="box-title">Fill Data</h3>
						</div>
						<div class="box-body">
							<!-- Date dd/mm/yyyy -->
							<div class="col-md-12">
								<div class="form-group">
									<label>Current Stock :</label>


									<input type="text" class="form-control" value="{{$cruds->produk_stok}}" disabled>

									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<label>New Stock :</label>

									
									<input type="text" name="stok" class="form-control">
									{!! $errors->first('stok', '<p class="help-block" style="color:red">:message</p>') !!}
									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								
								

							</div>
							

						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-info ">Submit</button>
						</div>
					</form>
				</div>

			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
</div>
@endsection