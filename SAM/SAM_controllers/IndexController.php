<?php
// namespace SAM\App\Controllers;
namespace SAM\Controllers;

use SAM\Models\Product;
use SAM\Models\Slider;
use SAM\Models\User;
use SAM\Models\ItemRating;
use SAM\Models\Category;
use SAM\Models\Manufacturer;


use SAM\Classes\CSRFToken;
use SAM\Classes\Request;
// use SAM\Classes\Role;

// use App\Classes\Mail;
use Illuminate\Database\Capsule\Manager as Capsule; 

class IndexController extends BaseController
{
	// public $user_keyword;
	public function __construct()
	{
		// if(isset($_GET['user_query']))
		// {
		// 	if($_GET['user_query'] != '')
		// 	{
		// 		$this->user_keyword = $_GET['user_query'];
		// 	// var_dump($this->user_keyword);exit;
		// 	}
		// }
	}
	public function showHome()
	{
		$token = CSRFToken::_token();
		$sliders = Capsule::table('sliders')->get();
		// $sliders = Slider::all();
		// var_dump($slider); exit;

		$deals = Product::where('deal', 1)->inRandomOrder()->limit(8)->get();
		$populars = Product::where('popular', 1)->inRandomOrder()->limit(8)->get();		

		return _view('home', compact('token', 'sliders', 'deals', 'populars'));
	}

	public function showShop()
	{
		$token = CSRFToken::_token();
		$products = Product::all();
		return _view('shop', compact('token', 'products'));
	}
	public function showCart()
	{
		$token = CSRFToken::_token();
		return _view('cart', compact('token'));
	}
	public function showContact()
	{
		$token = CSRFToken::_token();

		return _view('contact', compact('token'));
	}
	public function showHot_deal()
	{
		$token = CSRFToken::_token();
		$products = Product::where('deal',1)->inRandomOrder()->limit(8)->get();
		// $total = Product::where('deal',1)->count();
		// $total = Product::all()->count();
		// list($products , $links) = paginate(8, $total, 'products', new Product);

		// var_dump($products);exit;

		// return _view('hot_deal', compact('token', 'products','links'));

		return _view('hot_deal', compact('token', 'products'));
	}
	
	public function showCheckout()
	{
		$token = CSRFToken::_token();

		return _view('checkout', compact('token'));
	}
	public function showDetails($id)
	{
		$token = CSRFToken::_token();
		$product = Product::where('id', $id)->with(['subcategory', 'category'])->get();
		// var_dump($product[0]); exit;
		
		$product = $product[0];
		$category = $product['category']; 

		// $item_ratings = Capsule::table('item_ratings')->where('product_id', $id )->get();// ?????????????????????????????
		// $users = Capsule::table('item_ratings')->where('id', $id)->with(['products', 'users'])->get();
		$item_ratings = ItemRating::where('product_id', $id)->with(['product', 'user'])->get();

		// $users = array();
		// // var_dump($item_ratings[0]['user']); exit;
		// foreach($item_ratings as $item_rating)
		// {
		// 	array_push($users, [$item_rating['user']]);
		// 	// var_dump($users); exit;
		// }
		// var_dump($users); exit;
		// var_dump($item_rating);exit;
		// var_dump($category->id);exit;

		// return _view('details', compact('token', 'product', 'category', 'item_ratings'), $users);
		return _view('details', compact('token', 'product', 'category', 'item_ratings'));
	}


// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^Vue.js LOGIC^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

	public function dealProducts()
	{
		$products = Product::where('deal', 1)->skip(0)->take(2)->get();

		echo json_encode(['deals' => $products, 'count' => count($products)]);
	}
	public function popularProducts()
	{
		$products = Product::where('popular',1)->inRandomOrder()->limit(8)->get();
		echo json_encode(['populars' => $products, 'count' => count($products)]);
	}
	public function products()
	{
		// $products = Product::all();
		
		// if(isset($_GET['selectedManufacturers'])){	
		// 	$selectedManufacturers = $_GET['selectedManufacturers'];
		// 	if(!empty($selectedManufacturers)){
		// 		foreach($selectedManufacturers as $selectedManufacturer){
		// 			// var_dump($selectedManufacturer);exit;	
		// 			$products = Product::where("manufacturer_id", $selectedManufacturers)->inRandomOrder()->limit(8)->get();
		// 		}

		// 		echo json_encode(['products' => $products, 'count' => count($products)]);
		// 		exit;
		// 	}
		// }
		$products = Product::inRandomOrder()->limit(8)->get();
		// var_dump($products);exit;
		echo json_encode(['products' => $products, 'count' => count($products)]);
	}
	public function manufacturers()
	{
		// $products = Product::all();
		// $manufacturers = Manufacturer::all();
		$manufacturers = Capsule::table('manufacturers')->get();

		// var_dump($manufacturers);
		echo json_encode(['manufacturers' => $manufacturers, 'count' => count($manufacturers)]);
	}
	public function categories()
	{
		// $products = Product::all();
		// $manufacturers = Manufacturer::all();
		$categories = Capsule::table('categories')->get();
		// var_dump($categories);
		echo json_encode(['categories' => $categories, 'count' => count($categories)]);
	}

	public function subCategories()
	{
		// $products = Product::all();
		// $manufacturers = Manufacturer::all();
		$subCategories = Capsule::table('sub_categories')->get();
		// var_dump($subCategories);
		echo json_encode(['subCategories' => $subCategories, 'count' => count($subCategories)]);
	}

	public function loadCheckedItems()
	{
		// $selected = [];
		$count = 0;
		// $result = null;
		if(isset($_POST['selectedManufacturers']) || isset($_POST['selectedCategories']) || isset($_POST['selectedSubCategories'])){

			if(isset($_POST['selectedManufacturers'])){	
				$selectedManufacturers = $_POST['selectedManufacturers'];

			// var_dump($selectedManufacturers);exit;
				if(!empty($selectedManufacturers)){
					foreach($selectedManufacturers as $selectedManufacturer){
					// var_dump(Product::where("manufacturer_id", $selectedManufacturers)->inRandomOrder()->limit(8)->get()[0]);exit;	
						$results[$count] = Product::where("manufacturer_id", $selectedManufacturer)->get();
						$count = $count + 1;
					// var_dump($products[0]->name);exit;	
					}

				}
			}

			if(isset($_POST['selectedCategories'])){	
				$selectedCategories = $_POST['selectedCategories'];
			// var_dump("1");
				if(!empty($selectedCategories)){
				// var_dump("2");
					if(!isset($results)){
					// var_dump("3");
						$count = 0;
						foreach($selectedCategories as $selectedCategory){
						// var_dump($selectedCategory);
							$results[$count] = Product::where("category_id", $selectedCategory)->get();
							$count = $count + 1;
						}
					}else{
					// var_dump("4");
						foreach($selectedCategories as $selectedCategory){
							// var_dump(count(array_unique((array) $results, SORT_REGULAR )));exit;
							foreach($results as $result){
								// var_dump($count);
								$products = Product::where("category_id", $selectedCategory)->get();
								// $products = $products; //product-id
								$count1 = 0;
								// var_dump((array) $result[0]); 
								foreach($products as $product){
									
									// I can't get the logic right because I don't understand structure of the variable
									// so I leave it right here
									if(in_array($products, (array) $result[0]) ){
										// var_dump($count1);
										$results[$count] = $products[$count1];
										$count = $count + 1;
										$count1 = $count1 + 1;
										// var_dump($count);
									}
									// var_dump($result[0]);
									// var_dump((array) $result[0]);exit;
									// var_dump(gettype($result[0]));exit;
									// var_dump(count(array_unique((array) $result[0], SORT_REGULAR )));exit;
								}
							}
						}
					}
				}
			}

			
			if(isset($_POST['selectedSubCategories'])){	
				$selectedSubCategories = $_POST['selectedSubCategories'];
			// var_dump("1");
				if(!empty($selectedSubCategories)){
				// var_dump("2");
					if(!isset($results)){
					// var_dump("3");
						$count = 0;
						foreach($selectedSubCategories as $selectedSubCategory){
						// var_dump($selectedCategory);
							$results[$count] = Product::where("sub_category_id", $selectedSubCategory)->get();
							$count = $count + 1;
						}
					}else{
					// var_dump("4");
						foreach($selectedSubCategories as $selectedSubCategory){
					// var_dump(Product::where("manufacturer_id", $selectedManufacturers)->inRandomOrder()->limit(8)->get()[0]);exit;	
				// var_dump($selectedCategory);exit;=
							$count1 = 0;
							foreach($results as $result){

								$products = Product::where("sub_category_id", $selectedSubCategory)->get();
							// $products = $products; //product-id
								foreach($products as $product){

									if(!in_array($products, (array) $result[0]) ){
										$results[$count] = $products[$count1];
										$count = $count + 1;
										$count1 = $count1 + 1;
									}
								}
							}
						}
				// var_dump($products[0]->name);exit;	
					}
				}
			}
			
			// var_dump(count(array_unique((array) $result[0]))); exit;

			echo json_encode(['products' => $results, 'count' => count($results)]); exit;
		}

		$products = Product::inRandomOrder()->limit(8)->get();
		echo json_encode(['products' => $products, 'count' => count($products)]); exit;
	}

	public function getIP()
	{
		$ip= _getRealUserIp();

		// var_dump($ip);exit;

		echo json_encode(['ip' => $ip]);
	}

	public function showSearchResult()
	{
		$token = CSRFToken::_token();
		// $products = 
		$keyword = $_GET['user_query'];
		// var_dump($keyword);exit;
		// $count = Capsule::select("SELECT COUNT(*) FROM products WHERE keywords LIKE '%$user_keyword%' OR (name LIKE '%$user_keyword%')");
		// $results = Capsule::select("SELECT * FROM products WHERE keywords LIKE '%$user_keyword%' OR (name LIKE '%$user_keyword%')");
		// $menufacturer = Capsule::select("SELECT * FROM manufacturers WHERE manufacturer_id='$manufacturer_id'";

		// return _view('details', compact('token', 'results', 'count'));
		return _view('result', compact('keyword'));
	}

	public function getSearchResult()
	{
		$token = CSRFToken::_token();
		$keyword = $_POST['keyword'];
		// $user_keyword = $_GET['user_query']; // This is in nav bar. fix ti;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;

		$count = Capsule::select("SELECT COUNT(*) FROM products WHERE keywords LIKE '%$keyword%' OR (name LIKE '%$keyword%')");
		$results = Capsule::select("SELECT * FROM products WHERE keywords LIKE '%$keyword%' OR (name LIKE '%$keyword%')");
		// var_dump($keyword);
		// var_dump(count($result));exit;
		echo json_encode(['results' => $results, 'count' => count($results)]);
	}

//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^END^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	public function getProducts()
	{
		$products = Product::where('featured', 0)->skip(0)->take(2)->get();
		echo json_encode(['products' => $products]);
	}

	public function subcategoryProducts($id)
	{
		$products = Product::where('sub_category_id', $id)->inRandomOrder()->limit(4)->get();
		//want to coutn all product that has sub_category_id = $id
		$total = Product::where('sub_category_id', $id)->count();//wrongly use of all()
		// var_dump($total); exit;	
		echo json_encode(['products' => $products, 'count' =>count($products), 'total'=> $total]);
	}

	public function loadMoreProducts()
	{
		$request = Request::get('post');

		if(CSRFToken::verifyCSRFToken($request->token, false)){
			$count = $request->count;
			$item_per_page = $count +$request->next;
			$products = Product::where('featured', 0)->skip(0)->take($item_per_page)->get();
			echo json_encode(['products'=> $products, 'count' =>count($products)]);
		}
	}
	public function loadMoreSubcategoryProducts()
	{
		$request = Request::get('post');

		if(CSRFToken::verifyCSRFToken($request->token, false)){
			$count = $request->count;
			$item_per_page = $count +$request->next;
			$products = Product::where('sub_category_id', $id)->skip(0)->take($item_per_page)->get();
			echo json_encode(['products'=> $products, 'count' =>count($products)]);
		}
	}

}
?>