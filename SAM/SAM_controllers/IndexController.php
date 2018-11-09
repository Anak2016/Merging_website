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
use voku\helper\Paginator;

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

		// load more when scroll down

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

		// $products = [];

		// $pages = new Paginator(2, 'p');
		// $pages->set_total($total);

		// $data = Capsule::select("SELECT *FROM products WHERE (deleted_at is null AND deal = 1) ORDER BY created_at DESC".$pages->get_limit());
		
		// // var_dump($data);exit;
		// $object = new Product;
		// $products = $object->transform($data);
		// $links = $pages->page_links();
		
		// $links = $pages->page_links("?", "2");
		
		// var_dump($links);
		// var_dump($data);exit;

		// return _view('hot_deal', compact('token', 'products','links'));

		return _view('hot_deal', compact('token', 'products'));
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

	// public function dealProducts($pageNumber = null) // maybe sned pageNumber with request Get will be better. 
	public function dealProducts()
	{
		$pageNum = 1;
		//each page has 2 products
		// var_dump($pageNum);exit;
		$pageNum = $pageNum -1;
		$skipProducts = $pageNum * 2;
		$products = Product::where('deal', 1)->skip($skipProducts)->take(2)->get(); //limit to first 2 product

		$all = Product::where('deal', 1)->get();
		$countProducts = count($all); 
		$pageCount = ceil($countProducts/2);
		// $products = Product::where('deal', 1)->skip(2)->take(2)->get(); //limit to first 2 product
		// var_dump($products); exit;
		// $products = Product::where('deal', 1)->get();
		// $limitProduct = 2;
		// $startProduct = $pageNum * 2;
		// $products = Capsule::select("SELECT *FROM products WHERE deleted_at is null ORDER BY created_at DESC LIMIT $limitProduct ");
		
		echo json_encode(['deals' => $products, 'count' => count($products), 'pageCount' => $pageCount]);
		// echo json_encode(['deals' => $products, 'count' => count($products), 'pageLinks' => $links]);
		// _view("hot_deal", compact("links")); 
	}
	public function getDealproducts()
	{
		if(!isset($_POST['pageNum'])){
			$pageNum = 1;
		}else{
			$pageNum = $_POST['pageNum'];
		}

		$pageNum = $pageNum -1;
		$skipProducts = $pageNum * 2;
		$products = Product::where('deal', 1)->skip($skipProducts)->take(2)->get(); //limit to first 2 product

		$all = Product::where('deal', 1)->get();
		$countProducts = count($all); 
		$pageCount = ceil($countProducts/2);
		// var_dump($pageNum);
		// var_dump($products);
		echo json_encode(['deals' => $products, 'count' => count($products), 'pageCount' => $pageCount]);
	}
	public function popularProducts()
	{
		$products = Product::where('popular',1)->inRandomOrder()->limit(3)->get();
		echo json_encode(['populars' => $products, 'count' => count($products)]);
	}
	public function products()
	{

		// $products = Product::inRandomOrder()->limit(8)->get();

		$pageNum = 1;
		//each page has 2 products
		// var_dump($pageNum);exit;
		$pageNum = $pageNum -1;
		$skipProducts = $pageNum * 2;
		$products = Product::skip($skipProducts)->take(2)->get(); //limit to first 2 product

		$all = Product::all();
		$countProducts = count($all); 
		$pageCount = ceil($countProducts/2);
		// var_dump($pageCount);exit;

		// echo json_encode(['products' => $products, 'count' => count($products)]);
		echo json_encode(['products' => $products, 'count' => count($products), 'pageCount' => $pageCount]);
	}
	public function getShop()
	{

		// $products = Product::inRandomOrder()->limit(8)->get();

		if(!isset($_POST['pageNum'])){
			$pageNum = 1;
		}else{
			$pageNum = $_POST['pageNum'];
		}
		//each page has 2 products
		// var_dump($pageNum);exit;
		$pageNum = $pageNum -1;
		$skipProducts = $pageNum * 2;
		$products = Product::skip($skipProducts)->take(2)->get(); //limit to first 2 product

		$all = Product::all();
		$countProducts = count($all); 
		$pageCount = ceil($countProducts/2);
		// var_dump($pageCount);exit;
		// echo json_encode(['products' => $products, 'count' => count($products)]);
		echo json_encode(['products' => $products, 'count' => count($products), 'pageCount' => $pageCount]);
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
		if(isset($_POST['keyword'])){
			$keyword = $_POST['keyword'];
		}

		if(isset($_POST['selectedManufacturers']) || isset($_POST['selectedCategories']) || isset($_POST['selectedSubCategories'])){

			//ONLY MANUFACTURERS
			if(isset($_POST['selectedManufacturers'])){	
				$selectedManufacturers = $_POST['selectedManufacturers'];
			// var_dump($selectedManufacturers);exit;
				if(!empty($selectedManufacturers)){
					$results = [];
					$count = 0;
					$dealProducts = [];
					$count1 = 0;
					$searchProducts = [];
					$count2 = 0;
					foreach($selectedManufacturers as $selectedManufacturer){
					// var_dump(Product::where("manufacturer_id", $selectedManufacturers)->inRandomOrder()->limit(8)->get()[0]);exit;	
						$results[$count] = Product::where("manufacturer_id", $selectedManufacturer)->get();
						$count = $count + 1;

						$temp = Product::where("manufacturer_id", $selectedManufacturer)->where("deal", 1)->get(); 
						if(!is_null($temp)){ // always true. not sure why 
							$dealProducts[$count1] = $temp;
							$count1 = $count1 + 1;
						}

						if(isset($keyword)){

							$temp1 = Capsule::select("SELECT * FROM products WHERE manufacturer_id = $selectedManufacturer and (keywords LIKE '%$keyword%' OR (name LIKE '%$keyword%')) ");
							if(!is_null($temp1)){ // always true. not sure why 
								$searchProducts[$count2] = $temp1;
								$count2 = $count2 + 1;
							}
						}
					}
				}
			}

			// var_dump($dealProducts);exit; 
			//ONLY CATEGORY 
			if(isset($_POST['selectedCategories'])){	
				$selectedCategories = $_POST['selectedCategories'];
			// var_dump($selectedManufacturers);exit;
				if(!empty($selectedCategories)){
					$results = [];
					$count = 0;
					$dealProducts = [];
					$count1 = 0;
					$searchProducts = [];
					$count2 = 0;
					foreach($selectedCategories as $selectedCategory){
					// var_dump(Product::where("manufacturer_id", $selectedManufacturers)->inRandomOrder()->limit(8)->get()[0]);exit;	
						$results[$count] = Product::where("category_id", $selectedCategory)->get();
						$count = $count + 1;

						$temp = Product::where("category_id", $selectedCategory)->where("deal", 1)->get(); 
						if(!is_null($temp)){
							$dealProducts[$count1] = $temp;
							$count1 = $count1 + 1;
						}

						if(isset($keyword)){
							$temp1 = Capsule::select("SELECT * FROM products WHERE category_id = $selectedCategory and (keywords LIKE '%$keyword%' OR (name LIKE '%$keyword%')) ");
							if(!is_null($temp1)){ // always true. not sure why 
								$searchProducts[$count2] = $temp1;
								$count2 = $count2 + 1;
							}
						}
					}
				}
			}
			//ONLY SUBCATEGORY
			if(isset($_POST['selectedSubCategories'])){	
				$selectedSubCategories = $_POST['selectedSubCategories'];
			// var_dump($selectedManufacturers);exit;
				if(!empty($selectedSubCategories)){
					$results = [];
					$count = 0;
					$dealProducts = [];
					$count1 = 0;
					$searchProducts = [];
					$count2 = 0;
					foreach($selectedSubCategories as $selectedSubCategory){
					// var_dump(Product::where("manufacturer_id", $selectedManufacturers)->inRandomOrder()->limit(8)->get()[0]);exit;	
						$results[$count] = Product::where("sub_category_id", $selectedSubCategory)->get();
						$count = $count + 1;

						$temp = Product::where("sub_category_id", $selectedSubCategory)->where("deal", 1)->get(); 
						if(!is_null($temp)){
							$dealProducts[$count1] = $temp;
							$count1 = $count1 + 1;
						}

						if(isset($keyword)){

							$temp1 = Capsule::select("SELECT * FROM products WHERE sub_category_id = $selectedSubCategory and (keywords LIKE '%$keyword%' OR (name LIKE '%$keyword%')) ");
							if(!is_null($temp1)){ // always true. not sure why 
								$searchProducts[$count2] = $temp1;
								$count2 = $count2 + 1;
							}	
						}
					}
				}
			}

			//MANUFACTURER AND CATEGORY
			if(isset($_POST['selectedManufacturers']) && isset($_POST['selectedCategories'])){	
				$selectedManufacturers = $_POST['selectedManufacturers'];
				$selectedCategories = $_POST['selectedCategories'];
			// var_dump($selectedManufacturers);exit;
				if( !empty($selectedManufacturers) && !empty($selectedCategories)){
					$results = [];
					$count = 0;
					$dealProducts = [];
					$count1 = 0;
					$searchProducts = [];
					$count2 = 0;
					foreach($selectedManufacturers as $selectedManufacturer){
						foreach($selectedCategories as $selectedCategory){

							
							// $query = Product::where("manufacturer_id", $selectedManufacturer)->orWhere('category_id', $selectedCategory)->get();
							
							// var_dump($query); exit;
							// var_dump( array_merge($results,(array) $query));exit;
							// $results[0] = (object) array_unique(array_merge((array) $results,(array) $query)); // maybe a problem here ????
							// if(!empty($results)){
							// 	$results[0] = (object) array_merge((array) $results[0],(array) $query);
							// }else{
							// 	$results[0] = $query;
							// }


							$results[$count] = Product::where("manufacturer_id", $selectedManufacturer)->orWhere('category_id', $selectedCategory)->get();
							// var_dump($results); exit;
							$count = $count + 1;
							// var_dump ($selectedManufacturer); exit;
							// $temp = Product::where("sub_category_id", $selectedSubCategory)->where("deal", 1)->get(); // this is what I think maybe a problme
							$temp = Product::where("deal", 1) 
											->where(function($q) use ($selectedManufacturer, $selectedCategory){ // understand what is $q is
												$q->where("manufacturer_id", $selectedManufacturer)->orWhere('category_id', $selectedCategory);
												// $q->where("manufacturer_id", 5 )->orWhere('category_id', 27); // 
											})->get();

											if(!is_null($temp)){
												$dealProducts[$count1] = $temp;
												$count1 = $count1 + 1;
											}

											if(isset($keyword)){

												$temp1 = Capsule::select("SELECT * FROM products WHERE (manufacturer_id = $selectedManufacturer or category_id = $selectedCategory) and (keywords LIKE '%$keyword%' OR (name LIKE '%$keyword%')) ");
								if(!is_null($temp1)){ // always true. not sure why 
									$searchProducts[$count2] = $temp1;
									$count2 = $count2 + 1;
								}	
							}				

						}	
					}
					// var_dump($results); exit; // array object array object
				}		
			}

			//MANUFACTURER AND SUBCATEGORY
			if(isset($_POST['selectedManufacturers']) && isset($_POST['selectedSubCategories'])){	
				$selectedManufacturers = $_POST['selectedManufacturers'];
				$selectedSubCategories = $_POST['selectedSubCategories'];
			// var_dump($selectedManufacturers);exit;
				if( !empty($selectedManufacturers) && !empty($selectedSubCategories)){
					$results = [];
					$count = 0;
					$dealProducts = [];
					$count1 = 0;
					$searchProducts = [];
					$count2 = 0;
					foreach($selectedManufacturers as $selectedManufacturer){
						foreach($selectedSubCategories as $selectedSubCategory){
						// var_dump(Product::where("manufacturer_id", $selectedManufacturers)->inRandomOrder()->limit(8)->get()[0]);exit;	
							$results[$count] = Product::where("manufacturer_id", $selectedManufacturer)->orWhere('sub_category_id', $selectedSubCategory)->get();
							$count = $count + 1;

							
							$temp = Product::where("deal", 1) 
											->where(function($q) use ($selectedManufacturer, $selectedSubCategory) { // understand what is $q is
												$q->where("manufacturer_id", $selectedManufacturer)->orWhere('sub_category_id', $selectedSubCategory);
												// $q->where("manufacturer_id", $hold)->orWhere('sub_category_id', $hold1);
											})
											->get();

											if(!is_null($temp)){
												$dealProducts[$count1] = $temp;
												$count1 = $count1 + 1;
											}


											if(isset($keyword)){

												$temp1 = Capsule::select("SELECT * FROM products WHERE (manufacturer_id = $selectedManufacturer or sub_category_id = $selectedSubCategory) and (keywords LIKE '%$keyword%' OR (name LIKE '%$keyword%')) ");
								if(!is_null($temp1)){ // always true. not sure why 
									$searchProducts[$count2] = $temp1;
									$count2 = $count2 + 1;
								}
							}

						}	
					}
				}		
			}

			//CATEGORY AND SUBCATEGORY
			if(isset($_POST['selectedCategories']) && isset($_POST['selectedSubCategories'])){	
				$selectedCategories = $_POST['selectedCategories'];
				$selectedSubCategories = $_POST['selectedSubCategories'];
			// var_dump($selectedManufacturers);exit;
				if( !empty($selectedCategories ) && !empty($selectedSubCategories )){
					$results = [];
					$count = 0;
					$dealProducts = [];
					$count1 = 0;
					$searchProducts = [];
					$count2 = 0;
					foreach($selectedCategories as $selectedCategory){
						foreach($selectedSubCategories  as $selectedSubCategory){
						// var_dump(Product::where("manufacturer_id", $selectedManufacturers)->inRandomOrder()->limit(8)->get()[0]);exit;	
							$results[$count] = Product::where("category_id", $selectedCategory)->orWhere('sub_category_id', $selectedSubCategory)->get();
							$count = $count + 1;

							$temp = Product::where("deal", 1) 
											->where(function($q) use ($selectedCategory, $selectedSubCategory) { // understand what is $q is
												$q->where("category_id", $selectedCategory)->orWhere('sub_category_id', $selectedSubCategory);
											})
											->get();

											if(!is_null($temp)){
												$dealProducts[$count1] = $temp;
												$count1 = $count1 + 1;
											}

											if(isset($keyword)){
												$temp1 = Capsule::select("SELECT * FROM products WHERE (category_id = $selectedCategory or sub_category_id = $selectedSubCategory) and (keywords LIKE '%$keyword%' OR (name LIKE '%$keyword%')) ");
								if(!is_null($temp1)){ // always true. not sure why 
									$searchProducts[$count2] = $temp1;
									$count2 = $count2 + 1;
								}
							}
						}	
					}
				}		
			}

			//MANUFACTURER AND CATEGORY AND SUBCATEGORY
			if(isset($_POST['selectedManufacturers']) && isset($_POST['selectedCategories']) && isset($_POST['selectedSubCategories'])){	
				$selectedManufacturers = $_POST['selectedManufacturers'];
				$selectedCategories = $_POST['selectedCategories'];
				$selectedSubCategories = $_POST['selectedSubCategories'];
			// var_dump($selectedManufacturers);exit;
				if( !empty($selectedManufacturers) && !empty($selectedCategories) && !empty($selectedSubCategories)){
					$results = [];
					$count = 0;
					$dealProducts = [];
					$count1 = 0;
					$searchProducts = [];
					$count2 = 0;
					foreach($selectedManufacturers as $selectedManufacturer){
						foreach($selectedCategories as $selectedCategory){
							foreach($selectedSubCategories as $selectedSubCategory){
								// var_dump(Product::where("manufacturer_id", $selectedManufacturers)->inRandomOrder()->limit(8)->get()[0]);exit;	
								$results[$count] = Product::where("manufacturer_id", $selectedManufacturer)->orWhere('category_id', $selectedCategory)->orWhere('sub_category_id', $selectedSubCategory)->get();
								$count = $count + 1;

								$temp = Product::where("deal", 1) 
											->where(function($q) use ($selectedManufacturer, $selectedCategory, $selectedSubCategory) { // understand what is $q is
												$q->where("manufacturer_id", $selectedManufacturer)->orWhere('category_id', $selectedCategory)->orWhere('sub_category_id', $selectedSubCategory);
											})
											->get();

											if(!is_null($temp)){
												$dealProducts[$count1] = $temp;
												$count1 = $count1 + 1;
											}

											if(isset($keyword)){
												$temp1 = Capsule::select("SELECT * FROM products WHERE ( manufacturer_id = $selectedManufacturer or category_id = $selectedCategory or sub_category_id = $selectedSubCategory) and (keywords LIKE '%$keyword%' OR (name LIKE '%$keyword%')) ");
									if(!is_null($temp1)){ // always true. not sure why 
										$searchProducts[$count2] = $temp1;
										$count2 = $count2 + 1;
									}
								}
							}
						}	
					}
					
				}		
			}

			// echo json_encode(['products' => (array) $results, 'count' => count($results)]); exit;
			// echo json_encode(['dealProducts' => (array) $dealProducts, 'countDeals' => count($dealProducts)]); exit;
			// echo json_encode(['products' => (array) $results, 'count' => count($results), 'dealProducts' => (array) $dealProducts, 'countDeals' => count($dealProducts)]); exit;
			echo json_encode(['products' => (array) $results, 'count' => count($results), 'dealProducts' => (array) $dealProducts, 'countDeals' => count($dealProducts), 'searchProducts' => (array) $searchProducts, 'countSearches' => count($searchProducts)]); exit; //countSearches is undefined
		}

		// $products = Product::inRandomOrder()->limit(8)->get();
		$results = Product::all();
		$dealProducts = Product::where("deal", 1)->get();

		if(isset($_POST['keyword'])){
			$keyword = $_POST['keyword'];
			$searchProducts = Capsule::select("SELECT * FROM products WHERE keywords LIKE '%$keyword%' OR (name LIKE '%$keyword%')");

			echo json_encode(['products' => (array) $results, 'count' => count($results), 'dealProducts' => (array) $dealProducts, 'countDeals' => count($dealProducts), 'searchProducts' => (array) $searchProducts, 'countSearches'=> count($searchProducts)]); exit;
		}
		
		

		echo json_encode(['products' => (array) $results, 'count' => count($results), 'dealProducts' => (array) $dealProducts, 'countDeals' => count($dealProducts)]); exit;
		
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

		// $count = Capsule::select("SELECT COUNT(*) FROM products WHERE keywords LIKE '%$keyword%' OR (name LIKE '%$keyword%')");
		$results = Capsule::select("SELECT * FROM products WHERE keywords LIKE '%$keyword%' OR (name LIKE '%$keyword%')");
		// $results = Product::all();;
			// var_dump($keyword);
			// var_dump(count($result));exit;
		echo json_encode(['results' => $results, 'count' => count($results)]);
	}

	public function getManufacturerKeyword()
	{
		if(isset($_POST['keyword'])){

		$keyword = $_POST['keyword']; // not right.
		$results = Capsule::select("SELECT * FROM manufacturers WHERE title LIKE '%$keyword%'");


		echo json_encode(['keyword'=> $results]); exit;
	}

	$results = Capsule::select("SELECT * FROM manufacturers");
	echo json_encode(['keyword' => $results]); exit;
}
public function getSubCategoryKeyword()
{
	if(isset($_POST['keyword'])){

		$keyword = $_POST['keyword']; // not right.
		$results = Capsule::select("SELECT * FROM sub_categories WHERE name LIKE '%$keyword%'");


		echo json_encode(['keyword'=> $results]); exit;
	}
	$results = Capsule::select("SELECT * FROM sub_categories");
	echo json_encode(['keyword' => $results]); exit;
}

public function getCategoryKeyword()
{
	if(isset($_POST['keyword'])){

		$keyword = $_POST['keyword']; // not right.
		$results = Capsule::select("SELECT * FROM categories WHERE name LIKE '%$keyword%'");


		echo json_encode(['keyword'=> $results]); exit;
	}
	$results = Capsule::select("SELECT * FROM categories");
	echo json_encode(['keyword' => $results]); exit;
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
		$item_per_page = $count + $request->next;
		$products = Product::where('popular', 1)->skip(0)->take($item_per_page)->get();
		echo json_encode(['popularProducts'=> $products, 'count' =>count($products)]);
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