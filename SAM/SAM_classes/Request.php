<?php
namespace SAM\Classes;

class Request
{
	//return array of all request that we are interested in 
	public static function all($is_array = false)
	{
		$result = [];
		if(count($_GET) >0 ) $result['get'] = $_GET;
		if(count($_POST) >0 ) $result['post'] = $_POST;
		//HTTP File Upload Variables
		$result['file'] = $_FILES;
		return json_decode(json_encode($result), $is_array);
	}
	//get specific request type
	public static function get($key)
	{
		$object = new static;
		$data = $object->all();

		return $data->$key;
	}
	//check request availability
	public static function has($key)
	{
		return (array_key_exists($key, self::all(true)))? true: false;
	}

	public static function old($key, $value)
	{
		$object = new static;
		$data = $object->all();

		return isset($data->$key->$value) ? $data->$key->$value : ''; 
	}
	
	//refresh request
	public static function refresh()
	{
		$_POST =[];
		$_GET = [];
		$_FILES = [];
	}
}
?>