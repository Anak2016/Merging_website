<?php 
$router->map( 'GET', '/sam_public/product/[i:id]', 'SAM\Controllers\ProductController@show', 'product' );
$router->map( 'GET', '/sam_public/product-details/[i:id]', 'SAM\Controllers\ProductController@get', 'product_details');


$router->map( 'GET', '/sam_public/cart', 'SAM\Controllers\CartController@show', 'view_cart' );
$router->map( 'POST', '/sam_public/cart', 'SAM\Controllers\CartController@addItem', 'add_item' );
$router->map( 'GET', '/sam_public/cart/items', 'SAM\Controllers\CartController@getCartItems', 'get_cart_items' );
// $router->map( 'POST', '/cart/items', 'App\Controllers\CartController@getCartItems', 'get_cart_items' );

$router->map( 'POST', '/sam_public/cart/update-qty', 'SAM\Controllers\CartController@updateQuantity', 'update_cart_qty' );
$router->map( 'POST', '/sam_public/cart/remove-item', 'SAM\Controllers\CartController@removeItem', 'remove_cart_item' );
$router->map( 'POST', '/sam_public/cart/empty-cart', 'SAM\Controllers\CartController@emptyItem', 'empty_item' );

$router->map( 'POST', '/sam_public/cart/payment', 'SAM\Controllers\CartController@checkout', 'handle_payment' );

$router->map( 'GET', '/sam_public/checkout', 'SAM\Controllers\CartController@showCheckout', 'checkout' );

$router->map( 'GET', '/sam_public/complete-payment', 'SAM\Controllers\CartController@completePayment', 'complete_payment' );
$router->map( 'GET', '/sam_public/order-complete', 'SAM\Controllers\CartController@showOrderComplete', 'show_order_complete' );

?>