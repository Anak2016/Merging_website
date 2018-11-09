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
use voku\helper\Paginator;
use Illuminate\Database\Capsule\Manager as Capsule;

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

		$this->orders = [];
		$object = new Order;
		$pages = new Paginator(4, 'p');
		$pages->set_total($total);
		$data = Capsule::select("SELECT *FROM orders WHERE deleted_at is null and user_id = $this->user ORDER BY created_at DESC".$pages->get_limit());

		$this->orders = $object->transform($data);
		$this->links = $pages->page_links();
	}
	public function show()
	{
		$token = CSRFToken::_token();
		// $orders = Order::all();
		$orders = $this->orders;
		$links = $this->links;

		$count  = count($orders);  
		$selected = 0;
		return _view('customers/products/order', compact('token', 'orders', 'links', "selected", "count"));


	}
}
?>