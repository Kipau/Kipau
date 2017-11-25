@extends('Layout.layout')
@section('title','Contact')
@section('content')
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="{{route('shop.index')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
			<li class="active">Contact</li>
		</ol>
	</div>
</div>
<!-- //breadcrumbs -->
<!-- contact -->
<div class="about">
	<h2 class="w3_agile_header">Sekilas <span> Perusahaan</span></h2>
	<div class="container">
		<div class="agileinfo_single">
			<div class="col-md-12">
				<div class="w" style="width: 100%">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="about">
	<div class="w3_agileits_contact_grids">
		<div class="col-md-9 w3_agileits_contact_grid_left">
			<div class="agile_map">
				<iframe src="https://maps.google.com/maps?q=Mlatiharjo%2C%20Demak%20Regency%2C%20Central%20Java%2C%20Indonesia&t=&z=14&ie=UTF8&iwloc=&output=embed"" style="border:0"></iframe>
			</div>
			<div class="agileits_w3layouts_map_pos">
				<div class="agileits_w3layouts_map_pos1">
					<h3>Contact Info</h3>
					<p>DESA MLATIHARJO,KEC.GAJAH - KAB, DEMAK JAWA TENGAH - INDONESIA</p>
					<ul class="wthree_contact_info_address">
						<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@mlatiharjo.com</a></li>
						<li><i class="fa fa-phone" aria-hidden="true"></i>(021) 232 232</li>
					</ul>

				</div>
			</div>
		</div>

		<div class="clearfix"> </div>
	</div>
</div>
<!-- contact -->
@endsection