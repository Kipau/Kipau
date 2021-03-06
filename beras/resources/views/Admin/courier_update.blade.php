@extends('Layout.admin_layout')
@section('title','Update Courier')
@section('h','class=active')
@section('content')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Update Courier
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
					<div class="box-header">
						<form action="{{route('scourier.update', $cruds->kurir_id)}}" method="post" name="form1" enctype="multipart/form-data">
							<input name="_method" type="hidden" value="PATCH">
							{{csrf_field()}}
							<h3 class="box-title">Fill Data</h3>
						</div>
						<div class="box-body">
							<!-- Date dd/mm/yyyy -->
							<div class="col-md-12">
								<div class="form-group">
									<label>Nama :</label>


									<input type="text" name="nama" value="{{$cruds->kurir_nama}}" class="form-control">
									{!! $errors->first('nama', '<p class="help-block" style="color:red">:message</p>') !!}
									<!-- /.input group -->
								</div>
								<div class="form-group">
									<label for="exampleInputFile">Gambar : </label>
									<img src="/uploads/kurir/{{$cruds->kurir_foto }}" height="100" width="100" alt="gambar" id="fotokurir" name="fotokurir">
									<input type="file" name="foto" id="exampleInputFile" onchange="readURL(this);">
									{!! $errors->first('foto', '<p class="help-block" style="color:red">:message</p>') !!}

									<p class="help-block">Example block-level help text here.</p>
								</div>
								<!-- /.form group -->

								<!-- phone mask -->





							</div>
							<div class="col-md-6">


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
                $('#fotokurir').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>