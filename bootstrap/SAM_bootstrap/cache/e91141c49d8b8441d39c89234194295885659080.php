<?php $__env->startSection('title', 'Search Results'); ?>
<?php $__env->startSection('data-page-id', 'search'); ?>
<?php $__env->startSection('content'); ?>


<input type="hidden" id="keyword" value="<?php echo e($keyword); ?>">

<div class="display-products" data-token="<?php echo e($token); ?>"  id="root">
    <div id="content" style="padding-top: 150px;" ><!-- content Starts -->
        <div class="container" ><!-- container Starts -->

            <div class="col-md-12" ><!--- col-md-12 Starts -->

                <ul class="breadcrumb" ><!-- breadcrumb Starts -->

                    <li>
                        <a href="index.php">Home</a>
                    </li>

                    <li>Search Results</li>

                </ul><!-- breadcrumb Ends -->

            </div><!--- col-md-12 Ends -->

            <div class="col-md-12" ><!-- col-md-12 Starts --->

                <div class="col-md-3"><!-- col-md-3-->
                    <?php echo $__env->make('includes/product-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
                </div>

                <div class="col-md-9"><!-- col-md-9 start-->
                    
                    <div class="box"><!-- box start -->
                        <h1>Search result for "<?php echo e($keyword); ?>"</h1>
                        

                    </div>
                    <div v-if="countSearches  > 0" class="row"><!--row start-->
                        <div class='col-md-4 col-sm-6 single' v-cloak v-for="product in searchProducts">
                            
                            <div class='product'>
                                <div v-if="product.label == 1" class='box_sale'>
                                 <div class='ribbon'><span>Sale</span>
                                    <a :href="'/sam_public/details/' + product.id">
                                        <img :src='product.image_path1' class='img-responsive'>
                                    </a>
                                </div>
                            </div>
                            <div v-else>
                                <a :href="'/sam_public/details/' + product.id">
                                    <img :src='product.image_path1' class='img-responsive'>
                                </a>
                            </div>

                            <div class='text'>
                                <h3>
                                    <a :href="'/sam_public/details/' + product.id">
                                        {{stringLimit(product.name, 18)}}
                                    </a> 
                                </h3>

                                <div v-if="product.label == 1" class="row">
                                    <p class='price'><strike>$ {{product.price}}</strike></p>
                                    <p class='price'>$ {{product.sale_price}}</p>
                                </div>
                                <div v-else>
                                    <p class ='price'>$ {{product.price}}</p>
                                </div>

                                <p class="price">Quantity: {{product.quantity}}</p>
                                <p class='buttons'>
                                    <a :href="'/sam_public/details/' + product.id" class='btn btn-default'>View Details</a>
                                    <a  v-if="product.quantity > 0" :href="'/sam_public/details/' + product.id" @click.prevent="addToCart(product.id)" class='btn btn-primary'>
                                        <i class='fa fa-shopping-cart'></i> Add to Cart
                                    </a>
                                    <a v-else class='btn btn-danger'disabled>
                                      Out of stock
                                  </a>
                              </p>
                          </div>

                      </div>

                  </div>
              </div>
              <div v-else>
                <h1>No Search Item</h1>
            </div>
            
        </div>
    </div><!-- col-md-9 Ends --->

</div><!-- container Ends -->

</div><!-- content Ends -->
</div>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>