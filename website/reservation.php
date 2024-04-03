<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

$query = "SELECT id, title, author FROM books";
$result = mysqli_query($con, $query);
$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gramatu rezervacija</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .navbar {
            background-color: white;
            padding: 10px 20px;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar span {
            font-size: 24px;
        }
        .book-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .book-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
            display: flex;
            align-items: center;
        }
        .book-item:last-child {
            border-bottom: none;
        }
        .book-title {
            font-weight: bold;
            margin-right: 10px;
        }
        .book-author {
            color: #666;
        }
        .book-image {
            max-width: 100px;
            max-height: 100px;
            margin-right: 20px;
       
        }
    </style>
</head>
<body>
    <div class="navbar">
       
        <span>&#128722;</span> 
    </div>
    <div class="container">
        <h1>Grámatu rezervácija</h1>
        <ul class="book-list">
            <?php foreach ($books as $book): ?>
                <li class="book-item">
                    <img src="images (1).jpg" alt="Book Image" class="book-image"> 
                    <span class="book-title"><?php echo $book['title']; ?></span> by <span class="book-author"><?php echo $book['author']; ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
