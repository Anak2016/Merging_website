<?php $__env->startSection('title', 'checkout'); ?>

<?php $__env->startSection('data-page-id', 'cart'); ?>

<?php $__env->startSection('stripe-checkout'); ?>
<script src="https://checkout.stripe.com/checkout.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="content"><!--content start -->
    <div class="container"><!--container start-->
        <div class="col-md-12"><!--col-md-12 -->
            <ul class="breadcrumb"><!--breadcrumb start -->
                <li>
                    <a href="/sam_public/">Home</a>
                </li>
                <li>
                	<a href="/sam_public/checkout">
                    Checkout Details
                	</a>
                </li>
                <li>
                    Order Complete
                </li>
            </ul>

            <div class ="crumb_body">
                <div class="breadcrumb_nav flat" >
                    <a href="cart.php" >Shopping Cart</a>
                    <a href="review_order.php" >Checkout Details</a>
                    <a href="" class="active" >Order Complete</a>
                </div>
            </div>

        </div>

        <div class="row"><!-- row start -->


            <div class="col-md-12"><!--col-md-8 start -->
                <div class="box" style="text-align: center;"><!-- box start-->
                    <h1 class="lead" > Thank you for shopping with Ei-shops, <?php echo e(_user()->username); ?></h1>
					<a href="/sam_public/shop">GO BACK</a>
                </div><!-- box end-->
            </div><!--col-md-8 end -->
            
    </div>

</div>
</div>

<!--//script here-->


</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>