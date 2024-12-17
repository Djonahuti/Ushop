<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

include 'db_config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Initialize the response array
$response = ["status" => "", "message" => ""];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $name = $con->real_escape_string(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $subject = $con->real_escape_string(trim($_POST['subject']));
    $message = $con->real_escape_string(trim($_POST['message']));

    if (!$email) {
        $response["status"] = "error";
        $response["message"] = "Invalid email address.";
        echo json_encode($response);
        exit;
    }

    // Prepare SQL statement
    $sql = "INSERT INTO contacts (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    if ($con->query($sql) === TRUE) {
        $mail = new PHPMailer(true);
        try {
            // SMTP settings
            $mail->isSMTP();
            $mail->Host = 'mail.website.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'noreply@website.com';
            $mail->Password = 'db_password';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Send auto-reply to the user
            $mail->setFrom('noreply@website.com', 'U Shop');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Thank you for contacting us!';
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
                padding: 20px 0;
            }
            .header h1 {
                margin: 0;
                font-size: 22px;
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
                <h1>Dear $name,</h1>
                <small>You are a valued Customer!</small>
            </div>
            <div class='content'>
                <h2>Hi $name,</h2>
                <p>Thank you for contacting U Shop, your email means a lot to us.</p>
                <p>This is a system-generated reply sent on receipt of your email.</p>
                <p>Our goal is to respond to your email within 24hrs; But given the unusual high volume of emails we have received; it might take us longer than usual to respond.<br/>
                Nevertheless, be assured that we will reply as soon as we can.</p>
                <p>Please feel free to reach out if you have any further inquiries or need assistance.</p>
                <p>Warm regards,<br/>U Shop</p>
            </div>
            <div class='content'>
                <h2>Explore U Shop</h2>
                <a href='https://website.com' target='_blank'>
                    <img src='https://website.com/img/ushop.PNG' alt='Homepage Preview' style='width:100%; border-radius: 8px;'>
                </a>
                <p style='text-align: center; margin-top: 10px;'>Discover the latest deals and products!</p>
            </div>
            <div>
                <p><strong>DISCLAIMER:</strong> This email and any attachments are confidential and are intended solely for the addressee. If you are not the addressee tell the sender immediately and destroy it. Do not open, read, copy, disclose, use or store it in any way, or permit others to do so. Emails are not secure and may suffer errors, viruses, delay, interception, and amendment. U Shop and its subsidiaries do not accept liability for damage caused by this email and may monitor email traffic.</p>
            </div>
            <div class='footer'>
                <p>&copy; 2024 U Shop. All rights reserved.</p>
                <p><a href='https://website.com'>Visit Our Homepage</a></p>
            </div>
        </div>
    </body>
    </html>
    ";
            $mail->send();

            // Send a copy to the administrator
            $mail->clearAddresses();
            $mail->addAddress('noreply@website.com');
            $mail->isHTML(true);
            $mail->Subject = 'New Contact Form Submission';
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
                                padding: 20px 0;
                            }
                            .header h1 {
                                margin: 0;
                                font-size: 22px;
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
                                <h1>New contact form submission:</h1>
                            </div>
                            <div class='content'>
                                <h2>Contact Details</h2>
                                <p><strong>Name:</strong> $name,</p>
                                <p><strong>Email:</strong> $email,</p>
                                <p><strong>Subject:</strong> $subject,</p>
                                <p><strong>Message:</strong> $message,</p>
                            </div>
                            <div class='footer'>
                                <p>&copy; 2024 U Shop. All rights reserved.</p>
                                <p><a href='https://website.com'>Visit Our Homepage</a></p>
                            </div>
                        </div>
                    </body>
                    </html>
    ";
            $mail->send();

            $response["status"] = "success";
            $response["message"] = "Thank you for your message. An auto-reply has been sent to your email.";
        } catch (Exception $e) {
            $response["status"] = "error";
            $response["message"] = "Message saved, but auto-reply failed to send. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        $response["status"] = "error";
        $response["message"] = "Database error: " . $con->error;
    }
    $con->close();
    echo json_encode($response);
    exit;
}
