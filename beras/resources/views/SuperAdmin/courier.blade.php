@extends('Layout.sadmin_layout')
@section('title','Courier')
@section('h','class=active')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			List Courier
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
						<a  class="btn  btn bg-maroon btn-flat margin" href="{{route('scourier.create')}}">
							<i class="fa fa-plus"></i>
							Add
						</a>

					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table id="example1" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>ID Kurir</th>
									<th>Nama Kurir</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($cruds as $crud)
								<tr>
									<td>{{$crud->kurir_id}}</td>
									<td>{{$crud->kurir_nama}}</td>
									<td>
										<form method="POST" action="{{ route('scourier.destroy', $crud->kurir_id) }}" accept-charset="UTF-8">
											<input name="_method" type="hidden" value="DELETE">
											<input name="_token" type="hidden" value="{{ csrf_token() }}">
											<div class="tools" >
												<a href="{{route('scourier.edit', $crud->kurir_id)}}" data-toggle="tooltip" title="Edit" class="btn btn-default" style="color: #dd4b39;"><i class="fa fa-edit"></i></a>

												<button type="submit" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color: #dd4b39;" onclick="return confirm('Anda yakin akan menghapus data ? {{$crud->kurir_nama}}');" >
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