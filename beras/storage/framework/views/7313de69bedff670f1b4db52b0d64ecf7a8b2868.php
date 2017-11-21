<?php $__env->startSection('title','Login'); ?>
<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="<?php echo e(route('shop.index')); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
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
			<form action="<?php echo e(route('login.store')); ?>" method="post">
				<?php echo e(csrf_field()); ?>

				<input type="text"  name="email" placeholder="Email" required=" " >
				<input type="password" name="password" placeholder="Password" required=" " >
				<div class="forgot">
					<a href="#">Forgot Password?</a>
				</div>
				<input type="submit" value="Login">
			</form>
		</div>
		<h4>For New People</h4>
		<p><a href="registered.html">Register Here</a> (Or) go back to <a href="index.html">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>