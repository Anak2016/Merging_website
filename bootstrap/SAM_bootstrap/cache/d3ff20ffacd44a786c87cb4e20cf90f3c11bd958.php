<?php 
	//var_dump($orders);exit;
?>


<?php $__env->startSection('title', 'OrderPage'); ?>
<?php $__env->startSection('data-page-id', 'customerProduct'); ?>
<?php $__env->startSection('select'); ?>

<center><!--center start -->
	<h1>My Orders</h1>
	<p class="leqad">Your order on one place</p>
	<p class="text-muted">
		If you have any questions, please feel free to <a href="/sam_public/contact">contact us,</a> our customer service center is working for you 24/7.
	</p>
</center>

<hr>

<div class="table-responsive"><!--table-responsive start -->
	
	<?php if(isset($orders) && count($orders) >0): ?>
	<table class="table table-bordered table-hover"><!--table table-bordered table-hover start -->
		<thead><!--thead start -->
			<tr>
				<th>Order_no</th>
				<th>Date Created</th>
			</tr>
		</thead>
		<tbody> <!--tbody start -->

			<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					
					<td><?php echo e($order['order_no']); ?></td>
					<td><?php echo e($order['added']); ?></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php echo $links; ?>


	

	

		
		

		<?php else: ?>
		<h2>this order does not exist.</h2>
		<?php endif; ?>
	</div>
	<?php $__env->stopSection(); ?>

<?php echo $__env->make('customers.customer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>