<?php

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-11-02
    Description: Final Project - Bricks CMS.

****************/

include('nav.php');

$query = "SELECT * FROM posts ORDER BY created_date DESC LIMIT 5";

    $statement = $db->prepare($query);
    $statement->execute(); 
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
        <h1><a href="index.php">Blogs</a></h1>
    </div>
    
    <fieldset>
        <?php while($row = $statement->fetch()): ?>
            <div class="post">
                <div class="post_title">
                    <a href="show_post.php?post_id=<?= $row['post_id'] ?>"><?= $row['title'] ?></a> 
                </div> 

                <?= date('F j, Y, h:i A', strtotime($row['created_date'])) ?>

                <div class="post_content">
                    <?= mb_strimwidth($row['content'], 0, 200, "...") ?>
                    <?php if(strlen($row['content']) >= 200): ?> 
                        <a href="show_post.php?post_id=<?= $row['post_id'] ?>"> read more</a>
                    <?php endif ?>
                </div>
            </div>
        <?php endwhile ?>
    </fieldset>

    <footer>
        <p>Copyright © 2023 Bricks. All rights reserved.</p>
    </footer>
</body>
</html>