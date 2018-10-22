@extends('customers.customer')

@section('select')

<center><!--center start -->
	<h1>My Orders</h1>
	<p class="leqad">Your order on one place</p>
	<p class="text-muted">
		If you have any questions, please feel free to <a href="contact">contact us,</a> our customer service center is working for you 24/7.
	</p>
</center>

<hr>

<div class="table-responsive"><!--table-responsive start -->
	@if(isset($orders) && count($orders) >0)
	<table class="table table-bordered table-hover"><!--table table-bordered table-hover start -->
		<thead><!--thead start -->
			<tr>
				<th>Order_no</th>
				<th>Date Created</th>
			</tr>
		</thead>
		<tbody> <!--tbody start -->
			@foreach($orders as $order)
			<tr>
				<td>{{$order['order_no']}}</td>
				<td>{{$order['added']}}</td>

			</tr>
			@endforeach
		</tbody>
	</table>
	{{-- {!! $links !!} --}}
	@else
	<h2>this order does not exist.</h2>
	@endif
</div>
@endsection
