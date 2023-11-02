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
    <link rel="icon" type="image/icon" href="favicon-32x32.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
    <title>Bricks - Login</title>
</head>
<body>
    <div id="header">
        <h1><a href="index.php">Member Login</a></h1>
    </div>
    
    <form method="post" action="index.php">
        <label for="userName">User Name: </label>
        <input id="userName" name="userName">

        <label for="passWord">Password: </label>
        <input id="passWord" name="passWord">

        <input type="submit">
    </form>
</body>
</html>