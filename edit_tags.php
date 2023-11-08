<?php

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-11-08
    Description: Final Project - Bricks CMS.

****************/

require('authentication.php');
include('nav.php');

// Update button
if (isset($_POST['edit'])) {
    if ($_POST && isset($_POST['title']) && isset($_POST['content']) && isset($_POST['post_id']) && isset($_POST['tag_id'])) {
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $post_id = filter_input(INPUT_POST, 'post_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $post_id = filter_input(INPUT_POST, 'post_id', FILTER_SANITIZE_NUMBER_INT);
            $tag_id = filter_input(INPUT_POST, 'tag_id', FILTER_SANITIZE_NUMBER_INT);
            
            $query = "UPDATE posts SET title = :title, content = :content, tag_id = :tag_id WHERE post_id = :post_id";
            $statement = $db->prepare($query);
            
            $statement->bindValue(":title", $title);
            $statement->bindValue(":content", $content);
            $statement->bindValue(":post_id", $post_id);
            $statement->bindValue(":tag_id", $tag_id);
        
            if(!empty($title) && !empty($content)) {
                $statement->execute();
                header("Location: list.php");
            } else {
                header("Location: process.php");
            }

        } else if (isset($_GET['post_id'])) {
            $post_id = filter_input(INPUT_GET, 'post_id', FILTER_SANITIZE_NUMBER_INT);
        
            $query = "SELECT * FROM posts WHERE post_id = :post_id";
            $statement = $db->prepare($query);
            $statement->bindValue(':post_id', $post_id);
            
            $statement->execute();
            $posts = $statement->fetch();
        }
}

// Delete button
else if (isset($_POST['delete'])) {
    $post_id = filter_input(INPUT_POST, 'post_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $query = "DELETE FROM posts WHERE post_id = $post_id";

    $statement = $db->prepare($query);
    $statement->execute();

    header("Location: list.php");
}

// Retrieve the post to be edited/deleted
else if(isset($_GET['post_id'])) {
    $post_id = filter_input(INPUT_GET, 'post_id', FILTER_SANITIZE_NUMBER_INT);

    $query = "SELECT * FROM posts WHERE post_id = :post_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':post_id', $post_id);
    
    $statement->execute();
    $posts = $statement->fetch();
} else {
    $post_id = false;
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
    <title>Bricks - Edit Categories</title>
</head>
<body>
    <div id="header">
        <h1><a href="index.php">Edit Categories</a></h1>
    </div>    

    <form method="post" action="tags.php" id="post">
        <div id="new_tag">
            <div id="name">
                <input id="name" name="name" placeholder="New Categorey...">
            </div>
            
            <div>
                <input type="submit">
            </div>
        </div>
    </form>

    <?php if($tag_id): ?> 
        <form method="post" id="edit_tags">
            <p><input type="hidden" name="tag_id" value="<?= $tags['tag_id'] ?>"></p>

            <p><h2><label for="name">Categorey Name</label></h2></p>
            <p><input id="name" name="name" value="<?= $tags['name'] ?>"></p>
                
            <div id="edit_buttons">
                <button type="submit" name="edit" value="edit">Update</button>
                <button type="submit" name="delete" value="delete" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
            </div>
        </form>
    <?php endif ?>

    <footer>
        <p>Copyright © 2023 Bricks. All rights reserved.</p>
    </footer>
</body>
</html>