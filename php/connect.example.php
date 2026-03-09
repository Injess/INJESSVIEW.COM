<?php
// Copy this file to php/connect.php and fill in your server credentials
$port     = 'localhost';
$username = 'YOUR_DB_USERNAME';
$password = 'YOUR_DB_PASSWORD';
$database = 'YOUR_DB_NAME';

$conn = mysqli_connect($port, $username, $password, $database);
if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
}
?>
