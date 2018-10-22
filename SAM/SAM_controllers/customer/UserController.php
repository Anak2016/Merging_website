<?php
namespace SAM\Controllers\Customers;

use SAM\Classes\CSRFToken;
use SAM\Models\Category;
use SAM\Models\SubCategory;
use SAM\Models\User;

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
	public $users;
	public $links;

	public function __construct()
	{
		// if(!Role::middleware('admin')|| !Role::middleware('admin')){
		// 	Redirect::to('/login');
		// }
		
		$this->users = User::all();
		$total = User::all()->count();

		list($this->users, $this->links) = _paginate(3, $total, $this->table_name, new User);
		// var_dump($this->links); exit;
	}

	public function showWishList()
	{
		// $user = User::where('id', 1)->with(['product'])->first();	

		$users = $this->users;
		$links = $this->links;
		return _view('customers/account/wish-list');
	}

	public function edit()
	{
		// $user = User::where('id', 1)->with(['product'])->first();	

		$users = $this->users;
		$links = $this->links;
		echo "successfully edit";exit;
		// show message on the page
	}

	public function showEditForm()
	{
		// demo user
		// must be changed so that current user will get displayed
		// $user = User::where('id', 1)->get();
		$user = User::all()->first();	
		// var_dump($user->username);exit;
		return _view('customers/account/edit-account', compact('user'));
	}
	public function showChangePassword()
	{
		// $user = User::where('id', 1)->with(['product'])->first();	

		$users = $this->users;
		$links = $this->links;
		return _view('customers/account/change-pass');
	}
	public function showDelete()
	{
		// $user = User::where('id', 1)->with(['product'])->first();	

		$users = $this->users;
		$links = $this->links;
		return _view('customers/account/delete-account');
	}
}

?>	