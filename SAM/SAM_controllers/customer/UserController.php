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
			// var_dump($this->user); exit;
			$this->user = $this->user['0'];
		}

	}

	public function showWishList()
	{
		// $user = User::where('id', 1)->with(['product'])->first();	
		$token = CSRFToken::_token();
		return _view('customers/account/wish-list', compact('token'));
	}

	public function edit()
	{
		if(Request::has('post')){
			$request = Request::get('post');
			var_dump(Product::destroy($id)); exit;

			if(CSRFToken::verifyCSRFToken($request->token)){
				//update record if ture
				// User::destroy($id);
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
		// var_dump($user['username']);exit;
		return _view('customers/account/edit-account', compact('user'));
	}
	public function showChangePassword()
	{
		return _view('customers/account/change-pass');
	}

	public function showDelete()
	{
		// $token = CSRFToken::_token();

		return _view('customers/account/delete-account');
	}

	public function delete()
	{
		// var_dump("UserCotroller::showDelete"); exit;
		if(Request::has('post')){
			$request = Request::get('post');
			// var_dump($this->user['id']);exit;
			if(CSRFToken::verifyCSRFToken($request->token)){ 
				//update record if ture
				// var_dump($this->user['id']);exit;
				User::destroy($this->user['id']); //hwo do i destroy id?
				// var_dump(User::where('id', $this->user['id'])->get());exit;
				// Session::add('success','User Deleted');
				Redirect::to('/sam_public/');
			}
			throw new \Exception('Token mismatch');
		}
		return null;
	}

	public function submitComment()
	{
		
		// var_dump("here in UserController::showCommentForm");exit;
		if(Request::has('post')){
			$request = Request::get('post');
			// var_dump($request);
			// exit;

			$user = User::findOrFail(Session::get('SESSION_USER_ID'));
			// var_dump($user);exit;

			ItemRating::create([
				'title'=> $request->title,
				'comments'=> $request->comments,
				'product_id'=> $request->product_id,
				'rating_number'=> $request->rating_number,
				'user_id'=> $user->id
			]);

				// list($this->categories, $this->links) = _paginate(3, $total, $this->table_name, $object);	
				// list($this->subcategories, $this->subcategories_links) = _paginate(3, $subTotal, 'sub_categories', new SubCategory);	
			
				// return _view('admin/products/categories', ['categories' => $this->categories, 'links' => $this->links, 'success'=> "Category Created",
				// 	'subcategories' => $this->subcategories, 'subcategories_links' => $this->subcategories_links]);
			echo json_encode(['success' => "Comments is successfully posted."]);

		}
		return null;
	}
	// public function showCommentForm()
	// {
	
	// 	var_dump("here in UserController::showCommentForm");exit;
	// 	// return _view('customers/account/comment');
	// }
}

?>	