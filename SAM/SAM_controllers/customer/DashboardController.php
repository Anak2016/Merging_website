<?php
namespace SAM\Controllers\Customers;

use SAM\Controllers\BaseController;
use SAM\Classes\Session;
use SAM\Classes\Request;
use SAM\Classes\Role;
use SAM\Classes\Redirect;

use SAM\Models\Product;
use SAM\Models\Order;
use SAM\Models\User;
use SAM\Models\Payment;
use SAM\Models\OrderDetail;
use Illuminate\Database\Capsule\Manager as Capsule;

class DashboardController extends BaseController
{

	public function __construct()
	{		
	// 	if(!Role::middleware('admin')){
	// 		Redirect::to('/login');
	// 	}
	}

	public function show()
	{	
		// $orders = Order::all()->count();
		// $products = Product::all()->count();
		// $users = User::all()->count();
		// $payments = Payment::all()->sum('amount') / 100; 
		// return _view('admin/dashboard', compact('orders', 'products', 'payments', 'users'));
		// var_dump('here in Customer');exit;
		return _view('customers/customer');
	}

}

?>