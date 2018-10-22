<?php $__env->startSection('select'); ?>
<center>
    <h1>Do you really want to delete your account?</h1>
    <form action="#" method="post">
        <input class="btn btn-danger" type="submit" name="yes" value="Yes, I want to delete">
        <input class="btn btn-primary" type="submit" name="no" value="No, I don't want to delete">
    </form>
</center>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('customers.customer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>