<?php
session_start();

include("connection.php");
include("functions.php");

// Veidojam savienojumu ar datubāzi
$con = mysqli_connect("localhost", "root", "", "login_db");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        $user_id = random_num(20);
        // Hash the password before storing it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (user_id,user_name,password) VALUES ('$user_id','$user_name','$hashed_password')";

        // Veicam datu pieprasījumu, izmantojot savienojuma objektu
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
    <title>Signup</title>
    <style>
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
            color: blue;
            font-size: 18px;
            font-family: Arial, sans-serif;
        }

        .box {
            width: 200px;
            height: 200px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
        }
    </style>
</head>
<body>
<div id="box">
    <form method="post">
        <div style="font-size: 20px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; width: 300px; ">Signup</div>

        <input id="text" type="text" name="user_name"><br><br>
        <input id="text" type="password" name="password"><br><br>

        <input class="button" type="submit" name="signup">

        <a href="login.php">Click to Login </a>
    </form>
</div>
