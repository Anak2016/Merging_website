<?php $__env->startSection('title', 'ChangePassword'); ?>

<?php $__env->startSection('data-page-id', 'customerProduct'); ?> 

<?php $__env->startSection('select'); ?>

<?php $user_id = SAM\Classes\Session::get('SESSION_USER_NAME') ?>

<div class="product">
	<div clss ="row expanded">
		<div class="column medium-11">
			<h2>Order Payment</h2> <hr />
		</div>
	</div>
	<table class="table table-bordered table-hover"><!--table table-bordered table-hover start -->
		<thead><!--thead start -->
			<tr>
				<th>Order_no</th><th>User_id</th><th>total</th><th>status</th>
				<th>Date Created</th>
			</tr>
		</thead>
		<tbody> <!--tbody start -->
			<?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($buyer_id == $payment['user_id']): ?>
					<tr>
						<td><?php echo e($payment['order_no']); ?></td>
						<td><?php echo e($payment['user_id']); ?></td>
						<td><?php echo e($payment['amount']); ?></td>
						<td><?php echo e($payment['status']); ?></td>
						<td><?php echo e($payment['added']); ?></td>
					</tr>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php echo $links; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('customers.customer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>