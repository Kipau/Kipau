<?php $__env->startSection('title','Courier'); ?>
<?php $__env->startSection('h','class=active'); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			List Courier
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
						<h3 class="box-title">Click 'Add' button for adding new data</h3>
						<a  class="btn  btn bg-maroon btn-flat margin" href="<?php echo e(route('scourier.create')); ?>">
							<i class="fa fa-plus"></i>
							Add
						</a>
						

					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table id="example1" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 0; ?>
								<?php $__currentLoopData = $cruds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php $no++; ?>
								<tr>
									<td><?php echo e($no); ?></td>
									<td><?php echo e($crud->kurir_nama); ?></td>
									<td>
										<form method="POST" action="<?php echo e(route('courier.destroy', $crud->kurir_id)); ?>" accept-charset="UTF-8">
											<input name="_method" type="hidden" value="DELETE">
											<input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
											<div class="tools" >
												<a href="<?php echo e(route('courier.edit', $crud->kurir_id)); ?>" data-toggle="tooltip" title="Edit" class="btn btn-default" style="color: #dd4b39;"><i class="fa fa-edit"></i></a>

												<button type="submit" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color: #dd4b39;" onclick="return confirm('Anda yakin akan menghapus data ? <?php echo e($crud->kurir_nama); ?>');" >
													<i class="fa fa-trash-o"></i>
												</button> 
											</div>
										</form>
									</td>
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
							
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