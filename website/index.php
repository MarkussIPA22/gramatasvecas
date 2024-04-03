<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

// Fetch user data using the user ID from session
$user_data = get_user_data($con, $_SESSION['user_id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <style>
        
       .x-navbar {
    border: none;
    box-shadow: none;
    transition: background 0.7s ease-out;
    background: rgba(255, 255, 255, 0); /* Change the background color to transparent */
    position: absolute;
    z-index: 1030;
    top: 0;
    left: 0;
    right: 0;
}

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: rgb(225, 225, 225, 0);
            color: white;
        }

        .content {
            padding: 16px;
        }

        body {
   
  
    background-image: url(compute-ea4c57a4.png);
    background-size: cover; /* Ensures the image covers the entire body */
    background-repeat: no-repeat;
}



    </style>
</head>
<body>
    <div class="navbar">
        <a href="reservation.php">Reservation</a>
        <a href="logout.php">Logout</a>
    </div>

  
</body>
</html>