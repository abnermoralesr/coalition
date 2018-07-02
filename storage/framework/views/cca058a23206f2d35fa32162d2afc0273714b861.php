<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Producs Store</h1></div>
				<p>Because of the given tiem I could not focus on making this look beatiful, if you give me 30 minutes more I would give even a cart experience</p>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<form class="submitProduct" action="<?php echo e(route('request-product')); ?>" method="POST">
						<?php echo e(csrf_field()); ?>

						<div class="row">
							<div class="col-md-2 col-sm-12 pimage">
								<img src="<?php echo e(asset('assets/images/product.jpg')); ?>">
							</div>
							<div class="col-md-2 col-sm-12">
								<h3>Name:</h3>
								<input type="text" class="name" name="name" value="<?php echo e($value->name); ?>">
							</div>					
							<div class="col-md-2 col-sm-12">
								<h3>Stock:</h3>
								<input type="text" class="stock" name="stock" value="<?php echo e($value->stock); ?>">
							</div>										
							<div class="col-md-2 col-sm-12">
								<h3>Price:</h3>
								<input type="text" class="price" name="price" value='<?php echo e(number_format($value->price,2,".",",")); ?>'>
							</div>															
							<div class="col-md-2 col-sm-12">
								<input type="submit" class="request btn btn-success" value="REQUEST">
							</div>																					
						</div>
					</form>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>										
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>