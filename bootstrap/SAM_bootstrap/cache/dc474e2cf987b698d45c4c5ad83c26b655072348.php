<?php $__env->startSection('title', 'cart'); ?>
<?php $__env->startSection('data-page-id', 'cart'); ?>

<?php $__env->startSection('content'); ?>




<div id="content"><!--content start -->
    <div class="container"><!--container start-->
        <div class="col-md-12"><!--col-md-12 -->
            <ul class="breadcrumb"><!--breadcrumb start -->
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    Cart
                </li>
            </ul>
        </div>

        <div class="col-md-9" id="cart"><!--col-md-9 start -->

            <div class="box"><!-- box start -->
                <form action="cart.php" method="post" enctype="multipart-form-data"><!--multipart-form-data -->
                    <h1>Shopping Cart</h1>
                    <p class="text-muted">You currently have item(s) in your cart.</p>
                    <div class="table-reponsive"><!--table-reponsive -->
                        <table class="table"><!--table start -->
                            <thead><!--thead start -->
                                <tr>
                                    <th colspan="2">Product</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Size</th>
                                    <th colspan="1">Delete</th>
                                    <th colspan="2">Sub Total</th>
                                </tr>
                            </thead>
                                
                        </table>

                    </div>

                    <div class="box-footer"><!--box-footer -->
                        <div class="pull-left"><!--pull-left -->
                            <a href="/sam_public/" class="btn btn-default">
                                <i class="fa fa-chevron-circle-left"></i>Continue Shopping
                            </a>
                        </div>
                        <div class="pull-right"><!--pull-right -->
                            
                            <button class="btn btn-default" type="submit" name="update" value="Update Cart">
                                <i class="fa fa-refresh"></i>Update Cart

                            </button>

                            <a href="checkout" class="btn btn-primary">
                                Proceed to checkout <i class="fa fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>

                </form>

            </div>


           

        </div>

        <div class="col-md-3"><!--col-md-3 -->
            <div class="box" id="order-summary"><!--box start -->
                <div class="box-header"><!--box-header-->

                    <h3>Order Summary</h3>

                </div>
                <p class="text-muted">
                    Shipping and additional costs are calculated based on the values you have entered.
                </p>

                <div class="table-responsive"><!-- table-responsive-->
                    <table class="table"><!--table start-->

                       

                    </table>
                </div>

            </div>
        </div>


    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>