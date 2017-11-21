@extends('Layout.admin_layout')
@section('title','Update Bank')
@section('g','class=active')
@section('content')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Update Bank
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
					<form action="{{route('bank.update', $cruds->bank_id)}}" method="post" name="form1" enctype="multipart/form-data">
					<input name="_method" type="hidden" value="PATCH">
						{{csrf_field()}}
						<div class="box-header">
							<h3 class="box-title">Update Data</h3>
						</div>
						<div class="box-body">
							<!-- Date dd/mm/yyyy -->
							<div class="col-md-12">
								<div class="form-group">
									<label>Nama :</label>


									<input type="text" name="nama" class="form-control" value="{{$cruds->bank_nama}}">
									{!! $errors->first('nama', '<p class="help-block" style="color:red">:message</p>') !!}
									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<label>No.Rek :</label>

									
									<input type="text" name="norek" class="form-control" value="{{$cruds->bank_norek}}">
									{!! $errors->first('norek', '<p class="help-block" style="color:red">:message</p>') !!}
									
									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<div class="form-group">
										
										<div class="input-group">
											<span class="input-group-addon">A/N</span>
											<input type="text" name="an" class="form-control" value="{{$cruds->bank_an}}">
											{!! $errors->first('an', '<p class="help-block" style="color:red">:message</p>') !!}
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputFile">Gambar : </label>
									<img src="/uploads/bank/{{$cruds->bank_foto }}" height="100" width="100" alt="gambar" id="fotobank" name="fotobank">
									<input type="file" name="foto" id="exampleInputFile" onchange="readURL(this);">
									{!! $errors->first('foto', '<p class="help-block" style="color:red">:message</p>') !!}

									<p class="help-block">Example block-level help text here.</p>
								</div>
								<!-- /.form group -->

								

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
                $('#fotobank').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>