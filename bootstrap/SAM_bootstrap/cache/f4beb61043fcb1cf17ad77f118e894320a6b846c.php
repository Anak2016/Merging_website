<?php $__env->startSection('title', 'hot_deal'); ?>
<?php $__env->startSection('data-page-id', 'product'); ?>

<?php $__env->startSection('content'); ?>

<div id="content"><!--content start -->
    <div class="container"><!--container start-->
        <div class="col-md-12"><!--col-md-12 start-->
            <ul class="breadcrumb"><!--breadcrumb start -->
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    Hot's Deal
                </li>
            </ul>
        </div> <!--col-md-12 end-->

        <div class="col-md-3"><!-- col-md-3-->
            <?php echo $__env->make('includes/product-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
        </div>

        <div class="col-md-9"><!-- col-md-9 start-->
            <div class="box"><!-- box start -->
                <h1>Hot Deal, Deal of the day!</h1>
                <p> This is the Hot Deal Page, Everything on this page is FAKE!!!</p>

            </div>

            <div class="row"><!--row start -->
                <!-- list product1-->
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 col-sm-6 center-responsive"><!--col-md-4 col-sm-6 center-responsive -->
                    <div class="product"><!--product start -->
                        <a href="details/<?php echo e($product->id); ?>"><!--a start -->
                            <img src="<?php echo e($product->image_path1); ?>" class="img-responsive">
                        </a>
                        <div class="text"><!--text start -->
                            <h3>
                                <a href="details.php"><?php echo e($product->name); ?></a>
                            </h3>
                            <p class="price"><?php echo e($product->price); ?></p>

                            <p class="buttons">
                                <a href="details/<?php echo e($product->id); ?>" class="btn btn-default">View details</a>
                                <a href="#" class="btn btn-primary">
                                    <i class="fa fa-shopping-cart"></i>Add to Cart
                                </a>
                            </p>
                        </div>

                    </div>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>

            

        </div>


    </div> <!--container end-->
</div> <!--content end-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>