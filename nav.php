<?php 

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-11-02
    Description: Lego blog - Nav

****************/
require 'connect.php';

$query = "SELECT tag_id, name FROM tags";
$categories = $db->query($query)->fetchAll();


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
</head>
<body>
    <nav>
    <ul id="menu">
        <li><a href="index.php">Home</a></li> 
        <li><a href="about.php">About Us</a></li>
        <li><a href="list.php">Blogs</a></li>
        <li><a href="tags.php">Categories</a></li>
        <li><a href="insert.php">New Post</a></li>
        <li><a href="contact.php">Contact Us</a></li> 
        <li><a href="login.php">Login</a></li> 
        <li>
        <form action="searchResult.php" method="post">
            <div id="searchBar">
                <div>
                    <select name="tag_id" id="tag_id">
                        <option value="" selected disabled hidden>All</option>
                        <option value="" >All</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['tag_id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                    
                <div><input id="search_box" type="text" placeholder="Search..." name="key"></div>

                <div><input id="nav_button" type="submit" value="submit" name="submit"></div>
            </div>
        </form>
        </li>
    </ul>
    </nav>
</body>
</html>

