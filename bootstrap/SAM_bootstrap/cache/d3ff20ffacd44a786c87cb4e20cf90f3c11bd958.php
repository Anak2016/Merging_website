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

				<?php if($buyer_id == $order['user_id']): ?>
					<tr>
						
						<td><?php echo e($order['order_no']); ?></td>
						<td><?php echo e($order['added']); ?></td>
					</tr>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	

	
	<?php if($selected < 7): ?>
		<?php if($count < 7): ?>
			<ul class="pagination">
				<li><a href="#"><<</a></li>	

				<?php for($i = 1; $i <= $count; $i++): ?>
					<li><a href="#"><?php echo e($i); ?></a></li>
				<?php endfor; ?>
				
				<li><a href="#">>></a></li>
			</ul>
		<?php else: ?>
			<ul class="pagination">
				<li><a href="#"><<</a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">6</a></li>
				<li><a href="#">7</a></li>
				<li><a href="#">...</a></li>
				<li><a href="#">>></a></li>
			</ul>
		<?php endif; ?>
	<?php elseif($selected <7 and $selected > $count-6): ?>
		<ul class="pagination">
			<li><a href="#"><<</a></li>
			<li><a href="#">...</a></li>
			<li><a href="#">$selected-3</a></li>
			<li><a href="#">$count-2</a></li>
			<li><a href="#">$count-1</a></li>
			<li><a href="#">$count</a></li>
			<li><a href="#">$count+1</a></li>
			<li><a href="#">$count+2</a></li>
			<li><a href="#">$count+3</a></li>
			<li><a href="#">...</a></li>
			<li><a href="#">>></a></li>		
		</ul>
	<?php elseif($selected > $count - 6): ?>
		<ul class="pagination">
			<li><a href="#"><<</a></li>
			<li><a href="#">...</a></li>
			<li><a href="#">$count-6</a></li>
			<li><a href="#">$count-5</a></li>
			<li><a href="#">$count-4</a></li>
			<li><a href="#">$count-3</a></li>
			<li><a href="#">$count-2</a></li>
			<li><a href="#">$count-1</a></li>
			<li><a href="#">$count</a></li>
			<li><a href="#">>></a></li>
		</ul>
	<?php endif; ?>
	
	

	<?php else: ?>
	<h2>this order does not exist.</h2>
	<?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('customers.customer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>