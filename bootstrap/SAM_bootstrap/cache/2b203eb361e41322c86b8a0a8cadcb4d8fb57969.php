<?php $__env->startSection('title', 'shop'); ?>
<?php $__env->startSection('data-page-id', 'shop'); ?>

<?php $__env->startSection('content'); ?>

<div id="content"><!--content start -->
    <div class="container"><!--container start-->
        <div class="col-md-12"><!--col-md-12 start-->
            <ul class="breadcrumb"><!--breadcrumb start -->
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    Shop
                </li>
            </ul>
        </div> <!--col-md-12 end-->

        <div class="col-md-3"><!-- col-md-3-->
            <?php echo $__env->make('includes/product-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
        </div>

        <div class="col-md-9"><!-- col-md-9 start-->

            <div class="row"><!--row start -->
                <div class='box'>
                    <h1>Shop</h1>
                    <p>TEST detail for shop</p>
                </div>
            </div>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class='col-md-4 col-sm-6' center-responsive>
                    <div class='product'>
                        <a href='details/<?php echo e($product->id); ?>'>
                            <img src='<?php echo e($product->image_path1); ?>' class='img-responsive'>

                        </a>
                        <div class='text'>
                            <h3><a href='details/<?php echo e($product->id); ?>'>$pro_title</a></h3>
                            <p class='price'>$ <?php echo e($product->price); ?></p>
                            <p class='buttons'>
                                <a href='details/<?php echo e($product->id); ?>' class='btn btn-default'>View Details</a>
                                <a href='details/<?php echo e($product->id); ?>' class='btn btn-primary'>
                                    <i class='fa fa-shopping-cart'></i> Add to Cart
                                </a>
                            </p>

                        </div>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </div>


    </div> <!--container end-->
</div> <!--content end-->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>