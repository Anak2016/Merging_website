<?php
/**
 * Created by PhpStorm.
 * User: Nordize
 * Date: 10/13/2018
 * Time: 4:35 PM
 */


$total = 0;
global $db_connect;

$ip_add = getRealUserIp();

$get_items_in_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";

$run_items_in_cart = $db_connect->query($get_items_in_cart);

if ($run_items_in_cart->rowCount() > 0) {
    while ($row_items_in_cart = $run_items_in_cart->fetch(PDO::FETCH_BOTH)) {
        $pro_id = $row_items_in_cart['p_id'];
        $pro_size = $row_items_in_cart['p_size'];
        $pro_qty = $row_items_in_cart['qty'];

        $get_products = "SELECT * FROM products WHERE product_id='$pro_id'";
        $run_products = $db_connect->query($get_products);

        if ($run_products->rowCount() > 0) {
            while ($row_products = $run_products->fetch()) {
                $product_id = $row_products['product_id'];
                $product_title = $row_products['product_title'];
                $product_img1 = $row_products['product_img1'];
                $only_price = $row_products['product_price'];
                $sub_total = $row_products['product_price'] * $pro_qty;

                $only_price = sprintf('%.2f', $only_price);
                $sub_total = sprintf('%.2f', $sub_total);

                $total += $sub_total;
                $total = sprintf('%.2f',$total);

                $tax = $total*0.07;   #Sales Tax in Florida is 7%
                $tax = sprintf('%.2f',$tax);

                $final_total = $total + $tax;
                $final_total = sprintf('%.2f',$final_total);

                echo"
                <tbody><!--tbody start -->
                    <tr>
                        <td>Order Subtotal</td>
                        <th>$$total</th>
                    </tr>
                <tr>
                    <td>Shipping and handling</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                   <td>Tax</td>
                    <td>$$tax</td>
                </tr>
                <tr class=\"total\">
                    <td>Total</td>
                    <th>$$final_total</th>
                </tr>
                </tbody>
                ";

            }
        }
    }
}



?>