@extends('Layout.admin_layout')
@section('title','Bank')
@section('g','class=active')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			List Bank
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

						<h3 class="box-title">Click 'Add' button for adding new data</h3>
						<a  class="btn  btn bg-maroon btn-flat margin" href="{{route('bank.create')}}">
							<i class="fa fa-plus"></i>
							Add
						</a>

					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table id="example1" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama Bank</th>
									<th>No. Rekening</th>
									<th>Atas Nama</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php $no = 0 ?>
							@foreach($cruds as $crud)
							<?php $no++ ?>
								<tr>
									<td>{{$no}}</td>
									<td>{{$crud->bank_nama}}</td>
									<td>{{$crud->bank_norek}}</td>
									<td>{{$crud->bank_an}}</td>
									<td>
										<form method="POST" action="{{ route('sbank.destroy', $crud->bank_id) }}" accept-charset="UTF-8">
											<input name="_method" type="hidden" value="DELETE">
											<input name="_token" type="hidden" value="{{ csrf_token() }}">
											<div class="tools" >
												<a href="{{route('sbank.edit', $crud->bank_id)}}" data-toggle="tooltip" title="Edit" class="btn btn-default" style="color: #dd4b39;"><i class="fa fa-edit"></i></a>

												<button type="submit" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color: #dd4b39;" onclick="return confirm('Anda yakin akan menghapus data ? {{$crud->bank_nama}}');" >
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