<?php $__env->startSection('title', 'Customer'); ?>
<?php $__env->startSection('data-page-id', 'customer'); ?>

<?php $__env->startSection('content'); ?>
<div id="content"><!--content start -->
    <div class="container"><!--container start-->
        <div class="col-md-12"><!--col-md-12 start-->
            <ul class="breadcrumb"><!--breadcrumb start -->
                <li>
                    <a href="/sam_public/">Home</a>
                </li>
                <li>
                    My Account
                </li>
            </ul>
        </div> <!--col-md-12 end-->

        <div class="col-md-3"><!-- col-md-3-->
           <?php echo $__env->make('includes.my-account-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-md-9"><!--col-md-9 start -->
            <div class="box"><!--box start -->
                
                <?php echo $__env->yieldContent('select'); ?>
            </div>
        </div>


    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('customers.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>