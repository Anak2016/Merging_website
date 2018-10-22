@extends('layouts.app')
@section('title', 'hot_deal')
@section('data-page-id', 'hot_deal')

@section('content')

<div id="content"><!--content start -->
    <div class="container"><!--container start-->
        <div class="col-md-12"><!--col-md-12 start-->
            <ul class="breadcrumb"><!--breadcrumb start -->
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    Hot's Deal
                </li>
            </ul>
        </div> <!--col-md-12 end-->

        <div class="col-md-3"><!-- col-md-3-->
            @include('includes/product-sidebar');
        </div>

        <div class="col-md-9"><!-- col-md-9 start-->
            <div class="box"><!-- box start -->
                <h1>Hot Deal, Deal of the day!</h1>
                <p> This is the Hot Deal Page, Everything on this page is FAKE!!!</p>

            </div>

            <div class="row"><!--row start -->
                <!-- list product1-->
                @foreach($products as $product)
                    <div class="col-md-4 col-sm-6 center-responsive"><!--col-md-4 col-sm-6 center-responsive -->
                    <div class="product"><!--product start -->
                        <a href="details/{{$product->id}}"><!--a start -->
                            <img src="{{$product->image_path1}}" class="img-responsive">
                        </a>
                        <div class="text"><!--text start -->
                            <h3>
                                <a href="details.php">{{$product->name}}</a>
                            </h3>
                            <p class="price">{{$product->price}}</p>

                            <p class="buttons">
                                <a href="details/{{$product->id}}" class="btn btn-default">View details</a>
                                <a href="#" class="btn btn-primary">
                                    <i class="fa fa-shopping-cart"></i>Add to Cart
                                </a>
                            </p>
                        </div>

                    </div>

                </div>
                @endforeach
                
            </div>

            {{-- {!!$links !!} --}}

        </div>


    </div> <!--container end-->
</div> <!--content end-->
@stop
