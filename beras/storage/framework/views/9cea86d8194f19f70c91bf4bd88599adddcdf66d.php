<?php $__env->startSection('title','Contact'); ?>
<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="<?php echo e(route('shop.index')); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Contact</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- contact -->
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>