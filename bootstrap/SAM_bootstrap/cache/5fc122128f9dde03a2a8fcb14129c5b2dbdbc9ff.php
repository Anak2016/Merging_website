<?php $__env->startSection('body'); ?>


<?php echo $__env->make('includes.nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<div class="site_wrapper" style="padding-top: 200px;">
	<?php echo $__env->yieldContent('content'); ?>
	
	<div class="notify text-center">

	</div>
</div>

<?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>