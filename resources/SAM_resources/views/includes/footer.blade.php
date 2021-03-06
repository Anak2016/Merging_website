<?php
    $categories = SAM\Models\Category::all();
?>

<div id="footer"><!--footer start-->
    <div class="container"><!-- container start-->
        <div class="row"><!--row start-->
            <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 start-->
                <h4>Pages</h4>
                <ul><!-- ul start-->
                    <li><a href="/sam_public/cart">Shopping Cart</a></li>
                    <li><a href="/sam_public/contact">Contact Us</a> </li>
                    <li><a href="/sam_public/shop">Shop</a> </li>
                    <li><a href="/sam_public/customer">My Account</a> </li>
                </ul>
                <hr>
                <h4>User Section</h4>
                <ul><!-- ul start-->
                    <li><a href="/sam_public/login">Login</a> </li>
                    <li><a href="/sam_public/customer_register">Register</a> </li>
                </ul>
                <hr class="hidden-md hidden-lg hidden-sm">
            </div>

            <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6-->
                <h4>Top Products Categories</h4>
                <ul>
                    @foreach($categories as $category)
                         <li><a href='shop/{{$category->id}}'> {{$category->name}} </a> </li>
                    @endforeach
                </ul>
                <hr class="hidden-md hidden-lg">

            </div>

            <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6-->
                <h4>Where to find us</h4>

                <p>
                    <strong>Nesvio Inc,</strong>
                    <br>Address1
                    <br>Address2
                    <br>Phone#
                    <br>Email
                    <br>
                    <strong>Name Lastname</strong>
                </p>

                <a href="/sam_public/contact">Go to Contact us page</a>

                <hr class="hidden-md hidden-lg">
            </div>

            <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 start -->
                <h4>Get the news</h4>
                <p class="text-muted">news information here.</p>

                <span>NEED TO IMPLEMENT EMAIL SUBSCRIPTION LATER!!! at SEC 5, LEC 107 </span>
                <!--NEED TO IMPLEMENT EMAIL SUBSCRIPTION LATER!!! -->
                <form action="" method="post"><!-- form start-->
                    <div class="input-group"><!--input-group start-->
                        <input type="text" class="form-control" name="email">
                        <span class="input-group-btn"><!--input-group-btn -->
                            <input type="submit" value="subscribe" class="btn btn-default">

                        </span>
                    </div>
                </form>
                <hr>
                <h4>Stay in touch</h4>
                <p class="social"><!-- social start-->
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-envelope"></i></a>
                </p>

            </div>

        </div>
    </div>
</div>


<div id="copyright"><!-- copyright start -->
    <div class="container"><!-- container start -->
        <div class="col-md-6"><!--col-md-6 start -->
            <p class="pull-left">&copy; 2018 Nesvio Inc,</p>
        </div>
        <div class="col-md-6"><!--col-md-6 start -->
            <p class="pull-right">
                Template by <a href="http://nesvio.com">Nesvio.com</a>
            </p>
        </div>
    </div>
</div>
