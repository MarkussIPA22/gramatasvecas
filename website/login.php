<?php
session_start();

include("connection.php");
include("functions.php");


$con = mysqli_connect("localhost", "root", "", "login_db");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        $query = "SELECT * FROM users WHERE user_name = ? LIMIT 1";
        $stmt = mysqli_prepare($con, $query);

        mysqli_stmt_bind_param($stmt, "s", $user_name);

       
        mysqli_stmt_execute($stmt);

      
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
           
            if (password_verify($password, $user_data['password'])) {
                
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: index.php");
                die;
            } else {
                echo "Nepareiza parole";
            }
        } else {
            echo "Lietotajs nav atrasts";
        }
    } else {
        echo "Ludzu ievadiet derigu informaciju";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            border-radius: 5px;
            padding: 20px;
        }

        #button {
            color: red;
            background-color: white;
            border: 1px solid red;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        #button:hover {
            background-color: transparent;
        }
    </style>
</head>
<body>
    <div id="box">
        <form method="post"> 
            <div style="font-size: 20px; padding: 20px;">Login</div>

            <input id="text" type="text" name="user_name" style="margin-bottom: 10px;"><br>
            <input id="text" type="password" name="password" style="margin-bottom: 10px;"><br>

            <input id="button" type="submit" name="Login" value="Login" style="margin-bottom: 10px;">

            <a href="signup.php" style="color: white;">Spiezat lai registretos </a>
        </form>
    </div>
</body>
</html>
