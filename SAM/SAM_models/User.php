<?php
namespace SAM\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class User extends Model
{
	//Illuminate setup6
	use SoftDeletes;
	public $timestamps = true;
	// vars to be inserted to
	protected $fillable = ['id','username', 'fullname', 'email', 'password', 'role', 'address', 'city', 'state', 'country', 'zipcode', 'phone', 'image_path', 'ip' ];
	protected $dates = ['deleted_at'];

	//note: foriegn key is ClassName_id which is products_id in this case
	//it must added to the database column for the relation to work
	public function product()
	{
		return $this->hasMany(Product::class); //same as specify 'App\Models\Product'
	}

	public function transform($data)
	{
		$users = [];
		foreach($data as $item){
			$added = new Carbon($item->created_at);

			//push elements onto the end of array.
			//in this case each element of the array is array
			array_push($users, [
				'id' => $item->id,
				'username' => $item->username,
				'fullname' => $item->fullname,
				'email' => $item->email,
				'password' => $item->password,
				'role' => $item->role,
				'address' => $item->address,
				'city' => $item->city,
				'state' => $item->state,
				'country' => $item->country,
				'zipcode' => $item->zipcode,
				'phone' => $item->phone,
				'image_path' => $item->image_path,
				'ip' => $item->ip,
				'added' => $added->toFormattedDateString(),
			]);

		}
		return $users;
	}
}

?>