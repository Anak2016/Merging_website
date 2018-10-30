<?php
namespace SAM\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Category extends Model
{
	//Illuminate setup6
	use SoftDeletes;
	public $timestamps = true;
	// vars to be inserted to
	protected $fillable = ['name', 'slug','desc'];
	protected $dates = ['deleted_at'];

	//note: foriegn key is ClassName_id which is category_id in this case
	public function product()
	{
		//same as (Product::class, 'category_id', 'id' )// where category_id is foriegn key of category and id is primary key of product 
		return $this->hasMany(Product::class); //same as specify 'App\Models\Product'
	}

	public function subCategory()
	{
		//same as (SubCategory::class, 'category_id', 'id' )// where category_id is foriegn key of category and id is primary key of product 
		return $this->hasMany(SubCategory::class); 
	}


	public function transform($data)
	{
		$categories = [];
		foreach($data as $item){
			$added = new Carbon($item->created_at);

			//push elements onto the end of array.
			//in this case each element of the array is array
			array_push($categories, [
				'id' => $item->id,
				'name' => $item->name,
				'slug' => $item->slug,
				'desc' => $item->desc,
				'added' => $added->toFormattedDateString(),
			]);
		}
		return $categories;
	}
}

?>