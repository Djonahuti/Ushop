<?php

$db = mysqli_connect("localhost","yastvanu_ushop","Xcalibar12$","yastvanu_sh");

/// IP address code starts /////
function getRealUserIp(){
    switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
 }
 /// IP address code Ends /////
 /// Check if customer is logged in /////
 function isLoggedIn() {
     return isset($_SESSION['customer_email']);
 }

// items function Starts ///

function items(){

global $db;

$ip_add = getRealUserIp();

$get_items = "select * from cart where ip_add='$ip_add'";

$run_items = mysqli_query($db,$get_items);

$count_items = mysqli_num_rows($run_items);

echo $count_items;

}

// items function Ends ///
// Wishlist Count ///
function wishlistCount() {
    global $db;
    if (!isLoggedIn()) {
        echo 0;
        return;
    }
    $customer_email = $_SESSION['customer_email'];
    $query = "SELECT COUNT(*) AS count FROM wishlist WHERE customer_id = (SELECT customer_id FROM customers WHERE customer_email = '$customer_email')";
    $run_query = mysqli_query($db, $query);
    $result = mysqli_fetch_array($run_query);
    echo $result['count'];
}

// total_price function Starts //

function total_price(){

global $db;

$ip_add = getRealUserIp();

$total = 0;

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($db,$select_cart);

while($record=mysqli_fetch_array($run_cart)){

$pro_id = $record['p_id'];

$pro_qty = $record['qty'];

$get_price = "select * from products where product_id='$pro_id'";

$run_price = mysqli_query($db,$get_price);

while($row_price=mysqli_fetch_array($run_price)){


$sub_total = $row_price['product_price']*$pro_qty;

$total += $sub_total;



}





}

echo "$" . $total;


}



// total_price function Ends //


function getPro(){

global $db;

$get_products = "select * from products order by 1 DESC LIMIT 0,8";

$run_products = mysqli_query($db,$get_products);

while($row_products=mysqli_fetch_array($run_products)){

$pro_id = $row_products['product_id'];

$pro_title = $row_products['product_title'];

$pro_price = $row_products['product_price'];

$pro_img1 = $row_products['product_img1'];

echo "

<div class='col-md-4 col-sm-6 single' >

<div class='product' >

<a href='details.php?pro_id=$pro_id' >

<img src='admin_area/product_images/$pro_img1' class='img-responsive' >

</a>

<div class='text' >

<h3><a href='details.php?pro_id=$pro_id' >$pro_title</a></h3>

<p class='price' >$ $pro_price</p>

<p class='buttons' >

<a href='details.php?pro_id=$pro_id' class='btn btn-default' >View details</a>

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


?>