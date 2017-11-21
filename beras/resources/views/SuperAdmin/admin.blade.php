@extends('Layout.sadmin_layout')
@section('title','Admin')
@section('f','class=active')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			List Admin
		</h1>
		
	</section>
	@if(Session::has('alert-success')) 
	<div class="alert alert-success" > 
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
						<a  class="btn  btn bg-maroon btn-flat margin" href="{{route('sadmin.create')}}">
							<i class="fa fa-plus"></i>
							Add
						</a>

					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table id="example1" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>Username</th>
									<th>Nama</th>
									<th>foto</th>
									<th>Created Date</th>
									<th>Last Updated</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($cruds as $crud)
								<tr>
									<td>{{$crud->admin_username}}</td>
									<td>{{$crud->admin_nama}}</td>
									<td><img src="uploads/admin/{{$crud->admin_foto }}" height="100" width="100" alt=""></td>
									<td>{{$crud->created_at}}</td>
									<td>{{$crud->updated_at}}</td>
									<td>
										<form method="POST" action="{{ route('sadmin.destroy', $crud->admin_username) }}" accept-charset="UTF-8">
											<input name="_method" type="hidden" value="DELETE">
											<input name="_token" type="hidden" value="{{ csrf_token() }}">
											<div class="tools" >
												<a href="{{route('sadmin.edit', $crud->admin_username)}}" class="btn btn-default" style="color: #dd4b39;"><i class="fa fa-edit"></i></a>

												<button type="submit" class="btn btn-default" style="color: #dd4b39;" onclick="return confirm('Anda yakin akan menghapus data ? {{$crud->admin_username}}');" >
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