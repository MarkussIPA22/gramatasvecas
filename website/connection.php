<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$login_dbname = "login_db";
$books_dbname = "books_db";

// Connection to login_db
$con_login = mysqli_connect($dbhost, $dbuser, $dbpass, $login_dbname);
if (!$con_login) {
    die("Connection failed: " . mysqli_connect_error());
}

// Connection to books_db
$con_books = mysqli_connect($dbhost, $dbuser, $dbpass, $books_dbname);
if (!$con_books) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
