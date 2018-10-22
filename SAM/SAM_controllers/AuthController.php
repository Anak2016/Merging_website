<?php
namespace SAM\Controllers;
// namespace SAM\App\Controllers;

use SAM\Classes\CSRFToken;
use SAM\Classes\Request;
use SAM\Classes\ValidateRequest;
use SAM\Classes\Redirect;
use SAM\Classes\Session;
use SAM\Models\User;

// use App\Classes\Mail;

class AuthController extends BaseController
{
	public function __construct()
	{	
		// if(isAuthenticated()){
		// 	Redirect::to('/sam_public/');
		// }
	}

	// public function showRegisterForm()
	// {
	// 	return _view('register');
	// }

	public function showLoginForm()
	{
		return _view('login');
	}

}
?>