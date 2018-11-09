@extends('layouts.app')
@section('title', 'hot_deal')
@section('data-page-id', 'home')
{{-- @section('data-page-id', 'hot-deal') --}}

@section('content')
<
<div class="display-products" data-token="{{$token}}"  id="root">
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
                @include('includes/product-sidebar');
            </div>

            <div class="col-md-9"><!-- col-md-9 start-->
                <div class="box"><!-- box start -->
                    <h1>Hot Deal, Deal of the day!</h1>
                    <p> This is the Hot Deal Page, Everything on this page is FAKE!!!</p>

                </div>
                
                {{-- <h1>@{{dealProducts}}</h1> --}}
                <!--Today's Deal product start-->
                {{-- <div id="content" class="container"> container start --}}
                    <div v-if="countDeals > 0" class="row"><!--row start-->
                        <div class='col-md-4 col-sm-6 single' v-cloak v-for="dealProduct in dealProducts">
                            <div class='product'>
                               <div class="box_sale">
                                <div v-if="dealProduct.label == 1" class="ribbon"><span>Sale</span>
                                    <a :href="'/sam_public/details/' + dealProduct.id">
                                        <img :src='dealProduct.image_path1' class='img-responsive'>
                                    </a>
                                </div>
                            </div>
                            <div class='text'>
                                <h3>
                                    <a :href="'/sam_public/details/' + dealProduct.id">
                                        @{{stringLimit(dealProduct.name, 18)}}
                                    </a> 
                                </h3>
                                <p class='price'>$ @{{dealProduct.price}}</p>
                                <p class="price">Quantity: @{{dealProduct.quantity}}</p>
                                <p class='buttons'>
                                    <a :href="'/sam_public/details/' + dealProduct.id" class='btn btn-default'>View Details</a>
                                    <a  v-if="dealProduct.quantity > 0" :href="'/sam_public/details/' + dealProduct.id" @click.prevent="addToCart(dealProduct.id)" class='btn btn-primary'>
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
                <h1>No Deal Item</h1>
            </div>

            <template>
              <paginate
              v-model="pageDeal"
              :page-count="pageDealCount"
              :page-range="3"
              :margin-pages="2"
              :click-handler="clickCallbackDeal"
              :prev-text="'Prev'"
              :next-text="'Next'"
              :container-class="'pagination'"
              :page-class="'page-item'">
          </paginate>
      </template>
  {{-- </div> --}}
  {{-- {!!$links !!} --}}
  {{-- when link is click, product on the new page will be selected --}}
        {{-- <div @click="pagination()" v-model = "pageLinks">
            @{{pageLinks}}
        </div> --}}
        {{-- @{{pageLinks}} --}}
    </div>


</div> <!--container end-->
</div> <!--content end-->
</div>


<style lang="css">
.pagination {
}
.page-item {
}
</style> 

@stop

