<?php
session_start();
if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('../checkout.php','_self')</script>";
    exit();
}

include("includes/db.php");
include("functions/functions.php");
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

// Function to send email using PHPMailer
function sendConfirmationEmail($email, $name, $confirmationLink) {
    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host = 'mail.ushop.com.ng'; // Replace with your SMTP host
    $mail->SMTPAuth = true;
    $mail->Username = 'noreply@ushop.com.ng'; // Replace with your email
    $mail->Password = 'Xcalibar12$'; // Replace with your email password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom('noreply@ushop.com.ng', 'U-Shop'); // Replace with your email
    $mail->addAddress($email, $name);

    $mail->isHTML(true);
    $mail->Subject = 'Confirm Your Email - U Shop';
    $mail->Body = "
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }
            .email-container {
                max-width: 600px;
                margin: auto;
                background-color: #ffffff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }
            .header {
                text-align: center;
                background-color: #f4623a;
                color: white;
                padding: 20px 0;
            }
            .header h1 {
                margin: 0;
                font-size: 24px;
            }
            .content {
                padding: 20px;
            }
            .content h2 {
                color: #f4623a;
                margin-top: 0;
            }
            .cta {
                display: inline-block;
                padding: 10px 20px;
                color: #ffffff;
                background-color: #f4623a;
                text-decoration: none;
                border-radius: 4px;
                margin-top: 20px;
            }
            .cta:hover {
                background-color: #f05f42;
            }
            .footer {
                text-align: center;
                padding: 20px;
                font-size: 14px;
                color: #777777;
            }
            .footer a {
                color: #f4623a;
                text-decoration: none;
            }
            .footer a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class='email-container'>
            <div class='header'>
                <h1>Welcome to U Shop!</h1>
            </div>
            <div class='content'>
                <h2>Hi $name,</h2>
                <p>Thank you for registering with us! We're thrilled to have you on board. Please confirm your email address to complete your registration.</p>
                <p><a href='$confirmationLink' class='cta'>Confirm Email</a></p>
                <p>If you didn't register, please ignore this email.</p>
            </div>
            <div class='content'>
                <h2>Explore U Shop</h2>
                <a href='https://ushop.com.ng' target='_blank'>
                    <img src='https://ushop.com.ng/img/ushop.PNG' alt='Homepage Preview' style='width:100%; border-radius: 8px;'>
                </a>
                <p style='text-align: center; margin-top: 10px;'>Discover the latest deals and products!</p>
            </div>
            <div class='footer'>
                <p>&copy; 2024 U Shop. All rights reserved.</p>
                <p><a href='https://ushop.com.ng'>Visit Our Homepage</a></p>
            </div>
        </div>
    </body>
    </html>
    ";

    return $mail->send();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>U Shop</title>
    <link rel="shortcut icon" href="img/fav.JPG" />
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/foot.css" rel="stylesheet">
    <?php include("includes/dd.php"); ?>
</head>
<body id="page-top">
    <?php include("includes/nav.php"); ?>
    <section class="bg-dark py-5 bgimg" id="about">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">With Us</p>
            </div>
        </div>
    </section>
    <section class="py-2">
        <div class="container px-4 px-lg-5">
            <?php
            $c_email = $_SESSION['customer_email'];
            $get_customer = "SELECT * FROM customers WHERE customer_email='$c_email'";
            $run_customer = mysqli_query($con, $get_customer);
            $row_customer = mysqli_fetch_array($run_customer);
            $customer_confirm_code = $row_customer['customer_confirm_code'];
            $c_name = $row_customer['customer_name'];

            if (!empty($customer_confirm_code)) {
                echo '
                <div class="alert alert-danger text-center">
                    <strong>Warning!</strong> Please confirm your email. If you have not received your confirmation email, 
                    <a href="my_account.php?send_email" class="alert-link">Send Email Again</a>.
                </div>';
            }

            if (isset($_GET['send_email'])) {
                $confirmation_link = "https://ushop.com.ng/verify.php?email=$c_email&code=$customer_confirm_code";

                if (sendConfirmationEmail($c_email, $c_name, $confirmation_link)) {
                    echo "<script>alert('Your confirmation email has been sent. Check your inbox.');</script>";
                    echo "<script>window.open('my_account.php', '_self');</script>";
                } else {
                    echo "<script>alert('Failed to send confirmation email. Please try again later.');</script>";
                }
            }
            ?>
            <div class="row gx-4 gx-lg-5">
                <div class="col-6 cols-xl-4 justify-content-center"><?php include("includes/sidebar.php"); ?></div>
                <div class="col-6 cols-xl-8 justify-content-center">
                    <?php
                    if (isset($_GET['my_orders'])) {
                        include("my_orders.php");
                    }
                    if (isset($_GET['pay_offline'])) {
                        include("pay_offline.php");
                    }
                    if (isset($_GET['edit_account'])) {
                        include("edit_account.php");
                    }
                    if (isset($_GET['change_pass'])) {
                        include("change_pass.php");
                    }
                    if (isset($_GET['delete_account'])) {
                        include("delete_account.php");
                    }
                    if (isset($_GET['my_wishlist'])) {
                        include("my_wishlist.php");
                    }
                    if (isset($_GET['delete_wishlist'])) {
                        include("delete_wishlist.php");
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php include("includes/footer.php"); ?>
</body>
</html>

