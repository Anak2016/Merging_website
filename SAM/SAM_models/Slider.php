<?php
namespace SAM\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Slider extends Model
{
	protected $table = 'sliders';
	// public $timestamps = true;
	// vars to be inserted to
	// protected $fillable = ['name', 'image_path']; 

	// protected $dates = ['deleted_at'];

}

?>