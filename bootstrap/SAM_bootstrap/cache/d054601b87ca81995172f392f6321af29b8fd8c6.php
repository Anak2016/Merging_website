<?php $__env->startSection('title', 'checkout'); ?>

<?php $__env->startSection('data-page-id', 'cart'); ?>

<?php $__env->startSection('stripe-checkout'); ?>
    <script src="https://checkout.stripe.com/checkout.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div id="content"><!--content start -->
	<div class="container"><!--container start-->
		<div class="col-md-12"><!--col-md-12 start-->
			<ul class="breadcrumb"><!--breadcrumb start -->
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					Checkout
				</li>
			</ul>
		</div> <!--col-md-12 end-->

		<div class="col-md-3"><!-- col-md-3-->
			<?php echo $__env->make('includes.product-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>

        <div id="shopping_cart"> 
            <!-- checkout code start here -->
            <div class="col-md-9"> <!--col-md-9 start -->

                <div class="box"><!--box start -->
                    <h1 class="text-center">Please choose your payment option.</h1>
                    <p class="lead text-center"></p>
                    
                    
                    <span id="properties" class="hide" data-customer-email="<?php echo e(_user()->email); ?>" data-stripe-key="<?php echo e(\SAM\Classes\Session::get('publishable_key')); ?>">
                    </span>

                    
                    <button @click.prevent="checkout" v-if="authenticated" class="btn btn-default">
                        Checkout with Stripe &nbsp; <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                    </button>   
                    <span v-else>
                        <a href="/sam_public/login" class="btn btn-default">
                            Checkout with Stripe &nbsp; <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                        </a>
                    </span>
                    <br /><br />

                    
                    <button @click.prevent="" v-if="authenticated" class="btn btn-success">
                        Checkout with PayPal &nbsp; <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                    </button>   
                    <span v-else>
                        <a href="/sam_public/login" class="btn btn-success">
                            Checkout with PayPal &nbsp; <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                        </a>
                    </span>
                    <br /><br />
                    

                    <button @click.prevent="" v-if="authenticated" class="btn btn-info">
                        Credit Card &nbsp; <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                    </button>   
                    <span v-else>
                        <a href="/sam_public/login" class="btn btn-info">
                            Credit Card &nbsp; <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                        </a>
                    </span>


                </div>
            </div>
        </div>


    </div> <!--container end-->
</div> <!--content end-->

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>