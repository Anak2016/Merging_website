<?php

$router = new AltoRouter();

$router->map( 'GET', '/sam_public/', 'SAM\Controllers\IndexController@showHome', 'home' );

$router->map( 'GET', '/sam_public/shop', 'SAM\Controllers\IndexController@showShop', 'shop' );

$router->map( 'GET', '/sam_public/cart', 'SAM\Controllers\IndexController@showCart', 'cart' );

$router->map( 'GET', '/sam_public/hot_deal', 'SAM\Controllers\IndexController@showHot_deal', 'hot_deal' ); 

$router->map( 'GET', '/sam_public/details/[i:id]', 'SAM\Controllers\IndexController@showDetails', 'details' );

$router->map( 'GET', '/sam_public/contact', 'SAM\Controllers\IndexController@showContact', 'contact' );


$router->map( 'GET', '/sam_public/result', 'SAM\Controllers\IndexController@showSearchResult', 'show_search_result' );
$router->map( 'post', '/sam_public/searchResult', 'SAM\Controllers\IndexController@getSearchResult', 'get_search_result' );


$router->map( 'post', '/sam_public/manufacturerKeyword', 'SAM\Controllers\IndexController@getManufacturerKeyword', 'get_search_manufacturers' );
$router->map( 'post', '/sam_public/categoryKeyword', 'SAM\Controllers\IndexController@getCategoryKeyword', 'get_search_categories' );
$router->map( 'post', '/sam_public/subCategoryKeyword', 'SAM\Controllers\IndexController@getSubCategoryKeyword', 'get_search_sub_categories' );


// ============================================Vue.js LOGIC============================================
$router->map( 'GET', '/sam_public/dealProducts', 'SAM\Controllers\IndexController@dealProducts', 'deal_product' );
$router->map( 'POST', '/sam_public/dealProducts', 'SAM\Controllers\IndexController@getDealProducts', 'get_deal_product' );

$router->map( 'GET', '/sam_public/popularProducts', 'SAM\Controllers\IndexController@popularProducts', 'popular_product' );
$router->map( 'GET', '/sam_public/products', 'SAM\Controllers\IndexController@products', 'all_products' );
$router->map( 'POST', '/sam_public/products', 'SAM\Controllers\IndexController@getShop', 'get_all_products' );

$router->map( 'GET', '/sam_public/manufacturers', 'SAM\Controllers\IndexController@manufacturers', 'all_manufacturers' );
$router->map( 'GET', '/sam_public/categories', 'SAM\Controllers\IndexController@categories', 'all_categories' );
$router->map( 'GET', '/sam_public/sub-categories', 'SAM\Controllers\IndexController@subCategories', 'all_subCategory' );

$router->map( 'POST', '/sam_public/loadCheckedItems', 'SAM\Controllers\IndexController@loadCheckedItems', 'load_checked_items' );

$router->map( 'GET', '/sam_public/ip', 'SAM\Controllers\IndexController@getIP', 'get_user_ip' );

$router->map( 'POST', '/sam_public/load-more', 'SAM\Controllers\IndexController@loadMoreProducts', 'load_more_product' );


require_once __DIR__.'/cart.php';
require_once __DIR__.'/auth.php';
require_once __DIR__.'/admin_routes.php';
require_once __DIR__.'/customer_routes.php';

?>