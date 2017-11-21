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
					<form action="<?php echo e(route('bank.update', $cruds->bank_id)); ?>" method="post" name="form1" enctype="multipart/form-data">
					<input name="_method" type="hidden" value="PATCH">
						<?php echo e(csrf_field()); ?>

						<div class="box-header">
							<h3 class="box-title">Update Data</h3>
						</div>
						<div class="box-body">
							<!-- Date dd/mm/yyyy -->
							<div class="col-md-12">
								<div class="form-group">
									<label>Nama :</label>


									<input type="text" name="nama" class="form-control" value="<?php echo e($cruds->bank_nama); ?>">
									<?php echo $errors->first('nama', '<p class="help-block" style="color:red">:message</p>'); ?>

									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<label>No.Rek :</label>

									
									<input type="text" name="norek" class="form-control" value="<?php echo e($cruds->bank_norek); ?>">
									<?php echo $errors->first('norek', '<p class="help-block" style="color:red">:message</p>'); ?>

									
									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<div class="form-group">
										
										<div class="input-group">
											<span class="input-group-addon">A/N</span>
											<input type="text" name="an" class="form-control" value="<?php echo e($cruds->bank_an); ?>">
											<?php echo $errors->first('an', '<p class="help-block" style="color:red">:message</p>'); ?>

										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputFile">Gambar : </label>
									<img src="/uploads/bank/<?php echo e($cruds->bank_foto); ?>" height="100" width="100" alt="gambar" id="fotobank" name="fotobank">
									<input type="file" name="foto" id="exampleInputFile" onchange="readURL(this);">
									<?php echo $errors->first('foto', '<p class="help-block" style="color:red">:message</p>'); ?>


									<p class="help-block">Example block-level help text here.</p>
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

<script type="text/javascript">

	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#fotobank').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
<?php echo $__env->make('Layout.admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>