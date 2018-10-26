<?php $__env->startSection('title', 'login'); ?>
<?php $__env->startSection('data-page-id', 'auth'); ?>

<?php $__env->startSection('content'); ?>

<div id="content"><!--content start -->
    <div class="container"><!--container start-->
        <div class="col-md-12"><!--col-md-12 start-->
            <ul class="breadcrumb"><!--breadcrumb start -->
                <li>
                    <a href="/sam_public/">Home</a>
                </li>
                <li>
                    login
                </li>
            </ul>
        </div> <!--col-md-12 end-->
        
        <div class="col-md-3"><!-- col-md-3-->
            <?php echo $__env->make('includes.product-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
        </div>
        <div class="col-md-9">
            <div class="box"><!--box -->
                <div class="box-header" style="margin: -30px -30px -30px;"><!--box-header -->
                    <center>
                        <h1>Login</h1>
                        <p class="/sam_public/lead">Already our Customer? Please login to your account.</p>
                    </center>
                    <div class="row"><!--row start -->
                        <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <form action="/sam_public/login" method="post"><!--form start -->
                            <div class="form-group"><!--form-group start -->
                                <label>Username:</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="form-group"><!--form-group start -->
                                <label>Password:</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="/sam_public/checkbox">
                                <label>
                                    <input name="rememberUserCookie" value="yes" type="checkbox"> Remember Me
                                </label>
                            </div>
                            <div class="text-center"><!--text-center start -->
                                <input type="hidden" name="token" value="<?php echo e(\SAM\Classes\CSRFToken::_token()); ?>">
                                <button name="loginBtn" value="Login" class="btn btn-primary">
                                    <i class="fa fa-sign-in"></i> Login
                                </button>
                            </div>
                        </form>
                    </div>
                    <center><!--center start -->
                        <a href="/sam_public/customer_register">
                            <h3>New customer? Please register here.</h3>
                        </a>
                    </center>
                </div>
            </div>  
        </div>
    </div>


</div> <!--container end-->
</div> <!--content end-->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>