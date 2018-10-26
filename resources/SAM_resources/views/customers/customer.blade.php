{{-- add
change_pass
confirm
edit_account
delete_account
my_account
my_orders
customer_login

then check route --}}
@extends('customers.layouts.app')
@section('title', 'Customer')
@section('data-page-id', 'customer')

@section('content')
<div id="content" style="padding-top: 150px;"><!--content start -->
    <div class="container"><!--container start-->
        <div class="col-md-12"><!--col-md-12 start-->
            <ul class="breadcrumb"><!--breadcrumb start -->
                <li>
                    <a href="/sam_public/">Home</a>
                </li>
                <li>
                    My Account
                </li>
            </ul>
        </div> <!--col-md-12 end-->

        <div class="col-md-3"><!-- col-md-3-->
           @include('includes.my-account-sidebar')
        </div>
        <div class="col-md-9"><!--col-md-9 start -->
            <div class="box"><!--box start -->
                {{-- Missing yield('select'); --}}
                @yield('select')
            </div>
        </div>


    </div>
</div>

@endsection