<?php
require_once __DIR__.'/../../bootstrap/SAM_bootstrap/init.php';
// require_once __DIR__.'/../../app/config/_env.php';

$app_name = getenv('SAM_APP_NAME');

// var_dump(in_array('mod_rewrite', apache_get_modules()));
use Illuminate\Database\Capsule\Manager as Capsule;
// $user = Capsule::table('users')->where('id',2)->first();
// var_dump($user);
?>
