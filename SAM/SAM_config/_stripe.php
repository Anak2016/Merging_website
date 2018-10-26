<?php

use Stripe\Stripe;
use SAM\Classes\Session;

$stripe = array(
	'secret_key' => getenv('STRIPE_SECRET'),
	'publishable_key' => getenv('STRIPE_PUBLISHER_KEY')	
);

//stripe is only authentication
//Sessoin is authorizaiton
Session::add('publishable_key', $stripe['publishable_key']);
Stripe::setApiKey($stripe['secret_key']);

// var_dump("in _strip");exit;
?>