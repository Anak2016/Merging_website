<?php
namespace SAM\Controllers\Customers;

use SAM\Classes\CSRFToken;
use SAM\Models\Category;
use SAM\Models\SubCategory;
use SAM\Models\User;
use SAM\Models\ItemRating;

use SAM\Classes\Request;
use SAM\Classes\ValidateRequest;
use SAM\Classes\Session;
use SAM\Classes\Redirect;
use SAM\Classes\UploadFile;
use SAM\Classes\Role;

use SAM\Controllers\BaseController;


class UserController extends BaseController
{
	public $table_name = 'users';
	public $users = "";
	public $links;

	public function __construct()
	{
		// if(!Role::middleware('admin')|| !Role::middleware('admin')){
		// 	Redirect::to('/login');
		// }

		if(null !== Session::has('SESSION_USER_NAME'))
		{
			$this->user = User::where('username', Session::get('SESSION_USER_NAME'))->get();
			$this->user = $this->user['0'];
		}

	}

	public function showWishList()
	{

		$token = CSRFToken::_token();
		return _view('customers/account/wish-list', compact('token'));
	}

	public function edit()
	{
		if(Request::has('post')){
			$request = Request::get('post');
			var_dump(Product::destroy($id)); exit;

			if(CSRFToken::verifyCSRFToken($request->token)){
				
				var_dump("in UserController::edit");exit;


				Session::add('success','Successfully Edit');
				Redirect::to('/sam_public/');
			}
			throw new \Exception('Token mismatch');
		}
		return null;
	}

	public function showEditForm()
	{
		// demo user
		// must be changed so that current user will get displayed
		// $user = User::where('id', 1)->get();
		// $token = CSRFToken::_token();
		$user = $this->user;
		return _view('customers/account/edit-account', compact('user'));
	}
	public function showChangePassword()
	{
		return _view('customers/account/change-pass');
	}

	public function showDelete()
	{
		return _view('customers/account/delete-account');
	}

	public function delete()
	{
		
		if(Request::has('post')){
			$request = Request::get('post');
			if(CSRFToken::verifyCSRFToken($request->token)){ 
				User::destroy($this->user['id']); 
				Redirect::to('/sam_public/');
			}
			throw new \Exception('Token mismatch');
		}
		return null;
	}

	public function submitComment()
	{
		
		
		if(Request::has('post')){
			$request = Request::get('post');

			$user = User::findOrFail(Session::get('SESSION_USER_ID'));
			// var_dump($user);exit;

			ItemRating::create([
				'title'=> $request->title,
				'comments'=> $request->comments,
				'product_id'=> $request->product_id,
				'rating_number'=> $request->rating_number,
				'user_id'=> $user->id
			]);
			echo json_encode(['success' => "Comments is successfully posted."]);

		}
		return null;
	}
}

?>	