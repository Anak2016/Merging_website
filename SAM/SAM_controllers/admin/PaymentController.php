<?php
namespace SAM\Controllers\Admin;

use SAM\Models\Product;
use SAM\Models\SubCategory;
use SAM\Models\Category;
use SAM\Models\Payment;

use SAM\Classes\CSRFToken;
use SAM\Classes\Request;
use SAM\Classes\Role;
use SAM\Classes\Redirect;

use SAM\Controllers\BaseController;
// use App\Classes\Mail;

class PaymentController extends BaseController	
{
	public $table_name = "payments";
	public $payments;
	public $links;

	public function __construct()
	{		
		if(!Role::middleware('admin')){
			Redirect::to('/login');
		}
		
		// $this->payment = Category::all();
		$total = Payment::all()->count();

		list($this->payments , $this->links) = _paginate(3, $total, $this->table_name, new Payment);
		// var_dump($this->links); exit;
	}
	public function show($id)
	{
		$token = CSRFToken::_token();
		$payments = $this->payments;

		$links = $this->links;
		return _view('admin/products/payment', compact('token', 'payments', 'links'));
		// return view('admin/products/payment', compact('token', 'payments'));
	}
}
?>