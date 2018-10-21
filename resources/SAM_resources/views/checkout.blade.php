@extends('layouts.app')
@section('title', 'checkout')
@section('data-page-id', 'checkout')

@section('content')


<div id="content"><!--content start -->
    <div class="container"><!--container start-->
        <div class="col-md-12"><!--col-md-12 start-->
            <ul class="breadcrumb"><!--breadcrumb start -->
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    Register
                </li>
            </ul>
        </div> <!--col-md-12 end-->

        <div class="col-md-3"><!-- col-md-3-->
            <?php include ("includes/sidebar.php");?>
        </div>

        <!-- checkout code start here -->
        <div class="col-md-9"> <!--col-md-9 start -->
            <?php
            if(!isset($_SESSION['customer_username']))
            {
                include('customer/customer_login.php');
            }else{
                include ('payment_option.php');
            }
            ?>
        </div>

    </div> <!--container end-->
</div> <!--content end-->
@stop


