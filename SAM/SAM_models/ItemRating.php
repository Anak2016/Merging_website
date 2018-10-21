<?php
namespace SAM\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class ItemRating extends Model
{
	//Illuminate setup6
	use SoftDeletes;
	public $timestamps = true;
	// vars to be inserted to
	protected $fillable = ['product_id', 'userid','ratingNumber','title', 'comments','created_time', 'status','user_ip'];

	protected $dates = ['deleted_at'];

	public function Product()
	{
		return $this->belongsTo(Prouct::class);
	}

	public function transform($data)
	{
		$products = [];
		foreach($data as $item){
			$added = new Carbon($item->created_at);

			//push elements onto the end of array.
		//in this case each element of the array is array
			array_push($products, [
				'id' => $item->id,
				'product_id' => Product::where('id', $item->product_Id)->first()->id,
				'userId' => User::where('id', $item->userId)->first()->id,
				'ratingNumber' => $item->ratingNumber,
				'title' => $item->title,
				'comments' => $item->comments,
				'status' => $item->status,
				'user_ip' => $item->user_ip,
				'added' => $added->toFormattedDateString(),
			]);
		}
		
		return $products;
	}
}

?>