@extends('customers.customer')
@section('title', 'DeleteAccount')
@section('data-page-id', 'auth')
@section('select')
<center>
	<h1>Do you really want to delete your account?</h1>
	<form action="/sam_public/customer/delete" method="post">
		<input type="hidden" name="token" value="{{ \SAM\Classes\CSRFToken::_token() }}">
		<input class="btn btn-danger" type="submit" name="yes" value="Yes, I want to delete">
	</form>
</center>
@endsection
