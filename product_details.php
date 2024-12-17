<?php

session_start();

include("includes/db.php");
include("functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
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
include("includes/dmain.php");
?>

<div class="container my-5">
    <?php
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];

        // Fetch product details
        $get_product = "SELECT * FROM products WHERE product_id='$product_id'";
        $run_product = mysqli_query($con, $get_product);

        if ($row_product = mysqli_fetch_array($run_product)) {
            $pro_title = $row_product['product_title'];
            $pro_price = $row_product['product_price'];
            $pro_psp_price = $row_product['product_psp_price'];
            $pro_img1 = $row_product['product_img1'];
            $pro_img2 = $row_product['product_img2'];
            $pro_img3 = $row_product['product_img3'];
            $pro_desc = $row_product['product_desc'];
            $pro_label = $row_product['product_label'];
            $pro_features = $row_product['product_features'];
            $pro_video = $row_product['product_video'];
            $p_cat_id = $row_product['p_cat_id'];

            // Fetch product category
            $get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id='$p_cat_id'";
            $run_p_cat = mysqli_query($con, $get_p_cat);
            $row_p_cat = mysqli_fetch_array($run_p_cat);
            $p_cat_title = $row_p_cat['p_cat_title'];

            $price_display = $pro_psp_price ?
                "<del> &#8358;$pro_price </del> &#8358;$pro_psp_price" :
                "&#8358;$pro_price";

            echo "
            <div class='row'>
                <div class='col-md-6'>
                    <!-- Carousel for product images -->
                    <div id='productCarousel' class='carousel slide' data-bs-ride='carousel'>
                        <div class='carousel-inner'>
                            <div class='carousel-item active'>
                                <img src='admin_area/product_images/$pro_img1' class='d-block w-100' alt='$pro_title'>
                            </div>";
                            if ($pro_img2) {
                                echo "<div class='carousel-item'>
                                    <img src='admin_area/product_images/$pro_img2' class='d-block w-100' alt='$pro_title'>
                                </div>";
                            }
                            if ($pro_img3) {
                                echo "<div class='carousel-item'>
                                    <img src='admin_area/product_images/$pro_img3' class='d-block w-100' alt='$pro_title'>
                                </div>";
                            }
            echo "      </div>
                        <button class='carousel-control-prev' type='button' data-bs-target='#productCarousel' data-bs-slide='prev'>
                            <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                            <span class='visually-hidden'>Previous</span>
                        </button>
                        <button class='carousel-control-next' type='button' data-bs-target='#productCarousel' data-bs-slide='next'>
                            <span class='carousel-control-next-icon' aria-hidden='true'></span>
                            <span class='visually-hidden'>Next</span>
                        </button>
                    </div>
                </div>
                <div class='col-md-6'>
                    <h1 class='fw-bold'>$pro_title</h1>
                    <h3 class='text-danger'>$price_display</h3>
                    <h5>Category: <span class='text-primary'>$p_cat_title</span></h5>";

            if ($pro_label) {
                echo "<span class='badge bg-success'>$pro_label</span>";
            }

            echo "
                    <p class='mt-4'>$pro_desc</p>
                    <h5>Features:</h5>
                    <ul>";
            foreach (explode("\n", $pro_features) as $feature) {
                echo "<li>$feature</li>";
            }
            echo "
                    </ul>";

            if ($pro_video) {
                echo "
                    <h5 class='mt-4'>Product Video:</h5>
                    <div class='ratio ratio-16x9'>
                        <iframe src='$pro_video' frameborder='0' allowfullscreen></iframe>
                    </div>";
            }

            // Add to Cart Form
            echo "
                    <form method='post' class='mt-4'>
                        <input type='hidden' name='product_id' value='$product_id'>
                        <div class='form-group'>
                            <label for='product_qty'>Quantity:</label>
                            <input type='number' name='product_qty' id='product_qty' class='form-control' min='1' value='1' required>
                        </div>
                        <div class='form-group'>
                            <label for='product_size'>Size:</label>
                            <select name='product_size' id='product_size' class='form-control' required>
                                <option value='Small'>Small</option>
                                <option value='Medium'>Medium</option>
                                <option value='Large'>Large</option>
                                <option value='XL'>Extra Large</option>
                            </select>
                        </div>
                        <div class='form-group'>
                            <label for='bundle_qty'>Bundle Quantity (Optional):</label>
                            <input type='number' name='bundle_qty' id='bundle_qty' class='form-control' min='0' value='0'>
                        </div>
                        <div class='form-group'>
                            <label for='bundle_size'>Bundle Size (Optional):</label>
                            <select name='bundle_size' id='bundle_size' class='form-control'>
                                <option value='Small'>Small</option>
                                <option value='Medium'>Medium</option>
                                <option value='Large'>Large</option>
                                <option value='XL'>Extra Large</option>
                            </select>
                        </div>
                        <button type='submit' name='add_cart' class='btn btn-primary mt-3'>Add to Cart</button>
                        <button type='submit' name='add_wishlist' class='btn btn-secondary mt-3'>Add to Wishlist</button>
                    </form>
                </div>
            </div>";
        } else {
            echo "<h2 class='text-danger'>Product not found!</h2>";
        }

        // Fetch related products
        echo "<hr><h3 class='my-4'>Related Products</h3>";
        echo "<div class='row'>";

        $get_related = "SELECT * FROM products WHERE p_cat_id='$p_cat_id' AND product_id != '$product_id' ORDER BY RAND() LIMIT 3";
        $run_related = mysqli_query($con, $get_related);

        while ($row_related = mysqli_fetch_array($run_related)) {
            $related_id = $row_related['product_id'];
            $related_title = $row_related['product_title'];
            $related_price = $row_related['product_price'];
            $related_psp_price = $row_related['product_psp_price'];
            $related_img = $row_related['product_img1'];

            $related_price_display = $related_psp_price ?
                "<del> &#8358;$related_price </del> &#8358;$related_psp_price" :
                "&#8358;$related_price";

            echo "
            <div class='col-lg-4 col-md-6 mb-4'>
                <div class='card'>
                    <img src='admin_area/product_images/$related_img' class='card-img-top' alt='$related_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$related_title</h5>
                        <p class='card-text'>$related_price_display</p>
                        <a href='product_details.php?product_id=$related_id' class='btn btn-outline-primary'>View Details</a>
                    </div>
                </div>
            </div>";
        }

        echo "</div>";
    } else {
        echo "<h2 class='text-warning'>No product ID provided!</h2>";
    }
    ?>
</div>

<?php
include("includes/footer.php");

// Handle Add to Cart
if (isset($_POST['add_cart'])) {
    if (!isLoggedIn()) {
        echo "<script>alert('You must be logged in to add items to the cart!');</script>";
        echo "<script>window.open('checkout.php', '_self');</script>";
        exit;
    }
    $ip_add = getRealUserIp();
    $product_qty = $_POST['product_qty'];
    $product_size = $_POST['product_size'];

    $check_product = "SELECT * FROM cart WHERE ip_add='$ip_add' AND p_id='$product_id'";
    $run_check = mysqli_query($con, $check_product);

    if (mysqli_num_rows($run_check) > 0) {
        echo "<script>alert('This Product is already added in cart');</script>";
    } else {
        $product_price = $pro_psp_price ?: $pro_price;
        $query = "INSERT INTO cart (p_id, ip_add, qty, p_price, size)
                  VALUES ('$product_id', '$ip_add', '$product_qty', '$product_price', '$product_size')";
        mysqli_query($con, $query);
        echo "<script>alert('Product added to cart!');</script>";
    }
}

// Handle Add to Wishlist
if (isset($_POST['add_wishlist'])) {
    if (!isset($_SESSION['customer_email'])) {
        echo "<script>alert('You must be logged in to add items to the wishlist!');</script>";
        echo "<script>window.open('checkout.php', '_self');</script>";
        exit();
    }

    $customer_email = $_SESSION['customer_email'];
    $get_customer = "SELECT * FROM customers WHERE customer_email='$customer_email'";
    $run_customer = mysqli_query($con, $get_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $customer_id = $row_customer['customer_id'];

    $product_id = $_POST['product_id']; // Get the product ID from the hidden input field

    // Check if the product is already in the wishlist
    $check_wishlist = "SELECT * FROM wishlist WHERE customer_id='$customer_id' AND product_id='$product_id'";
    $run_check = mysqli_query($con, $check_wishlist);

    if (mysqli_num_rows($run_check) > 0) {
        echo "<script>alert('This product is already in your wishlist!');</script>";
    } else {
        $query = "INSERT INTO wishlist (customer_id, product_id) VALUES ('$customer_id', '$product_id')";
        mysqli_query($con, $query);
        echo "<script>alert('Product added to wishlist!');</script>";
    }
}
