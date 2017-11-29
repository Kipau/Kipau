<?php $__env->startSection('title','Contact'); ?>
<?php $__env->startSection('j','class=active'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('ckedit','src=/ckeditor/ckeditor.js'); ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Contact
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
			<div class="col-md-12">
				<div class="box box-danger">
					<form action="<?php echo e(route('product.store')); ?>" method="post" enctype="multipart/form-data">
						<?php echo e(csrf_field()); ?>

						<div class="box-header">
							<h3 class="box-title">Fill Data</h3>
						</div>
						<div class="box-body">
							<!-- Date dd/mm/yyyy -->
							<div class="col-md-6">
								<div class="form-group">
									<label>Email :</label>


									<input type="text" name="nama" class="form-control">
									<?php echo $errors->first('nama', '<p class="help-block" style="color:red">:message</p>'); ?>

									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<label>No telp :</label>

									
									<input type="text" name="stok" class="form-control">
									<?php echo $errors->first('stok', '<p class="help-block" style="color:red">:message</p>'); ?>

									
									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								

								<!-- /.form group -->

								

							</div>
							
							<div class="col-md-12">
								<div class="form-group">
									<label>Alamat</label>
									<textarea class="form-control" name="info" rows="3" placeholder="Enter ..." id="editor1"></textarea>
									<?php echo $errors->first('info', '<p class="help-block" style="color:red">:message</p>'); ?>

								</div>
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