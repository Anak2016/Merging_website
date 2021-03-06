<?php
/**
 * Created by PhpStorm.
 * User: Nordize
 * Date: 10/12/2018
 * Time: 12:51 PM
 */

    // var_dump(__DIR__); exit;
    // include ('__DIR__/../includes/dblogin.php');
    // require_once '__DIR__\..\includes\dblogin.php'; //not sure why this is wrong
    $var = '\..\includes\dblogin.php';
    require_once __DIR__.$var;

#get IP ADDRESS function start
function getRealUserIp()
{
    switch (true)
    {
        case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default : return $_SERVER['REMOTE_ADDR'];
    }
}

# add to cart function start
function add_cart()
{
    global $db_connect;

    if(isset($_GET['add_cart']))
    {
        $ip_add = getRealUserIp();
        $p_id = $_GET['add_cart'];

        $product_qty = $_POST['product_qty'];
        $product_size = $_POST['product_size'];

        try{
            $query_cart = "INSERT INTO cart (p_id,ip_add,qty,p_size) VALUES ('$p_id','$ip_add','$product_qty','$product_size')";

            $db_connect->exec($query_cart);
            $db_connect = null;

            echo"<script>window.open('details.php?pro_id=$p_id','_self')</script>";
        }
        catch(PDOException $e)
        {
            echo $query_cart . "<br>" . $e->getMessage();
        }


    }
}
#total price function start
function total_price()
{
    global $db_connect;
    $ip_add = getRealUserIp();

    $total =0;

    $select_cart = "SELECT * FROM cart WHERE ip_add = '$ip_add'";

    $run_cart = $db_connect->query($select_cart);

    while($record = $run_cart->fetch(PDO::FETCH_BOTH))
    {
        $pro_id = $record['p_id'];
        $pro_qty = $record['qty'];
        $get_price = "SELECT * FROM products WHERE product_id = '$pro_id'";

        $run_price = $db_connect->query($get_price);

        while($row_price = $run_price->fetch(PDO::FETCH_BOTH))
        {
            $sub_total = $row_price['product_price']*$pro_qty;
            $total += $sub_total;
        }




    }
    echo"$".$total;
}


#item_in_cart function start
function items_in_cart()
{
    global $db_connect;

    $ip_add = getRealUserIp();

    $get_items_in_cart = "SELECT COUNT(*) FROM cart WHERE ip_add='$ip_add'";

    $run_items_in_cart = $db_connect->query($get_items_in_cart);

    $count_items_in_cart = $run_items_in_cart->fetchColumn();

    echo $count_items_in_cart;
}



#get today deal function start
function get_today_deal() //get_produt
{
    global $db_connect;
    //show first 6 items
    $get_products = "SELECT * FROM products ORDER BY 1 DESC LIMIT 0,8";

    $run_products = $db_connect->query($get_products);

    if ($run_products->rowCount() >0) {
        while($row_products = $run_products->fetch()){
            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_price = $row_products['product_price'];
            $pro_img1 = $row_products['product_img1'];

            echo "
            <div class='col-md-4 col-sm-6 single'>
                <div class='product'>
                    <a href='details.php?pro_id=$pro_id'>
                        <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
                    </a>
                    
                    <div class='text'>
                        <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a> </h3>
                        <p class='price'>$ $pro_price</p>
                        <p class='buttons'>
                            <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                            <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
                                <i class='fa fa-shopping-cart'></i> Add to Cart
                            </a>
                        
                        </p>
                    </div>
                
                </div>
            
            </div>
            ";
        }
    }
}

# get_product_category start
function get_product_category()
{
    global $db_connect;

    $get_p_cats = "SELECT * FROM product_categories";
    $run_p_cats = $db_connect->query($get_p_cats);

    if ($run_p_cats->rowCount() >0) {
        while($row_p_cats = $run_p_cats->fetch()){
            $p_cat_id = $row_p_cats['p_cat_id'];
            $p_cat_title = $row_p_cats['p_cat_title'];

            echo "<li><a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a></li>";
        }
    }

}
#get_category start
function get_category()
{
    global $db_connect;

    $get_cats = "SELECT * FROM categories";

    $run_cats = $db_connect->query($get_cats);

    if ($run_cats->rowCount() >0) {
        while($row_cats = $run_cats->fetch()){
            $cat_id = $row_cats['cat_id'];
            $cat_title = $row_cats['cat_title'];

            echo"<li><a href='shop.php?cat=$cat_id'>$cat_title</a></li>";
        }
    }

}
#get product_cat_pro function start
function get_p_cat_pro()
{
    global $db_connect;

    if(isset($_GET['p_cat']))
    {
        $p_cat_id=$_GET['p_cat'];
        $get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id = '$p_cat_id'";

        $run_p_cat = $db_connect->query($get_p_cat);


        $row_p_cat = $run_p_cat->fetch();

        $p_cat_title = $row_p_cat['p_cat_title'];
        $p_cat_desc = $row_p_cat['p_cat_desc'];

        $get_products = "SELECT COUNT(*) FROM products WHERE p_cat_id = '$p_cat_id'";

        $run_products = $db_connect->query($get_products);
        $count = $run_products->fetchColumn();

        if($count == 0)
        {
            echo"
        <div class='box'>
            <h1>No Product Found In This Product Category</h1>
        
        </div>
        ";
        }else
        {
            echo"
        <div class='box'>
            <h1>$p_cat_title</h1>
            <p>$p_cat_desc</p>
        </div>
        ";
        }



        $query_products_by_cat = "SELECT * FROM products WHERE p_cat_id = '$p_cat_id'";

        $run_products_by_cat = $db_connect->query($query_products_by_cat);

        while($row_products = $run_products_by_cat->fetch(PDO::FETCH_BOTH))
        {
            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_price = $row_products['product_price'];
            $pro_img1 = $row_products['product_img1'];

            $pro_price = sprintf('%.2f',$pro_price);

            echo"
            <div class='col-md-4 col-sm-6 center-responsive'>
                <div class='product'>
                    <a href='details.php?pro_id=$pro_id'>
                    <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
                    </a>
                    
                    <div class='text'>
                        <h3><a href='details.php?pro_id=$pro_id' > $pro_title</a></h3>
                        <p class='price'>$$pro_price</p>
                        <p class='buttons'>
                            <a href='details.php?pro_id=$pro_id' class='btn btn-default'> View Details</a>
                            <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
                                <i class='fa fa-shopping-cart'></i> Add to cart
                        </a>
                        </p>
                    </div>
                                
                                    
                 </div>
            </div>
            ";
        }



    }
}

#function get_catpro start
function get_catpro()
{
    global $db_connect;
    if(isset($_GET['cat']))
    {
        $cat_id = $_GET['cat'];
        $get_cat = "SELECT * FROM categories WHERE cat_id = '$cat_id'";

        $run_cat = $db_connect->query($get_cat);

        $row_cat = $run_cat->fetch();

        $cat_title = $row_cat['cat_title'];
        $cat_desc = $row_cat['cat_desc'];

        $get_products = "SELECT COUNT(*) FROM products WHERE cat_id ='$cat_id'";

        $run_products = $db_connect->query($get_products);
        $count = $run_products->fetchColumn();

        if($count == 0)
        {
            echo "
            <div class='box'>
                <h1>No Product Found In This Category</h1>
            </div>
            ";
        }else{
            echo"
            <div class='box'>
                <h1>$cat_title</h1>
                <p>$cat_desc</p>
            </div>
            ";
        }


        $query_get_cat = "SELECT * FROM products WHERE cat_id = '$cat_id'";

        $run_query_get_cat = $db_connect->query($query_get_cat);

        while($row_query_get_cat = $run_query_get_cat->fetch(PDO::FETCH_BOTH))
        {
            $pro_id = $row_query_get_cat['product_id'];
            $pro_title = $row_query_get_cat['product_title'];
            $pro_price = $row_query_get_cat['product_price'];
            $pro_img1 = $row_query_get_cat['product_img1'];

            $pro_price = sprintf('%.2f',$pro_price);

            echo"
            <div class='col-md-4 col-sm-6 center-responsive'>
                <div class='product'>
                    <a href='details.php?pro_id=$pro_id'>
                    <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
                    </a>
                    
                    <div class='text'>
                        <h3><a href='details.php?pro_id=$pro_id' > $pro_title</a></h3>
                        <p class='price'>$$pro_price</p>
                        <p class='buttons'>
                            <a href='details.php?pro_id=$pro_id' class='btn btn-default'> View Details</a>
                            <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
                                <i class='fa fa-shopping-cart'></i> Add to cart
                        </a>
                        </p>
                    </div>
                                
                                    
                 </div>
            </div>
            ";
        }

    }
}

#function update_cart start
function update_cart()
{
    global $db_connect;

    if(isset($_POST['update']))
    {
        foreach ($_POST['remove'] as $remove_id)
        {
            $delete_product = "DELETE FROM cart WHERE p_id ='$remove_id'";

            $run_delete = $db_connect->query($delete_product);

            if($run_delete)
            {
                echo"<script>window.open('cart.php','_self')</script>";
            }
        }
    }

   # echo @$up_cart = update_cart();

}

?>

