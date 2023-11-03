<?php

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-10-30
    Description: Final Project - Bricks CMS.

****************/

// require('connect.php');
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
    <link rel="icon" type="image/icon" href="favicon-32x32.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
    <title>Bricks - Contact Us</title>
</head>
<body>
    <div id="header">
        <h1><a href="index.php">Contact Us</a></h1>
    </div>

    <div id="help">
        <div id="contact">
            <p>Phone: (204) 204 2020</p>
            <p>Email: service@bricks.ca</p>
            <p>Address: 123 ABC Street, Winnipeg, MB R3L 0Z0</p>
        </div>

        <div id="questions">
            <h2>FAQ</h2>
            <div>
                <h3>What can I share on Bricks?</h3>
                <p>You can share your lego building ideas, your thoughts on a particular set, or really anything relating to lego!</p>
            </div>
            <div>
                <h3>Is Bricks a part of Lego company?</h3>
                <p>No, Bricks is a lego fan website where lego fans can share and connect. </p>
            </div>
            <div>
                <h3>How can I be a part of the Bricks team?</h3>
                <p>Send us an email and let's chat!</p>
            </div>
        </div>

    </div>

    <footer>
        <p>Copyright © 2023 Bricks. All rights reserved.</p>
    </footer> 
</body>
</html>