<?php
// Start the session
session_start();

// Include the Google Client Library
require_once 'vendor/autoload.php';
require_once 'db_connection.php'; // Include your database connection script

// Ensure no output before header()
ob_start();

// Initialize the Google Client
$client = new Google_Client();
$client->setClientId('ClientId');
$client->setClientSecret('ClientSecret');
$client->setRedirectUri('https://website.com/google-callback.php');
$client->addScope('email');
$client->addScope('profile');

// Check if the authorization code is set
if (isset($_GET['code'])) {
    try {
        // Exchange the authorization code for an access token
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

        if (isset($token['error'])) {
            throw new Exception("Error fetching access token: " . $token['error']);
        }

        // Set the access token
        $client->setAccessToken($token);

        // Get user profile information
        $oauth2 = new Google_Service_Oauth2($client);
        $userInfo = $oauth2->userinfo->get();

        // Extract user details
        $customer_email = mysqli_real_escape_string($con, $userInfo->email);
        $customer_name = mysqli_real_escape_string($con, $userInfo->name);

        // Check if the user already exists in the database
        $query = "SELECT * FROM customers WHERE customer_email = '$customer_email'";
        $result = mysqli_query($con, $query);

        if (!$result) {
            throw new Exception("Database query failed: " . mysqli_error($con));
        }

        if (mysqli_num_rows($result) == 0) {
            // If the user doesn't exist, insert them into the database
            $insert_query = "INSERT INTO customers (customer_name, customer_email, provider, provider_id) VALUES ('$customer_name', '$customer_email', 'google', '{$userInfo->id}')";
            if (!mysqli_query($con, $insert_query)) {
                throw new Exception("Failed to insert user: " . mysqli_error($con));
            }
        }

        // Set session variables
        $_SESSION['customer_email'] = $customer_email;
        $_SESSION['customer_name'] = $customer_name;


        // Redirect to the index page
        header("Location: index.php");
        exit();
        
        echo "Redirecting to index.php..."; 
        exit(); // This will help you see if the script reaches the redirect statement

    } catch (Exception $e) {
        // Handle exceptions
        echo "Error: " . $e->getMessage();
        exit();
    }
} else {
    // If no authorization code is provided
    echo "Error: No authorization code provided.";
    exit();
}

// End output buffering and send headers
ob_end_flush();
?>
