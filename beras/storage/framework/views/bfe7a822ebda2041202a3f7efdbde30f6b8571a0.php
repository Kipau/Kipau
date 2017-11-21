<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
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
		<!-- start-smoth-scrolling -->
	</head>
	
	<body>
		<!-- header -->
		<div class="agileits_header">
			<div class="container">
				<div class="w3l_offers">
					<p>SALE UP TO 70% OFF. USE CODE "SALE70%" . <a href="<?php echo e(URL::to('beras')); ?>">SHOP NOW</a></p>
				</div>
				<div class="agile-login">
					<ul>
						<li><a href="<?php echo e(URL::to('register')); ?>"> Create Account </a></li>
						<li><a href="<?php echo e(URL::to('login')); ?>">Login</a></li>
						<li><a href="contact.html">Help</a></li>

					</ul>
				</div>
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
				<div class="w3ls_logo_products_left1">
					<ul class="phone_email">
						<li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : (+0123) 234 567</li>

					</ul>
				</div>
				<div class="w3ls_logo_products_left">
					<a href="<?php echo e(URL::to('index')); ?>"><img src="/img/r.jpg" class="img-responsive"></a>
				</div>
				<div class="w3l_search">
					<form action="#" method="post">
						<input type="search" name="Search" placeholder="Search for a Product..." required="">
						<button type="submit" class="btn btn-default search" aria-label="Left Align">
							<i class="fa fa-search" aria-hidden="true"> </i>
						</button>
						<div class="clearfix"></div>
					</form>
				</div>

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
							<?php $__currentLoopData = $nav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><a href="<?php echo e(route('shop.edit', $crud->produk_id)); ?>"><?php echo e($crud->produk_nama); ?></a></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
							<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="<?php echo e(URL::to('checkout')); ?>">My Cart</a></li>
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
					<ul>
						<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="payment-w3ls">	
					<img src="images/card.png" alt=" " class="img-responsive">
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
		<script src="js/minicart.min.js"></script>
		<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
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