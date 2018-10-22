<?php
namespace SAM\Controllers\Customers;

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
		// if(!Role::middleware('user') || !Role::middleware('admin')){
		// 	Redirect::to('/login');
		// }
		
		$total = Order::all()->count();
		list($this->orders , $this->links) = _paginate(3, $total, $this->table_name, new Order);
	}
	public function show()
	{
		$token = CSRFToken::_token();
		// $orders = Order::all();
		$orders = $this->orders;
		$links = $this->links;
		// var_dump($orders); exit;
		return _view('customers/products/order', compact('token', 'orders', 'links'));
	}
}
?>