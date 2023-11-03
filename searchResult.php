<?php

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-11-02
    Description: Final Project - Bricks CMS.

****************/

// require('connect.php');
include('nav.php');

if(isset($_POST['submit']) && !empty($_POST['key'])) {
    $key= filter_input(INPUT_POST, 'key', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $key = $_POST['key'];
    $query = "SELECT * FROM posts WHERE title LIKE :keyword OR content LIKE :keyword ORDER BY created_date DESC";
    $statement = $db->prepare($query);

    $statement->bindValue(":keyword", '%'.$key.'%');
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
    <title>Bricks - Let's talk about Lego!</title>
</head>
<body>
    <div id="header">
        <h1><a href="index.php">Search Result</a></h1>
    </div>

    <div id="results">
        <ul>
            <?php if ($rows != 0): ?>
                <?php foreach ($results as $result): ?>
                    <li><?= $result['title'] ?></li>
                <?php endforeach; ?>
            <?php else: ?>
                <h2><?= 'Nothing found!' ?></h2>
            <?php endif; ?>
        </ul>
    </div>
    <footer>
        <p>Copyright © 2023 Bricks. All rights reserved.</p>
    </footer>
</body>
</html>