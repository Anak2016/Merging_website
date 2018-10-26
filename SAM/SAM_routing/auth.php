<?php
$router->map( 'GET', '/sam_public/customer_register', 'SAM\Controllers\AuthController@showRegisterForm', 'register' );
$router->map( 'POST', '/sam_public/customer_register', 'SAM\Controllers\AuthController@register', 'register_me' );

$router->map( 'GET', '/sam_public/login', 'SAM\Controllers\AuthController@showLoginForm', 'login_form');
$router->map( 'POST', '/sam_public/login', 'SAM\Controllers\AuthController@login', 'log_in' );

$router->map( 'GET', '/sam_public/logout', 'SAM\Controllers\AuthController@logout', 'logout' );
?>