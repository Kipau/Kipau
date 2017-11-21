@extends('Layout.admin_layout')
@section('title','Update Status')
@section('b','class=active')
@section('bb','class=active')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Update Status
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
				@foreach($cruds as $crud)
					<form action="{{route('transaction_status.update', $crud->trans_id)}}" method="post" enctype="multipart/form-data">
						<input name="_method" type="hidden" value="PATCH">
						{{csrf_field()}}
						<div class="box-header">
							<h3 class="box-title">Update Data</h3>
						</div>
						<div class="box-body">
							<!-- Date dd/mm/yyyy -->
							<div class="col-md-12">
								<div class="form-group">
									<label>Pembayaran :</label>


									<!-- radio -->
									<div class="form-group">
										<div class="radio">
											<label>
												<?php 
												$resi = $crud->trans_resi;
												$cek1 = "";
												$cek2 = "";
												$cek3 = "";
												$cek4 = "";
												$cek5 = "";
												$cek6 = "";
												if ($crud->trans_status_pembayaran == "Success")
													$cek1 = 'checked';
												else if ($crud->trans_status_pembayaran == "Waiting")
													$cek2 = 'checked';
												else if ($crud->trans_status_pembayaran == "Canceled")
													$cek3 = 'checked';

												if ($crud->trans_status_pengiriman == "Delivered")
													$cek4 = 'checked';
												else if ($crud->trans_status_pengiriman == "On Delivery")
													$cek5 = 'checked';
												else if ($crud->trans_status_pengiriman == "Canceled")
													$cek6 = 'checked';
												?>
												@endforeach

												<input type="radio" name="pembayaran" id="optionsRadios1" value="Success" {{$cek1}}>
												Success
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="pembayaran" id="optionsRadios2" value="Waiting" {{$cek2}}>
												Waiting
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="pembayaran" id="optionsRadios3" value="Canceled" {{$cek3}}>
												Canceled
											</label>
										</div>
									</div>
									

									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<label>Pengiriman :</label>

									<div class="form-group">
										<div class="radio">
											<label>
												<input type="radio" name="pengiriman" id="optionsRadios1" value="Delivered" {{$cek4}}>
												Delivered
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="pengiriman" id="optionsRadios2" value="On Delivery" {{$cek5}}>
												On Delivery
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="pengiriman" id="optionsRadios3" value="Canceled" {{$cek6}}>
												Canceled
											</label>
										</div>
									</div>
									
									<!-- /.input group -->
								</div>
								<div class="form-group">
									<label>No. Resi :</label>

									
									<input type="text" name="resi" class="form-control" value="{{$resi}}">
									
									<!-- /.input group -->
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