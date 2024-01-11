<?php

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-11-08
    Description: Lego blog - Tag

****************/

require('authentication.php');
include('nav.php');

// Update button
if (isset($_POST['edit'])) {
    if (isset($_POST['tag_id']) && isset($_POST['name'])) {
        $tag_id = filter_input(INPUT_POST, 'tag_id', FILTER_SANITIZE_NUMBER_INT);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $query = "UPDATE tags SET name = :name WHERE tag_id = :tag_id";
        $statement = $db->prepare($query);
        
        $statement->bindValue(":tag_id", $tag_id);
        $statement->bindValue(":name", $name);
    
        if(!empty($name)) {
            $statement->execute();
            header("Location: tags.php");
        } else {
            header("Location: process.php");
        }
    } else if (isset($_GET['tag_id'])) {
        $tag_id = filter_input(INPUT_GET, 'tag_id', FILTER_SANITIZE_NUMBER_INT);
    
        $query = "SELECT * FROM tags WHERE tag_id = :tag_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':tag_id', $tag_id);
        
        $statement->execute();
        $posts = $statement->fetch();
    }
}

// Delete button
else if (isset($_POST['delete'])) {
    $tag_id = filter_input(INPUT_POST, 'tag_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $query = "DELETE FROM tags WHERE tag_id = $tag_id";

    $statement = $db->prepare($query);
    $statement->execute();

    header("Location: tags.php");
}

// Retrieve the post to be edited/deleted
else if(isset($_GET['tag_id'])) {
    $tag_id = filter_input(INPUT_GET, 'tag_id', FILTER_SANITIZE_NUMBER_INT);

    $query = "SELECT * FROM tags WHERE tag_id = :tag_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':tag_id', $tag_id);
    
    $statement->execute();
    $tags = $statement->fetch();
} else {
    $tag_id = false;
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
    <title>Bricks - Update Category</title>
</head>
<body>
    <div id="header">
        <h1><a href="index.php">Update Category</a></h1>
    </div>    

    <?php if($tag_id): ?> 
        <form method="post" id="edit_tags">
        
            <p><input type="hidden" name="tag_id" value="<?= $tags['tag_id'] ?>"></p>

            <p><h2><label for="name">Category Name</label></h2></p>
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