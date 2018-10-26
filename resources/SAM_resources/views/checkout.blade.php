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
			@include('includes.product-sidebar')
		</div>

        <div id="shopping_cart"> 
            <!-- checkout code start here -->
            <div class="col-md-9"> <!--col-md-9 start -->

                <div class="box"><!--box start -->
                    <h1 class="text-center">Please choose your payment option.</h1>
                    <p class="lead text-center"></p>
                    {{-- id=properties --}}
                    {{-- _user() is a helper function  --}}
                    <span id="properties" class="hide" data-customer-email="{{_user()->email }}" data-stripe-key="{{ \SAM\Classes\Session::get('publishable_key')}}">
                    </span>

                    {{-- stripe --}}
                    <button @click.prevent="checkout" v-if="authenticated" class="btn btn-default">
                        Checkout with Stripe &nbsp; <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                    </button>   
                    <span v-else>
                        <a href="/sam_public/login" class="btn btn-default">
                            Checkout with Stripe &nbsp; <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                        </a>
                    </span>
                    <br /><br />

                    {{-- paypal --}}
                    <button @click.prevent="" v-if="authenticated" class="btn btn-success">
                        Checkout with PayPal &nbsp; <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                    </button>   
                    <span v-else>
                        <a href="/sam_public/login" class="btn btn-success">
                            Checkout with PayPal &nbsp; <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                        </a>
                    </span>
                    <br /><br />
                    {{-- credit card --}}

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

@stop


