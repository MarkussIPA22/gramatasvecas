<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_db"; // Changed to login_db

// Create connection
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
