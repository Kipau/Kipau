@extends('Layout.sadmin_layout')
@section('title','Product')
@section('c','class=active')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			List Product
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
						<a  class="btn  btn bg-maroon btn-flat margin" href="{{route('sproduct.create')}}">
							<i class="fa fa-plus"></i>
							Add
						</a>

					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table id="example1" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>ID Produk</th>
									<th>Nama</th>
									<th>Stok</th>
									<th>Harga</th>
									<th>Info</th>
									<th>Foto</th>
									<th>Created Date</th>
									<th>Last Update</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($cruds as $crud)
								<tr>
									<td>{{$crud->produk_id}}</td>
									<td>{{$crud->produk_nama}}</td>
									<td>{{$crud->produk_stok}}</td>
									<td>{{'Rp. '.strrev(implode('.',str_split(strrev(strval($crud->produk_harga)),3))).""}}</td>
									<td><?php echo strip_tags($crud->produk_info)?></td>
									<td><a class="example-image-link" href="uploads/produk/{{$crud->produk_foto }}" data-lightbox="example-1"><img class="example-image" src="uploads/produk/{{$crud->produk_foto }}" height="100" width="100" alt="image-1" /></td>
									<td>{{$crud->created_at}}</td>
									<td>{{$crud->updated_at}}</td>
									<td>
										<form method="POST" action="{{ route('sproduct.destroy', $crud->produk_id) }}" accept-charset="UTF-8">
											<input name="_method" type="hidden" value="DELETE">
											<input name="_token" type="hidden" value="{{ csrf_token() }}">
											<div class="tools" >
												<a href="{{route('sproduct.edit', $crud->produk_id)}}" class="btn btn-default" style="color: #dd4b39;"><i class="fa fa-edit"></i></a>

												<button type="submit" class="btn btn-default" style="color: #dd4b39;" onclick="return confirm('Anda yakin akan menghapus data ? {{$crud->produk_nama}}');" >
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