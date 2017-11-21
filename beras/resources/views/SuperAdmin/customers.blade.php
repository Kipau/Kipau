@extends('Layout.sadmin_layout')
@section('title','Customers')
@section('e','class=active')
@section('content')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			List Customers
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
					<div class="box-header">

						<h3 class="box-title">Click 'Add' button for adding new data</h3>
						<a  class="btn  btn bg-maroon btn-flat margin" href="{{URL::to('scustomers_add')}}">
							<i class="fa fa-plus"></i>
							Add
						</a>

					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table id="example1" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>ID Customer</th>
									<th>Nama</th>
									<th>Email</th>
									<th>No Hp</th>
									<th>Provinsi</th>
									<th>Kota</th>
									<th>Alamat</th>
									<th>Kode Pos</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($cruds as $crud)
								<tr>
									<td>{{$crud->customer_id}}</td>
									<td>{{$crud->customer_nama}}</td>
									<td>{{$crud->customer_email}}</td>
									<td>{{$crud->customer_nohp}}</td>
									<td>{{$crud->customer_provinsi}}</td>
									<td>{{$crud->customer_kota}}</td>
									<td>{{$crud->customer_alamat}}</td>
									<td>{{$crud->customer_kodepos}}</td>
									<td>
										<form method="POST" action="{{ route('scustomers.destroy', $crud->customer_id) }}" accept-charset="UTF-8">
											<input name="_method" type="hidden" value="DELETE">
											<input name="_token" type="hidden" value="{{ csrf_token() }}">
											<div class="tools" >
												<a href="{{route('scustomers.edit', $crud->customer_id)}}" class="btn btn-default" style="color: #dd4b39;"><i class="fa fa-edit"></i></a>

												<button type="submit" data-toggle="tooltip" title="Delete" class="btn btn-default" style="color: #dd4b39;" onclick="return confirm('Anda yakin akan menghapus data ? {{$crud->customer_nama}}');" >
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
				</div>          <!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
</div>
@endsection