@extends('customers.customer')
@section('title', 'ChangePassword')
{{-- data-page-id does nothing because it only show payment --}}
@section('data-page-id', 'customerProduct') 

@section('select')

<?php $user_id = SAM\Classes\Session::get('SESSION_USER_NAME') ?>

<div class="product">
	<div clss ="row expanded">
		<div class="column medium-11">
			<h2>Order Payment</h2> <hr />
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
				@if($buyer_id == $payment['user_id'])
					<tr>
						<td>{{$payment['order_no']}}</td>
						<td>{{$payment['user_id']}}</td>
						<td>{{$payment['amount']}}</td>
						<td>{{$payment['status']}}</td>
						<td>{{$payment['added']}}</td>
					</tr>
				@endif
			@endforeach
		</tbody>
	</table>
	{!! $links !!}
	{{-- <ul class="pagination " data-pagination-current="1" data-pagination-prev="false" data-pagination-next="2" data-pagination-length="15">
		<li class="pagination--start"><a href="?p=1">&laquo;</a></li>
		<li class="current"><a href="?p=2">1</a></li>
		<li><a href="?p=2">2</a></li>
		<li><a href="?p=3">3</a></li>
		<li class="pagination--end"><a href="?p=2">&raquo;</a></li>
	</ul> --}}

</div>
@endsection
