
<?php
	use SAM\Classes\Role;
	if(!Role::middleware('user') || !Role::middleware('user')){
		echo "MISSING VALIDATING ROLE";
	}else{
		echo "MISSING VALIDATING ROLE";
	}
?>
<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu-->
	<div class="panel-heading"><!--panel-heading -->
		<center>
			<img src='/sam_public/images/customer_images/demo_user.png' class='img-responsive'>;
		</center>

		<br>

		<h3 align="center" class="panel-title">
			<a href="checkout">Logout</a>
		</h3>
	</div>

	<div class="panel-body"><!--panel-body -->
		<ul class="nav nav-pills nav-stacked"><!--nav nav-pills nav-stacked start -->

			<li><a href="/sam_public/customer/orders"><i class="fa fa-list" aria-hidden="ture"></i>&nbsp; My Orders</a></li>
			<li><a href="/sam_public/customer/wish-list"><i class="fa fa-edit fa-fw" aria-hidden="true"></i>&nbsp; Wish List</a></li>
			<li><a href="/sam_public/customer/edit"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp; Edit</a></li>
			<li><a href="/sam_public/customer/change_password"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Change Password</a></li>
			<li><a href="/sam_public/customer/delete"><i class="a fa-trash-o" aria-hidden="true"></i>&nbsp; Delete Account</a></li>
			<li><a href="/sam_public/customer/payments"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>&nbsp; Payments</a></li>
			<li><a href="#"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>&nbsp; Logout</a></li>
		</ul>
	</div>


</div>

