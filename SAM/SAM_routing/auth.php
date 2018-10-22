<?php
// $router->map( 'GET', '/register', 'SAM\Controllers\AuthController@showRegisterForm', 'register' );
// $router->map( 'POST', '/register', 'SAM\Controllers\AuthController@register', 'register_me' );

$router->map( 'GET', '/sam_public/login', 'SAM\Controllers\AuthController@showLoginForm', 'login_form');
// $router->map( 'POST', '/sam_public/login', 'SAM\Controllers\AuthController@login', 'log_me_in' );

// $router->map( 'GET', '/logout', 'SAM\Controllers\AuthController@logout', 'logout' );
?>