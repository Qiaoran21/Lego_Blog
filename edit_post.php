<?php

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-10-30
    Description: Lego blog - Edit posts

****************/

require('authentication.php');
include('nav.php');

require 'C:\xampp\htdocs\WebDev2\project\php-image-resize\lib\ImageResize.php';
require 'C:\xampp\htdocs\WebDev2\project\php-image-resize\lib\ImageResizeException.php';
use \Gumlet\ImageResize;


function file_is_an_image($temporary_path, $new_path) {
    $allowed_mime_types      = ['image/gif', 'image/jpeg', 'image/png'];
    $allowed_file_extensions = ['gif', 'jpg', 'jpeg', 'png'];

    $actual_file_extension   = pathinfo($new_path, PATHINFO_EXTENSION);
    $actual_mime_type        = getimagesize($temporary_path)['mime'];

    $file_extension_is_valid = in_array($actual_file_extension, $allowed_file_extensions);
    $mime_type_is_valid      = in_array($actual_mime_type, $allowed_mime_types);

    return $file_extension_is_valid && $mime_type_is_valid;
}


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

            if (isset($_FILES['image']) && !empty(array_filter($_FILES['image']['name']))) {
                $imgCount = count($_FILES['image']['name']);
    
                for ($i = 0; $i < $imgCount; $i++) {
                    $filename = $_FILES['image']['name'][$i];
                    $tempname = $_FILES['image']['tmp_name'][$i];
                    $folder = 'uploads/' . $filename;
                    $resizeImage = 'resized_' . $filename;
    
                    if (file_is_an_image($tempname, $folder)) {
                        $queryImg = "INSERT INTO images (image_path, post_id) VALUES (:image_path, :post_id)";
                        $statementImg = $db->prepare($queryImg);
                        $statementImg->bindValue(':image_path', $resizeImage);
                        $statementImg->bindValue(':post_id', $post_id);
        
                        if ($statementImg->execute()) {
                            if (move_uploaded_file($tempname, $folder)) {
                                $image = new ImageResize($folder);
                                $image->resizeToWidth(400);
                                $image->save($resizeImage);
                            }
                        }
                    } else {
                        header("Location: invalid_img.php");
                        exit;
                    }
                }
            }

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
    // $query = "SELECT t.name FROM tags AS t INNER JOIN posts AS p ON t.tag_id = p.tag_id WHERE p.post_id = :post_id";

    // $statement = $db->prepare($query);
    // $statement->bindValue(':post_id', $post_id);

    // $statement->execute();
    // $tags = $statement->fetchAll();

} else {
    $post_id = false;
}

// $query = "SELECT tag_id, name FROM tags";
// $categories = $db->query($query)->fetchAll();

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

    <?php if($post_id): ?> 
        <form method="post" id="edit" enctype="multipart/form-data">
            <p><input type="hidden" name="post_id" value="<?= $posts['post_id'] ?>"></p>

            <p><h2><label for="title">Title</label></h2></p>
            <p><input id="title" name="title" value="<?= $posts['title'] ?>"></p>
        
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
                
            <div id="post_img">
                <label for="image">Select Images:</label>
                <input type="file" name="image[]" id="image" multiple >
            </div>

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