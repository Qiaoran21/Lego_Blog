<?php

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-10-30
    Description: Final Project - Bricks CMS.

****************/

require('connect.php');
require('authentication.php');
include('nav.php');


if ($_POST && !empty($_POST['title']) && !empty($_POST['content'])) {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    $query = "INSERT INTO posts (title, content) VALUES (:title, :content)";
    $statement = $db->prepare($query);
    
    $statement->bindValue(":title", $title);
    $statement->bindValue(":content", $content);
    
    if($statement->execute()){
        header("Location: index.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/icon" href="favicon-32x32.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title>Bricks - New Post</title>
</head>
<body>
    <div id="header">
        <h1><a href="index.php">New Post</a></h1>
    </div>    

    <form method="post" action="insert.php" id="post">
        <div id="post_title">
            <input id="title" name="title" placeholder="Title">
        </div>
        
        <div id="post_content">
            <textarea name="content" id="content" cols="100" rows="17" placeholder="Write here..."></textarea>
        </div>
        
        <div>
            <input type="submit">
        </div>
    </form>
    <footer>
        <p>Copyright © 2023 Bricks. All rights reserved.</p>
    </footer>
</body>
</html>