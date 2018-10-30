@extends('layouts.app')
@section('title', 'Cart')
@section('data-page-id', 'cart')

@section('content')

@section('stripe-checkout')
<script src="https://checkout.stripe.com/checkout.js"></script>
@endsection

{{-- How should i use Session('user_cart')????? --}}


<div class="shopping_cart"  id="shopping_cart">
    <div id="content"><!--content start -->
        <div class="container"><!--container start-->
            <div class="col-md-12"><!--col-md-12 -->
                <ul class="breadcrumb"><!--breadcrumb start -->
                    <li>
                        <a href="/sam_public/">Home</a>
                    </li>
                    <li>
                        Cart
                    </li>
                </ul>
                <div class ="crumb_body">
                    <div class="breadcrumb_nav flat" >
                        <a href="/sam_public/cart" class="active">Shopping Cart</a>
                        <a href="/sam_public/checkout">Checkout Details</a>
                        <a href="/sam_public/order-complete" >Order Complete</a>
                        {{-- <a href="/sam_public/checkout" >Order Complete</a> --}}
                    </div>
                </div>
            </div>

            <div class="col-md-9" id="cart"><!--col-md-9 start -->

                <div class="box"><!-- box start -->
                    <h1>Shopping Cart</h1>
                    <p class="text-muted">You currently have MISSING php items_in_cart() item(s) in your cart.</p>
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
                            <tbody>                                
                                <tr v-for="item in items">
                                    <td>
                                        <a :href="'/sam_public/product/'+item.id">
                                            <img :src="item.image" alt="" height="60px" width="60px" alt="item.name">
                                        </a>
                                    </td>

                                    <td>

                                        <h5>
                                            <a :href="'/sam_public/product/'+item.id">
                                                {{-- @{{item.name}} --}}
                                                @{{stringLimit(item.name,18)}}
                                            </a>
                                        </h5>
                                        Status:
                                        <span v-if="item.stock >= 1" style="color: #00AA00;">In Stock</span>
                                        <span v-else style="color: #ff0000;">Out of Stock</span>
                                    </td>
                                    <td>@{{item.price}}</td>
                                    <td>
                                        @{{item.quantity}}
                                        <button  v-if="item.stock > item.quantity" @click="updateQuantity(item.id, '+')" style="cursor: pointer; color: #00AA00;">
                                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                                        </button>
                                        <button v-if="item.quantity > 1" @click="updateQuantity(item.id, '-')" style="cursor: pointer; color: #ff8000;">
                                            <i class="fa fa-minus-square" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                    <td>SIZE</td> 
                                    <td class='text-center'>    
                                        <button @click="removeItem(item.index)">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                    <td>
                                        @{{item.total}}
                                    </td>
                                </tr>
                            </tbody>

                        </table>

                        <table class="table table-bordered">
                            <tr>
                                <col width="200">
                                <col width="300">
                                <td>
                                </td>


                                <td>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td><h6>Subtotal:</h6></td>
                                            <td class="text-right"><h6>$@{{cartTotal}}</h6></td>
                                        </tr>
                                        <tr>
                                            <td><h6>Discount Amount:</h6></td>
                                            <td class="text-right"><h6>$0.00</h6></td>
                                        </tr>
                                        <tr>
                                            <td><h6>Tax:</h6></td>
                                            <td class="text-right"><h6>$0.00</h6></td>
                                        </tr>
                                        <tr>
                                            <td><h6>Total:</h6></td>
                                            <td class="text-right"><h6>$@{{cartTotal}}</h6></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>



                    <div class="box-footer"><!--box-footer -->
                        <div class="pull-left"><!--pull-left -->
                            <a href="/sam_public/" class="btn btn-default">
                                <i class="fa fa-chevron-circle-left"></i>Continue Shopping
                            </a>
                        </div>
                        <div class="pull-right"><!--pull-right -->

                            {{-- update_cart(); --}}
                            <button @click="emptyCart(items)" class="btn btn-default" type="submit"name="empty" value="Update Cart"><i class="fa fa-refresh"></i>Empty Cart</button>
                            <a v-if="authenticated" href="/sam_public/checkout" class="btn btn-primary">
                                &nbsp; Proceed to checkout <i class="fa fa-chevron-right"></i>
                            </a> 
                            <span v-else>
                                <a href="/sam_public/login" class="btn btn-primary">
                                    Proceed to checkout &nbsp; <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                </a>
                            </span>
                        </div>
                    </div>
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
                            {{-- include ('includes/show_order_summary.php') --}}
                            <tbody><!--tbody start -->
                                <tr>
                                    <td>Order Subtotal</td>
                                    <th>$@{{cartTotal}}</th>
                                </tr>
                                <tr>
                                    <td>Cart Total Weight: </td>
                                    <th>0.00 lbs</th>

                                </tr>
                                <tr>
                                    <td>Shipping and handling</td>
                                    <td>$0.00</td>
                                </tr>
                                <tr>
                                   <td>Tax</td>
                                   <td>0.00</td>
                               </tr>
                               <tr class='total'>
                                <td>Total</td>
                                <th>$@{{cartTotal}}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>


    </div>
</div>

@stop
