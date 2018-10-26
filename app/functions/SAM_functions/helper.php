<?php
use Philo\Blade\Blade;
use voku\helper\Paginator;
use Illuminate\Database\Capsule\Manager as Capsule;
use Carbon\Carbon;
use SAM\Models\Category;
use SAM\Models\User;
use SAM\Classes\Session;

function _view($path, array $data = [])
{
	// echo "here"; exit;
	$view = __DIR__ . '/../../../resources/SAM_resources/views';
	$cache = __DIR__ . '/../../../bootstrap/SAM_bootstrap/cache';
	// $view = __DIR__ . '\..\..\..\resources\SAM_resources\views';
	// $cache = __DIR__ . '\..\..\..\bootstrap\SAM_bootstrap\cache';

	$blade = new Blade($view, $cache);
	// var_dump($blade->view()->make('welcomasdfe'));exit;
	// echo "here in _view"; exit;
	echo $blade->view()->make($path, $data)->render();
}

//helper function for Mail::send
function _make($filename, $data)
{
	extract($data); // $data arg is subbed as $data['body']; when make is called from Mail.php 

	// echo "i am here"; exit;
	//it only wants to include views/$filename.php only when function make is called.
	ob_start();

	//include template

	include(__DIR__.'/../../../resources/SAM_resources/views/emails/'.$filename.'.php');
	//get content of the file
	$content = ob_get_contents();

	ob_end_clean();

	return $content;

}

function _slug($value){
	//remove all character not in this list:underscore | letters | numbers |whitespaces
	$value = preg_replace('![^'.preg_quote('_').'\pL\pN\s]+!u', '', mb_strtolower($value));

	//remove underscore and whitespace with a dash
	$value = preg_replace('!['.preg_quote('-').'\s]+!u', '-', $value);

	//remove whitespace
	return trim($value, '-');
}

function _paginate($num_of_records, $total_record, $table_name, $object)
{
	$categories = [];
	// $object = new Category;	

	$pages = new Paginator($num_of_records, 'p');
	// var_dump($total_record);exit;	
	$pages->set_total($total_record);

	// eloquent query use SoftDelete on deleted_at.
	//here we use raw query we must specify that deleted_at is null
	$data = Capsule::select("SELECT *FROM $table_name WHERE deleted_at is null ORDER BY created_at DESC".$pages->get_limit());
	//transform data from object to array 
	$categories = $object->transform($data);

	return [$categories, $pages->page_links()];
}

function _isAuthenticated()
{
	// var_dump(Session::has('SESSION_USER_NAMdE') ? true : false);exit;
	return Session::has('SESSION_USER_NAME') ? true : false;
}

function _user()
{
	if(_isAuthenticated()){
		return User::findOrFail(Session::get('SESSION_USER_ID'));
	}
	return false;
}

function _convertMoneyToCents($value)
{
	$value = preg_replace("/\,/i","", $value);
	$value = preg_replace("/([^0-9\.\-])/i","", $value);

	if(!is_numeric($value)){
		return 0.00;
	}
	$value = (float) $value;
	return round($value,2) *100;
}

// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ SAM FUNCTIONS ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

/*This function is dynamic now, it can be use to any table for check the duplicate username
 *
 */
function getRealUserIp(){
    switch(true){
        case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default : return $_SERVER['REMOTE_ADDR'];
    }
}

function checkDuplicateEntries($table,$column_name,$value,$db_connect)
{

    try{
        $sqlQuery = "SELECT * FROM ".$table." WHERE " .$column_name."=:"."$column_name";
        $statement = $db_connect->prepare($sqlQuery);
        $statement->execute(array(":$column_name" => $value));

        if($row = $statement->fetch())
        {
            return true;
        }
        return false;

    }
    catch (PDOException $ex)
    {
        //handle exception
        echo "Error: ".$ex->getMessage();

    }
}

/**
 * @param $user_id
 */
function remeberMe($user_id)
{
    //UaQteh5i4y3dntstemYODEC is just the base64 encode which we make it/ we can change it later
    $encryptCookiaData = base64_encode("UaQteh5i4y3dntstemYODEC{$user_id}");

    //Cookie set to expire in about 30 days
    setcookie("rememberUserCookie",$encryptCookiaData,time()+60*60*24*100,'/');
}
function isCookieValid($db)
{
    $isValid = false;

    if(isset($_COOKIE['rememberUserCookie']))
    {
        /**
         *  Decode cookies and extract user ID
         */
        $decryptCookieData = base64_decode($_COOKIE['rememberUserCookie']);
        $user_id = explode("UaQteh5i4y3dntstemYODEC",$decryptCookieData);
        $userID = $user_id[1];

        /**
         * Check if id retrieved from the cookie exist in the database
         */
        $sqlQuery = "SELECT * FROM user WHERE id=id";
        $statement = $db->prepare($sqlQuery);
        $statement->execute(array(':id'=>$userID));

        if($row = $statement->fetch())
        {
            $id = $row['id'];
            $username = $row['username'];

            /**
             * Create the user session variable
             */
            $_SESSION['id']= $id;
            $_SESSION['username']=$username;
            $isValid = true;

        }else
        {
            /**
             * cookie ID is invalid destro session and logout user
             */
            $isValid = false;
            $this->signout();
        }


    }

    return $isValid;
}

?>