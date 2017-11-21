@extends('Layout.admin_layout')
@section('title','Payment')
@section('i','class=active')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			List Payment
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
			<div class="col-xs-12">


				<div class="box">
					<a class="btn-default"></a>
					<div class="box-header">


					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table id="example1" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Kode Transaksi</th>
									<th>Customer</th>
									<th>Foto</th>
									<th>Waktu Upload</th>									
								</tr>
							</thead>
							<tbody>
							<?php $no=0; ?>
							@foreach($cruds as $crud)
							<?php $no++; ?>
								<tr>
									<td>{{$no}}</td>
									<td><a href="{{route('transaction_status.edit', $crud->trans_kode)}}" data-toggle="tooltip" title="Edit Status" style="color: #000;">{{$crud->trans_kode}} <i style="color: #e34836;" class="fa fa-search-plus"></i></a></td>
									<td>{{$crud->customer_nama}}</td>
									<td><a class="example-image-link" href="uploads/bukti/{{$crud->bukti_foto }}" data-lightbox="example-1"><img class="example-image" src="uploads/bukti/{{$crud->bukti_foto }}" height="100" width="100" alt="image-1" /></td>
									<td>{{$crud->created_at}}</td>
								</tr>
							</tbody>
							@endforeach
						</table>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
</div>
@endsection