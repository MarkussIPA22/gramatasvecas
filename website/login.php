<?php
session_start();

include("connection.php");
include("functions.php");

// Ensure the connection to the database is established
$con = mysqli_connect("localhost", "root", "", "login_db");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        // Prepare SQL statement with parameterized query
        $query = "SELECT * FROM users WHERE user_name = ? LIMIT 1";
        $stmt = mysqli_prepare($con, $query);

        // Bind username as parameter
        mysqli_stmt_bind_param($stmt, "s", $user_name);

        // Execute prepared statement
        mysqli_stmt_execute($stmt);

        // Get result
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            // Verify password using password_verify function
            if (password_verify($password, $user_data['password'])) {
                // Set user ID in session
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: index.php");
                die;
            } else {
                echo "Incorrect password";
            }
        } else {
            echo "User not found";
        }
    } else {
        echo "Please enter valid information";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<div id="box">
    <form method="post"> 
        <div style="font-size: 20px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; width: 300px; ">Login</div>

        <input id="text" type="text" name="user_name"><br><br>
        <input id="text" type="password" name="password"><br><br>

        <input id="button" type="submit" name="Login">

        <a href="signup.php">Click to Signup </a>
    </form>
</div>

</body>
</html>
