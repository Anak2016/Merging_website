<?php
/**
* Start session if not already 
*/
if(!isset($_SESSION)) session_start();

// download environment var
// require_once __DIR__.'/../../app/config/_env.php';
require_once __DIR__.'/../../SAM/SAM_config/_env.php';
//instantiate database class
new \SAM\Classes\Database();

//set custom error handler for Whoops
// set_error_handler([new \SAM\Classes\ErrorHandler(), 'handleErrors']);

require_once __DIR__.'/../../SAM/SAM_routing/routes.php';

// include __DIR__.'/../../SAM/SAM_routing/RouteDispatcher.php';
new \SAM\RouteDispatcher($router);
?>