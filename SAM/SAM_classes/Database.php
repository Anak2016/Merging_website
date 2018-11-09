<?php
namespace SAM\Classes;

use Illuminate\Database\Capsule\Manager as Capsule; 
class Database{
	public function __construct()
	{
		//setting for illuminate orm for database
		$db = new Capsule;
		$db->addConnection([
			'driver' => getenv('SAM_DB_DRIVER'),
			'host' => getenv('SAM_HOST'),
			'database' => getenv('SAM_DB_NAME'),
			'username' => getenv('SAM_DB_USERNAME'),
			'password' => getenv('SAM_DB_PASSWORD'),
			'charset' => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix' => ''
		]);
	
		$db->setAsGlobal();
		$db->bootEloquent();
	}
}
?>