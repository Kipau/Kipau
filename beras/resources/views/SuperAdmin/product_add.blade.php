@extends('Layout.sadmin_layout')
@section('title','Add Product')
@section('c','class=active')
@section('content')
@section('ckedit','src=/ckeditor/ckeditor.js')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Add Product
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
					<form action="{{route('sproduct.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
						<div class="box-header">
							<h3 class="box-title">Fill Data</h3>
						</div>
						<div class="box-body">
							<!-- Date dd/mm/yyyy -->
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama :</label>


									<input type="text" name="nama" class="form-control">
									{!! $errors->first('nama', '<p class="help-block" style="color:red">:message</p>') !!}
									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<label>Stok :</label>

									
									<input type="text" name="stok" class="form-control">
									{!! $errors->first('stok', '<p class="help-block" style="color:red">:message</p>') !!}
									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<div class="form-group">
										<label>Harga :</label>
										<div class="input-group">
											<span class="input-group-addon">Rp.</span>
											<input type="text" name="harga" class="form-control">
											{!! $errors->first('harga', '<p class="help-block" style="color:red">:message</p>') !!}
										</div>
									</div>
								</div>
								<!-- /.form group -->

								<!-- IP mask -->
								
								<!-- /.form group -->

							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label for="exampleInputFile">Gambar :</label>
									<input type="file" name="foto" id="exampleInputFile">
									{!! $errors->first('foto', '<p class="help-block" style="color:red">:message</p>') !!}
									<p class="help-block">Example block-level help text here.</p>
								</div>
								<!-- /.form group -->

							</div>
							<div class="col-md-12">
								<div class="form-group">
									<div class="form-group">
										<label>Deskripsi :</label>
										<textarea class="form-control" name="info" rows="3" placeholder="Enter ..." id="editor1"></textarea>
										{!! $errors->first('info', '<p class="help-block" style="color:red">:message</p>') !!}
									</div>
									<!-- /.input group -->
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