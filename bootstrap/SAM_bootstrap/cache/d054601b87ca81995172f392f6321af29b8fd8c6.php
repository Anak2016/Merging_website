<?php $__env->startSection('title', 'checkout'); ?>

<?php $__env->startSection('data-page-id', 'cart'); ?>

<?php $__env->startSection('stripe-checkout'); ?>
<script src="https://checkout.stripe.com/checkout.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php


?>
<div id="content"><!--content start -->
    <div class="container"><!--container start-->
        <div class="col-md-12"><!--col-md-12 -->
            <ul class="breadcrumb"><!--breadcrumb start -->
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    Checkout Details
                </li>
            </ul>

            <div class ="crumb_body">
                <div class="breadcrumb_nav flat" >
                    <a href="cart.php" >Shopping Cart</a>
                    <a href="review_order.php" class="active">Checkout Details</a>
                    <a href="#">Order Complete</a>
                </div>
            </div>

        </div>

        <div class="row"><!-- row start -->


            <div class="col-md-8"><!--col-md-8 start -->
                <div class="box"><!-- box start-->
                    <p class="lead"> Please Fell Free To Check Your Billing Details and Shipping Details</p>
                    
                    <form method="post" id="shipping-billing-details-form"><!-- shipping-billing-details-form-->
                        <h2> Billing Details </h2>
                        <div class="row"><!--row start -->
                            <div class="col-sm-6"><!--col-sm-6 -->
                                <div class="form-group"><!--form-group start -->
                                    <label> First Name: </label>
                                    <input type="text" name="billing_first_name" class="form-control" value="<?php echo e(_user()->firstname); ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6"><!--col-sm-6 -->
                                <div class="form-group"><!--form-group start -->
                                    <label> Last Name: </label>
                                    <input type="text" name="billing_last_name" class="form-control" value="<?php echo e(_user()->lastname); ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6"><!--col-sm-6 -->
                                <div class="form-group"><!--form-group start -->
                                    <label> Address 1: </label>
                                    <input type="text" name="billing_address_1" class="form-control" value="<?php echo e(_user()->address); ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6"><!--col-sm-6 -->
                                <div class="form-group"><!--form-group start -->
                                    <label> Address 2: </label>
                                    <input type="text" name="billing_address_2" class="form-control" value="" >
                                </div>
                            </div>
                            <div class="col-sm-6"><!--col-sm-6 -->
                                <div class="form-group"><!--form-group start -->
                                    <label> City: </label>
                                    <input type="text" name="billing_city" class="form-control" value="<?php echo e(_user()->city); ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6"><!--col-sm-6 -->
                                <div class="form-group"><!--form-group start -->
                                    <label> State: </label>
                                    <input type="text" name="billing_state" class="form-control" value="<?php echo e(_user()->state); ?>" required>
                                </div>
                            </div>
                            <!-- can use with another form/project by copy this part -->
                            <div class="col-sm-6"><!--col-sm-6 -->
                                <div class="form-group"><!--form-group start -->
                                    <label> Country: </label>
                                    <select name="billing_country" class="form-control" required>



                                    </select>
                                </div>
                            </div>
                            <!-- to this prt-->

                            <div class="col-sm-6"><!--col-sm-6 -->
                                <div class="form-group"><!--form-group start -->
                                    <label> Zipcode: </label>
                                    <input type="text" name="billing_zipcode" class="form-control" value="<?php echo e(_user()->zipcode); ?>" required>
                                </div>
                            </div><!--col-sm-6 end-->
                        </div><!--row end -->

                        <!-- shipping address start here -->
                        <hr>
                        <div class="form-group"><!--form-group start -->
                            <h4 >Is Shipping Details Are The Same?</h4>

                            <label>No</label>

                        </div><!--form-group end -->

                        <div id="shipping-details-form-div"><!--shipping-details-form-div start -->
                            <h2> Shipping Details</h2>
                            <div class="row"><!--row start -->
                                <div class="col-sm-6"><!--col-sm-6 -->
                                    <div class="form-group"><!--form-group start -->
                                        <label> First Name: </label>
                                        <input type="text" name="shipping_first_name" class="form-control" value="" required>
                                    </div>
                                </div>
                                <div class="col-sm-6"><!--col-sm-6 -->
                                    <div class="form-group"><!--form-group start -->
                                        <label> Last Name: </label>
                                        <input type="text" name="shipping_last_name" class="form-control" value="" required>
                                    </div>
                                </div>
                                <div class="col-sm-6"><!--col-sm-6 -->
                                    <div class="form-group"><!--form-group start -->
                                        <label> Address 1: </label>
                                        <input type="text" name="shipping_address_1" class="form-control" value="" required>
                                    </div>
                                </div>
                                <div class="col-sm-6"><!--col-sm-6 -->
                                    <div class="form-group"><!--form-group start -->
                                        <label> Address 2: </label>
                                        <input type="text" name="shipping_address_2" class="form-control" value="" >
                                    </div>
                                </div>
                                <div class="col-sm-6"><!--col-sm-6 -->
                                    <div class="form-group"><!--form-group start -->
                                        <label> City: </label>
                                        <input type="text" name="shipping_city" class="form-control" value="" required>
                                    </div>
                                </div>
                                <div class="col-sm-6"><!--col-sm-6 -->
                                    <div class="form-group"><!--form-group start -->
                                        <label> State: </label>
                                        <input type="text" name="shipping_state" class="form-control" value="" required>
                                    </div>
                                </div>
                                <div class="col-sm-6"><!--col-sm-6 -->
                                    <div class="form-group"><!--form-group start -->
                                        <label> Country: </label>
                                        <select name="shipping_country" class="form-control" required>
                                            <option value="">Select A Country</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6"><!--col-sm-6 -->
                                    <div class="form-group"><!--form-group start -->
                                        <label> Zipcode: </label>
                                        <input type="text" name="shipping_zipcode" class="form-control" value="" required>
                                    </div>
                                </div><!--col-sm-6 end-->
                            </div><!--row end -->

                        </div><!--shipping-details-form-div end -->

                        <input type="submit" name="submit" id="shipping-details-form-submit-button" value="Submit Form" style="display: none;">


                    </form>

                </div><!-- box end-->
            </div><!--col-md-8 end -->
            <div class="col-md-4"><!--col-md-4 start-->
                <div class="box-summary" id="order-summary"><!--box start -->
                    <div class="box-header"><!-- box-header start -->
                        <h3>Order Summary</h3>
                    </div>
                    <div id="shopping_cart"> 

                        
                        <table class="table"><!--table start -->
                            <thead>
                                <tr>
                                    <th class="text-muted lead">Product: </th>
                                    <th class="text-muted lead">Total: </th>
                                </tr>
                            </thead>
                            <tbody id="checkout-tbody-reload"><!--checkout-tbody-reload start -->
                                MISSING SOMETHING

                                <tr v-for="item in items">
                                    <td>
                                        <a href="#" class="bold"> {{stringLimit(item.name,18)}}</a>
                                        <i class="fa fa-times" title="Product Qty"></i> {{item.quantity}}
                                        <i class="fa fa-plus" title="Product Size"></i> SIZE
                                    </td>
                                    <th>${{item.total}}</th>
                                </tr>

                                <tr>
                                    <td>Order Subtotal</td>
                                    <th>${{cartTotal}}</th>
                                </tr>
                                <tr>
                                    <th colspan="2">
                                        <p class="shipping-header text-muted">
                                            <i class="fa fa-truck"></i> Shipping:
                                        </p>
                                        <ul class="list-unstyled"><!--shipping ul list list-unstyled start -->


                                        </ul><!--shipping ul list list-unstyled end -->
                                    </th>
                                </tr>
                                <tr>
                                    <td class="text-muted bold">Tax</td>
                                    <td>$ TAX</td>
                                </tr>
                                <tr class='total'>
                                    <td>Total</td>
                                    <th class='total-cart-price'>${{cartTotal}}</th>
                                </tr>
                                <tr>

                                    <th colspan="2">
                                        <p class="lead text-center"></p>
                                        <span id="properties" class="hide" data-customer-email="<?php echo e(_user()->email); ?>" data-stripe-key="<?php echo e(\SAM\Classes\Session::get('publishable_key')); ?>">
                                        </span>
                                        
                                        
                                        <input id="stripe-radio" type="radio" name="payment_method" value="stripe" checked>
                                        <label for="stripe-radio">Credit Card (Stripe)</label>
                                        <p id="stripe-desc" class="text-muted">
                                            Pay with your credit card via Stripe.
                                        </p>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="2">
                                        <input id="paypal-radio" type="radio" name="payment_method" value="paypal">
                                        <label for="paypal-radio">PayPal</label>
                                        <p id="paypal-desc" class="text-muted">
                                            Pay via PayPal you can pay with your credit card if you don't have a PayPal account.
                                        </p>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="2" style="margin: 0 auto; text-align: center;">
                                            <a  @click.prevent="checkout" class="btn btn-success" style="width: 200px; height: 50px; vertical-align: middle; display: table-cell;  padding: 0;">
                                                Place your order &nbsp; <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                                            </a>
                                    </th>
                                </tr>
                            
                        </td><!--payment-method-forums-td end -->
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</div>
</div>

<!--//script here-->


</div>
</div>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>