@extends('Layout.sadmin_layout')
@section('title','Transaction')
@section('b','class=active')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			List Transaction
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
									<th>ID Transaksi</th>
									<th>Kode Transaksi</th>
									<th>ID Customer</th>
									<th>ID Bank</th>
									<th>ID Kurir</th>
									<th>Total</th>
									<th>Status Pembayaran</th>
									<th>Status Pengiriman</th>
									<th>No Resi</th>
									<th>Created Date</th>
									<th>Last Update</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($cruds as $crud)
								<tr>
									<td>{{$crud->trans_id}}</td>
									<td>{{$crud->trans_kode}}</td>
									<td>{{$crud->customer_id}}</td>
									<td>{{$crud->bank_id}}</td>
									<td>{{$crud->kurir_id}}</td>
									<td>{{$crud->trans_total}}</td>
									<?php 
									if ($crud->trans_status_pembayaran == "Success")
										echo '<td><span class="label label-success">Success</span></td>';
									else if ($crud->trans_status_pembayaran == "Waiting")
										echo '<td><span class="label label-warning">Waiting</span></td>';
									else if ($crud->trans_status_pembayaran == "Canceled")
										echo '<td><span class="label label-danger">Canceled</span></td>';

									if ($crud->trans_status_pengiriman == "Delivered")
										echo '<td><span class="label label-success">Delivered</span></td>';
									else if ($crud->trans_status_pengiriman == "On Delivery")
										echo '<td><span class="label label-warning">On Delivery</span></td>';
									else if ($crud->trans_status_pengiriman == "Canceled")
										echo '<td><span class="label label-danger">Canceled</span></td>';
									?>
									<td>{{$crud->trans_resi}}</td>
									<td>{{$crud->created_at}}</td>
									<td>{{$crud->updated_at}}</td>
									<td>
										<form method="POST" action="{{ route('stransaction.destroy', $crud->trans_id) }}" accept-charset="UTF-8">
											<input name="_method" type="hidden" value="DELETE">
											<input name="_token" type="hidden" value="{{ csrf_token() }}">
											<div class="tools" >
												<button type="submit" class="btn btn-default" style="color: #dd4b39;" onclick="return confirm('Anda yakin akan menghapus data ? {{$crud->customer_nama}}');" >
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