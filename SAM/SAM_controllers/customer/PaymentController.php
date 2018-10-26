<?php
namespace SAM\Controllers\Customers;

use SAM\Models\Product;
use SAM\Models\SubCategory;
use SAM\Models\Category;
use SAM\Models\Payment;
use SAM\Models\User;

use SAM\Classes\CSRFToken;
use SAM\Classes\Request;
use SAM\Classes\Role;
use SAM\Classes\Redirect;
use SAM\Classes\Session;

use SAM\Controllers\BaseController;
// use App\Classes\Mail;

class PaymentController extends BaseController	
{
	public $table_name = "payments";
	public $payments;
	public $links;
	public $user;

	public function __construct()
	{		
		// if(!Role::middleware('admin')|| !Role::middleware('admin')){
		// 	Redirect::to('/login');
		// }
		// $this->payment = Category::all();
		$this->user = User::where('username', Session::get('SESSION_USER_NAME'))->get();
		$this->user = $this->user['0']['id'];
		$total = Payment::where('user_id', $this->user)->count();
		// $total = Payment::all()->count();

		list($this->payments , $this->links) = _paginate(3, $total, $this->table_name, new Payment);
		// var_dump($this->links); exit;
	}
	public function show($id)
	{
		$token = CSRFToken::_token();
		$payments = $this->payments;
		$links = $this->links;
		$buyer_id = $this->user;

		// var_dump($buyer_id);exit;
		return _view('customers/account/payment', compact('token', 'payments', 'links', 'buyer_id'));
		// return view('admin/products/payment', compact('token', 'payments'));s
	}
}
?>