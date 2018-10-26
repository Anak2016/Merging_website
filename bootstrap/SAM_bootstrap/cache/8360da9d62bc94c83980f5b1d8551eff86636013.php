<div class="column">


	<?php if(isset($errors) && count($errors) || \SAM\Classes\Session::has('error') ): ?>
		<div>
			<ul style='color: red;'>
				<?php if(\SAM\Classes\Session::has('error')): ?>
					<?php echo e(\SAM\Classes\Session::flash('error')); ?>

				<?php else: ?>
					<?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error_array): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php $__currentLoopData = $error_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><?php echo e($error_item); ?> </li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
			</ul>
			
		</div>
	<?php endif; ?>

	<?php if(isset($success) || \SAM\Classes\Session::has('success')): ?>
		<div class="callout success" data-closable>
			<?php if(isset($success)): ?>
				<?php echo e($success); ?>

			<?php elseif(\SAM\Classes\Session::has('success')): ?>
				<?php echo e(\SAM\Classes\Session::flash('success')); ?>

			<?php endif; ?>

			<button class="close-button" arial-label="Dismiss Message" type="button" data-close>
				<span arial-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>

</div>