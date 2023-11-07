<?php

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-11-06
    Description: Final Project - Bricks CMS.

****************/

require('authentication.php');
include('nav.php');

$query = "SELECT * FROM tags ORDER BY tag_id";

    $statement = $db->prepare($query);
    $statement->execute(); 


if ($_POST && !empty($_POST['name'])) {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    $query = "INSERT INTO tags (name) VALUES (:name)";
    $statement = $db->prepare($query);
    
    $statement->bindValue(":name", $name);
    
    if($statement->execute()){
        header("Location: tags.php");
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
    <title>Bricks - Categories</title>
</head>
<body>
    <div id="header">
        <h1><a href="index.php">Categories</a></h1>
    </div>    

    <div id="tags">
        <?php while($row = $statement->fetch()): ?>
            <div id="tag">
                <a href="show_tag.php?tag_id=<?= $row['tag_id'] ?>"><?= $row['name'] ?></a> 
            </div> 
        <?php endwhile ?>
    </div>

    <form method="post" action="tags.php" id="post">
        <div id="name">
            <input id="name" name="name" placeholder="New Categorey...">
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