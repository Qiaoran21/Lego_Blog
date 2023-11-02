<?php

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-11-02
    Description: Final Project - Bricks CMS.

****************/

require('connect.php');

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
    <title>Bricks - Let's talk about Lego!</title>
</head>
<body>
    <div id="header">
        <h1><a href="index.php">Bricks</a></h1>
    </div>
    
    <?php include('nav.php') ?>

    <div id="content">
        <div id="aboutUs">
            <img src="images/white_lego.jpg" alt="white lego bricks">
            <h2><a href="about.php">About Us</a></h2>
        </div>

        <div id="blogs">
            <img src="images/lego_heads.jpg" alt="lego heads">
            <h2><a href="list.php">Blogs</a></h2>
        </div>

        <div id="contactUs">
            <img src="images/red_black_lego.jpg" alt="red and black lego bricks">
            <h2><a href="contact.php">Contact Us</a></h2>
        </div>
    </div>

    

    <footer>
        <p>Copyright © 2023 Bricks. All rights reserved.</p>
    </footer>
</body>
</html>