<?php


$router->map( 'GET', '/sam_public/customer', 'SAM\Controllers\Customers\DashboardController@show', 'customer_dashboard' );
$router->map( 'GET', '/sam_public/customer/orders', 'SAM\Controllers\Customers\OrderController@show', 'customer_orders' );

$router->map( 'GET', '/sam_public/customer/wish-list', 'SAM\Controllers\Customers\UserController@showWishList', 'customer_wish_list' );

$router->map( 'GET', '/sam_public/customer/edit', 'SAM\Controllers\Customers\UserController@showEditForm', 'customer_edit_form' );
$router->map( 'POST', '/sam_public/customer/edit/[i:id]', 'SAM\Controllers\Customers\UserController@edit', 'edit_account' );

$router->map( 'GET', '/sam_public/customer/change_password', 'SAM\Controllers\Customers\UserController@showChangePassword', 'customer_change_password' );
$router->map( 'GET', '/sam_public/customer/delete', 'SAM\Controllers\Customers\UserController@showDelete', 'show_delete_form' );
$router->map( 'POST', '/sam_public/customer/delete', 'SAM\Controllers\Customers\UserController@delete', 'customer_delete' );
$router->map( 'GET', '/sam_public/customer/payments', 'SAM\Controllers\Customers\PaymentController@show', 'customer_payment' );

// $router->map( 'GET', '/sam_public/customer/comment', 'SAM\Controllers\Customers\UserController@showCommentForm', 'customer_comment' );
$router->map( 'POST', '/sam_public/customer/comment', 'SAM\Controllers\Customers\UserController@submitComment', 'submit_comment' );

// $router->map( 'GET', '/sam_public/customer/ip', 'SAM\Controllers\Customers\UserController@getIP', 'customer_ip' );
// $router->map( 'GET', '/sam_public/account/logout', 'SAM\Controllers\IndexController@showHome', 'home' );

?>