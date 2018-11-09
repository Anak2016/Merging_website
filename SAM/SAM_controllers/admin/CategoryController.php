<?php
namespace SAM\Controllers\Admin;

use SAM\Models\Product;
use SAM\Models\SubCategory;
use SAM\Models\Category;

use SAM\Classes\CSRFToken;
use SAM\Classes\Request;
use SAM\Classes\Role;
use SAM\Classes\Redirect;
// use App\Classes\Mail;

class CategoryController extends BaseController
{
	public function __construct()
	{		
		// if(!Role::middleware('user')){
		// 	Redirect::to('/login');
		// }
	}
	public function show($id)
	{
		$token = CSRFToken::_token();
		$categories = Category::all();
		$subCategories = SubCategory::all();

		return _view('admin/groupby/category', compact('token', 'categories', 'subCategories'));
	}
}
?>