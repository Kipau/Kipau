<?php $__env->startSection('title','Customers'); ?>
<?php $__env->startSection('e','class=active'); ?>
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			List Customers
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
					<div class="box-header">

						<h3 class="box-title">Click 'Add' button for adding new data</h3>
						<a  class="btn  btn bg-maroon btn-flat margin" href="<?php echo e(URL::to('scustomers_add')); ?>">
							<i class="fa fa-plus"></i>
							Add
						</a>

					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table id="example1" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>ID FLIGHT</th>
									<th>Passanger Name</th>
									<th>Passanger Name</th>
									<th>Passanger Name</th>
									<th>Passanger Name</th>
									<th>Passanger Name</th>
									<th>Passanger Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>a</td>
									<td>a</td>

									<td>a</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
									<td>a</td>
									<td>
										<div class="tools" >
											<a href="<?php echo e(URL::to('index')); ?>" style="
											color: #dd4b39;"><i class="fa fa-edit"></i></a>
											<a href="<?php echo e(URL::to('index')); ?>" style="
											color: #dd4b39;"><i class="fa fa-trash-o"></i></a>
										</div>
									</td>
								</tr>
							</tbody>
							
						</table>
					</div>
					<!-- /.box-body -->
				</div>          <!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.sadmin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>