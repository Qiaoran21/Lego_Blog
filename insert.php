<?php

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-10-30
    Description: Final Project - Bricks CMS.

****************/

require('authentication.php');
include('nav.php');


if ($_POST && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['tag_id'])) {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tag_id = filter_input(INPUT_POST, 'tag_id', FILTER_SANITIZE_NUMBER_INT);
    
    $query = "INSERT INTO posts (title, content, tag_id) VALUES (:title, :content, :tag_id)";
    $statement = $db->prepare($query);
    
    $statement->bindValue(":title", $title);
    $statement->bindValue(":content", $content);
    $statement->bindValue(":tag_id", $tag_id);
    
    if($statement->execute()){
        header("Location: list.php");
    }
}

$query = "SELECT tag_id, name FROM tags";
$categories = $db->query($query)->fetchAll();
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
        
        <div id="drop_down">
            <select name="tag_id" id="tag_id">
                <option value="">Select a category...</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['tag_id'] ?>"><?= $category['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div id="post_content">
            <textarea name="content" cols="100" rows="17" placeholder="Write here..."></textarea>
        </div>

        <div id="post_img">
            <label for='image'>Select Image:</label>
            <input type='file' name='image' id='image'>
        </div>
        
        <div>
            <input type="submit" name='submit' value='Submit'>
        </div>
    </form>
    <footer>
        <p>Copyright © 2023 Bricks. All rights reserved.</p>
    </footer>
</body>
</html>