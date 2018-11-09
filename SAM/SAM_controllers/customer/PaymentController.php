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
use voku\helper\Paginator;
use Illuminate\Database\Capsule\Manager as Capsule;
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
		$this->payments = [];
		$object = new Payment;
		$pages = new Paginator(4, 'p');
		$pages->set_total($total);
		$data = Capsule::select("SELECT *FROM payments WHERE deleted_at is null and user_id = $this->user ORDER BY created_at DESC".$pages->get_limit());

		$this->payments = $object->transform($data);
		$this->links = $pages->page_links();
	}
	public function show($id)
	{
		$token = CSRFToken::_token();
		$payments = $this->payments;
		$links = $this->links;
		return _view('customers/account/payment', compact('token', 'payments', 'links'));
	}
}
?>