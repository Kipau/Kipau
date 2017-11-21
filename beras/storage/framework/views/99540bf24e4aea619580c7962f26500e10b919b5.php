<?php $__env->startSection('title','Add Payment'); ?>
<?php $__env->startSection('i','class=active'); ?>
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Add Payment
		</h1>
		
	</section>
	<?php if(Session::has('alert-success')): ?> 
	<div class="alert alert-success"> 
		<?php echo e(Session::get('alert-success')); ?> 
	</div> 
	<?php endif; ?>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-6">
				<div class="box box-danger">
					<form>
						<div class="box-header">
							<h3 class="box-title">Fill Data</h3>
						</div>
						<div class="box-body">
							<!-- Date dd/mm/yyyy -->
							<div class="col-md-12">
								<div class="form-group">
									<label>ID Trans</label>
									<select class="form-control" style="width: 100%;">
										<option selected="selected">a</option>
										<option>b</option>
										<option>c</option>
										<option>d</option>
										<option>e</option>
										<option>f</option>
										<option>g</option>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputFile">Image :</label>
									<input type="file" id="exampleInputFile">

									<p class="help-block">Example block-level help text here.</p>
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								
								

								

							</div>
							<div class="col-md-6">
								

							</div>
							<!-- /.box-body -->

						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-info ">Submit</button>
						</div>
					</form>
				</div>

			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.sadmin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>