<?php $__env->startSection('title','Update Admin'); ?>
<?php $__env->startSection('f','class=active'); ?>
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Update Admin
		</h1>
		
	</section>
	<?php if(Session::has('alert-warning')): ?> 
	<div class="alert alert-warning" style="font-size:18px; text-align:center;"> 
		<?php echo e(Session::get('alert-warning')); ?> 
	</div> 
	<?php endif; ?>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-danger">
					<form action="<?php echo e(route('sadmin.update', $cruds->admin_username)); ?>" method="post" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PATCH">
                    <?php echo e(csrf_field()); ?>

						<div class="box-header">
							<h3 class="box-title">Fill Data</h3>
						</div>
						<div class="box-body">
							<!-- Date dd/mm/yyyy -->
							<div class="col-md-6">
								<div class="form-group">
									<label>Username :</label>


									<input type="text" name="username" value="<?php echo e($cruds->admin_username); ?>" class="form-control">
									<?php echo $errors->first('username', '<p class="help-block" style="color:red">:message</p>'); ?>

									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<label>New Password :</label>

									
									<input type="Password" name="password" class="form-control">

									<!-- /.input group -->
								</div>
								<div class="form-group">
									<label>Password Confirmation :</label>

									
									<input type="Password" name="password2" class="form-control">
									
									<!-- /.input group -->
								</div>
								
								<!-- /.form group -->

								
							</div>

							<div class="col-md-6">
							<div class="form-group">
									<label>Name :</label>

									
									<input type="text" name="nama" value="<?php echo e($cruds->admin_nama); ?>" class="form-control">
									<?php echo $errors->first('nama', '<p class="help-block" style="color:red">:message</p>'); ?>

									<!-- /.input group -->
								</div>
								<div class="form-group">
								<label for="exampleInputFile">Image :</label>
								<img src="/uploads/admin/<?php echo e($cruds->admin_foto); ?>" height="100" width="100" alt="gambar" id="fotoadmin" name="fotoadmin">
									<input type="file" name="foto" id="exampleInputFile" onchange="readURL(this);">

									<p class="help-block">Example block-level help text here.</p>
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

<script type="text/javascript">

	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#fotoadmin').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
<?php echo $__env->make('Layout.sadmin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>