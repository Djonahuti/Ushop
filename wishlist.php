<?php
session_start();
include("includes/db.php");
include("functions/functions.php");

if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('checkout.php', '_self');</script>";
    exit();
}

$customer_email = $_SESSION['customer_email'];
$get_customer = "SELECT * FROM customers WHERE customer_email='$customer_email'";
$run_customer = mysqli_query($con, $get_customer);
$row_customer = mysqli_fetch_array($run_customer);
$customer_id = $row_customer['customer_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
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
$get_wishlistpage = "select * from wishlistpage";
$run_wishlistpage = mysqli_query($con,$get_wishlistpage);
$row_wishlistpage = mysqli_fetch_array($run_wishlistpage);
$wishlistpage_title = $row_wishlistpage['wishlistpage_title'];
$wishlistpage_heading = $row_wishlistpage['wishlistpage_heading'];
$wishlistpage_subhead = $row_wishlistpage['wishlistpage_subhead'];
$wishlistpage_subtext = $row_wishlistpage['wishlistpage_subtext'];
$wishlistpage_body = $row_wishlistpage['wishlistpage_body'];

?>
    <!-- Header, Masthead n Navbar-->
        <!-- section-->
    <section class="bg-dark py-5 bgimg" id="store">
      <div class="container px-4 px-lg-5 my-5">
          <div class="text-center text-white">
              <h1 class="display-4 fw-bolder"><?php echo $wishlistpage_title; ?></h1>
              <p class="lead fw-normal text-white-50 mb-0"><?php echo $wishlistpage_heading; ?></p>
          </div>
      </div>
    </section>
    <div class="container my-5">
        <div class="row">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="mb-4"><?php echo $wishlistpage_subhead; ?> <?php wishlistCount(); ?> <?php echo $wishlistpage_subtext; ?></h3>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h5 class="fs5 text-xl-end"><?php echo $wishlistpage_body; ?></h5>
            </div>
        </div>
        <?php
        $get_wishlist = "SELECT * FROM wishlist WHERE customer_id='$customer_id'";
        $run_wishlist = mysqli_query($con, $get_wishlist);

        if (mysqli_num_rows($run_wishlist) == 0) {
            echo "<div class='alert alert-warning'>Your wishlist is empty.</div>";
        } else {
            echo "<div class='row'>";
            while ($row_wishlist = mysqli_fetch_array($run_wishlist)) {
                $product_id = $row_wishlist['product_id'];

                $get_product = "SELECT * FROM products WHERE product_id='$product_id'";
                $run_product = mysqli_query($con, $get_product);

                // Ensure product data exists before accessing properties
                if ($row_product = mysqli_fetch_array($run_product)) {
                    $pro_title = $row_product['product_title'];
                    $pro_price = $row_product['product_price'];
                    $pro_img = $row_product['product_img1'];

                    echo "<div class='col-md-4 mb-3'>
                        <div class='card'>
                            <img src='admin_area/product_images/$pro_img' alt='$pro_title' class='card-img-top'>
                            <div class='card-body'>
                                <h5 class='card-title'>$pro_title</h5>
                                <p class='card-text'>&#8358;$pro_price</p>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-primary'>View Product</a>
                            </div>
                        </div>
                    </div>";
                }
            }
            echo "</div>";
        }
        ?>
    </div>

    <?php include("includes/footer.php"); ?>
</body>
</html>
