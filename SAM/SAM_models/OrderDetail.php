<?php
namespace SAM\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
	//Illuminate setup6
	use SoftDeletes;
	public $timestamps = true;
	// vars to be inserted to
	protected $fillable = ['user_id', 'product_id', 'unit-price', 'quantity', 'total', 'status', 'order_no'];
	// protected $fillable = ['user_id', 'product_id', 'unit-price', 'quantity', 'total', 'statu_no'];
	protected $dates = ['deleted_at'];
}

?>