@extends('customers.customer')
@section('title', 'ChangePassword')
{{-- data-page-id does nothing because it only show payment --}}
@section('data-page-id', 'customerProduct') 

@section('select')

<?php $user_id = SAM\Classes\Session::get('SESSION_USER_NAME') ?>

<div class="product">
	<div clss ="row expanded">
		<div class="column medium-11">
			<h2>Payment History</h2> <hr />
		</div>
	</div>
	<table class="table table-bordered table-hover"><!--table table-bordered table-hover start -->
		<thead><!--thead start -->
			<tr>
				<th>Order_no</th><th>User_id</th><th>total</th><th>status</th>
				<th>Date Created</th>
			</tr>
		</thead>
		<tbody> <!--tbody start -->
			@foreach($payments as $payment)
			<tr>
				<td>{{$payment['order_no']}}</td>
				<td>{{$payment['user_id']}}</td>
				<td>{{$payment['amount']}}</td>
				<td>{{$payment['status']}}</td>
				<td>{{$payment['added']}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{!! $links !!}

</div>
@endsection
