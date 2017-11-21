<?php $__env->startSection('title','Transaction Detail'); ?>
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
	<?php $__currentLoopData = $trans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<section class="content">
		<section class="invoice">
			<!-- title row -->
			<div class="row">
				<div class="col-xs-12">
					<h2 class="page-header">
						<i class="fa fa-globe"></i> Mlatiharjo
						<small class="pull-right">Date: <?php echo e($tran->created_at); ?></small>						
					</h2>
				</div>
				<!-- /.col -->
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<!-- info row -->
			<div class="row invoice-info">
				<div class="col-sm-4 invoice-col">
					From
					<address>
						<strong>Admin, Inc.</strong><br>
						795 Folsom Ave, Suite 600<br>
						San Francisco, CA 94107<br>
						Phone: (804) 123-5432<br>
						Email: info@almasaeedstudio.com
					</address>
				</div>
				<!-- /.col -->
				<div class="col-sm-4 invoice-col">
					To
					<address>
						<strong><?php echo e($tran->customer_nama); ?></strong><br>
						<?php echo e($tran->customer_alamat); ?>, <?php echo e($tran->customer_kota); ?><br>
						Kec : <?php echo e($tran->customer_kecamatan); ?><br>
						Kel : <?php echo e($tran->customer_kelurahan); ?><br>
						<?php echo e($tran->customer_provinsi); ?>, <?php echo e($tran->customer_kodepos); ?><br>
						Phone: <?php echo e($tran->customer_nohp); ?><br>
						Email: <?php echo e($tran->customer_email); ?>

					</address>
				</div>
				<!-- /.col -->
				<div class="col-sm-4 invoice-col">
					<b>Invoice #007612</b><br>
					<br>
					<b>Kode Transaksi : </b> <?php echo e($tran->trans_kode); ?><br>
					<?php 
					if ($tran->trans_status_pembayaran == "Success")
						echo '<b>Status Pengiriman:</b> <span class="label label-success">Success</span>';
					else if ($tran->trans_status_pembayaran == "Waiting")
						echo '<b>Status Pengiriman:</b> <span class="label label-warning">Waiting</span>';
					else if ($tran->trans_status_pembayaran == "Canceled")
						echo '<b>Status Pengiriman:</b> <span class="label label-danger">Canceled</span>';
					echo '</br>';
					if ($tran->trans_status_pengiriman == "Delivered")
						echo '<b>Status Pengiriman:</b> <span class="label label-success">Delivered</span>';
					else if ($tran->trans_status_pengiriman == "On Delivery")
						echo '<b>Status Pengiriman:</b> <span class="label label-warning">On Delivery</span>';
					else if ($tran->trans_status_pengiriman == "Canceled")
						echo '<b>Status Pengiriman:</b> <span class="label label-danger">Canceled</span>';
					?>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->

			<!-- Table row -->
			<div class="row">
				<div class="col-xs-12 table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Product</th>
								<th>Qty</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($produ->produk_nama); ?></td>
								<td><?php echo e($produ->order_qty); ?></td>
								<td><?php echo e('Rp. '.strrev(implode('.',str_split(strrev(strval($produ->order_total)),3))).""); ?></td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->

			<div class="row">
				<!-- accepted payments column -->
				<div class="col-xs-3">
					<p class="lead">Bank :</p>
					<img src="/uploads/bank/<?php echo e($tran->bank_foto); ?>" height="60" width="160" alt="Bank Image">
					<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
						A/N : <?php echo e($tran->bank_an); ?>

						<br>
						No Rekening : <?php echo e($tran->bank_norek); ?>

					</p>
				</div>
				<div class="col-xs-3">
					<p class="lead">Jasa Pengiriman:</p>
					<img src="/uploads/kurir/<?php echo e($tran->kurir_foto); ?>" height="60" width="160" alt="Courier Image">

					<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
						NO.Resi : <?php echo e($tran->trans_resi); ?>

					</p>
				</div>
				<!-- /.col -->
				<div class="col-xs-6">
					<p class="lead">Amount Due 2/22/2014</p>

					<div class="table-responsive">
						<table class="table">
							<tbody><tr>
								<th style="width:50%">Subtotal:</th>
								<td><?php echo e('Rp. '.strrev(implode('.',str_split(strrev(strval($tran->subtotal)),3))).""); ?></td>
							</tr>
							<tr>
								<th>Shipping:</th>
								<td><?php echo e('Rp. '.strrev(implode('.',str_split(strrev(strval($tran->trans_ongkir)),3))).""); ?></td>
							</tr>
							<tr>
								<th>Total:</th>
								<td><?php echo e('Rp. '.strrev(implode('.',str_split(strrev(strval($tran->trans_total)),3))).""); ?></td>
							</tr>
						</tbody></table>
					</div>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->

			<!-- this row will not appear when printing -->
			<div class="row no-print">
				<div class="col-xs-12">
					
				</div>
			</div>
		</section>
	</section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>