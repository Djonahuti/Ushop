<?php

$db = mysqli_connect("localhost","db_user","db_password","ushop_database");

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


$sub_total = $record['p_price']*$pro_qty;

$total += $sub_total;






}

echo "$" . $total;



}



// total_price function Ends //

// getPro function Starts //

function getPro() {
    global $db;

    $get_products = "SELECT * FROM products ORDER BY 1 DESC LIMIT 0,8";
    $run_products = mysqli_query($db, $get_products);

    while ($row_products = mysqli_fetch_array($run_products)) {
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_img1 = $row_products['product_img1'];
        $pro_label = $row_products['product_label'];
        $manufacturer_id = $row_products['manufacturer_id'];

        $get_manufacturer = "SELECT * FROM manufacturers WHERE manufacturer_id='$manufacturer_id'";
        $run_manufacturer = mysqli_query($db, $get_manufacturer);
        $row_manufacturer = mysqli_fetch_array($run_manufacturer);

        $manufacturer_name = $row_manufacturer['manufacturer_title'];
        $pro_psp_price = $row_products['product_psp_price'];

        // Ensure product URLs are relative and accessible
        $pro_url = "product_details.php?product_id=" . urlencode($pro_id);

        $product_price = $pro_label === "Sale" || $pro_label === "Gift" ?
            "<del> &#8358;$pro_price </del> | &#8358;$pro_psp_price" :
            "&#8358;$pro_price";

        $product_label = $pro_label ? "
            <a class='label sale' href='#' style='color:black;'>
                <div class='thelabel'>$pro_label</div>
                <div class='label-background'></div>
            </a>
        " : "";

        echo "
        <div class='col-lg-3 col-md-4 col-sm-6 portfolio-item mb-2'>
            <div class='card h-100'>
                <div class='badge bg-dark text-white position-absolute' style='top: 0.5rem; right: 0.5rem'>$manufacturer_name</div>
                <img class='card-img-top prod-img' id='myimage' src='admin_area/product_images/$pro_img1' alt=''>
                <div class='card-body'>
                    <h4 class='card-title'> <a target='_blank' href='$pro_url' >$pro_title</a></h4>
                    <p class='card-text'>$product_label</p>
                    <h5 class='prize'>$product_price</h5>
                    <p class='card-footer justify-content-center'>
                        <form method='post'>
                            <input type='hidden' name='product_id' value='$pro_id'>
                            <center>
                            <button type='submit' name='add_wishlist' class='btn btn-default icon-btn' title='Add to Wishlist'>
                                <i class='bi bi-bag-heart-fill'></i>
                            </button>
                            <a href='$pro_url' class='btn btn-default icon-btn mx-2' title='View Details'><i class='fas fa-shopping-cart'></i></a>
                            </center>
                        </form>
                    </p>
                </div>
            </div>
        </div>";
    }
}


// getPro function Ends //


/// getProducts Function Starts ///

function getProducts(){

    /// getProducts function Code Starts ///
    
    global $db;
    
    $aWhere = array();
    
    /// Manufacturers Code Starts ///
    
    if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){
    
    foreach($_REQUEST['man'] as $sKey=>$sVal){
    
    if((int)$sVal!=0){
    
    $aWhere[] = 'manufacturer_id='.(int)$sVal;
    
    }
    
    }
    
    }
    
    /// Manufacturers Code Ends ///
    
    /// Products Categories Code Starts ///
    
    if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){
    
    foreach($_REQUEST['p_cat'] as $sKey=>$sVal){
    
    if((int)$sVal!=0){
    
    $aWhere[] = 'p_cat_id='.(int)$sVal;
    
    }
    
    }
    
    }
    
    /// Products Categories Code Ends ///
    
    /// Categories Code Starts ///
    
    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){
    
    foreach($_REQUEST['cat'] as $sKey=>$sVal){
    
    if((int)$sVal!=0){
    
    $aWhere[] = 'cat_id='.(int)$sVal;
    
    }
    
    }
    
    }
    
    /// Categories Code Ends ///
    
    $per_page=6;
    
    if(isset($_GET['page'])){
    
    $page = $_GET['page'];
    
    }else {
    
    $page=1;
    
    }
    
    $start_from = ($page-1) * $per_page ;
    
    $sLimit = " order by 1 DESC LIMIT $start_from,$per_page";
    
    $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'').$sLimit;
    
    $get_products = "select * from products  ".$sWhere;
    
    $run_products = mysqli_query($db,$get_products);
    
    while($row_products=mysqli_fetch_array($run_products)){
    
    $pro_id = $row_products['product_id'];
    
    $pro_title = $row_products['product_title'];
    
    $pro_price = $row_products['product_price'];
    
    $pro_img1 = $row_products['product_img1'];
    
    $pro_label = $row_products['product_label'];
    
    $manufacturer_id = $row_products['manufacturer_id'];
    
    $get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";
    
    $run_manufacturer = mysqli_query($db,$get_manufacturer);
    
    $row_manufacturer = mysqli_fetch_array($run_manufacturer);
    
    $manufacturer_name = $row_manufacturer['manufacturer_title'];
    
    $pro_psp_price = $row_products['product_psp_price'];
    
    // Ensure product URLs are relative and accessible
    $pro_url = "product_details.php?product_id=" . urlencode($pro_id);
    
    
    if($pro_label == "Sale" or $pro_label == "Gift"){
    
    $product_price = "<del> &#8358;$pro_price </del>";
    
    $product_psp_price = "| &#8358;$pro_psp_price";
    
    }
    else{
    
    $product_psp_price = "";
    
    $product_price = "&#8358;$pro_price";
    
    }
    
    
    if($pro_label == ""){
    
    
    }
    else{
    
    $product_label = "
    
    <a class='label sale' href='#' style='color:black;'>
    
    <div class='thelabel'>$pro_label</div>
    
    <div class='label-background'> </div>
    
    </a>
    
    ";
    
    }
    
    
    echo "
    
    
    <div class='col-lg-3 col-md-4 col-sm-6 portfolio-item mb-2'>
        <div class='card h-100'>
        <!-- Sale badge-->
        <div class='badge bg-dark text-white position-absolute' style='top: 0.5rem; right: 0.5rem'> $manufacturer_name </div>
            <a target='_blank' href='$pro_url' ><img class='card-img-top prod-img' id='myimage' src='admin_area/product_images/$pro_img1' alt=''></a>
                <div class='card-body'>
                   <h4 class='card-title'> <a target='_blank' href='$pro_url' >$pro_title</a></h4>
                   <p class='card-text'>$product_label</p>
                   <h5  class='prize'>$product_price $product_psp_price</h5>
                    <p class='card-footer justify-content-center'>
                        <form method='post'>
                            <input type='hidden' name='product_id' value='$pro_id'>
                            <center>
                            <button type='submit' name='add_wishlist' class='btn btn-default icon-btn' title='Add to Wishlist'>
                                <i class='bi bi-bag-heart-fill'></i>
                            </button>
                            <a href='$pro_url' class='btn btn-default icon-btn mx-2' title='View Details'><i class='fas fa-shopping-cart'></i></a>
                            </center>
                        </form>
                    </p>
                   </div>
                 </div>
               </div>
    
    ";
    
    }
    /// getProducts function Code Ends ///
    
    
    
    }


/// getProducts Function Ends ///


/// getPaginator Function Starts ///

function getPaginator(){

/// getPaginator Function Code Starts ///

$per_page = 6;

global $db;

$aWhere = array();

$aPath = '';

/// Manufacturers Code Starts ///

if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

foreach($_REQUEST['man'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'manufacturer_id='.(int)$sVal;

$aPath .= 'man[]='.(int)$sVal.'&';

}

}

}

/// Manufacturers Code Ends ///

/// Products Categories Code Starts ///

if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'p_cat_id='.(int)$sVal;

$aPath .= 'p_cat[]='.(int)$sVal.'&';

}

}

}

/// Products Categories Code Ends ///

/// Categories Code Starts ///

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

foreach($_REQUEST['cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'cat_id='.(int)$sVal;

$aPath .= 'cat[]='.(int)$sVal.'&';

}

}

}

/// Categories Code Ends ///

$sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'');

$query = "select * from products ".$sWhere;

$result = mysqli_query($db,$query);

$total_records = mysqli_num_rows($result);

$total_pages = ceil($total_records / $per_page);

echo "<li class='page-item'><a class='page-link' href='shop.php?page=1";

if(!empty($aPath)){ echo "&".$aPath; }

echo "' >".'First Page'."</a></li>";

for ($i=1; $i<=$total_pages; $i++){

echo "<li class='page-item'><a class='page-link' href='shop.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."' >".$i."</a></li>";

};

echo "<li class='page-item'><a class='page-link' href='shop.php?page=$total_pages";

if(!empty($aPath)){ echo "&".$aPath; }

echo "' >".'Last Page'."</a></li>";

/// getPaginator Function Code Ends ///

}

/// getPaginator Function Ends ///



?>
