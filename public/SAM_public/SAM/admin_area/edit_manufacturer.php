<?php

include ('admin_includes/dblogin.php');


    if(isset($_GET['edit_manufacturer'])){

        $edit_manufacturer = $_GET['edit_manufacturer'];

        $get_manufacturer = "SELECT * FROM manufacturers WHERE manufacturer_id='$edit_manufacturer'";

        $run_manufacturer = $db_connect->query($get_manufacturer);

        $row_manufacturer = $run_manufacturer->fetch();

        $m_id = $row_manufacturer['manufacturer_id'];

        $m_title = $row_manufacturer['manufacturer_title'];

        $m_image = $row_manufacturer['manufacturer_image'];

        $new_m_image = $row_manufacturer['manufacturer_image'];


    }

    if(isset($_POST['update'])){

        $manufacturer_name = $_POST['manufacturer_name'];

        $manufacturer_image = $_FILES['manufacturer_image']['name'];

        $tmp_name = $_FILES['manufacturer_image']['tmp_name'];

        move_uploaded_file($tmp_name,"manufacturers_images/$manufacturer_image");

        if(empty($manufacturer_image)){

            $manufacturer_image = $new_m_image;

        }

        $update_manufacturer = "UPDATE manufacturers SET manufacturer_title='$manufacturer_name',manufacturer_image='$manufacturer_image' where manufacturer_id='$m_id'";

        $run_manufacturer = $db_connect->query($update_manufacturer);

        if($run_manufacturer){

            echo "<script>alert('Manufacturer Has Been Updated')</script>";

            echo "<script>window.open('view_manufacturers.php','_self')</script>";

        }

    }




?>

    <html>
    <head>
        <title>Insert Manufacturer/Brand</title>
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">
        <link href="../styles/bootstrap.min.css.map" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="../styles/style.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    </head>
<body>


    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Edit Manufacturer/Brand

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->


    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title"><!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw"> </i> Edit Manufacturer/Brand

                    </h3><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Manufacturer/Brand Name </label>

                            <div class="col-md-6">

                                <input type="text" name="manufacturer_name" class="form-control" value="<?php echo $m_title; ?>">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Select Manufacturer/Brand Image </label>

                            <div class="col-md-6">

                                <input type="file" name="manufacturer_image" class="form-control" >

                                <br>

                                <img src="manufacturers_images/<?php echo $m_image; ?>" width="70" height="70">

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> </label>

                            <div class="col-md-6">

                                <input type="submit" name="update" class="form-control btn btn-primary" value=" Update Manufacturer " >

                            </div>

                        </div><!-- form-group Ends -->

                    </form><!-- form-horizontal Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->


</body>
    </html>



<?php


?>