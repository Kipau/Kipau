@extends('Layout.admin_layout')
@section('title','Buyers Data')
@section('d','class=active')
@section('content')
<meta name="csrf-token" content="{{ Session::token() }}">
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			List Buyers Data<?php 
				if (isset($dari))
				{
					$date1=date_create($dari);
					$date2=date_create($sampai);
					echo ' '.date_format($date1,"d/M/Y").' - '.date_format($date2,"d/M/Y");
				}
			 ?>
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
						<input type="text" class="form-control pull-left" id="reservation" onchange="GetRange();">
					</div>
					<form action="{{route('buyers_data.store')}}" method="post" name="form1" enctype="multipart/form-data">
						{{csrf_field()}}
						<input type="text" name="dari" id="dari" value="" style="display: none;">
						<input type="text" name="sampai" id="sampai" value="" style="display: none;">
						<button type="submit" class="btn btn-info ">Get Data</button>
						
					</form>

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

<script type="text/javascript">
	function cb(start, end) {
		document.getElementById("dari").value = start.format('YYYY-MM-DD');
		document.getElementById("sampai").value = end.format('YYYY-MM-DD')+' 23:59:59';
	}

	function GetRange()
	{
		$.post('http://localhost:8000/getrange', {
			_token: $('meta[name=csrf-token]').attr('content')
		}
		)
		.done(function(data) {
			$('#isi').html(data);
		})
		.fail(function() {
			alert( "error" );
		});
	}
</script>
