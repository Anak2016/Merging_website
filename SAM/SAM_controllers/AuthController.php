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
		if(isAuthenticated()){
			Redirect::to('/sam_public/');
		}
	}

	public function showRegisterForm()
	{
		$token = CSRFToken::_token();

		return _view('customer_register', compact('token'));
	}

	public function showLoginForm()
	{
		$token = CSRFToken::_token();
		return _view('login', compact('token'));
	}

	public function login()
	{
		if(Request::has('post')){
			$request =Request::get('post');

			if(CSRFToken::verifyCSRFToken($request->token)){
				$rules = [
					'username' => ['required'=> true],
					'password' => ['required'=> true, 'minLength' => 6]
				];

				$validate = new ValidateRequest;
				$validate->abide($_POST, $rules);

				// var_dump($rules);exit;

				if($validate->hasError()){
					$errors = $validate->getErrorMessages();
					// echo "wrong";exit;
					return _view('login', ['errors' => $errors]);
				}

				//check if user exists in the database
				$user = User::where('username', $request->username)->orWhere('email', $request->username)->first();
				
				// if(true){
				if($user){
					// var_dump( $user->role);exit;
					// var_dump(password_hash($request->password, PASSWORD_DEFAULT). " " . $user->password);exit;

					if(!password_verify($request->password, $user->password)){
						Session::add('error', 'Incorrect credentials');
						return _view('login');
					}else{
						Session::add('SESSION_USER_ID', $user->id);
						Session::add('SESSION_USER_NAME', $user->username);

						if($user->role == 'admin'){
							Redirect::to('admin');
						}else if($user->role =='user' && Session::has('user_cart')){
							Redirect::to('/sam_public');
						}else{
							Redirect::to('/sam_public');
						}

					}
					//assign user to his/her cart
					// _getUserCart($request->username);// this is wrong
					_getUserCart();
				}else{
					
					Session::add('error', 'Incorrect credentials');
					return _view('login');
				}

				

			}
			throw new \Exception('Token Mismatch');
		}
		return null;
	}

	public function register()
	{

		if(Request::has('post')){
			$request =Request::get('post');

			if(CSRFToken::verifyCSRFToken($request->token)){
				$rules = [
					'username' => ['required'=> true, 'string' => true, 'unique' =>'users'],
					'firstname' => ['required'=> true, 'minLength' => 6, 'maxLength' => 50],
					'lastname' => ['required'=> true, 'minLength' => 6, 'maxLength' => 50],
					'email' => ['required'=> true, 'email' =>true,  'unique' =>'users'],
					'password' => ['required'=> true, 'minLength' => 6],
					'address' => ['required'=> true, 'minLength' => 4, 'maxLength' => 500, 'mixed' => true],
					'city' => ['required'=> true, 'string' => true ],
					'state' => ['required'=> true, 'string' => true],
					'country' => ['required'=> true, 'string' => true],
					'zipcode' => ['required'=> true, ],
					'phone' => ['required'=> true, 'minLength' =>10, ]
				];

				$validate = new ValidateRequest;
				$validate->abide($_POST, $rules);

				if($validate->hasError()){
					$errors = $validate->getErrorMessages();
					return _view('customer_register', ['errors' => $errors]);
				}

				//insert into database
				User::create([
					'username' => $request->username,
					'firstname' => $request->firstname,
					'lastname' => $request->lastname,
					'email' => $request->email,
					'password' => password_hash($request->password, PASSWORD_BCRYPT),
					'address' => $request->address,
					'city' => $request->city,
					'state' => $request->state,
					'country' => $request->country,
					'zipcode' => $request->zipcode,
					'phone' => $request->phone,
					'role' => 'user'
				]);

				Request::refresh();
				return _view('/', ['success' => 'Account created, you can now login!']);
			}
			throw new \Exception('Token Mismatch');
		}
		return null;
	}

	public function logout()
	{
		if(isAuthenticated()){
			$var = Session::get('SESSION_USER_NAME');
			if(Session::has("user_cart")){
	            $carts = Session::get("user_cart");
	            
	            Session::add($var, $carts); // this is not correct    
	            //return "in if -> for";
	        }
	        //Session::remove($_SESSION[$var]);
			
			Session::remove('SESSION_USER_ID');
			Session::remove('SESSION_USER_NAME');


			if(Session::has('user_cart')){
				// var_dump($_SESSION); exit; 

				Session::remove('user_cart');
				//session_destroy(); //destroys all data registered to a session 
				//session_regenerate_id(true); // not sure how it works
			}
			//Session::remove($var);
		}
		Redirect::to('/sam_public');
	}
}
?>