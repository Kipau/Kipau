@extends('Layout.sadmin_layout')
@section('title','Add Admin')
@section('f','class=active')
@section('content')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Add Admin
		</h1>
		
	</section>
	@if(Session::has('alert-warning')) 
	<div class="alert alert-warning" style="font-size:18px; text-align:center;"> 
		{{ Session::get('alert-warning') }} 
	</div> 
	@endif
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-danger">
					<form action="{{route('sadmin.store')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="box-header">
							<h3 class="box-title">Fill Data</h3>
						</div>
						<div class="box-body">
							<!-- Date dd/mm/yyyy -->
							<div class="col-md-6">
								<div class="form-group">
									<label>Username :</label>


									<input type="text" name="username" class="form-control">
									{!! $errors->first('username', '<p class="help-block" style="color:red">:message</p>') !!}
									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<label>Password :</label>

									
									<input type="Password" name="password" class="form-control">
									{!! $errors->first('password', '<p class="help-block" style="color:red">:message</p>') !!}
									<!-- /.input group -->
								</div>
								<div class="form-group">
									<label>Password Confirmation :</label>

									
									<input type="Password" name="password2" class="form-control">
									
									<!-- /.input group -->
								</div>
								
								<!-- /.form group -->

								
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>Name :</label>

									
									<input type="text" name="nama" class="form-control">
									{!! $errors->first('nama', '<p class="help-block" style="color:red">:message</p>') !!}
									<!-- /.input group -->
								</div>
								<div class="form-group">
									<label>Hak SuperAdmin :</label>
									<div class="form-group">
										<div class="radio">
											<label>
												<input type="radio" name="superadmin" id="optionsRadios2" value="Yes">
												Yes
											</label>
											&nbsp &nbsp &nbsp
											<label>
												<input type="radio" name="superadmin" id="optionsRadios2" value="No" checked>
												No
											</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputFile">Image :</label>
									<input type="file" name="foto" id="exampleInputFile">
									{!! $errors->first('foto', '<p class="help-block" style="color:red">:message</p>') !!}
									<p class="help-block">Example block-level help text here.</p>
								</div>
								<!-- /.form group -->

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