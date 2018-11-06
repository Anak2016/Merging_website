@extends('layouts.app')
@section('title', 'checkout')
{{-- may be change data-page-id to cart to be able to use stripe and paypal --}}
@section('data-page-id', 'cart')

@section('stripe-checkout')
<script src="https://checkout.stripe.com/checkout.js"></script>
@endsection

@section('content')
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
                    <h1 class="lead" > Thank you for shopping with Ei-shops, {{_user()->username}}</h1>
					<a href="/sam_public/shop">GO BACK</a>
                </div><!-- box end-->
            </div><!--col-md-8 end -->
            
    </div>

</div>
</div>

<!--//script here-->


</div>
</div>

@stop