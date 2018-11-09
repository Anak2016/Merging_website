<?php
namespace SAM\Classes;

class Cart
{

	protected static $isItemInCart = false;

	public static function add($request)
	{
		try{
			$index = 0;
			
			// Session::remove('user_cart'); return "removed";

			if(!Session::has('user_cart') || count(Session::get('user_cart')) < 1){
				Session::add('user_cart',[
					0 => ['product_id' => $request->product_id, 'quantity' => 1]
				]);
				// add cart to Session of user's username 			
			}
			else{

				//add 1 more quantity to items that are already in the cart  
				foreach($_SESSION['user_cart'] as $cart_items){
					$index++;
					foreach($cart_items as $key=> $value){
						if($key == 'product_id' && $value == $request->product_id){
							array_splice($_SESSION['user_cart'], $index-1, 1, [[ 
								'product_id' => $request->product_id, 
								'quantity' => $cart_items['quantity'] + 1
							]]);
							self::$isItemInCart = true;

						}

					}
				}
				//add item to the cart if it is not yet in it
				if(!self::$isItemInCart){
					array_push($_SESSION['user_cart'],[
						'product_id' => $request->product_id, 'quantity' => 1
					]);
				}
			}
			return $_SESSION['user_cart'];

		}catch(\Exception $ex){
			return $ex->getMessage();
		}
	}
	public static function removeItem($index)
	{
		if(count(Session::get('user_cart'))<=1 ){
			//empty cart
			self::clear();
		}else{
			unset($_SESSION['user_cart'][$index]);
			sort($_SESSION['user_cart']);
		}
	}
	public static function clear()
	{
		$var = Session::get('SESSION_USER_NAME');

		if(Session::has("user_cart"))
		{
			Session::remove("user_cart");
		}
		if(Session::has($var))
		{
			Session::remove($var);
		}
	}
}

?>