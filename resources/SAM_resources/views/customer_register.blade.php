<?php

if(isset($_POST['Register']))
{

    //initialize an array to store any error message from the form
    $form_errors = array();

    //Fields that requires checking for minimum length
    $fields_to_check_length = array('username' => 4, 'password' => 6);

    //call the function to check minimum required length and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    //email validation / merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_email($_POST));

    //check duplicate username
    #$form_errors = checkDuplicateEntries('customer','customer_username','username',$db_connect);


    //check if error array is empty, if yes process form data and insert record
    if(empty($form_errors)){

        //define for image
        $allowed_filetypes = array('.jpg','.gif','.bmp','.png'); // These will be the types of file that will pass the validation.
        $max_filesize = 9999999999; // Maximum filesize in BYTES - SET IN to a low number for small files
        //$upload_path = './uploads/'; // The place the files will be uploaded to (currently a 'files' directory).
        $upload_path = './customer/customer_images/';

        //collect form data and store in variables
        $c_firstname = $_POST['c_firstname'];
        $c_lastname = $_POST['c_lastname'];
        $c_username = $_POST['username'];
        $c_email = $_POST['email'];
        $c_pass = $_POST['password'];
        $c_address = $_POST['c_address'];
        $c_city = $_POST['c_city'];
        $c_state = $_POST['c_state'];
        $c_country = $_POST['c_country'];
        $c_zipcode = $_POST['c_zipcode'];
        $c_phone = $_POST['c_phone'];
        $c_image = $_FILES['c_image']['name'];
        $c_image_temp = $_FILES['c_image']['tmp_name'];
        $ext = substr($c_image, strpos($c_image,'.'), strlen($c_image)-1); // Get the extension from the filename.

        $c_ip = getRealUserIp();

        // Check if the filetype is allowed, if not DIE and inform the user.
        if(!in_array($ext,$allowed_filetypes))
            $result = flashMessage('The file you attempted to upload is not allowed.');

        // Now check the filesize, if it is too large then DIE and inform the user.
        if(filesize($c_image_temp) > $max_filesize)
            $result = flashMessage('The file you attempted to upload is too large.');

        // Check if we can upload to the specified path, if not DIE and inform the user.
        if(!is_writable($upload_path))
            die('You cannot upload to the specified directory, please contact administrator.');

        // Upload the file to your specified path.
        if(move_uploaded_file($c_image_temp,$upload_path . $c_image))
            //echo 'Your file upload was successful'; // It worked.
            $result = flashMessage('Your file upload was successful');
        else
            $result = flashMessage('There was an error during the file upload. Please try again.'); // It failed

        //move_uploaded_file($c_image_temp,'customer/customer_images/$c_image');

        if(checkDuplicateEntries('customer','customer_email',$c_email,$db_connect))
        {
            $result = flashMessage("This email is already taken");
        }
        else if(checkDuplicateEntries('customer','customer_username',$c_username,$db_connect))
        {
            $result = flashMessage('Username is already taken');
        }
        else if(empty($form_errors))
        {
            //hashing the password
            $hashed_password = password_hash($c_pass, PASSWORD_DEFAULT);
            try{
                //create SQL insert statement
                $sqlInsert = "INSERT INTO customer (customer_firstname,customer_lastname,customer_username, customer_email, customer_pass, customer_address,customer_city,customer_state,customer_country,customer_zipcode,customer_phone,customer_image,customer_ip,join_date) 
            VALUES (:firstname, :lastname, :username, :email,:password,:address,:city,:state,:country,:zipcode,:phone,:image,:ip,now())";

                //use PDO prepared to sanitize data
                $statement = $db_connect->prepare($sqlInsert);

                //add the data into the database
                $statement->execute(array(':firstname' => $c_firstname, ':lastname' => $c_lastname, ':username' => $c_username,':email' =>$c_email,':password'=>$hashed_password,':address'=>$c_address,':city'=>$c_city,':state'=>$c_state,':country'=>$c_country,':zipcode'=>$c_zipcode,':phone'=>$c_phone,':image'=>$c_image,':ip'=>$c_ip));

                //check if one new row was created
                if($statement->rowCount() == 1){
                    $result = "<p style='padding:20px; border: 1px solid gray; color: green;'> Registration Successful</p>";
                }

                #check when have some item on cart
                $sel_cart = "SELECT COUNT(*) FROM cart WHERE ip_add='$c_ip'";

                $run_cart = $db_connect->query($sel_cart);
                $check_cart = $run_cart->fetchColumn();

                if($check_cart>0)
                {
                    $_SESSION['customer_username']=$c_username;
                    echo"<script>alert('You have been Registered Successfully')</script>";

                    echo"<script>window.open('checkout.php','_self')</script>";
                }
                else{
                    $_SESSION['customer_username']=$c_username;
                    echo"<script>alert('You have been Registered Successfully')</script>";

                    echo"<script>window.open('index.php','_self')</script>";
                }


            }catch (PDOException $ex){
                $result = "<p style='padding:20px; border: 1px solid gray; color: red;'> An error occurred: ".$ex->getMessage()."</p>";
            }
        }

    }
    else{
        if(count($form_errors) == 1){
            $result = "<p style='color: red;'> There was 1 error in the form<br>";
        }else{
            $result = "<p style='color: red;'> There were " .count($form_errors). " errors in the form <br>";
        }
    }

}


?>

@extends('layouts.app')
@section('title', 'customer_register')
@section('data-page-id', 'customer_register')

@section('content')


<div id="content"><!--content start -->
    <div class="container"><!--container start-->
        <div class="col-md-12"><!--col-md-12 start-->
            <ul class="breadcrumb"><!--breadcrumb start -->
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    Register
                </li>
            </ul>
        </div> <!--col-md-12 end-->

        <div class="col-md-3"><!-- col-md-3-->
            <?php include ("includes/sidebar.php");?>
        </div>

        <div class="col-md-9"><!--col-md-9 -->
            <div class="box"><!--box start -->
                <div class="box-header"><!--box-header -->
                    <center><!--center start -->
                        <h2>Register A New Account</h2>

                    </center>
                </div>
                <?php if(isset($result)) echo $result; ?>
                <?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
                <form action="customer_register.php" method="post" enctype="multipart/form-data"><!--form start -->

                    <div class="form-group"><!--form-group start -->
                        <label>First Name:</label>
                        <input type="text" class="form-control" name="c_firstname"  required>
                    </div>
                    <div class="form-group"><!--form-group start -->
                        <label>Last Name:</label>
                        <input type="text" class="form-control" name="c_lastname" required>
                    </div>

                    <div class="form-group"><!--form-group start -->
                        <label>User Name:</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>

                    <div class="form-group"><!--form-group start -->
                        <label>Email:</label>
                        <input type="text" class="form-control" name="email" required>
                    </div>

                    <div class="form-group"><!--form-group start -->
                        <label>Password:</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group"><!--form-group start -->
                        <label>Address:</label>
                        <input type="text" class="form-control" name="c_address" required>
                    </div>
                    <div class="form-group"><!--form-group start -->
                        <label>City:</label>
                        <input type="text" class="form-control" name="c_city" required>
                    </div>
                    <div class="form-group"><!--form-group start -->
                        <label>State:</label>
                        <input type="text" class="form-control" name="c_state" required>
                    </div>
                    <div class="form-group"><!--form-group start -->
                        <label>Country:</label>
                        <input type="text" class="form-control" name="c_country" required>
                    </div>
                    <div class="form-group"><!--form-group start -->
                        <label>Zip code:</label>
                        <input type="text" class="form-control" name="c_zipcode" required>
                    </div>
                    <div class="form-group"><!--form-group start -->
                        <label>Phone No:</label>
                        <input type="text" class="form-control" name="c_phone" required>
                    </div>
                    <div class="form-group"><!--form-group start -->
                        <label>Your Image:(.jpg/.gif/.bmp/.png Only)</label>
                        <input type="file" class="form-control" name="c_image" >
                    </div>

                    <div class="text-center"><!--text-center -->
                        <button type="submit" name="Register" class="btn btn-primary">
                            <i class="fa fa-user-md"></i> Register
                        </button>
                    </div>


                </form>




            </div>
        </div>


    </div> <!--container end-->
</div> <!--content end-->
@stop

