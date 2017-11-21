@extends('Layout.sadmin_layout')
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

						<h3 class="box-title">Click 'Add' button for adding new data</h3>
						<a  class="btn  btn bg-maroon btn-flat margin" href="#">
							<i class="fa fa-plus"></i>
							Add
						</a>

					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table id="example1" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>ID Order</th>
									<th>ID Transaksi</th>
									<th>ID Produk</th>
									<th>Order Qty</th>
									<th>Total Harga</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($cruds as $crud)
								<tr>
									<td>{{$crud->order_id}}</td>
									<td>{{$crud->trans_id}}</td>
									<td>{{$crud->produk_id}}</td>
									<td>{{$crud->order_qty}}</td>
									<td>{{$crud->order_total}}</td>
									<td>
										<form method="POST" action="{{ route('sbuyers_data.destroy', $crud->order_id) }}" accept-charset="UTF-8">
											<input name="_method" type="hidden" value="DELETE">
											<input name="_token" type="hidden" value="{{ csrf_token() }}">
											<div class="tools" >

												<button type="submit" class="btn btn-default" style="color: #dd4b39;" onclick="return confirm('Anda yakin akan menghapus data dengan ID {{$crud->order_id}} ?');" >
													<i class="fa fa-trash-o"></i>
												</button> 
											</div>
										</form>
									</td>
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
@endsection