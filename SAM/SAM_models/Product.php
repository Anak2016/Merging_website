<?php
namespace SAM\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Product extends Model
{
	//Illuminate setup6
	use SoftDeletes;
	public $timestamps = true;
	// vars to be inserted to
	protected $fillable = [
		'name', 'price', 'desc', 'category_id', 'quantity',
		'sub_category_id', 'image_path1','image_path2',
		'image_path3', 'featured', 'keywords' ];

	protected $dates = ['deleted_at'];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function subCategory()
	{
		return $this->belongsTo(SubCategory::class);
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
				'name' => $item->name,
				'desc' => $item->desc,
				'price' => $item->price,
				'category_id' => Category::where('id', $item->category_id)->first()->id,
				'quantity' => $item->quantity,
				'sub_category_id' => SubCategory::where('id', $item->sub_category_id)->first()->id,
				'image_path1' => $item->image_path1,
				'image_path2' => $item->image_path2,
				'image_path3' => $item->image_path3,
				'deal' => $item->deal,
				'popular' => $item->popular,
				'keywords' => $item->keywords,
				'added' => $added->toFormattedDateString()
			]);
		}
		
		return $products;
	}
}

?>