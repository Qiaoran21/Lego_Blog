<?php

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-11-06
    Description: Final Project - Bricks CMS.

****************/

include('nav.php');

if(isset($_GET['tag_id'])) {
    $tag_id= filter_input(INPUT_GET, 'tag_id', FILTER_SANITIZE_NUMBER_INT);

    $query = "SELECT name FROM tags WHERE tag_id = :tag_id";
    $statement = $db->prepare($query);

    $statement->bindValue(":tag_id", $tag_id);
    $statement->execute();

    $tag = $statement->fetch(); 
    $tag_name = $tag['name'];

    $query = "SELECT * FROM posts WHERE tag_id = :tag_id";
    $statement = $db->prepare($query);

    $statement->bindValue(":tag_id", $tag_id);
    $statement->execute();

    $results = $statement->fetchAll();
    $rows = $statement->rowCount();
} else {
    header("Location: index.php");
}

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
    <title>Bricks - <?= $tag_name ?> Posts</title>
</head>
<body>
    <div id="header">
        <h1><a href="index.php"><?= $tag_name ?> Posts</a></h1>
    </div>

    <div id="results">
        <ul>
            <?php if ($rows != 0): ?>
                <?php foreach ($results as $result): ?>
                    <li><h2><a href="show_post.php?post_id=<?= $result['post_id'] ?>"><?= $result['title'] ?></a></h2></li>
                    <?php endforeach; ?>
            <?php else: ?>
                <div id="nothingFound">
                    <h2><?= 'Nothing found!' ?></h2>
                    <img src="images/sad.jpg" alt="sad lego">
                </div>   
            <?php endif; ?>
        </ul>
    </div>
    <footer>
        <p>Copyright © 2023 Bricks. All rights reserved.</p>
    </footer>
</body>
</html>