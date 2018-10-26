<?php $__env->startSection('title', 'Manage Inventory'); ?>
<?php $__env->startSection('data-page-id', 'adminProducts'); ?>
<?php $__env->startSection('content'); ?>
<div class="product">
	<div clss ="row expanded">
		<div class="column medium-11">
			<h2>Product Inventory Item</h2> <hr />
		</div>
	</div>

	<?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	
	<div class="column medium-11 float-left">	
		<a href="/sam_public/sam_public/admin/products/create" class="button float-right">
			<i class="fa fa-plus"></i> Add New Product
		</a>
	</div>

	<div class="row expanded">
		<div class="small-12 medium-11 ">
			<?php if(count($products)): ?>
			<table class="hover unstriped" data-form="deleteForm">
				<thead>
					<tr><th>Image</th><th>Name</th><th>Price</th>
						<th>Quantity</th><th>Category</th><th>Subcategory</th>
						<th>Date Created</th><th width="70">Action</th>
					</thead>
					<tbody>
						<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td>
								<img src="<?php echo e($product['image_path1']); ?>"  alt="<?php echo e($product['name']); ?>"
								height="40" width="40">
							</td>
							<td><?php echo e($product['name']); ?></td>
							<td><?php echo e($product['price']); ?></td>  
							<td><?php echo e($product['quantity']); ?></td>
							<td><?php echo e($category['name']); ?></td>
							<td><?php echo e($subCategory['name']); ?></td>
							

							
							<td><?php echo e($product['added']); ?></td>

							<td width="70" class="text-right">

								
								<span data-tooltip aria-haspopup="true" class="has-tip top"
								data-disable-hover="false" tabindex="1"
								title="Edit Product">Edit
								<a href="/sam_public/sam_public/admin/products/<?php echo e($product['id']); ?>/edit"><i class="fa fa-edit"></i></a>
							</span>
						</td>

					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
			<?php echo $links; ?>

			<?php else: ?>
			<h2>You have not any products</h2>
			<?php endif; ?>
		</div>
	</div> 
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>