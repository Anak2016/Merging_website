<?php
namespace SAM\Controllers\Admin;

use SAM\Models\Product;
use SAM\Models\SubCategory;
use SAM\Models\Category;
use SAM\Models\Order;
use SAM\Models\OrderDetail;

use SAM\Classes\CSRFToken;
use SAM\Classes\Request;
use SAM\Classes\Role;
use SAM\Classes\Redirect;
use SAM\Classes\Session;

use SAM\Controllers\BaseController;
// use App\Classes\Mail;

class OrderController extends BaseController
{

	public $table_name = "orders";
	public $links;
	public $orders;

	public function __construct()
	{		
		if(!Role::middleware('admin')){
			Redirect::to('/login');
		}
		
		$total = Order::all()->count();

		list($this->orders , $this->links) = paginate(3, $total, $this->table_name, new Order);
	}
	public function show()
	{
		$token = CSRFToken::_token();
		$orders = $this->orders;
		$links = $this->links;
		return _view('admin/products/order', compact('token', 'orders', 'links'));
	}
	public function showEditForm($order_no)	
	{
		$token = CSRFToken::_token();
		$orderDetail = OrderDetail::where('order_no',$order_no)->get();
		return _view('admin/products/order-detail', compact('token', 'orderDetail'));
	}

	public function delete($id)
	{
		if(Request::has('post')){
			$request = Request::get('post');

			if(CSRFToken::verifyCSRFToken($request->token)){
				//update record if ture
				Order::destroy($id);

				Session::add('success','Order Deleted');
				Redirect::to('/admin/orders');
			}
			throw new \Exception('Token mismatch');
		}
		return null;
	}
}
?>