@extends('Layout.admin_layout')
@section('title','Buyers Data')
@section('d','class=active')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			List Buyers Data
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
			<div class="col-xs-6">
				<div class="form-group">
					<label>Date range:</label>

					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="text" class="form-control pull-right" id="reservation">
					</div>
					<!-- /.input group -->
				</div>
			</div>
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
									<th>Kode Transaksi</th>
									<th>Nama Produk</th>
									<th>Quantity</th>
									<th>Harga</th>
									<th>Total</th>
									<th>Tanggal</th>
								</tr>
							</thead>
							<tbody>
								@foreach($cruds as $crud)
								<tr>
									<td>{{$crud->trans_kode}}</td>
									<td>{{$crud->produk_nama}}</td>
									<td>{{$crud->order_qty}}</td>
									<td>{{$crud->produk_harga}}</td>
									<td>{{$crud->order_total}}</td>
									<td>{{$crud->created_at}}</td>
								</tr>
								@endforeach
							</tbody>							
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
<!-- date-range-picker -->

@endsection