<div class="col-md-4 products-left">
	<div class="categories">
		<h2>Categories</h2>
		<ul class="cate">
			<?php $__currentLoopData = $nav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li><a href="<?php echo e(route('shop.edit', $crud->produk_id)); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><?php echo e($crud->produk_nama); ?></a></li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>																																												
</div>