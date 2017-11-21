<?php $__env->startSection('title','Update Status'); ?>
<?php $__env->startSection('b','class=active'); ?>
<?php $__env->startSection('bb','class=active'); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Update Status
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
				<?php $__currentLoopData = $cruds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<form action="<?php echo e(route('transaction_status.update', $crud->trans_id)); ?>" method="post" enctype="multipart/form-data">
						<input name="_method" type="hidden" value="PATCH">
						<?php echo e(csrf_field()); ?>

						<div class="box-header">
							<h3 class="box-title">Update Data</h3>
						</div>
						<div class="box-body">
							<!-- Date dd/mm/yyyy -->
							<div class="col-md-12">
								<div class="form-group">
									<label>Pembayaran :</label>


									<!-- radio -->
									<div class="form-group">
										<div class="radio">
											<label>
												<?php 
												$resi = $crud->trans_resi;
												$cek1 = "";
												$cek2 = "";
												$cek3 = "";
												$cek4 = "";
												$cek5 = "";
												$cek6 = "";
												if ($crud->trans_status_pembayaran == "Success")
													$cek1 = 'checked';
												else if ($crud->trans_status_pembayaran == "Waiting")
													$cek2 = 'checked';
												else if ($crud->trans_status_pembayaran == "Canceled")
													$cek3 = 'checked';

												if ($crud->trans_status_pengiriman == "Delivered")
													$cek4 = 'checked';
												else if ($crud->trans_status_pengiriman == "On Delivery")
													$cek5 = 'checked';
												else if ($crud->trans_status_pengiriman == "Canceled")
													$cek6 = 'checked';
												?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

												<input type="radio" name="pembayaran" id="optionsRadios1" value="Success" <?php echo e($cek1); ?>>
												Success
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="pembayaran" id="optionsRadios2" value="Waiting" <?php echo e($cek2); ?>>
												Waiting
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="pembayaran" id="optionsRadios3" value="Canceled" <?php echo e($cek3); ?>>
												Canceled
											</label>
										</div>
									</div>
									

									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<label>Pengiriman :</label>

									<div class="form-group">
										<div class="radio">
											<label>
												<input type="radio" name="pengiriman" id="optionsRadios1" value="Delivered" <?php echo e($cek4); ?>>
												Delivered
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="pengiriman" id="optionsRadios2" value="On Delivery" <?php echo e($cek5); ?>>
												On Delivery
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="pengiriman" id="optionsRadios3" value="Canceled" <?php echo e($cek6); ?>>
												Canceled
											</label>
										</div>
									</div>
									
									<!-- /.input group -->
								</div>
								<div class="form-group">
									<label>No. Resi :</label>

									
									<input type="text" name="resi" class="form-control" value="<?php echo e($resi); ?>">
									
									<!-- /.input group -->
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
<?php echo $__env->make('Layout.admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>