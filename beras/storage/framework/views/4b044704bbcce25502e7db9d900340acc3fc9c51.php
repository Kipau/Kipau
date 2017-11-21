<?php $__env->startSection('title','Payment'); ?>
<?php $__env->startSection('i','class=active'); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			List Payment
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
			<div class="col-xs-12">


				<div class="box">
					<a class="btn-default"></a>
					<div class="box-header">


					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table id="example1" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Kode Transaksi</th>
									<th>Customer</th>
									<th>Foto</th>
									<th>Waktu Upload</th>									
								</tr>
							</thead>
							<tbody>
							<?php $no=0; ?>
							<?php $__currentLoopData = $cruds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $no++; ?>
								<tr>
									<td><?php echo e($no); ?></td>
									<td><a href="<?php echo e(route('transaction_status.edit', $crud->trans_kode)); ?>" data-toggle="tooltip" title="Edit Status" style="color: #000;"><?php echo e($crud->trans_kode); ?> <i style="color: #e34836;" class="fa fa-search-plus"></i></a></td>
									<td><?php echo e($crud->customer_nama); ?></td>
									<td><a class="example-image-link" href="uploads/bukti/<?php echo e($crud->bukti_foto); ?>" data-lightbox="example-1"><img class="example-image" src="uploads/bukti/<?php echo e($crud->bukti_foto); ?>" height="100" width="100" alt="image-1" /></td>
									<td><?php echo e($crud->created_at); ?></td>
								</tr>
							</tbody>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>