<?php $__env->startSection('title', 'DeleteAccount'); ?>
<?php $__env->startSection('data-page-id', 'auth'); ?>
<?php $__env->startSection('select'); ?>
<center>
	<h1>Do you really want to delete your account?</h1>
	<form action="/sam_public/customer/delete" method="post">
		<input type="hidden" name="token" value="<?php echo e(\SAM\Classes\CSRFToken::_token()); ?>">
		<input class="btn btn-danger" type="submit" name="yes" value="Yes, I want to delete">
	</form>
</center>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('customers.customer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>