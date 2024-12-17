<?php
$server = "localhost";
$user = "yastvanu_ushop";
$password = "Xcalibar12$";
$database = "yastvanu_sh";

$con = mysqli_connect($server, $user, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
