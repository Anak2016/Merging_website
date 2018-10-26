
@extends('layouts.app')
@section('title', 'customer_register')
@section('data-page-id', 'auth')

@section('content')


<div id="content"><!--content start -->
    <div class="container"><!--container start-->
        <div class="col-md-12"><!--col-md-12 start-->
            <ul class="breadcrumb"><!--breadcrumb start -->
                <li>
                    <a href="/sam_public/">Home</a>
                </li>
                <li>
                    Register
                </li>
            </ul>
        </div> <!--col-md-12 end-->

        <div class="col-md-3"><!-- col-md-3-->
            @include('includes.product-sidebar')
        </div>

        <div class="col-md-9"><!--col-md-9 -->
            <div class="box"><!--box start -->
                <div class="box-header"><!--box-header -->
                    <center><!--center start -->
                        <h2>Register A New Account</h2>

                    </center>
                </div>
                @include("includes.message")
                <form action="/sam_public/customer_register" method="post" enctype="multipart/form-data"><!--form start -->

                    <div class="form-group"><!--form-group start -->
                        <label>First Name:</label>
                        <input type="text" class="form-control" name="firstname"  required>
                    </div>
                    <div class="form-group"><!--form-group start -->
                        <label>Last Name:</label>
                        <input type="text" class="form-control" name="lastname" required>
                    </div>

                    <div class="form-group"><!--form-group start -->
                        <label>User Name:</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>

                    <div class="form-group"><!--form-group start -->
                        <label>Email:</label>
                        <input type="text" class="form-control" name="email" required>
                    </div>

                    <div class="form-group"><!--form-group start -->
                        <label>Password:</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group"><!--form-group start -->
                        <label>Address:</label>
                        <input type="text" class="form-control" name="address" required>
                    </div>
                    <div class="form-group"><!--form-group start -->
                        <label>City:</label>
                        <input type="text" class="form-control" name="city" required>
                    </div>
                    <div class="form-group"><!--form-group start -->
                        <label>State:</label>
                        <input type="text" class="form-control" name="state" required>
                    </div>
                    <div class="form-group"><!--form-group start -->
                        <label>Country:</label>
                        <input type="text" class="form-control" name="country" required>
                    </div>
                    <div class="form-group"><!--form-group start -->
                        <label>Zip code:</label>
                        <input type="text" class="form-control" name="zipcode" required>
                    </div>
                    <div class="form-group"><!--form-group start -->
                        <label>Phone No:</label>
                        <input type="text" class="form-control" name="phone" required>
                    </div>
                    <div class="form-group"><!--form-group start -->
                        <label>Your Image:(.jpg/.gif/.bmp/.png Only)</label>
                        <input type="file" class="form-control" name="image" >
                    </div>

                    
                    <div class="text-center"><!--text-center -->
                        <input type="hidden" name="token" value="{{\SAM\Classes\CSRFToken::_token()}}">
                        <button type="submit" name="Register" class="btn btn-primary">
                            <i class="fa fa-user-md"></i> Register
                        </button>
                    </div>

                </form>
            </div>
        </div>


    </div> <!--container end-->
</div> <!--content end-->
@stop

