<?php

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-10-30
    Description: Final Project - Bricks CMS.

****************/

require('connect.php');
include('nav.php');

// if (isset($_GET['post_id'])) {
//     $post_id = filter_input(INPUT_GET, 'post_id', FILTER_SANITIZE_NUMBER_INT);

//     $query = "SELECT * FROM posts WHERE post_id = :post_id";
//     $statement = $db->prepare($query);
//     $statement->bindValue(':post_id', $post_id);
    
//     $statement->execute();
//     $posts = $statement->fetch();
// } else {
//     $post_id = false;
// }
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
    <title>Bricks - About Us </title>
</head>
<body class="about">
    <div id="header">
        <h1><a href="index.php">About Us</a></h1>
    </div>
    
    <div id="intro">
        <div id="aboutUs">
            <p>
                Bricks is the online portal for Lego enthusiasts to come together and celebrate their passion for these iconic colourful 
                building blocks.
            </p>
            <p>
                Whether you're a master builder, a curious rookie, or anyone in between, Bricks is a community where 
                individuals can showcase their stunning creations, connect with like-minded fans, and share their thoughts on the 
                latest released sets.
            </p>
            <h2>Let's Create & Share!</h2>
        </div>

        <img id="car" src="images/car_lego.jpg" alt="picture of lego cars">
    </div>
    <footer>
        <p>Copyright © 2023 Bricks. All rights reserved.</p>
    </footer>
</body>
</html>