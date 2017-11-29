<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<meta name="csrf-token" content="<?php echo e(Session::token()); ?>">
<head>
	<title>Mlatiharjo | <?php echo $__env->yieldContent('title'); ?></title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="/js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

<link href="/css/lightbox.css" rel="stylesheet"> <!-- display foto -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="/js/move-top.js"></script>
<script type="text/javascript" src="/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<style type="text/css">
.navbar-login
{
	width: 305px;
	padding: 10px;
	padding-bottom: 0px;
}

.navbar-login-session
{
	padding: 10px;
	padding-bottom: 0px;
	padding-top: 0px;
}

.icon-size
{
	font-size: 87px;
}
</style>
<!-- start-smoth-scrolling -->
</head>

<body>
	<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				
			</div>
			<div class="agile-login">
				<ul>
					<li><a href="<?php echo e(URL::to('register')); ?>"> Create Account </a></li>
					<?php 
					if (Session::get('customer_id') == "")
						{
							echo "<li><a href=".URL::to('login').">Login</a></li>";
						}

						// if (Session::get('nocart') == "yes")
						// {
						// 	echo '<script language="javascript">';
						// 	echo 'alert("Gagal Login")';
						// 	echo '</script>';
						
						// }
						?>

						<!-- <li><a href="<?php echo e(URL::to('login')); ?>">Login</a></li> -->
						

					</ul>

				</div>
				

				<?php 
				$nama = Session::get('customer_nama');
				$nama1 = explode(' ',trim($nama));

				if (Session::get('customer_id') != "")
					{
						echo '
						<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown" style="color: white" >
						<span class="glyphicon glyphicon-user"></span> 
						<strong>'.$nama1[0].'</strong>
						<span class="glyphicon glyphicon-chevron-down"></span>
						</a>
						<ul class="dropdown-menu">
						<li>
						<div class="navbar-login">
						<div class="row">
						<div class="col-lg-4">
						<p class="text-center">
						<span class="glyphicon glyphicon-user icon-size"></span>
						</p>
						</div>
						<div class="col-lg-8">
						<p class="text-left"><strong>'.Session::get('customer_nama').'</strong></p>
						<p class="text-left small">'.Session::get('customer_email').'</p>
						<p class="text-left">

						</p>
						</div>

						</div>
						</div>
						<div class="navbar-login">
						<div class="row">

						
						<div class="col-lg-12 text-center">
						<a class="btn btn-success" href="'.URL::to('cek_status').'">Check Transaction</a>

						</div>
						


						</div>
						</div>
						</li>
						<li class="divider"></li>
						<li>
						<div class="navbar-login navbar-login-session">
						<div class="row">
						<div class="col-lg-6">
						<p>
						<a class="btn btn-danger btn-block" href="'.URL::to('profile').'">Profile</a>
						</p>
						</div>
						<div class="col-lg-6">
						<p>
						<form method="POST" action="/logout_customer">
						'.csrf_field().'
						<input onclick="resetcart();" type="submit" value="Sign out" class="btn btn-danger btn-block" />
						</form>

						</p>
						</div>

						</div>
						</div>
						</li>
						</ul>
						</li>
						</ul>
						';
					}
					?>





					<div class="product_list_header">  
						<form action="#" method="post" class="last"> 
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="display" value="1">
							<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
						</form>  
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>

			<div class="logo_products">
				<div class="container">
					<!-- <div class="w3ls_logo_products_left1">
						<ul class="phone_email">
							

						</ul>
					</div>
					<div class="w3ls_logo_products_left">
					</div> -->
					<center>
						<a href="<?php echo e(URL::to('shop')); ?>"><img src="/img/logo.jpg" class="img-responsive"></a>
					</center>
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- //header -->
			<!-- navigation -->
			<div class="navigation-agileits">
				<div class="container">
					<nav class="navbar navbar-default">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header nav_2">
							<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div> 
						<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
							<ul class="nav navbar-nav">
								<li class="active"><a href="<?php echo e(route('shop.index')); ?>" class="act">Home</a></li>	
								<!-- Mega Menu -->
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Product<b class="caret"></b></a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="row">
											<div class="multi-gd-img">
												<ul class="multi-column-dropdown">
													<h6>All Product</h6>
													<?php $__currentLoopData = $nav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<li><a href="<?php echo e(route('shop.edit', $crud->produk_id)); ?>"><?php echo e($crud->produk_nama); ?></a></li>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</ul>
											</div>	

										</div>
									</ul>
								</li>
								
								<li><a href="<?php echo e(URL::to('contact')); ?>">Contact</a></li>
							</ul>

						</div>
					</nav>
				</div>
			</div>
			<?php echo $__env->yieldContent('content'); ?>
			<div class="footer">
				<div class="container">
					<div class="w3_footer_grids">
						<div class="col-md-3 w3_footer_grid">
							<h3>Contact</h3>

							<ul class="address">
								<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>DESA MLATIHARJO, KEC.GAJAH - KAB, DEMAK JAWA TENGAH -<span>INDONESIA.</span></li>
								<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@mlatiharjo.com</a></li>
								<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>(021) 213 213</li>
							</ul>
						</div>
						<div class="col-md-3 w3_footer_grid">
							<h3>Information</h3>
							<ul class="info"> 
								<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="<?php echo e(URL::to('contact')); ?>">Contact Us</a></li>
								<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="<?php echo e(URL::to('faqs')); ?>">FAQ's</a></li>
							</ul>
						</div>
						<div class="col-md-3 w3_footer_grid">
							<h3>Produk</h3>
							<ul class="info"> 
								<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="<?php echo e(URL::to('beras')); ?>">Beras Melati</a></li>
								<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="<?php echo e(URL::to('beras')); ?>">Beras Hitam</a></li>
								<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="<?php echo e(URL::to('beras')); ?>">Beras Merah</a></li>
								<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="<?php echo e(URL::to('beras')); ?>">Beras Brown</a></li>

							</ul>
						</div>
						<div class="col-md-3 w3_footer_grid">
							<h3>Profile</h3>
							<ul class="info"> 
								<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a onclick="addcart();" href="#">My Cart</a></li>
								<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="<?php echo e(URL::to('login')); ?>">Login</a></li>
								<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="<?php echo e(URL::to('register')); ?>">Create Account</a></li>
							</ul>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>

				<div class="footer-copy">

					<div class="container">
						<p>© 2017 Super Market. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
					</div>
				</div>

			</div>	
			<div class="footer-botm">
				<div class="container">
					<div class="w3layouts-foot">
						
					</div>
					
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- //footer -->	

			<!-- Bootstrap Core JavaScript -->
			<script src="js/bootstrap.min.js"></script>

			<!-- top-header and slider -->
			<!-- here stars scrolling icon -->
			<script type="text/javascript">
				$(document).ready(function() {
					paypal.minicart.render();
				// document.getElementById("merk").innerHTML = paypal.minicart.cart.items(0).get('item_name');
				// alert(paypal.minicart.cart.items(0).get('item_name'));
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
				*/

				$().UItoTop({ easingType: 'easeOutQuart' });

			});
		</script>
		<!-- //here ends scrolling icon -->
		<script src="/js/minicart.js"></script>

		<script src="/js/lightbox.js"></script>
		<script>
	// Mini Cart
	// paypal.minicart.render();

	// paypal.minicart.cart.on('add', function (evt) {
	// 	var items = this.items(),
	// 	len = items.length,
	// 	total = 0,
	// 	i;
	// 		// Count the number of each item in the cart
	// 		for (i = 0; i < len; i++) {
	// 			alert(items[i].get('item_name'));
	// 		}
	// 	});


	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}

	function resetcart()
	{
		paypal.minicart.reset();
	}

	function addcart()
	{
		var produk = [];
		var qty = [];
		var items = paypal.minicart.cart.items();
		for (i = 0; i < items.length; i++)
		{
			produk.push(items[i].get("item_name"));
			qty.push(items[i].get("quantity"));
		}

		$.post('http://localhost:8000/addcart', {
			_token: $('meta[name=csrf-token]').attr('content'),
			produk: produk,
			qty: qty
		}
		)
		.done(function(data) {
			 // alert(data);
			 window.location.href = "http://localhost:8000/checkout";
			// $('#example1').append(data);
		})
		.fail(function() {
			alert("error");
		});
	}
</script>
<!-- main slider-banner -->
<script src="/js/skdslider.min.js"></script>
<link href="/css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});

		jQuery('#responsive').change(function(){
			$('#responsive_wrapper').width(jQuery(this).val());
		});

	});
</script>	
<!-- //main slider-banner --> 
</body>
</html>