@extends('Layout.admin_layout')
@section('title','Transaction Status')
@section('b','class=active')
@section('bb','class=active')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Transaction Status
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
									<th>Kode Transaksi</th>
									<th>Status Pembayaran</th>
									<th>Status Pengiriman</th>
									<th>No Resi</th>
									<th>Last Update</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							@foreach($cruds as $crud)
								<tr>
									<td>{{$crud->trans_kode}}</td>
									<?php 
									if ($crud->trans_status_pembayaran == "Success")
										echo '<td><span class="label label-success">Success</span></td>';
									else if ($crud->trans_status_pembayaran == "Waiting")
										echo '<td><span class="label label-warning">Waiting</span></td>';
									else if ($crud->trans_status_pembayaran == "Canceled")
										echo '<td><span class="label label-danger">Canceled</span></td>';
									else
										echo "<td></td>";

									if ($crud->trans_status_pengiriman == "Delivered")
										echo '<td><span class="label label-success">Delivered</span></td>';
									else if ($crud->trans_status_pengiriman == "On Delivery")
										echo '<td><span class="label label-warning">On Delivery</span></td>';
									else if ($crud->trans_status_pengiriman == "Canceled")
										echo '<td><span class="label label-danger">Canceled</span></td>';
									else
										echo "<td></td>";
									?>
									<td>{{$crud->trans_resi}}</td>
									<td>{{$crud->updated_at}}</td>
									<td>
										<div class="tools" >
											<a href="{{route('transaction_status.edit', $crud->trans_kode)}}" data-toggle="tooltip" title="Edit" class="btn btn-default" style="color: #dd4b39;"><i class="fa fa-edit"></i></a>
										</div>
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