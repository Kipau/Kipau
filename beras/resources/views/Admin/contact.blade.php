@extends('Layout.admin_layout')
@section('title','Contact')
@section('j','class=active')
@section('content')
@section('ckedit','src=/ckeditor/ckeditor.js')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Contact
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
			<div class="col-md-12">
				<div class="box box-danger">
					<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="box-header">
							<h3 class="box-title">Fill Data</h3>
						</div>
						<div class="box-body">
							<!-- Date dd/mm/yyyy -->
							<div class="col-md-6">
								<div class="form-group">
									<label>Email :</label>


									<input type="text" name="nama" class="form-control">
									{!! $errors->first('nama', '<p class="help-block" style="color:red">:message</p>') !!}
									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<label>No telp :</label>

									
									<input type="text" name="stok" class="form-control">
									{!! $errors->first('stok', '<p class="help-block" style="color:red">:message</p>') !!}
									
									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								

								<!-- /.form group -->

								

							</div>
							
							<div class="col-md-12">
								<div class="form-group">
									<label>Alamat</label>
									<textarea class="form-control" name="info" rows="3" placeholder="Enter ..." id="editor1"></textarea>
									{!! $errors->first('info', '<p class="help-block" style="color:red">:message</p>') !!}
								</div>
							</div>
							<!-- /.box-body -->

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