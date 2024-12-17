<?php
session_start();
include("includes/db.php");
include("functions/functions.php");

// Check if the user is logged in
if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('checkout.php', '_self')</script>";
    exit();
}

$ip_add = getRealUserIp();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="shortcut icon" href="img/fav.JPG" />
    
    <!-- Bootstrap Icons-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Custom fonts and styles -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet">

    <link href="css/foot.css" rel="stylesheet">
	<?php include("includes/dd.php"); ?>

  <script src="https://kit.fontawesome.com/79d7886b0f.js" crossorigin="anonymous"></script>
</head>
<body id="page-top">

<?php
include("includes/nav.php");
?>

<?php
    // Fetch product category
$get_cartpage = "select * from cartpage";
$run_cartpage = mysqli_query($con,$get_cartpage);
$row_cartpage = mysqli_fetch_array($run_cartpage);
$cartpage_title = $row_cartpage['cartpage_title'];
$cartpage_heading = $row_cartpage['cartpage_heading'];
$cartpage_subhead = $row_cartpage['cartpage_subhead'];
$cartpage_subtext = $row_cartpage['cartpage_subtext'];
$cartpage_body = $row_cartpage['cartpage_body'];

?>
    <!-- Header, Masthead n Navbar-->
        <!-- section-->
    <section class="bg-dark py-5 bgimg" id="store">
      <div class="container px-4 px-lg-5 my-5">
          <div class="text-center text-white">
              <h1 class="display-4 fw-bolder"><?php echo $cartpage_title; ?></h1>
              <p class="lead fw-normal text-white-50 mb-0"><?php echo $cartpage_heading; ?></p>
          </div>
      </div>
    </section>
    <div class="container my-5">
        <div class="row">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="mb-4"><?php echo $cartpage_subhead; ?> <?php items(); ?> <?php echo $cartpage_subtext; ?></h3>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h5 class="fs5 text-xl-end"><?php echo $cartpage_body; ?></h5>
            </div>
        </div>

        <?php
        $select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
        $run_cart = mysqli_query($con, $select_cart);
        $count_cart = mysqli_num_rows($run_cart);

        if ($count_cart == 0) {
            echo "<div class='alert alert-warning'>Your cart is empty.</div>";
        } else {
            echo "<form action='cart.php' method='post' enctype='multipart-form-data'>
            <table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>";

            $total_price = 0;
            while ($row_cart = mysqli_fetch_array($run_cart)) {
                $p_id = $row_cart['p_id'];
                $qty = $row_cart['qty'];
                $size = $row_cart['size'];
                $p_price = $row_cart['p_price'];

                $get_product = "SELECT * FROM products WHERE product_id='$p_id'";
                $run_product = mysqli_query($con, $get_product);
                $row_product = mysqli_fetch_array($run_product);

                $pro_title = $row_product['product_title'];
                $pro_img = $row_product['product_img1'];
                $subtotal = $p_price * $qty;
                $total_price += $subtotal;

                echo "<tr>
                    <td>
                        <img src='admin_area/product_images/$pro_img' alt='$pro_title' class='img-fluid' width='50'>
                        $pro_title
                    </td>
                    <td>$qty</td>
                    <td>$size</td>
                    <td>&#8358;$p_price</td>
                    <td>&#8358;$subtotal</td>
                    <td>
                        <input type='checkbox' name='remove[]' value='$p_id'>
                    </td>
                </tr>";
            }

            echo "</tbody>
            </table>
            <div class='form-inline pull-right'>
                <div class='form-group'>
                    <label>Coupon Code : </label>
                    <input type='text' name='code' class='form-control'>
                </div>
                    <input class='btn btn-primary' type='submit' name='apply_coupon' value='Apply Coupon Code' >
                </div>";

            echo "<div class='d-flex justify-content-between align-items-center'>
                <h4>Total: &#8358;$total_price</h4>
                <a href='index.php' class='btn btn-default'>
                    <i class='fa fa-chevron-left'></i> Continue Shopping
                </a>
                <button class='btn btn-default' type='submit' name='update' value='Update Cart'>
                    <i class='fa fa-refresh'></i> Update Cart
                </button>
                <a href='checkout.php' class='btn btn-success'>Proceed to Checkout</a>
            </div>
            </form>";
        }
        ?>
    </div>

    <?php include("includes/footer.php"); ?>
    <?php

        if(isset($_POST['apply_coupon'])){

        $code = $_POST['code'];

        if($code == ""){


        }
        else{

        $get_coupons = "select * from coupons where coupon_code='$code'";

        $run_coupons = mysqli_query($con,$get_coupons);

        $check_coupons = mysqli_num_rows($run_coupons);

        if($check_coupons == 1){

        $row_coupons = mysqli_fetch_array($run_coupons);

        $coupon_pro = $row_coupons['product_id'];

        $coupon_price = $row_coupons['coupon_price'];

        $coupon_limit = $row_coupons['coupon_limit'];

        $coupon_used = $row_coupons['coupon_used'];


        if($coupon_limit == $coupon_used){

        echo "<script>alert('Your Coupon Code Has Been Expired')</script>";

        }
        else{

        $get_cart = "select * from cart where p_id='$coupon_pro' AND ip_add='$ip_add'";

        $run_cart = mysqli_query($con,$get_cart);

        $check_cart = mysqli_num_rows($run_cart);


        if($check_cart == 1){

        $add_used = "update coupons set coupon_used=coupon_used+1 where coupon_code='$code'";

        $run_used = mysqli_query($con,$add_used);

        $update_cart = "update cart set p_price='$coupon_price' where p_id='$coupon_pro' AND ip_add='$ip_add'";

        $run_update = mysqli_query($con,$update_cart);

        echo "<script>alert('Your Coupon Code Has Been Applied')</script>";

        echo "<script>window.open('cart.php','_self')</script>";

        }
        else{

        echo "<script>alert('Product Does Not Exist In Cart')</script>";

        }

        }

        }
        else{

        echo "<script> alert('Your Coupon Code Is Not Valid') </script>";

        }

        }


        }


    ?>
    <?php

        function update_cart(){

        global $con;

        if(isset($_POST['update'])){

        foreach($_POST['remove'] as $remove_id){


        $delete_product = "delete from cart where p_id='$remove_id'";

        $run_delete = mysqli_query($con,$delete_product);

        if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
        }



        }




        }



        }

        echo @$up_cart = update_cart();



    ?>

</body>
</html>
