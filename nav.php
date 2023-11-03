<?php 

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-11-02
    Description: Final Project - Bricks CMS.

****************/
require 'connect.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/icon" href="images/favicon-32x32.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <nav>
    <ul id="menu">
        <li><a href="index.php">Home</a></li> 
        <li><a href="about.php">About Us</a></li>
        <li><a href="list.php">Blogs</a></li>
        <li><a href="insert.php">New Post</a></li>
        <li><a href="contact.php">Contact Us</a></li> 
        <li><a href="login.php">Login</a></li> 
        <div>
            <form action="searchResult.php" method="post">
                <li><input type="text" placeholder="Search..." name="key"></li>
                <li><input type="submit" value="submit" name="submit"></li>
            </form>
        </div>
    </ul>
    </nav>
</body>
</html>

