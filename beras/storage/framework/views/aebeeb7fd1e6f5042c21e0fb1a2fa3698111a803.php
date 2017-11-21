<?php $__env->startSection('title','Register'); ?>
<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="<?php echo e(route('shop.index')); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
			<li class="active">Register Page</li>
		</ol>
	</div>
</div>
<!-- //breadcrumbs -->
<!-- register -->
<div class="register">
	<div class="container">
		<?php if(Session::has('alert-warning')): ?> 
		<div class="alert alert-warning" style="font-size:18px; text-align:center;"> 
			<?php echo e(Session::get('alert-warning')); ?> 
		</div> 
		<?php endif; ?>
		<h2>Register Here</h2>
		<div class="login-form-grids">
			<h5>profile information</h5>
			<form action="<?php echo e(route('custshop.store')); ?>" method="post" enctype="multipart/form-data">
				<?php echo e(csrf_field()); ?>

				<input type="text" name="fname" placeholder="First Name..." required=" " >
				<input type="text" name="lname" placeholder="Last Name..." required=" " >


				<h6>Login information</h6>

				<input type="email" name="email" placeholder="Email Address" required=" " >
				<input type="password" name="pass1" placeholder="Password" required=" " >
				<input type="password" name="pass2" placeholder="Password Confirmation" required=" " >
				<div class="register-check-box">
					<div class="check">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>I accept the terms and conditions</label>
					</div>
				</div>
				<input type="submit" value="Register">
			</form>
		</div>
		<div class="register-home">
			<a href="index.html">Home</a>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>