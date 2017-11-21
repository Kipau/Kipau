@extends('Layout.layout')
@section('title','Login')
@section('content')
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="{{route('shop.index')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
			<li class="active">Login Page</li>
		</ol>
	</div>
</div>
<!-- //breadcrumbs -->
<!-- login -->
<div class="login">
	<div class="container">
		<h2>Login Form</h2>
		
		<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
			<form action="{{route('login.store')}}" method="post">
				{{csrf_field()}}
				<input type="text"  name="email" placeholder="Email" required=" " >
				<input type="password" name="password" placeholder="Password" required=" " >
				<div class="forgot">
					<a href="#">Forgot Password?</a>
				</div>
				<input onclick="resetcart();" type="submit" value="Login">
			</form>
		</div>
		<h4>For New People</h4>
		<p><a href="{{URL::to('register')}}">Register Here</a> (Or) go back to <a href="{{URL::to('shp')}}">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
	</div>
</div>
@endsection

<script type="text/javascript">

function resetcart()
{
	paypal.minicart.reset();
}
</script>