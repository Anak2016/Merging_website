<?php
namespace SAM\Controllers\Admin;

use SAM\Classes\Session;
use SAM\Controllers\BaseController;
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
		if(!Role::middleware('admin')){
			Redirect::to('/login');
		}
	}

	public function show()
	{	

		// $orders = Capsule::table('orders')->count(Capsule::raw('DISTINCT order_no'));
		$orders = Order::all()->count();
		$products = Product::all()->count();
		$users = User::all()->count();
		$payments = Payment::all()->sum('amount') / 100; //convert form cents to dollars 
		// var_dump($orders);exit;
		return _view('admin/dashboard', compact('orders', 'products', 'payments', 'users'));
	}

	public function getChartData()
	{
		//I gotta learn 
		//raw query with Capsule(ORM ) 
		$revenue = Capsule::table('payments')->select(
			Capsule::raw("sum(amount)/ 100 as 'amount'"),
			Capsule::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),
			Capsule::raw("YEAR(created_at) year, Month(created_at) month")	
		)->groupby('year', 'month')->get();

		$orders = Capsule::table('orders')->select(
			Capsule::raw("count(id) as 'count'"),
			Capsule::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),
			Capsule::raw("YEAR(created_at) year, Month(created_at) month")	
		)->groupby('year', 'month')->get();

		echo json_encode([
			'revenues' => $revenue, 'orders' => $orders
		]); exit;
	}
}

?>