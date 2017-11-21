<?php $__env->startSection('title','Profile Password'); ?>
<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="<?php echo e(route('shop.index')); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
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

					<li><a href="<?php echo e(URL::to('profile')); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i>Profile</a></li>
					<li><a href="<?php echo e(URL::to('profile_password')); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i>Password</a></li>
					<li><a href="<?php echo e(URL::to('profile_alamat')); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i>Alamat</a></li>

				</ul>
			</div>																																												
		</div>
		<div class="col-md-6 w3_agileits_contact_grid_right">
			<h2 class="w3_agile_header">Profile<span></span></h2>

			<form action="<?php echo e(route('profile_password.update', Session::get('customer_id'))); ?>" method="post" name="form1" enctype="multipart/form-data">
				<input name="_method" type="hidden" value="PATCH">
				<?php echo e(csrf_field()); ?>


				<span class="input input--ichiro">
					<input class="input__field input__field--ichiro" type="Password" id="input-25" name="curpass" placeholder=" " required="" />
					<label class="input__label input__label--ichiro" for="input-25">
						<span class="input__label-content input__label-content--ichiro">Current Password</span>
					</label>
				</span>
				<span class="input input--ichiro">
					<input class="input__field input__field--ichiro" type="Password" id="input-26" name="newpass" placeholder=" " required="" />
					<label class="input__label input__label--ichiro" for="input-26">
						<span class="input__label-content input__label-content--ichiro">Password</span>
					</label>
				</span>
				<span class="input input--ichiro">
					<input class="input__field input__field--ichiro" type="Password" id="input-27" name="conpass" placeholder=" " required="" />
					<label class="input__label input__label--ichiro" for="input-27">
						<span class="input__label-content input__label-content--ichiro">Confirm</span>
					</label>
				</span>
				<input type="submit" value="Submit">
			</form>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- contact -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>