@extends('customers.customer')
@section('title', 'OrderPage')
@section('data-page-id', 'customerProduct')
@section('select')

<center><!--center start -->
	<h1>My Orders</h1>
	<p class="leqad">Your order on one place</p>
	<p class="text-muted">
		If you have any questions, please feel free to <a href="/sam_public/contact">contact us,</a> our customer service center is working for you 24/7.
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

				@if($buyer_id == $order['user_id'])
					<tr>
						{{-- {{$buyer_id}} --}}
						<td>{{$order['order_no']}}</td>
						<td>{{$order['added']}}</td>
					</tr>
				@endif
			@endforeach
		</tbody>
	</table>
	{!! $links !!}
	{{-- <ul class="pagination " data-pagination-current="1" data-pagination-prev="false" data-pagination-next="2" data-pagination-length="2">
		<li class="pagination--start"><a href="?p=1">&laquo;</a></li>
		<li class="current"><a href="?p=1">1</a></li>
		<li><a href="?p=2">2</a></li>
		<li class="pagination--end"><a href="?p=2">&raquo;</a></li>
	</ul> --}}
	@else
	<h2>this order does not exist.</h2>
	@endif
</div>
@endsection
