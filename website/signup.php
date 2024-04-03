<?php
session_start();

include("connection.php");
include("functions.php");

$con = mysqli_connect("localhost", "root", "", "login_db");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        $user_id = random_num(20);
        // Hash the password before storing it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (user_id,user_name,password) VALUES ('$user_id','$user_name','$hashed_password')";

        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    } else {
        echo "Please enter some valid information";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreties</title>
    <style>
        body {
            color: #ccc;
            background-image: url(compute-ea4c57a4.png);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #box {
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
        }

        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 10px;
        }

        .button:hover {
            background-color: blue;
        }

        .text {
            color: black;
            font-size: 18px;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
<div id="box">
    <form method="post">
        <div style="font-size: 20px; padding: 20px;">Registreties</div>

        <input class="text" type="text" name="user_name" placeholder="Username" style="margin-bottom: 10px;"><br>
        <input class="text" type="password" name="password" placeholder="Password" style="margin-bottom: 10px;"><br>

        <input class="button" type="submit" name="signup" value="Signup" style="margin-bottom: 10px;">

        <a href="login.php" style="color: white;">Click to Login </a>
    </form>
</div>
</body>
</html>
