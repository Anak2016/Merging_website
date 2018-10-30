<?php
namespace SAM\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Manufacturer extends Model
{
	//Illuminate setup6
	use SoftDeletes;
	public $timestamps = true;
	// vars to be inserted to
	protected $fillable = ['product_id', 'title','image_path'];

	protected $dates = ['deleted_at'];

	public function products()
	{
		return $this->hasMany(Product::class);
	}

	public function transform($data)
	{
		$manufacturers = [];
		foreach($data as $item){
			$added = new Carbon($item->created_at);

			//push elements onto the end of array.
		//in this case each element of the array is array
			array_push($manufacturers, [
				'id' => $item->id,
				'product_id' => $item->product_id,
				'title' => $item->title,
				'image_path' => $item->image_path,
				'added' => $added->toFormattedDateString(),
			]);
		}
		
		return $manufacturers;
	}
}

?>