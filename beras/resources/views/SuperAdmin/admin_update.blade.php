@extends('Layout.sadmin_layout')
@section('title','Update Admin')
@section('f','class=active')
@section('content')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Update Admin
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
					<form action="{{route('sadmin.update', $cruds->admin_username)}}" method="post" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PATCH">
                    {{csrf_field()}}
						<div class="box-header">
							<h3 class="box-title">Fill Data</h3>
						</div>
						<div class="box-body">
							<!-- Date dd/mm/yyyy -->
							<div class="col-md-6">
								<div class="form-group">
									<label>Username :</label>


									<input type="text" name="username" value="{{$cruds->admin_username}}" class="form-control">
									{!! $errors->first('username', '<p class="help-block" style="color:red">:message</p>') !!}
									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<label>New Password :</label>

									
									<input type="Password" name="password" class="form-control">

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

									
									<input type="text" name="nama" value="{{$cruds->admin_nama}}" class="form-control">
									{!! $errors->first('nama', '<p class="help-block" style="color:red">:message</p>') !!}
									<!-- /.input group -->
								</div>
								<div class="form-group">
								<label for="exampleInputFile">Image :</label>
								<img src="/uploads/admin/{{$cruds->admin_foto}}" height="100" width="100" alt="gambar" id="fotoadmin" name="fotoadmin">
									<input type="file" name="foto" id="exampleInputFile" onchange="readURL(this);">

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

<script type="text/javascript">

	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#fotoadmin').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>