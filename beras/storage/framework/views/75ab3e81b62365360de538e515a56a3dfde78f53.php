<?php $__env->startSection('title','Update Bank'); ?>
<?php $__env->startSection('g','class=active'); ?>
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Update Bank
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
							<h3 class="box-title">Update Data</h3>
						</div>
						<div class="box-body">
							<!-- Date dd/mm/yyyy -->
							<div class="col-md-12">
								<div class="form-group">
									<label>Nama :</label>


									<input type="text" class="form-control">

									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<label>No.Rek :</label>

									
									<input type="text" class="form-control">
									
									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<div class="form-group">
										
										<div class="input-group">
											<span class="input-group-addon">A/N</span>
											<input type="text" class="form-control">
										</div>
									</div>
								</div>
								<!-- /.form group -->

								

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
<?php echo $__env->make('Layout.admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>