<?php 
	//var_dump($orders);exit;
?>

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
	{{-- {{isset($orders)}} --}}
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
					{{-- {{$buyer_id}} --}}
					<td>{{$order['order_no']}}</td>
					<td>{{$order['added']}}</td>
				</tr>
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

	{{-- use jquery to add link 
	1. <li class = "current"><a href=?p=i></a>
	2. <a href="?p=2"> on other non-current class
	3. <li class="pagination--start"><a href="?p = *firstpage* "></a>
		4. <li class="pagination--end"><a href="?p = *lastpage* "></a> --}}
{{-- 	@if($selected < 7)
		@if($count < 7)
			<ul class="pagination">
				<li><a href="#"><<</a></li>	

				@for($i = 1; $i <= $count; $i++)
					<li><a href="#">{{$i}}</a></li>
				@endfor
				
				<li><a href="#">>></a></li>
			</ul>
		@else
			<ul class="pagination">
				<li><a href="#"><<</a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">6</a></li>
				<li><a href="#">7</a></li>
				<li><a href="#">...</a></li>
				<li><a href="#">>></a></li>
			</ul>
		@endif
	@elseif($selected <7 and $selected > $count-6)
		<ul class="pagination">
			<li><a href="#"><<</a></li>
			<li><a href="#">...</a></li>
			<li><a href="#">$selected-3</a></li>
			<li><a href="#">$count-2</a></li>
			<li><a href="#">$count-1</a></li>
			<li><a href="#">$count</a></li>
			<li><a href="#">$count+1</a></li>
			<li><a href="#">$count+2</a></li>
			<li><a href="#">$count+3</a></li>
			<li><a href="#">...</a></li>
			<li><a href="#">>></a></li>		
		</ul>
	@elseif($selected > $count - 6)
		<ul class="pagination">
			<li><a href="#"><<</a></li>
			<li><a href="#">...</a></li>
			<li><a href="#">$count-6</a></li>
			<li><a href="#">$count-5</a></li>
			<li><a href="#">$count-4</a></li>
			<li><a href="#">$count-3</a></li>
			<li><a href="#">$count-2</a></li>
			<li><a href="#">$count-1</a></li>
			<li><a href="#">$count</a></li>
			<li><a href="#">>></a></li>
		</ul>
		@endif --}}
		
		

		@else
		<h2>this order does not exist.</h2>
		@endif
	</div>
	@endsection
