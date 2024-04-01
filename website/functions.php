<?php
function check_login($con)
{
    if(isset($_SESSION['user_id']))
    { 
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE user_id = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "i", $user_id); // Assuming user_id is an integer
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    // If the user is not logged in, redirect to the login page
    header("Location: login.php");
    exit; // Use exit instead of die for consistency
}

function random_num($length)
{
    $text = "";
    $possible = "0123456789";

    for ($i = 0; $i < $length; $i++) { 
        $text .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
    }
    return $text;
} 

// Function to retrieve user data from the database based on user ID
function get_user_data($con, $user_id) {
    $query = "SELECT * FROM users WHERE user_id = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $user_id); // Assuming user_id is an integer
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}
?>