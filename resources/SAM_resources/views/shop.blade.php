@extends('layouts.app')
@section('title', 'shop')
@section('data-page-id', 'product')

@section('content')

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

            <div class="row"><!--row start -->
                <div class='box'>
                    <h1>Shop</h1>
                    <p>TEST detail for shop</p>
                </div>
                @foreach($products as $product)
                <div class='col-md-4 col-sm-6' center-responsive>
                    <div class='product'>
                        <a href='details/{{$product->id}}'>
                            <img src='{{$product->image_path1}}' class='img-responsive'>

                        </a>
                        <div class='text'>
                            <h3><a href='details/{{$product->id}}'>$pro_title</a></h3>
                            <p class='price'>$ {{$product->price}}</p>
                            <p class='buttons'>
                                <a href='details/{{$product->id}}' class='btn btn-default'>View Details</a>
                                <a href='details/{{$product->id}}' class='btn btn-primary'>
                                    <i class='fa fa-shopping-cart'></i> Add to Cart
                                </a>
                            </p>

                        </div>

                    </div>
                </div>
                @endforeach
            </div>
            {{-- {!!$links!!} --}}
        </div>


    </div> <!--container end-->
</div> <!--content end-->

@stop

