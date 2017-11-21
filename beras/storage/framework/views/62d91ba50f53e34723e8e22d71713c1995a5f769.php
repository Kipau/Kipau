<?php $__env->startSection('title','Add Customers'); ?>
<?php $__env->startSection('e','class=active'); ?>
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Add Customers
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
					<form>
						<div class="box-header">
							<h3 class="box-title">Fill Data</h3>
						</div>
						<div class="box-body">
							<!-- Date dd/mm/yyyy -->
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama :</label>


									<input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">

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
										<input type="email" class="form-control">
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
										<input type="text" class="form-control" data-inputmask="'mask': ['9999-9999-9999']" data-mask="">
									</div>
									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- IP mask -->
								<div class="form-group">
									<div class="form-group">
										<label>Alamat :</label>
										<textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
									</div>
									<!-- /.input group -->
								</div>
								<!-- /.form group -->

							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Kode Pos:</label>

									<input type="text" class="form-control" >

									<!-- /.input group -->
								</div>
								<!-- /.form group -->


								<!-- phone mask -->
								<div class="form-group">
									<label>Provinsi :</label>


									<input type="text" class="form-control" >

									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<label>Kota :</label>

									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-home"></i>
										</div>
										<input type="text" class="form-control" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask="">
									</div>
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