 
 <?php
			//CartTotal = TotalPrice of all items in the cart
 $cartTotal = 0;
 $totalQuantity = 0;

 
 $var =SAM\Classes\Session::get('SESSION_USER_NAME');

		//echo "SESSION[$var]= ";
		//var_dump($_SESSION[$var]); //where did I do this ?

		//echo "SESSION['user_cart']= "; 
		//var_dump($_SESSION['user_cart']); //expect to be the same as Session(username) + Session(user_cart);

		//echo "SESSION[total]= ";
		//var_dump(_getUserCart()); //get total item_cart

		//echo "After _getUserCart= ";
		//var_dump($_SESSION['user_cart']);
 
 if(isset($_SESSION['user_cart'])){

		//if(isset($_SESSION['user_cart'])){
			//foreach($_SESSION['user_cart'] as $cart_items){
		//if(_getUserCart()){
 	foreach($_SESSION['user_cart'] as $cart_items){
			//foreach(_getUserCart() as $cart_items){
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
							
							<?php if(!_isAuthenticated()): ?>
							<a href="/sam_public/login" class="btn btn-success btn-sm">
								Welcome Guest!! 
							</a>
							<?php else: ?>
							<a href="/sam_public/customer" class="btn btn-success btn-sm">

								<?php echo e(SAM\Classes\Session::get('SESSION_USER_NAME')); ?>

							</a>
							<?php endif; ?>
							<a href="/sam_public/cart">Shopping Cart Total Price: <?php echo e($cartTotal); ?> and Total Item <?php echo e($totalQuantity); ?></a>
						</div>
						<div class="col-md-6"> <!--Header start-->
							<ul class="menu">
								<li>
									
									<a href="/sam_public/customer_register" >Register</a>
								</li>
								<?php if(_isAuthenticated()): ?>
								<li>
									
									<a href="#">My Account</a>
								</li>
								<?php endif; ?>
								<li>
									<a href="/sam_public/cart">Go to Cart</a>
								</li>
								<li>
									<?php if(!_isAuthenticated()): ?>
									<a href="/sam_public/login">Login</a>
									<?php else: ?>
									<a href="/sam_public/logout">Logout</a>
									<?php endif; ?>                        
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
					</div>
					<div class="clearfix" style=" border-bottom: solid 1px #9adacd; text-align: left;  margin-top: 11px; ">
						<form class="navbar-form" method="get" action="/sam_public/result">

							<span class="dropdown">
								
								<button  value="All" name="all"  class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false" style="height: 33px;">
									All <!-- comeback to do the all category-->
								</button>
								
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Separated link</a>
								</div>
							</span>

							<div class="input-group"><!--input-group start-->
								<input class="form-control" type="text" placeholder="Search" name="user_query" style="width: 870px" required>
								<span class="input-group-btn"><!--input-group-btn start-->
									<button type="submit" value="Search" name="search" class="btn btn-primary" style="height: 33px;">
										<i class="fa fa-search"></i>
									</button>
								</span>
							</div>

						</form>
					</div>
					<a class="btn btn-primary navbar-btn right" style="margin-right: 15px;" href="cart.php"><!--btn btn-primary navbar-btn right start-->
						<i class="fa fa-shopping-cart"></i>
						<span> <?php echo e($totalQuantity); ?> items in cart</span>
					</a>


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
									
									<?php if(!_isAuthenticated()): ?>
									<a href ="/sam_public/login">My Account</a>
									<?php else: ?>
									<a href ="/sam_public/customer">My Account</a>
									
									<?php endif; ?>
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









		</div>
	</div>

</div>

<!--End of Navigator bar-->
