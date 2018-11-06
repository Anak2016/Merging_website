@extends('layouts.app')
@section('title', 'shop')
@section('data-page-id', 'home')

@section('content')

<div class="display-products" data-token="{{$token}}"  id="root">
    <div id="content"><!--content start -->
        <div class="container"><!--container start-->
            <div class="col-md-12"><!--col-md-12 start-->
                <ul class="breadcrumb"><!--breadcrumb start -->
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        Shop
                    </li>
                </ul>
            </div> <!--col-md-12 end-->

            <div class="col-md-3"><!-- col-md-3-->
                @include('includes/product-sidebar');
            </div>

            <div class="col-md-9"><!-- col-md-9 start-->
                {{-- <h1>HERE</h1> --}}
                <div class="box"><!-- box start -->
                    <h1>Shop!</h1>
                    <p> items from -insert country-</p>

                </div>
                <div v-if="countProducts  > 0" class="row"><!--row start-->
                    <div class='col-md-4 col-sm-6 single' v-cloak v-for="product in products">
                        {{-- <h1>HERE</h1> --}}
                        <div class='product'>
                            <div class="box_sale">
                                <div v-if="product.label == 1" class="ribbon"><span>Sale</span>
                                    <a :href="'/sam_public/details/' + product.id">
                                        <img :src='product.image_path1' class='img-responsive'>
                                    </a>
                                </div>
                            </div>
                            <div class='text'>
                                <h3>
                                    <a :href="'/sam_public/details/' + product.id">
                                        {{-- product.name is not a string --}}
                                        @{{stringLimit(product.name, 18)}} 
                                    </a> 
                                </h3>
                                <p class='price'>$ @{{product.price}}</p>
                                <p class="price">Quantity: @{{product.quantity}}</p>
                                <p class='buttons'>
                                    <a :href="'/sam_public/details/' + product.id" class='btn btn-default'>View Details</a>
                                    <a  v-if="product.quantity > 0" :href="'/sam_public/details/' + product.id" @click.prevent="addToCart(product.id)" class='btn btn-primary'>
                                        <i class='fa fa-shopping-cart'></i> Add to Cart
                                    </a>
                                    <a v-else class='btn btn-danger'disabled>
                                      Out of stock
                                  </a>
                              </p>
                          </div>


                      </div>

                  </div>
              </div>
              <div v-else>
                <h1>No Deal Item</h1>
            </div>
            {{-- {!!$links !!} --}}
            {{-- <pre>
                @{{products}}
            </pre> --}}

        </div>

    </div> <!--container end-->
</div> <!--content end-->
</div> 

@stop
