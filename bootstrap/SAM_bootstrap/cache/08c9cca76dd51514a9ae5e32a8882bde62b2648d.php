<?php $__env->startSection('title', 'details'); ?>
<?php $__env->startSection('data-page-id', 'product'); ?>

<?php $__env->startSection('content'); ?>




<!-- start of left side navigator bar -->
<div id="content"><!--content start -->
    <div class="container"><!--container start-->
        <div class="col-md-12"><!--col-md-12 -->
            <ul class="breadcrumb"><!--breadcrumb start -->
                <li>
                    <a href="/sam_public/">Home</a>
                </li>
                <li>
                    <a href="/sam_public/shop">Shop</a>
                </li>
                <li>
                    <a href="#"><?php echo e($category->name); ?></a>
                </li>
                <li>
                    <?php echo e($product['name']); ?>


                </li>
            </ul>
        </div>

        <div class="col-md-3"><!-- col-md-3-->
            <?php echo $__env->make('includes.product-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

        <!-- begin of product details -->
        <div class="col-md-9"><!--col-md-9 -->

            <div class="row" id="productMain"><!--row start -->

                <div class="col-sm-6"><!--col-sm-6 -->
                    <div id="mainImage"><!--mainImage start-->
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators"><!-- carousel-indicators-->
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner"><!-- carousel-inner-->
                                <div class="item active">
                                    <center>
                                        <img src="<?php echo e($product['image_path1']); ?>" class="img-responsive">
                                    </center>
                                </div>
                                <div class="item">
                                    <center>
                                        
                                    </center>
                                </div>
                                <div class="item">
                                    <center>
                                        
                                    </center>
                                </div>

                            </div>
                            <!--Left arrow for slider -->
                            <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!--left carousel-control start -->
                                <span class="glyphicon glyphicon-chevron-left"></span>

                                <span class="sr-only">Previous</span>
                            </a>
                            <!--Right arrow for slider -->
                            <a class="right carousel-control" href="#myCarousel" data-slide="next"><!--right carousel-control -->
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>


                        </div>
                    </div> <!--mainImage end-->
                </div>   <!--col-sm-6 end -->
                
                <div class="product"  id="product" data-token="<?php echo e($token); ?>" data-id="<?php echo e($product->id); ?>">
                    <div class="col-sm-6"><!--col-sm-6 start -->
                        <div class="box"><!--box start -->
                            
                            <h1 class="text-center">{{stringLimit(product.name, 18)}}</h1>

                            

                                <div class="form-group"><!--form-group -->
                                    <label class="col-md-5 control-label">Product Quantity</label>

                                    <div class="col-md-7"><!--col-md-7 -->
                                        <select name="product_qty" class="form-control">
                                            <option>Select Quantity</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group"><!--form-group -->
                                    <label class="col-md-5 control-label">Product Size</label>
                                    <div class="col-md-7"><!-- col-md-7-->
                                        <select name="product_size" class="form-control">
                                            <option>Select a Size</option>
                                            <option>Small</option>
                                            <option>Medium</option>
                                            <option>Large</option>
                                            <option>X-Large</option>
                                            <option>XX-Large</option>
                                            <option>XXX-Large</option>
                                        </select>
                                    </div>
                                </div>
                                <p class="price">$ <?php echo e($product['price']); ?></p>
                                
                                <p class="text-center buttons">
                                    
                                    <a  v-if="product.quantity > 0" :href="'/sam_public/details/' + product.id" @click.prevent="addToCart(product.id)" class='btn btn-primary'>
                                        <i class='fa fa-shopping-cart'></i> Add to Cart
                                    </a>

                                   <a v-else class='btn btn-danger'disabled>
                                      Out of stock
                                  </a>
                              </p>


                          
                      </div>

                      <div class="row" id="thumbs"><!--row start -->
                        <div class="col-xs-4"><!-- col-xs-4-->
                            <a href="#" class="thumb">
                                <img src="<?php echo e($product['image_path1']); ?>" class="img-responsive">

                            </a>
                        </div>
                        <div class="col-xs-4"><!-- col-xs-4-->
                            <a href="#" class="thumb">
                                <img src="<?php echo e($product['image_path2']); ?>" class="img-responsive">

                            </a>
                        </div>
                        <div class="col-xs-4"><!-- col-xs-4-->
                            <a href="#" class="thumb">
                                <img src="<?php echo e($product['image_path3']); ?>" class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- row Ends-->

        <div class="box" id="details"><!--box start -->
            <p><!--p start-->
                <h4>Product details</h4>
                <p><?php echo e($product['desc']); ?></p>
                <h4>Size</h4>
                <ul>
                    <li>Small</li>
                    <li>Medium</li>
                    <li>Large</li>
                    <li>X-Large</li>
                    <li>XX-Large</li>
                </ul>
            </p>
            <hr>
        </div>


        
        
        <?php echo $__env->make('includes.also-like', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>



    </div>
    <div class="col-md-9" "><!--col-md-9 -->

        <div class="box" id="comments"  style="width: 140%;"><!--comment -->
            <h4>Product Reviews</h4>
            <p>Overall star of the product here</p>
            <hr>
            <?php echo $__env->make('includes.review', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>

    </div>



</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>