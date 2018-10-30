{{-- add price of all product in cart here --}}
<?php
			//CartTotal = TotalPrice of all items in the cart
		$cartTotal = 0;
		$totalQuantity = 0;

		if(isset($_SESSION['user_cart'])){
			foreach($_SESSION['user_cart'] as $cart_items){

				$productId = $cart_items['product_id'];

					//quantity of items in the cart NOT quatity of item availble in the shop
				$quantity = $cart_items['quantity'];

				$item = SAM\Models\Product::where('id', $productId)->first();

					//if for some reason, no matching id can be found. skip the item to avoid problems
				if(!$item) {continue;}
					//totalPrice of selected item * quantity in the cart
				$totalPrice = $item->price * $quantity;
					//CartTotal = TotalPrice of all items in the cart
				$cartTotal = $totalPrice + $cartTotal;
				$totalPrice = number_format($totalPrice, 2 );
					// echo '/'.str_replace("\\","/",$product->image_path);
				$totalQuantity = $totalQuantity + $quantity;
			}

			$cartTotal = number_format($cartTotal, 2);
				SAM\Classes\Session::add('cartTotal', $cartTotal); // late will use this session to charge 
		}
?>
<div class="navbar navbar-default navbar-fixed-top" id="navbar">
<!-- navebar     -->
	<div id="top"> <!-- top start-->
		<div class="container"> <!-- container start-->
			<div class="col-md-6 offer">
				@if(!_isAuthenticated())
				<a href="/sam_public/login" class="btn btn-success btn-sm">
					Welcome Guest!!
				</a>
				@else
				<a href="/sam_public/customer" class="btn btn-success btn-sm">
					{{SAM\Classes\Session::get('SESSION_USER_NAME')}}
				</a>
				@endif
				<a href="/sam_public/cart">Shopping Cart Total Price: {{$cartTotal}} and Total Item {{$totalQuantity}}</a>
			</div>
			<div class="col-md-6"> <!--Header start-->
				<ul class="menu">
					<li>
						{{--  customer_register--}}
						<a href="/sam_public/customer_register" >Register</a>
					</li>
					@if(_isAuthenticated())
						<li>
							{{-- customer/my_account --}}
							<a href="#">My Account</a>
						</li>
					@endif
					<li>
						<a href="/sam_public/cart">Go to Cart</a>
					</li>
					<li>
						@if(!_isAuthenticated())
						<a href="/sam_public/login">Login</a>
						@else
						<a href="/sam_public/logout">Logout</a>
						@endif                        
					</li>

				</ul>
			</div>

		</div>
	</div>

 <!--navbar navbar-default start-->
	<div class="container"> <!--container start-->
		<div class="navbar-header"><!-- navbar-header Start-->
			<a class="navbar-brand home" href="/sam_public"><!--navbar-brand home start-->
				<img src="/sam_public/images/EiShops_resize.png" alt="E-commerce Logo" class="hidden-xs" style="margin-top: 5px;">
				<img src="/sam_public/images/EiShops_resize.png" alt="E-commerce Logo" class="visible-xs" style="margin-top: 5px;">

			</a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
				<span class="sr-only">Toggle Navigation</span>
				<i class="fa fa-align-justify"></i>
			</button>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
				<span class="sr-only">Toggle Search</span>
				<i class="fa fa-search"></i>
			</button>
		</div>
		<div class="navbar-collapse collapse" id="navigation"> <!--navbar-collapse collapse Starts-->
			<div class="padding-nav"> <!--padding-nav Starts-->
				<ul class="nav navbar-nav navbar-left"><!-- nav navbar-nav navbar-left start-->
					
					<li class="active">
						<a href="/sam_public/">Home</a>
					</li>
					<li>
						<a href="/sam_public/shop">Shop</a>
					</li>
					<li>
						<a href="/sam_public/hot_deal">Hot's Deal</a>
					</li>
					<li>
						{{-- customer/my_account.php --}}
						@if(!_isAuthenticated())
							<a href ="/sam_public/login">My Account</a>
						@else
							<a href ="/sam_public/customer">My Account</a>
							
						@endif
					</li>
					<li>
						<a href="/sam_public/cart">Shopping Cart</a>
					</li>
					<li>
						<a href="#">Sell</a>
					</li>
					<li>
						<a href="/sam_public/contact">Contact Us</a>
					</li>
				</ul>
			</div>
			<a class="btn btn-primary navbar-btn right" href="cart"><!--btn btn-primary navbar-btn right start-->
				<i class="fa fa-shopping-cart"></i>
				<span> {{$totalQuantity}}</span>
			</a>
			<div class="navbar-collapse collapse right"><!--navbar-collapse collapse right start-->
				<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search" style="height: 33px;">
					<span class="sr-only">Toggle Search</span>
					<i class="fa fa-search"></i>
				</button>
			</div>

			<div class="collapse clearfix" id="search"> <!--collapse clearfix starts-->
				<form class="navbar-form" method="get" action="/sam_public/result"><!--navbar-form start-->
					<button type="button" value="All" name="all" class="btn btn-primary" style="height: 33px;">
						All <!-- comeback to do the all category -->
					</button>
					<div class="input-group"><!--input-group start-->
						<input class="form-control" type="text" placeholder="Search" name="user_query" style="width: 995px" required>
						<span class="input-group-btn"><!--input-group-btn start-->
							<button type="submit" value="Search" name="search" class="btn btn-primary" style="height: 33px;">
								<i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</form>
			</div>

		</div>
	</div>

</div>

<!--End of Navigator bar-->
