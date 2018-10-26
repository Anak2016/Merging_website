<?php $__env->startSection('title', 'EditAccount'); ?>
<?php $__env->startSection('data-page-id', 'auth'); ?>
<?php $__env->startSection('select'); ?>


<h1 align="center">Edit Your Account</h1>

<form action="/sam_public/edit/<?php echo e($user['id']); ?>" method="post" enctype="/sam_public/customer/edit/<?php echo e($user['id']); ?>"><!--form start -->
    <div class="form-group"><!--form-group start -->
        <label>Email:</label>
        <input type="text" class="form-control" name="c_email" value="<?php echo e($user['email']); ?>" required>
    </div>
    <div class="form-group"><!--form-group -->
        <label>Username:</label>
        <input type="text" class="form-control" name="c_name" value="<?php echo e($user['username']); ?>" required>
    </div>
    <div class="form-group"><!--form-group start -->
        <label>Password:</label>
        <input type="password" class="form-control" name="c_country" value="<?php echo e($user['password']); ?>" required>
    </div>
    <div class="form-group"><!--form-group start -->
        <label>Address:</label>
        <input type="text" class="form-control" name="c_address" value="<?php echo e($user['address']); ?>" required>
    </div>
    <div class="form-group"><!--form-group start -->
        <label>city:</label>
        <input type="text" class="form-control" name="c_city" value="<?php echo e($user['city']); ?>" required>
    </div>
    <div class="form-group"><!--form-group start -->
        <label>State:</label>
        <input type="text" class="form-control" name="c_state" value="<?php echo e($user['state']); ?>" required>
    </div>
    <div class="form-group"><!--form-group start -->
        <label>Zip code:</label>
        <input type="text" class="form-control" name="c_zipcode" value="<?php echo e($user['zipcode']); ?>" required>
    </div>
    <div class="form-group"><!--form-group start -->
        <label>Phone No:</label>
        <input type="text" class="form-control" name="c_phone" value="<?php echo e($user['phone']); ?>" required>
    </div>
    <div class="form-group"><!--form-group start -->
        <label>Your Image:</label>
        <input type="file" class="form-control" name="c_image" >
    </div>

    <div class="text-center"><!--text-center -->
        <input type="hidden" name="token" value="<?php echo e(\SAM\Classes\CSRFToken::_token()); ?>">
        <button type="submit" name="update" class="btn btn-primary">
            <i class="fa fa-user-md"></i> Update Now
        </button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('customers.customer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>