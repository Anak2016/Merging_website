@extends('layouts.app')
@section('title', 'home')
@section('data-page-id', 'home')

@section('content')



<div class="container" id="slider"><!-- containner slider start-->
    <div class="col-md-12"><!--col-md-12-->
        <div id="myCarousel" class="carousel slide" data-ride="carousel"><!--carousel slide start-->
            <ol class="carousel-indicators"><!--carousel-indicators-->
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1" ></li>
                <li data-target="#myCarousel" data-slide-to="2" ></li>
                <li data-target="#myCarousel" data-slide-to="3" ></li>
            </ol>
            <div class="carousel-inner"><!--carousel-inner start-->
                <!--insert php for slider here -->
                @foreach($sliders as $slider)
                <div class='item active'>
                    <img src='{{$slider->image_path}}' alt="image holder">
                </div>
                @endforeach
                
            </div>

            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><!--left carousel-control-->
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><!--right carousel-control-->
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>

            </a>

        </div>
    </div>
</div>

{{-- auto generate form DB by illuminate --}}
<div id="advantages"><!--advantages start -->
    <div class="container"> <!--container start -->
        <div class="same-height-row"><!--same-height-row start-->
            <div class="col-sm-4"><!--col-sm-4 start -->
                <div class="box same-height"><!--box same-height start-->
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                    </div>
                    <h3><a href="#">Thailand</a></h3>
                    <p>Country 1 Product List</p>

                </div>
            </div>
            <div class="col-sm-4"><!--col-sm-4 start -->
                <div class="box same-height"><!--box same-height start-->
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                    </div>
                    <h3><a href="#">USA</a></h3>
                    <p>Country 2 Product List</p>

                </div>
            </div>
            <div class="col-sm-4"><!--col-sm-4 start -->
                <div class="box same-height"><!--box same-height start-->
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                    </div>
                    <h3><a href="#">Japan</a></h3>
                    <p>Country 3 Product List</p>

                </div>
            </div>
            <div class="col-sm-4"><!--col-sm-4 start -->
                <div class="box same-height"><!--box same-height start-->
                    <div class="icon">
                        <i class="fa fa-tags"></i>
                    </div>
                    <h3><a href="#">Sri Lanka</a></h3>
                    <p>Country 4 Product List</p>

                </div>
            </div>
            <div class="col-sm-4"><!--col-sm-4 start -->
                <div class="box same-height"><!--box same-height start-->
                    <div class="icon">
                        <i class="fa fa-tags"></i>
                    </div>
                    <h3><a href="#">South Korean</a></h3>
                    <p>Country 5 Product List</p>

                </div>
            </div>
            <div class="col-sm-4"><!--col-sm-4 start -->
                <div class="box same-height"><!--box same-height start-->
                    <div class="icon">
                        <i class="fa fa-tags"></i>
                    </div>
                    <h3><a href="#">Philiphines</a></h3>
                    <p>Country 6 Product List</p>

                </div>
            </div>
            <div class="col-sm-4"><!--col-sm-4 start -->
                <div class="box same-height"><!--box same-height start-->
                    <div class="icon">
                        <i class="fa fa-thumbs-up"></i>
                    </div>
                    <h3><a href="#">England</a></h3>
                    <p>Country 7 Product List</p>

                </div>
            </div> <div class="col-sm-4"><!--col-sm-4 start -->
                <div class="box same-height"><!--box same-height start-->
                    <div class="icon">
                        <i class="fa fa-thumbs-up"></i>
                    </div>
                    <h3><a href="#">Russia</a></h3>
                    <p>Country 8 Product List</p>

                </div>
            </div>
            <div class="col-sm-4"><!--col-sm-4 start -->
                <div class="box same-height"><!--box same-height start-->
                    <div class="icon">
                        <i class="fa fa-thumbs-up"></i>
                    </div>
                    <h3><a href="#">Brazil</a></h3>
                    <p>Country 9 Product List</p>

                </div>
            </div>
            <!-- end of country category-->

        </div>
    </div>
</div>

<div id="root">
    
    <div id="hot"><!-- hot start-->
        <div class="box"><!-- box start-->
            <div class="container"><!--container start-->
                <div class="col-md-12"><!--col-md-12 start -->
                    <h2>Today's Deal</h2>
                </div>
            </div>
        </div>
    </div>
    <!--Today's Deal product start-->
    <div id="content" class="container"><!-- container start-->
        <div class="row"><!--row start-->
            @foreach($deals as $deal)
            <div class='col-md-4 col-sm-6 single'>
                <div class='product'>
                    <a href='details/{{$deal->id}}'>
                        <img src='{{$deal->image_path1}}' class='img-responsive'>
                    </a>

                    <div class='text'>
                        <h3><a href='details/{{$deal->id}}'>{{$deal->name}}</a> </h3>
                        <p class='price'>${{$deal->price}}</p>
                        <p class='buttons'>
                            <a href='details/{{$deal->id}}' class='btn btn-default'>View Details</a>
                            <a href='details/{{$deal->id}}' class='btn btn-primary'>
                                <i class='fa fa-shopping-cart'></i> Add to Cart
                            </a>

                        </p>
                    </div>

                </div>

            </div>
            @endforeach

        </div>
    </div>

    <div id="hot"><!-- hot start-->
        <div class="box"><!-- box start-->
            <div class="container"><!--container start-->
                <div class="col-md-12"><!--col-md-12 start -->
                    <h2>Popular Product</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- auto generate form DB by illuminate --}}
    <!--Popular Product start here -->
    <div id="content" class="container"><!-- container start-->
        <div class="row"><!--row start-->
            <!-- first product start here-->

            @foreach($populars as $popular)
            <div class="col-sm-4 col-sm-6 single"><!--col-sm-4 col-sm-6 single start-->
                <div class="product"><!--product start-->
                    <a href="details/{{$popular->id}}">
                        <img src="{{$popular->image_path1}}" class="img-responsive">
                    </a>
                    <div class="text"><!-- text start-->
                        <h3><a href="details/{{$popular->id}}">{{$popular->name}}</a></h3>
                        <p class="price">${{$popular->price}}</p>
                        <p class="price">Quantity: {{$popular->quantity}}</p>
                        <p  class="button">
                            {{-- send post route to cartController --}}
                            <a href="#" class="btn btn-default"> View Details</a>
                            <a href="#" class="btn btn-primary">
                                <i class="fa fa-shopping-cart">Add to cart</i>
                            </a>
                        </p>
                        {{-- differnce of product and popular --}}
                        {{-- <p v-if="product.quantity > 0" @click.prevent="addToCart(product.id)" class="button">
                            <a href="details.php" class="btn btn-default"> View Details</a>
                            <a href="details.php" class="btn btn-primary">
                                <i class="fa fa-shopping-cart">Add to cart</i>
                            </a>
                        </p> --}}
                        {{-- <p v-else class="button">
                            <a href="details.php" class="btn btn-default"> View Details</a>
                            <a href="details.php" class="btn btn-primary">
                                <i class="fa fa-shopping-cart">Add to cart</i>
                            </a>
                        </p> --}}
                    </div>

                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@stop

