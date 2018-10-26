<?php
// namespace SAM\App\Controllers;
namespace SAM\Controllers;

use SAM\Models\Product;
use SAM\Models\Slider;
use SAM\Models\User;
use SAM\Models\ItemRating;
use SAM\Models\Category;

use SAM\Classes\CSRFToken;
use SAM\Classes\Request;
// use SAM\Classes\Role;

// use App\Classes\Mail;
use Illuminate\Database\Capsule\Manager as Capsule; 
class IndexController extends BaseController
{

	// public function __construct()
	// {
	// 	echo User::all();exit;
	// }
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
		$product = $product[0];
		$category = $product['category']; 
		// var_dump($category->id);exit;
		return _view('details', compact('token', 'product', 'category'));
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