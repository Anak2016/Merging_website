<?php
namespace SAM\Controllers\Admin;

use SAM\Classes\CSRFToken;
use SAM\Models\Category;
use SAM\Models\SubCategory;

use SAM\Classes\Request;
use SAM\Classes\ValidateRequest;
use SAM\Classes\Session;
use SAM\Classes\Redirect;
use SAM\Controllers\BaseController;

class ProductCategoryController extends BaseController
{
	public $table_name = 'categories';
	public $categories;
	public $subcategories;
	public $subcategories_links;
	public $links;

	public function __construct()
	{
		$total = Category::all()->count();
		$subTotal = SubCategory::all()->count();
		$object = new Category;

		list($this->categories, $this->links) = _paginate(3, $total, $this->table_name, $object);


		list($this->subcategories, $this->subcategories_links) = _paginate(3, $subTotal, 'sub_categories', new SubCategory);	

	}
	//dislay category on the page by passing var to view
	public function show()
	{

		// cannot use compact with $this 
		return _view('admin/products/categories',[
			'categories' => $this->categories, 'links' => $this->links,
			'subcategories' => $this->subcategories, 'subcategories_links' => $this->subcategories_links
		]);
	}

	//store 
	public function store()
	{
		if(Request::has('post')){
			$request = Request::get('post');
			if(CSRFToken::verfityCSRFToken($request->token)){
				$rules =[
					'name' => ['required' => true, 'minLength' => 3, 'string' =>true, 'unique'=> 'categories']
				];
				$validate = new ValidateRequest;
				$validate->abide($_POST, $rules);

				if($validate->hasError())
				{
					// $error = var_dump($validate->getErrorMessages());
					$errors = $validate->getErrorMessages(); 
					return _view('admin/products/categories', ['categories' => $this->categories, 'links' => $this->links, 'errors'=> $errors,
						'subcategories' => $this->subcategories, 'subcategories_links' => $this->subcategories_links]);
				}

				//create data to be put in database 
				Category::create([
					'name'=> $request->name,
					'slug' => slug($request->name)
				]);

				$total = Category::all()->count();
				$subTotal = SubCategory::all()->count();

				list($this->categories, $this->links) = _paginate(3, $total, $this->table_name, $object);	
				list($this->subcategories, $this->subcategories_links) = _paginate(3, $subTotal, 'sub_categories', new SubCategory);	
				// var_dump($this->subcategories);exit;
				
				return _view('admin/products/categories', ['categories' => $this->categories, 'links' => $this->links, 'success'=> "Category Created",
					'subcategories' => $this->subcategories, 'subcategories_links' => $this->subcategories_links]);
			}
			throw new \Exception('Token mismatch');
		}
		return null;
	}

	
	public function edit($id)
	{
		if(Request::has('post')){
			$request = Request::get('post');
			// var_dump($request);
			// exit;
			if(CSRFToken::verfityCSRFToken($request->token, false)){
				//update record if ture
				User::where('id',$id)->update(['role'=> $request->role]);
				echo json_encode(['success'=> 'Record Update Successfully']);
				exit;
			}
			throw new \Exception('Token mismatch');
		}
		return null;
	}

	public function delete($id)
	{
		if(Request::has('post')){
			$request = Request::get('post');
			if(CSRFToken::verfityCSRFToken($request->token)){
				//update record if ture
				Category::destroy($id);
				$subcategories = SubCategory::where("category_id", $id)->get();
				if(count($subcategories)){
					foreach($subcategories as $subcategory){
						$subcategory->delete();
					}
				}
				Session::add('success','Category Deleted');
				Redirect::to('/admin/product/categories');
			}
			throw new \Exception('Token mismatch');
		}
		return null;
	}
}

?>	