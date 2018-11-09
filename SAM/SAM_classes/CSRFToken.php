<?php
namespace SAM\Classes;

//send CSRFToken along with important request eg. credit card number related request

Class CSRFToken
{
	//generate token
	public static function _token()
	{
		if(!Session::has('token')){
			$randomToken = base64_encode(openssl_random_pseudo_bytes(32));
			Session::add('token', $randomToken);
		}

		return Session::get('token');
	}

	//verify token
	 public static function verifyCSRFToken($requestToken, $regenerate = true)
	{
		if(Session::has('token')&& Session::get('token')=== $requestToken)
		{
			if($regenerate){
				Session::remove('token');
			}
			return true;
		}
		return false;
	}
}

?>
