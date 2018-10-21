<?php
namespace SAM\Controllers\Admin;

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
		if(!Role::middleware('admin')){
			Redirect::to('/login');
		}
		
		$this->users = User::all();
		$total = User::all()->count();

		list($this->users, $this->links) = _paginate(3, $total, $this->table_name, new User);
		// var_dump($this->links); exit;
	}

	public function show()
	{
		// $user = User::where('id', 1)->with(['product'])->first();	

		$users = $this->users;
		$links = $this->links;
		return _view('admin/users/user', compact("users", 'links'));
	}

	public function storeCreateUserForm()
	{

		return _view('admin/users/create');
	}

	public function showEditUserForm($id)
	{
		//set independent valeu of $categories allow admin to be able to change categories.
		// $users = $this->users;
		$user = User::where('id',$id)->first();
		return _view('admin/users/edit', compact('user'));
	}

	public function store()
	{
		if(Request::has('post')){
			$request = Request::get('post');

			if(CSRFToken::verifyCSRFToken($request->token)){
				$rules = [
					'username' => ['required'=> true, 'maxLength' =>20, 'unique' =>'users'],
					'email' => ['required'=> true, 'email' =>true,  'unique' =>'users'],
					'password' => ['required'=> true, 'minLength' => 6],
					'fullname' => ['required'=> true, 'minLength' => 6, 'maxLength' => 50],
					'address' => ['required'=> true, 'minLength' => 4, 'maxLength' => 500, 'mixed' => true]
				];


				$validate = new ValidateRequest;
				$validate->abide($_POST, $rules);

				if($validate->hasError())
				{
					$errors = $validate->getErrorMessages();
					$users = $this->users;

					return _view('admin/users/create', compact('users', 'errors'));
				}

				User::create([
					'username'=> $request->username,
					'fullname' => $request->fullname,
					'email' => $request->email,
					'password' => password_hash($request->password, PASSWORD_BCRYPT),
					'address' => $request->address,
					'role' => $request->role,
				]);
				
				return _view('admin/users/create', ['users', $this->users, 'success'=> "User Created"]);
			}
			throw new \Exception('Token mismatch');
		}
		return null;
	}

	public function edit($id)
	{
		if(Request::has('post')){
			$request = Request::get('post'); //nothing is returned.

			if(CSRFToken::verifyCSRFToken($request->token)){

				User::where('id',$id)->update(['role'=> $request->role]);
				// var_dump($request);exit;
				Session::add('success','User is updated');
				Redirect::to('/admin/users');
				exit;

			}else{

				throw new \Exception('Token mismatch');
			}
		}
		return null;
	}

	public function delete($id)
	{
		if(Request::has('post')){
			$request = Request::get('post');

			if(CSRFToken::verifyCSRFToken($request->token)){
				//update record if ture
				User::destroy($id);

				Session::add('success','User Deleted');
				Redirect::to('/admin/users');
			}
			throw new \Exception('Token mismatch');
		}
		return null;
	}
}

?>	