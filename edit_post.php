<?php

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-10-30
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


    // !!!!!!!!!
    $query = "SELECT t.name FROM tags AS t JOIN posts AS p ON t.tag_id = p.tag_id WHERE p.post_id = :post_id";

    $statement = $db->prepare($query);
    $statement->bindValue(':post_id', $post_id);

    $statement->execute();
    $tags = $statement->fetchAll();

} else {
    $post_id = false;
}

$query = "SELECT tag_id, name FROM tags";
$categories = $db->query($query)->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Edit Post</title>
</head>
<body>
    <div id="header">    
        <h1 id="header"><a href="index.php">Edit: <?= $posts['title'] ?></a></h1>
    </div>
        
<!-- <pre><?php print_r ($category) ?></pre> -->

    <?php if($post_id): ?> 
        <form method="post" id="edit">
            <p><input type="hidden" name="post_id" value="<?= $posts['post_id'] ?>"></p>

            <p><h2><label for="title">Title</label></h2></p>
            <p><input id="title" name="title" value="<?= $posts['title'] ?>"></p>
        



            <!-- FIX HERE -->
            <div id="drop_down">
                <p><h2><label for="tag_id">Category</label></h2></p>

                <select name="tag_id" id="edit_tag_id">
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['tag_id'] ?>" <?php if($category['tag_id'] == $posts['tag_id']) {echo 'selected="selected"';} ?> >
                                        <?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>





            <p><h2><label for="content">Content</label></h2></p>
            <textarea name="content" id="content" cols="100" rows="17"><?= $posts['content'] ?></textarea>
                
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