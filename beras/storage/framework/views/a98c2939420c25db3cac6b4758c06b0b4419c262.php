<?php $__env->startSection('title','Transaction'); ?>
<?php $__env->startSection('b','class=active'); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			List Transaction
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
									<th>ID Transaksi</th>
									<th>Kode Transaksi</th>
									<th>ID Customer</th>
									<th>ID Bank</th>
									<th>ID Kurir</th>
									<th>Total</th>
									<th>Status Pembayaran</th>
									<th>Status Pengiriman</th>
									<th>No Resi</th>
									<th>Created Date</th>
									<th>Last Update</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $cruds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($crud->trans_id); ?></td>
									<td><?php echo e($crud->trans_kode); ?></td>
									<td><?php echo e($crud->customer_id); ?></td>
									<td><?php echo e($crud->bank_id); ?></td>
									<td><?php echo e($crud->kurir_id); ?></td>
									<td><?php echo e($crud->trans_total); ?></td>
									<?php 
									if ($crud->trans_status_pembayaran == "Success")
										echo '<td><span class="label label-success">Success</span></td>';
									else if ($crud->trans_status_pembayaran == "Waiting")
										echo '<td><span class="label label-warning">Waiting</span></td>';
									else if ($crud->trans_status_pembayaran == "Canceled")
										echo '<td><span class="label label-danger">Canceled</span></td>';

									if ($crud->trans_status_pengiriman == "Delivered")
										echo '<td><span class="label label-success">Delivered</span></td>';
									else if ($crud->trans_status_pengiriman == "On Delivery")
										echo '<td><span class="label label-warning">On Delivery</span></td>';
									else if ($crud->trans_status_pengiriman == "Canceled")
										echo '<td><span class="label label-danger">Canceled</span></td>';
									?>
									<td><?php echo e($crud->trans_resi); ?></td>
									<td><?php echo e($crud->created_at); ?></td>
									<td><?php echo e($crud->updated_at); ?></td>
									<td>
										<form method="POST" action="<?php echo e(route('stransaction.destroy', $crud->trans_id)); ?>" accept-charset="UTF-8">
											<input name="_method" type="hidden" value="DELETE">
											<input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
											<div class="tools" >
												<button type="submit" class="btn btn-default" style="color: #dd4b39;" onclick="return confirm('Anda yakin akan menghapus data ? <?php echo e($crud->customer_nama); ?>');" >
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
<?php echo $__env->make('Layout.sadmin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>