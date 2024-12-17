<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>
<?php
if (isset($_POST['add_wishlist'])) {
    if (!isset($_SESSION['customer_email'])) {
        echo "<script>alert('You must be logged in to add items to the wishlist!');</script>";
        echo "<script>window.open('checkout.php', '_self');</script>";
        exit();
    }
    $customer_email = $_SESSION['customer_email'];
    $get_customer = "SELECT * FROM customers WHERE customer_email='$customer_email'";
    $run_customer = mysqli_query($db, $get_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $customer_id = $row_customer['customer_id'];
    $product_id = $_POST['product_id']; // Get the product ID from the form

    // Check if the product is already in the wishlist
    $check_wishlist = "SELECT * FROM wishlist WHERE customer_id='$customer_id' AND product_id='$product_id'";
    $run_check = mysqli_query($db, $check_wishlist);
    if (mysqli_num_rows($run_check) > 0) {
        echo "<script>alert('This product is already in your wishlist!');</script>";
    } else {
        $query = "INSERT INTO wishlist (customer_id, product_id) VALUES ('$customer_id', '$product_id')";
        mysqli_query($db, $query);
        echo "<script>alert('Product added to wishlist!');</script>";
    }
}
?>

  <!-- Cover -->
    <!-- Main -->
        <!-- section-->
  <section class="bg-dark py-5 bgimg" id="store">
      <div class="container px-4 px-lg-5 my-5">
          <div class="text-center text-white">
              <h1 class="display-4 fw-bolder">Shop in style</h1>
              <p class="lead fw-normal text-white-50 mb-0">With Us</p>
          </div>
      </div>
  </section>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

    <?php

    getPro();

    ?>

    </div><!-- row Ends -->

    </div><!-- container Ends -->
</section><?php

include("includes/footer.php");

?>