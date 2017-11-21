<?php $__env->startSection('title','Update Product'); ?>
<?php $__env->startSection('c','class=active'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('ckedit','src=/ckeditor/ckeditor.js'); ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Update Product
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
					<form action="<?php echo e(route('sproduct.update', $cruds->produk_id)); ?>" method="post" enctype="multipart/form-data">
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


									<input type="text" name="nama" value="<?php echo e($cruds->produk_nama); ?>" class="form-control">
									<?php echo $errors->first('nama', '<p class="help-block" style="color:red">:message</p>'); ?>

									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<label>Stok :</label>

									
									<input type="text" name="stok" value="<?php echo e($cruds->produk_stok); ?>" class="form-control">
									<?php echo $errors->first('stok', '<p class="help-block" style="color:red">:message</p>'); ?>

									<!-- /.input group -->
								</div>
								<!-- /.form group -->

								<!-- phone mask -->
								<div class="form-group">
									<div class="form-group">
										<label>Harga :</label>
										<div class="input-group">
											<span class="input-group-addon">Rp.</span>
											<input type="text" name="harga" value="<?php echo e($cruds->produk_harga); ?>" class="form-control">
											<?php echo $errors->first('harga', '<p class="help-block" style="color:red">:message</p>'); ?>

										</div>
									</div>
								</div>
								<!-- /.form group -->

						
								<!-- /.form group -->

							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputFile">Gambar :</label>
									<br>
									<img src="/uploads/produk/<?php echo e($cruds->produk_foto); ?>" height="100" width="100" alt="gambar" id="fotoproduk" name="fotoproduk">
									<input type="file" name="foto" id="exampleInputFile" onchange="readURL(this);">
									<?php echo $errors->first('foto', '<p class="help-block" style="color:red">:message</p>'); ?>

									<p class="help-block">Example block-level help text here.</p>
								</div>
								<!-- /.form group -->

							</div>
							<div class="col-md-12">
										<!-- IP mask -->
								<div class="form-group">
									<div class="form-group">
										<label>Deskripsi :</label>
										<textarea class="form-control" name="info" rows="3" id="editor1" ><?php echo e($cruds->produk_info); ?></textarea>
										<?php echo $errors->first('info', '<p class="help-block" style="color:red">:message</p>'); ?>

									</div>
									<!-- /.input group -->
								</div>
							</div>
							<!-- /.box-body -->

						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-info ">Submit</button>
						</div>
					</form>
				</div>

<!-- 				<form id="form1" runat="server">
					<input type='file' id="imgInp" onchange="readURL(this);" />
					<img id="blah" src="#" alt="your image" />
				</form> -->

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
                $('#fotoproduk').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
<?php echo $__env->make('Layout.sadmin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>