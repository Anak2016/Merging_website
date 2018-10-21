
<?php
			//CartTotal = TotalPrice of all items in the cart
		$cartTotal = 0;
		$totalQuantity = 0;

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
?>

<!-- navebar     -->
<div id="top"> <!-- top start-->
	<div class="container"> <!-- container start-->
		<div class="col-md-6 offer">
			
			<?php if(_isAuthenticated()): ?>
			<a href="#" class="btn btn-success btn-sm">
				Welcome Guest!!
			</a>
			<?php else: ?>
			<a href="#" class="btn btn-success btn-sm">
				Username 
			</a>
			<?php endif; ?>
			<a href="#">Shopping Cart Total Price: <?php echo e($cartTotal); ?> and Total Item <?php echo e($totalQuantity); ?></a>
		</div>
		<div class="col-md-6"> <!--Header start-->
			<ul class="menu">
				<li>
					
					<a href="customer_register" >Register</a>
				</li>
				<li>
					
					<a href="#">My Account</a>
				</li>
				<li>
					<a href="cart">Go to Cart</a>
				</li>
				<li>
					<?php if(_isAuthenticated()): ?>
					<a href="checkout">Login</a>
					<?php else: ?>
					<a href="checkout">Logout</a>
					<?php endif; ?>                        
				</li>

			</ul>
		</div>

	</div>
</div>

<div class="navbar navbar-default" id="navbar"> <!--navbar navbar-default start-->
	<div class="container"> <!--container start-->
		<div class="navbar-header"><!-- navbar-header Start-->
			<a class="navbar-brand home" href="/sam_public"><!--navbar-brand home start-->
				<img src="images/EiShops_resize.png" alt="E-commerce Logo" class="hidden-xs" style="margin-top: 5px;">
				<img src="images/EiShops_resize.png" alt="E-commerce Logo" class="visible-xs" style="margin-top: 5px;">

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
						<a href="index">Home</a>
					</li>
					<li>
						<a href="shop">Shop</a>
					</li>
					<li>
						<a href="hot_deal">Hot's Deal</a>
					</li>
					<li>
						
						<a href ="#">My Account</a>
					</li>
					<li>
						<a href="cart">Shopping Cart</a>
					</li>
					<li>
						<a href="#">Sell</a>
					</li>
					<li>
						<a href="contact">Contact Us</a>
					</li>
				</ul>
			</div>
			<a class="btn btn-primary navbar-btn right" href="cart"><!--btn btn-primary navbar-btn right start-->
				<i class="fa fa-shopping-cart"></i>
				<span> <?php echo e($totalQuantity); ?></span>
			</a>
			<div class="navbar-collapse collapse right"><!--navbar-collapse collapse right start-->
				<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search" style="height: 33px;">
					<span class="sr-only">Toggle Search</span>
					<i class="fa fa-search"></i>
				</button>
			</div>
			<div class="collapse clearfix" id="search"> <!--collapse clearfix starts-->
				<form class="navbar-form" method="get" action="#"><!--navbar-form start-->
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