<?php
session_start();
include("includes/db.php");
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Function to get the user's real IP
function getRealUserIp() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $_SERVER['REMOTE_ADDR'];
}

// Function to send confirmation email
function sendConfirmationEmail($email, $name, $confirmationLink) {
    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host = 'mail.ushop.com.ng'; // Replace with your SMTP host
    $mail->SMTPAuth = true;
    $mail->Username = 'noreply@ushop.com.ng'; // Replace with your email
    $mail->Password = 'Xcalibar12$'; // Replace with your email password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom('noreply@ushop.com.ng', 'U Shop'); // Replace with your email
    $mail->addAddress($email, $name);

    $mail->isHTML(true);
    $mail->Subject = 'Confirm Your Email - U Shop';

    // Email content with inline styles
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
    <title>U-Shop</title>
    <link rel="shortcut icon" href="img/fav.JPG" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Custom fonts and styles -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/foot.css" rel="stylesheet">
	<?php include("includes/dd.php"); ?>

    <!-- Google reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script src="https://kit.fontawesome.com/79d7886b0f.js" crossorigin="anonymous"></script>
</head>
<body id="page-top">
    <!-- Header, Masthead n Navbar-->
    <?php include("includes/nav.php"); ?>
        <!-- section-->
        <section class="bg-dark py-5 bgimg" id="about">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With Us</p>
                </div>
            </div>
        </section>

    <!-- Registration Form -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Register a New Account</h2>
                    </div>
                    <div class="card-body">
                        <form action="customer_register.php" method="post" id="registrationForm" enctype="multipart/form-data">
                            <!-- Name -->
                            <div class="form-group">
                                <label>Customer Name</label>
                                <input type="text" class="form-control" name="c_name" required>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label>Customer Email</label>
                                <input type="email" class="form-control" name="c_email" required>
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label>Customer Password</label>
                                <input type="password" class="form-control" name="c_pass" id="pass" required>
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="con_pass" id="con_pass" required>
                            </div>

                            <!-- Country -->
                            <div class="form-group">
                                <label>Customer Country</label>
                                <input type="text" class="form-control" name="c_country" required>
                            </div>

                            <!-- City -->
                            <div class="form-group">
                                <label>Customer City</label>
                                <input type="text" class="form-control" name="c_city" required>
                            </div>

                            <!-- Contact -->
                            <div class="form-group">
                                <label>Customer Contact</label>
                                <input type="text" class="form-control" name="c_contact" required>
                            </div>

                            <!-- Address -->
                            <div class="form-group">
                                <label>Customer Address</label>
                                <input type="text" class="form-control" name="c_address" required>
                            </div>

                            <!-- Image -->
                            <div class="form-group">
                                <label>Customer Image</label>
                                <input type="file" class="form-control" name="c_image" required>
                            </div>

                            <!-- reCAPTCHA -->
                            <div class="form-group text-center">
                                <label>Captcha Verification</label>
                                <div class="g-recaptcha" data-sitekey="6Les-lcqAAAAAKb-jjoyW2E-jeYYeFZZLHfnaco6"></div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" name="register" class="btn btn-primary">
                                    <i class="fa fa-user-md"></i> Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>
</body>
</html>


<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $recaptcha_response = $_POST['g-recaptcha-response'];
    $secret_key = '6Les-lcqAAAAAK_gQ79whMDrCKNiH7cdhvVZhO-K';

    $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$recaptcha_response");
    $response_data = json_decode($verify);

    if ($response_data->success) {
        // Verified - process the form
        echo "Verification successful!";
    } else {
        // Not verified
        echo "Please complete the CAPTCHA.";
    }
    $c_name = mysqli_real_escape_string($con, $_POST['c_name']);
    $c_email = mysqli_real_escape_string($con, $_POST['c_email']);
    $c_pass = mysqli_real_escape_string($con, $_POST['c_pass']);
    $c_country = mysqli_real_escape_string($con, $_POST['c_country']);
    $c_city = mysqli_real_escape_string($con, $_POST['c_city']);
    $c_contact = mysqli_real_escape_string($con, $_POST['c_contact']);
    $c_address = mysqli_real_escape_string($con, $_POST['c_address']);

    if ($_POST['c_pass'] !== $_POST['con_pass']) {
        echo "<script>alert('Passwords do not match.');</script>";
        exit();
    }

    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    $c_ip = getRealUserIp();

    if (!move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image")) {
        echo "<script>alert('Image upload failed. Please try again.');</script>";
        exit();
    }

    $get_email = "SELECT * FROM customers WHERE customer_email='$c_email'";
    $run_email = mysqli_query($con, $get_email);
    if (mysqli_num_rows($run_email) > 0) {
        echo "<script>alert('This email is already registered, try another one.');</script>";
        exit();
    }

    $customer_confirm_code = md5(uniqid(rand(), true));
    $insert_customer = "INSERT INTO customers (customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image, customer_ip, customer_confirm_code) VALUES ('$c_name', '$c_email', '$c_pass', '$c_country', '$c_city', '$c_contact', '$c_address', '$c_image', '$c_ip', '$customer_confirm_code')";
    $run_customer = mysqli_query($con, $insert_customer);

    if ($run_customer) {
        $confirmationLink = "https://ushop.com.ng/verify.php?email=$c_email&code=$customer_confirm_code";
        if (sendConfirmationEmail($c_email, $c_name, $confirmationLink)) {
            echo "<script>alert('Registration successful. A confirmation email has been sent.');</script>";
            echo "<script>window.open('index.php', '_self');</script>";
        } else {
            echo "<script>alert('Registration successful, but email sending failed.');</script>";
        }
    } else {
        echo "<script>alert('Registration failed. Please try again.');</script>";
    }
}
?>