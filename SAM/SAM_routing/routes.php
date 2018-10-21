<?php

$router = new AltoRouter();

$router->map( 'GET', '/sam_public/', 'SAM\Controllers\IndexController@showHome', 'home' );

$router->map( 'GET', '/sam_public/shop', 'SAM\Controllers\IndexController@showShop', 'shop' );

$router->map( 'GET', '/sam_public/cart', 'SAM\Controllers\IndexController@showCart', 'cart' );

$router->map( 'GET', '/sam_public/hot_deal', 'SAM\Controllers\IndexController@showHot_deal', 'hot_deal' );

$router->map( 'GET', '/sam_public/customer_register', 'SAM\Controllers\IndexController@showCustomer_register', 'customer_register' );

$router->map( 'GET', '/sam_public/checkout', 'SAM\Controllers\IndexController@showCheckout', 'checkout' );

$router->map( 'GET', '/sam_public/details/[i:id]', 'SAM\Controllers\IndexController@showDetails', 'details' );

$router->map( 'GET', '/sam_public/contact', 'SAM\Controllers\IndexController@showContact', 'contact' );



// ============================================Vue.js LOGIC============================================
$router->map( 'GET', '/sam_public/dealProducts', 'SAM\Controllers\IndexController@dealProducts', 'deal_product' );
$router->map( 'GET', '/sam_public/popularProducts', 'SAM\Controllers\IndexController@popularProducts', 'popular_product' );

// require_once __DIR__.'/../SAM_controllers/BaseController.php';


// $router->map( 'GET', '/sam_public/', 'SAM\Controllers\IndexController@show', 'home' );
// $router->map( 'GET', '/sam_public/get-products', 'SAM\Controllers\IndexController@getProducts', 'get_product' );

// $router->map( 'GET', '/sam_public/subcategory-products/[i:id]', 'SAM\Controllers\IndexController@subcategoryProducts', 'subcategory_product' );
// // $router->map( 'GET', '/subcategory-products', 'App\Controllers\IndexController@subcategoryProducts', 'subcategory_product' );

// $router->map( 'POST', '/sam_public/load-more', 'SAM\Controllers\IndexController@loadMoreProducts', 'load_more_product' );

// $router->map( 'POST', '/sam_public/load-more-subcategory', 'SAM\Controllers\IndexController@loadMoreSubcategoryProducts', 'load_more_subcategory_product' );


// require_once __DIR__.'/cart.php';
// require_once __DIR__.'/auth.php';
// require_once __DIR__.'/admin_routes.php';

?>