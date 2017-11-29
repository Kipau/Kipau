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
					<form action="{{route('edit_contact.update', $cruds->profile_id)}}" method="post" enctype="multipart/form-data">
						<input name="_method" type="hidden" value="PATCH">
						{{csrf_field()}}
						<div class="box-header">
							<h3 class="box-title">Fill Data</h3>
						</div>
						<div class="box-body">
							<!-- Date dd/mm/yyyy -->
							<div class="col-md-6">
								<div class="form-group">
									<label>Email :</label>


									<input type="text" name="email" class="form-control" value="{{$cruds->profile_email}}">
									
									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<label>No telp :</label>

									
									<input type="text" name="nohp" class="form-control" value="{{$cruds->profile_nohp}}">
									
									
									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								

								<!-- /.form group -->

								

							</div>
							
							<div class="col-md-12">
								<div class="form-group">
									<label>Alamat</label>
									<textarea class="form-control" name="alamat" rows="3" placeholder="Enter ..." id="editor1">{{$cruds->profile_alamat}}</textarea>
									
								</div>
							</div>
							<!-- /.box-body -->

						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-info ">Update</button>
						</div>
					</form>
				</div>
				<div class="box box-success">
					<form action="{{route('edit_background.update', $cruds->profile_id)}}" method="post" enctype="multipart/form-data">
						<input name="_method" type="hidden" value="PATCH">
						{{csrf_field()}}
						<div class="box-header">
							<h3 class="box-title">Company Profile</h3>
						</div>
						<div class="box-body">
							<!-- Date dd/mm/yyyy -->
							<div class="col-md-6">
								<div class="form-group">
									<label>Judul :</label>


									<input type="text" name="judul" class="form-control" value="{{$cruds->profile_judul}}">
									
									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
							

							</div>
							
							<div class="col-md-12">
								<div class="form-group">
									<label>Isi : </label>
									<textarea class="form-control" name="isi" rows="3" placeholder="Enter ..." id="editor1">{{$cruds->profile_isi}}</textarea>
									
								</div>
							</div>
							<!-- /.box-body -->

						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-info ">Update</button>
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