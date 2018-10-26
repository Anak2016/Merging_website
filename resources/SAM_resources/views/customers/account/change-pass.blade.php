@extends('customers.customer')
@section('title', 'ChangePassword')
@section('data-page-id', 'auth')
@section('select')

<h1 align="center">Change Password</h1>

<form action="#" method="post"><!--form start -->
    <div class="form-group"><!--form-group start -->
        <label>Enter Your Current Password:</label>
        <input type="text" name="old_pass" class="form-control" sequired>
    </div>
    <div class="form-group"><!--form-group start -->
        <label>Enter Your New Password:</label>
        <input type="text" name="new_pass" class="form-control" required>
    </div>
    <div class="form-group"><!--form-group start -->
        <label>Enter Your New Password Again:</label>
        <input type="text" name="new_pass_again" class="form-control" required>
    </div>
    <div class="text-center"><!--text-center start -->
        <button type="submit" name="submit" class="btn btn-primary" >
            <i class="fa fa-user-md"></i>Change Password
        </button>
    </div>




</form>

@endsection
