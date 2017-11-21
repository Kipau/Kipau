<?php $__env->startSection('title','Edit Customers'); ?>
<?php $__env->startSection('e','class=active'); ?>
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Edit Customers
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
					<form action="<?php echo e(route('scustomers.update', $cruds->customer_id)); ?>" method="post" enctype="multipart/form-data">
					<input name="_method" type="hidden" value="PATCH">
					<?php echo e(csrf_field()); ?>

						<div class="box-header">
							<h3 class="box-title">Fill Data</h3>
						</div>
						<div class="box-body">
							<!-- Date dd/mm/yyyy -->
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama :</label>


									<input type="text" name="nama" class="form-control" value="<?php echo e($cruds->customer_nama); ?>">
									<?php echo $errors->first('nama', '<p class="help-block" style="color:red">:message</p>'); ?>

									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<label>Email :</label>

									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-envelope"></i>
										</div>
										<input type="email" name="email" class="form-control" value="<?php echo e($cruds->customer_email); ?>">
										<?php echo $errors->first('email', '<p class="help-block" style="color:red">:message</p>'); ?>

									</div>
									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<label>No.Hp :</label>

									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-phone"></i>
										</div>
										<input type="text" name="nohp" class="form-control" data-inputmask="'mask': ['9999-9999-9999']" data-mask="" value="<?php echo e($cruds->customer_nohp); ?>">
										<?php echo $errors->first('nohp', '<p class="help-block" style="color:red">:message</p>'); ?>

									</div>
									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- IP mask -->
								<div class="form-group">
									<div class="form-group">
										<label>Alamat :</label>
										<textarea class="form-control" name="alamat" rows="3" placeholder="Enter ..."><?php echo e($cruds->customer_alamat); ?></textarea>
										<?php echo $errors->first('alamat', '<p class="help-block" style="color:red">:message</p>'); ?>

									</div>
									<!-- /.input group -->
								</div>
								<!-- /.form group -->

							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Kelurahan:</label>

									<input type="text" name="kelurahan" class="form-control" value="<?php echo e($cruds->customer_kelurahan); ?>">
									<?php echo $errors->first('kelurahan', '<p class="help-block" style="color:red">:message</p>'); ?>

									<!-- /.input group -->
								</div>
								<div class="form-group">
									<label>Kecamatan:</label>

									<input type="text" name="kecamatan" class="form-control" value="<?php echo e($cruds->customer_kecamatan); ?>">
									<?php echo $errors->first('kecamatan', '<p class="help-block" style="color:red">:message</p>'); ?>

									<!-- /.input group -->
								</div>
								
								<div class="form-group">
									<label>Kota :</label>

									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-home"></i>
										</div>
										<input type="text" name="kota" class="form-control" value="<?php echo e($cruds->customer_kota); ?>">
										<?php echo $errors->first('kota', '<p class="help-block" style="color:red">:message</p>'); ?>

									</div>
									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<label>Provinsi :</label>


									<input type="text" name="provinsi" class="form-control" value="<?php echo e($cruds->customer_provinsi); ?>">
									<?php echo $errors->first('provinsi', '<p class="help-block" style="color:red">:message</p>'); ?>

									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								
								<div class="form-group">
									<label>Kode Pos:</label>

									<input type="text" name="kodepos" class="form-control" value="<?php echo e($cruds->customer_kodepos); ?>">
									<?php echo $errors->first('kodepos', '<p class="help-block" style="color:red">:message</p>'); ?>

									<!-- /.input group -->
								</div>
								<!-- /.form group -->


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