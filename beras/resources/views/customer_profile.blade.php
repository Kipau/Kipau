@extends('Layout.layout')
@section('title','Profile')
@section('content')
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="{{route('shop.index')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
			<li class="active">Profile</li>
		</ol>
	</div>
</div>
<!-- //breadcrumbs -->
<!-- contact -->
<div class="about">
	<div class="w3_agileits_contact_grids">
		<div class="col-md-4 products-left">
			<div class="categories">
				<h2>Action</h2>
				<ul class="cate">

					<li><a href="{{URL::to('profile')}}"><i class="fa fa-arrow-right" aria-hidden="true"></i>Profile</a></li>
					<li><a href="{{URL::to('profile_password')}}"><i class="fa fa-arrow-right" aria-hidden="true"></i>Password</a></li>
					<li><a href="{{URL::to('profile_alamat')}}"><i class="fa fa-arrow-right" aria-hidden="true"></i>Alamat</a></li>

				</ul>
			</div>																																												
		</div>
		<div class="col-md-6 w3_agileits_contact_grid_right">
			<h2 class="w3_agile_header">Profile<span></span></h2>
			<form action="{{route('profile.update', Session::get('customer_id'))}}" method="post" name="form1" enctype="multipart/form-data">
				<input name="_method" type="hidden" value="PATCH">
				{{csrf_field()}}
				@foreach($profs as $prof)								
				<span class="input input--ichiro">
					<input class="input__field input__field--ichiro" type="text" id="input-25" name="nama" placeholder=" " required="" value="{{$prof->customer_nama}}" />
					<label class="input__label input__label--ichiro" for="input-25">
						<span class="input__label-content input__label-content--ichiro">Your Name</span>
					</label>
				</span>
				<span class="input input--ichiro">
					<input class="input__field input__field--ichiro" type="email" id="input-26" name="email" placeholder=" " required="" value="{{$prof->customer_email}}"/>
					<label class="input__label input__label--ichiro" for="input-26">
						<span class="input__label-content input__label-content--ichiro">Your Email</span>
					</label>
				</span>
				<input type="submit" value="Submit">
			</form>
			@endforeach
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- contact -->
@endsection