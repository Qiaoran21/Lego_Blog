<?php

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-10-30
    Description: Lego blog - Insert

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

if ($_POST && isset($_POST['submit']) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['tag_id'])) {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tag_id = filter_input(INPUT_POST, 'tag_id', FILTER_SANITIZE_NUMBER_INT);

    $query = "INSERT INTO posts (title, content, tag_id) VALUES (:title, :content, :tag_id)";
    $statement = $db->prepare($query);

    $statement->bindValue(":title", $title);
    $statement->bindValue(":content", $content);
    $statement->bindValue(":tag_id", $tag_id);

    if ($statement->execute()) {
        $post_id = $db->lastInsertId();

        if (isset($_FILES['image']) && !empty(array_filter($_FILES['image']['name']))) {
            $imgCount = count($_FILES['image']['name']);

            for ($i = 0; $i < $imgCount; $i++) {
                $filename = $_FILES['image']['name'][$i];
                $tempname = $_FILES['image']['tmp_name'][$i];
                $folder = 'uploads/' . $filename;
                $resizeImage = 'resized_' . $filename;

                if (file_is_an_image($tempname, $folder)) {
                    $query = "INSERT INTO images (image_path, post_id) VALUES (:image_path, :post_id)";
                    $statement = $db->prepare($query);
                    $statement->bindValue(':image_path', $resizeImage);
                    $statement->bindValue(':post_id', $post_id);

                    if ($statement->execute()) {
                        if (move_uploaded_file($tempname, $resizeImage)) {
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

    <form method="post" action="insert.php" id="post" enctype="multipart/form-data">
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
            <label for="image">Select Images:</label>
            <input type="file" name="image[]" id="image" multiple >
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