<?php
require_once 'vendor/autoload.php';

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Initialize Google Client
$client = new Google_Client();
$client->setClientId('ClientID');
$client->setClientSecret('ClientSecret');
$client->setRedirectUri('https://ushop.com.ng/google-callback.php'); // Replace with the actual redirect URI
$client->addScope('email');
$client->addScope('profile');

// Handle OAuth 2.0 Flow
if (isset($_GET['code'])) {
    try {
        // Exchange authorization code for access token
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token);

        // Get the user's profile information
        $oauth2 = new Google_Service_Oauth2($client);
        $userInfo = $oauth2->userinfo->get();

        // Display user info or store it in the database
        echo "<h1>Welcome, " . htmlspecialchars($userInfo->name) . "!</h1>";
        echo "<p>Email: " . htmlspecialchars($userInfo->email) . "</p>";
        echo "<img src='" . htmlspecialchars($userInfo->picture) . "' alt='Profile Picture'>";

        // Optional: Save user info in a session or database
        session_start();
        $_SESSION['user'] = $userInfo;

    } catch (Exception $e) {
        echo "Error during authentication: " . $e->getMessage();
    }
} else {
    // Generate authentication URL
    $authUrl = $client->createAuthUrl();

    // Display login button
    echo "<a href='" . htmlspecialchars($authUrl) . "'>Login with Google</a>";
}
?>
