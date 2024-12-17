<?php
include("includes/db.php");

if (isset($_GET['email']) && isset($_GET['code'])) {
    $email = mysqli_real_escape_string($con, $_GET['email']);
    $code = mysqli_real_escape_string($con, $_GET['code']);

    $query = "SELECT * FROM customers WHERE customer_email='$email' AND customer_confirm_code='$code'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $update_query = "UPDATE customers SET customer_confirm_code='' WHERE customer_email='$email'";
        if (mysqli_query($con, $update_query)) {
            echo "<script>alert('Email verified successfully!');</script>";
            echo "<script>window.open('index.php', '_self');</script>";
        } else {
            echo "<script>alert('Verification failed. Please try again later.');</script>";
        }
    } else {
        echo "<script>alert('Invalid verification link or email already verified.');</script>";
    }
} else {
    echo "<script>alert('Invalid request.');</script>";
}
?>
