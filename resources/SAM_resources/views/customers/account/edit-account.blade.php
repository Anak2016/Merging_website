@extends('customers.customer')
@section('title', 'EditAccount')
@section('data-page-id', 'auth')
@section('select')


<h1 align="center">Edit Your Account</h1>

<form action="/sam_public/edit/{{$user['id']}}" method="post" enctype="/sam_public/customer/edit/{{$user['id']}}"><!--form start -->
    <div class="form-group"><!--form-group start -->
        <label>Email:</label>
        <input type="text" class="form-control" name="c_email" value="{{$user['email']}}" required>
    </div>
    <div class="form-group"><!--form-group -->
        <label>Username:</label>
        <input type="text" class="form-control" name="c_name" value="{{$user['username']}}" required>
    </div>
    <div class="form-group"><!--form-group start -->
        <label>Password:</label>
        <input type="password" class="form-control" name="c_country" value="{{$user['password']}}" required>
    </div>
    <div class="form-group"><!--form-group start -->
        <label>Address:</label>
        <input type="text" class="form-control" name="c_address" value="{{$user['address']}}" required>
    </div>
    <div class="form-group"><!--form-group start -->
        <label>city:</label>
        <input type="text" class="form-control" name="c_city" value="{{$user['city']}}" required>
    </div>
    <div class="form-group"><!--form-group start -->
        <label>State:</label>
        <input type="text" class="form-control" name="c_state" value="{{$user['state']}}" required>
    </div>
    <div class="form-group"><!--form-group start -->
        <label>Zip code:</label>
        <input type="text" class="form-control" name="c_zipcode" value="{{$user['zipcode']}}" required>
    </div>
    <div class="form-group"><!--form-group start -->
        <label>Phone No:</label>
        <input type="text" class="form-control" name="c_phone" value="{{$user['phone']}}" required>
    </div>
    <div class="form-group"><!--form-group start -->
        <label>Your Image:</label>
        <input type="file" class="form-control" name="c_image" >
    </div>

    <div class="text-center"><!--text-center -->
        <input type="hidden" name="token" value="{{\SAM\Classes\CSRFToken::_token()}}">
        <button type="submit" name="update" class="btn btn-primary">
            <i class="fa fa-user-md"></i> Update Now
        </button>
    </div>
</form>
@endsection
