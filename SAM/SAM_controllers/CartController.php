<?php
namespace SAM\Controllers;

use SAM\Models\Product;
use SAM\Models\Payment;
use SAM\Models\Order;
use SAM\Models\OrderDetail;

use SAM\Classes\CSRFToken;
use SAM\Classes\Request;
use SAM\Classes\Cart;
use SAM\Classes\Mail;
use SAM\Classes\Session;
use SAM\Classes\Role;
use SAM\Classes\Redirect;

use Stripe\Customer;
use Stripe\Charge;
// use App\Classes\Mail;

class CartController extends BaseController
{
	public function __construct()
	{		
		// if(!Role::middleware('user') || !Role::middleware('admin')){
		// 	Redirect::to('/sam_public/login');
		// }
	}

	public function show()
	{
		return view('cart');
	}

	public function showCheckout()
	{
		$token = CSRFToken::_token();

		return _view('checkout', compact('token'));
	}

	public function showOrderComplete()
	{
		// return _view('order-complete');
		return _view('order-complete');
	}
	public function completePayment()
	{
		Redirect::to('/sam_public/order-complete');
	}
	public function addItem()
	{
		// if is user then add things to this user cart

		var_dump("in addItem()");
		if(Request::has('post')){
			$request = Request::get('post');
			if(CSRFToken::verifyCSRFToken($request->token, false)){
				//if request with no product_id
				if(!$request->product_id){
					throw new \Exception('Malicious Activity');
				}
				Cart::add($request); // here
				
				var_dump("successfully added"); exit;
				echo json_encode(['success'=> 'Product Added to Cart Successfully']);
				exit;
			}
		}

	}

	public function getCartItems()
	{
		try{
			$result = array();
			//CartTotal = TotalPrice of all items in the cart
			$cartTotal = 0;

			if(!Session::has('user_cart')|| count(Session::get('user_cart')) < 1){
				echo json_encode(['fail' => "No item in the cart."]);
				exit;
			}

			$index = 0;

			foreach($_SESSION['user_cart'] as $cart_items){

				$productId = $cart_items['product_id'];

				//quantity of items in the cart NOT quatity of item availble in the shop
				$quantity = $cart_items['quantity'];

				$item = Product::where('id', $productId)->first();

				//if for some reason, no matching id can be found. skip the item to avoid problems
				if(!$item) {continue;}
				$totalPrice = $item->price * $quantity;
				$cartTotal = $totalPrice + $cartTotal;
				$totalPrice = number_format($totalPrice, 2 );
				array_push($result, [
					'id' => $item->id,
					'name' => $item->name,
					'image' => $item->image_path1,
					'description' => $item->description,
					'price' => $item->price,
					'total' => $totalPrice,
					'quantity' => $quantity,
					'stock' => $item->quantity,
					'index' => $index //index of product element in $result
				]);
				$index ++;
			}

			$cartTotal = number_format($cartTotal, 2);
			Session::add('cartTotal', $cartTotal); // late will use this session to charge 

			// return $cartTotal; 

			echo json_encode([
				'items' => $result, 'cartTotal'=> $cartTotal,
				'authenticated' => isAuthenticated(), 'amountInCents' => convertMoneyToCents($cartTotal)
			]); 
			exit;

		}catch(\Exception $es){
			//log this in database or email admin
		}
	}

	public function updateQuantity()
	{
		if(Request::has('post')){
			$request = Request::get('post');
			//if request with no product_id
			if(!$request->product_id){
				throw new \Exception('Malicious Activity');
			}
		}

		$index = 0;
		$quantity = '';
		foreach($_SESSION['user_cart'] as $cart_items){
			$index++;
			foreach($cart_items as $key=>$value){
				if($key == 'product_id' && $value == $request->product_id){
					switch($request->operator){
						case '+':
						$quantity = $cart_items['quantity'] +1;
						break;
						case '-':
						$quantity = $cart_items['quantity'] -1;
						if($quantity < 1){
							$quantity =1;
						}
						break;
					}

					array_splice($_SESSION['user_cart'], $index -1, 1, array([
						'product_id' => $request->product_id,
						'quantity' =>$quantity
					]));
				}
			}
		}
	}

	public function removeItem()
	{
		if(Request::has('post')){
			$request = Request::get('post');

			if($request->item_index === ''){
				throw new \Exception('Malicious Activity');
			}

			Cart::removeItem($request->item_index);
			echo json_encode(['success'=> "Product Removed From Cart!"]);
			exit;
		}
	}
	public function emptyItem()
	{
		if(Request::has('post')){
			$request = Request::get('post');

			//before delete we should display pop up

			Cart::clear($request->cart);
			echo json_encode(['success'=> "Cart is emptied!"]);
			exit;
		}	
	}

	public function checkout()
	{
		if(Request::has('post')){

			$result['product'] = array();
			$result['order_no'] = array();
			$result['total'] = array();

			$request = Request::get('post');
			$token = $request->stripeToken;
			$email= $request->stripeEmail;
			try{

				$customer = Customer::create([ //stripe class
					'email' => $email,
					'source' => $token
				]);

				$amount = convertMoneyToCents(Session::get('cartTotal'));
				//charge customer immediately
				$charge =Charge::create([
					'customer' =>$customer->id,
					'amount' => $amount,
					'description' => _user()->fullname.'-cart purchase', //user()->fullname is part of Stripe\Customer
					'currency' => 'usd'
				]);	
				$order_id = strtoupper(uniqid());

				foreach($_SESSION['user_cart'] as $cart_items){

					$productId = $cart_items['product_id'];

					//quantity of items in the cart NOT quatity of item availble in the shop
					$quantity = $cart_items['quantity'];

					$item = Product::where('id', $productId)->first();

					//if for some reason, no matching id can be found. skip the item to avoid problems
					if(!$item) {continue;}
					//totalPrice of selected item * quantity in the cart
					$totalPrice = $item->price * $quantity;
					$totalPrice = number_format($totalPrice, 2 );


					OrderDetail::create([
						'user_id' => _user()->id,
						'product_id' => $productId,
						'unit_price' => $item->price,
						'quantity' => $quantity,
						'total' => $totalPrice,
						'status' => 'Pending',
						'order_no' => $order_id
					]);
					$item->quantity = $item->quantity - $quantity;
					$item->save();

					array_push($result['product'], [
						'name' => $item->name,
						'price' => $item->price,
						'total' => $totalPrice,
						'quantity' => $quantity
					]);
				}
				Order::create([
					'user_id' => _user()->id,
					'order_no' => $order_id
				]);

				Payment::create([
					'user_id' => _user()->id,
					'amount' => $charge->amount, 
					'status' => $charge->status,
					'order_no' => $order_id
				]);
				$result['order_no'] = $order_id;
				$result['total'] = Session::get('cartTotal');
				//data to be used with Mail::send 
				$data = [
					'to' => _user()->email, // use awannaphasch2016@fau.edu instead of ADMIN_EMAIL because i dont have real admin email
					'subject' => 'Order Confirmation',
					'view' => 'purchase',
					'name' => '_user()->fullname',
					'body' => $result
				];

				(new Mail())->send($data);

			}catch(\Exception $ex){
				echo $ex->getMessage();
			}
			Cart::clear();
			// Cart::clear(_user()->username);
			echo json_encode([
				'success' => 'Thank you, we have received your payment and now processing your order.'
			]);
		}
	}
}
?>