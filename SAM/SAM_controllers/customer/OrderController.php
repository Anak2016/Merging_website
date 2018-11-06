<?php
namespace SAM\Controllers\Customers;

use SAM\Models\Product;
use SAM\Models\SubCategory;
use SAM\Models\Category;
use SAM\Models\Order;
use SAM\Models\OrderDetail;
use SAM\Models\User;

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
	public $user;

	public function __construct()
	{		
		// if(!Role::middleware('user') || !Role::middleware('admin')){
		// 	Redirect::to('/login');
		// }
		$this->user = User::where('username', Session::get('SESSION_USER_NAME'))->get();
		// var_dump($this->user); exit;
		$this->user = $this->user['0']['id'];

		$total = Order::where('user_id', $this->user)->count();
		list($this->orders , $this->links) = _paginate(3, $total, $this->table_name, new Order);
	}
	public function show()
	{
		$token = CSRFToken::_token();
		// $orders = Order::all();
		$orders = $this->orders;
		$links = $this->links;
		$buyer_id = $this->user;

		$count  = ceil(count($orders) / 8);  
		$selected = 0;
		// var_dump($orders[0]['user_id']); exit;
		// var_dump($orders); exit;
		// var_dump($buyer_id); exit;
		// var_dump(Session::get('SESSION_USER_NAME'));exit;
		return _view('customers/products/order', compact('token', 'orders', 'links', 'buyer_id', "selected", "count"));


	}
}
?>