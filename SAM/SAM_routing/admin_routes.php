<?php 
$router->map( 'GET', '/sam_public/admin', 'SAM\Controllers\Admin\DashboardController@show', 'admin_dashboard' );
$router->map( 'GET', '/sam_public/admin/charts', 'SAM\Controllers\Admin\DashboardController@getChartData', 'admin_dashboard_charts' );



//product management
$router->map( 'GET', '/sam_public/admin/product/categories', 'SAM\Controllers\Admin\ProductCategoryController@show', 'product_category' );
$router->map( 'POST', '/sam_public/admin/product/categories', 'SAM\Controllers\Admin\ProductCategoryController@store', 'create_product_category' );

$router->map( 'POST', '/sam_public/admin/product/categories/[i:id]/edit', 'SAM\Controllers\Admin\ProductCategoryController@edit', 'edit_product_category' );
$router->map( 'POST', '/sam_public/admin/product/categories/[i:id]/delete', 'SAM\Controllers\Admin\ProductCategoryController@delete', 'delete_product_category' );

//subcategory
$router->map( 'POST', '/sam_public/admin/product/subcategory/create', 'SAM\Controllers\Admin\SubCategoryController@store', 'create_subcategory' );
$router->map( 'POST', '/sam_public/admin/product/subcategory/[i:id]/edit', 'SAM\Controllers\Admin\SubCategoryController@edit', 'edit_subcategory' );
$router->map( 'POST', '/sam_public/admin/product/subcategory/[i:id]/delete', 'SAM\Controllers\Admin\SubCategoryController@delete', 'delete_subcategory' );

//products

//below path should be change from productes to product  
$router->map( 'GET', '/sam_public/admin/products/[i:id]/selected', 'SAM\Controllers\Admin\ProductController@getSubcategories', 'selected_category' );


$router->map( 'GET', '/sam_public/admin/products/create', 'SAM\Controllers\Admin\ProductController@showCreateProductForm', 'create_product_form' );
$router->map( 'POST', '/sam_public/admin/products/create', 'SAM\Controllers\Admin\ProductController@store', 'create_product' );

// only this path should use products not product 
$router->map( 'GET', '/sam_public/admin/products', 'SAM\Controllers\Admin\ProductController@show', 'show_products' );


$router->map( 'GET', '/sam_public/admin/products/[i:id]/edit', 'SAM\Controllers\Admin\ProductController@showEditProductForm', 'edit_product_form' );
$router->map( 'POST', '/sam_public/admin/products/edit', 'SAM\Controllers\Admin\ProductController@edit', 'edit_product' );

//this is product not products because I changed it. (got a little confused and later realised name is not consistent)
$router->map( 'POST', '/sam_public/admin/product/[i:id]/delete', 'SAM\Controllers\Admin\ProductController@delete', 'delete_product' );


//users
$router->map( 'GET', '/sam_public/admin/users', 'SAM\Controllers\Admin\UserController@show', 'show_user' );

$router->map( 'GET', '/sam_public/admin/users/create', 'SAM\Controllers\Admin\UserController@storeCreateUserForm', 'create_user_form' );
$router->map( 'POST', '/sam_public/admin/users/create', 'SAM\Controllers\Admin\UserController@store', 'create_user' );


$router->map( 'GET', '/sam_public/admin/users/[i:id]/edit', 'SAM\Controllers\Admin\UserController@showEditUserForm', 'edit_user_form' );
$router->map( 'POST', '/sam_public/admin/users/[i:id]/edit', 'SAM\Controllers\Admin\UserController@edit', 'edit_user' );

$router->map( 'POST', '/sam_public/admin/users/[i:id]/delete', 'SAM\Controllers\Admin\UserController@delete', 'delete_user' );

//sub_category
$router->map('GET', '/sam_public/subcategory/[i:id]', 'SAM\Controllers\Admin\SubCategoryController@show', 'show_admin_subcategory' );

//category
$router->map('GET', '/sam_public/categories', 'SAM\Controllers\Admin\CategoryController@show', 'show_category' );


$router->map( 'GET', '/sam_public/admin/orders', 'SAM\Controllers\Admin\OrderController@show', 'show_orders' );
$router->map( 'GET', '/sam_public/admin/orders/[a:order_no]', 'SAM\Controllers\Admin\OrderController@showEditForm', 'show_order_detail' );
$router->map( 'POST', '/sam_public/admin/orders/[i:id]/delete', 'SAM\Controllers\Admin\OrderController@delete', 'delete_order' );

$router->map( 'GET', '/sam_public/admin/payments', 'SAM\Controllers\Admin\PaymentController@show', 'show_payment' );

?>