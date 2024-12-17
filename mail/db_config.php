<?php
$server = "localhost";
$user = "db_user";
$password = "db_password";
$database = "ushop_database";

$con = mysqli_connect($server, $user, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
