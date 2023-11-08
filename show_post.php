<?php

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-10-30
    Description: Final Project - Bricks CMS.

****************/

include('nav.php');

if (isset($_GET['post_id'])) {
$post_id = filter_input(INPUT_GET, 'post_id', FILTER_SANITIZE_NUMBER_INT);

$query = "SELECT * FROM posts WHERE post_id = :post_id";
$statement = $db->prepare($query);
$statement->bindValue(':post_id', $post_id);

$statement->execute();
$posts = $statement->fetch();


$query = "SELECT t.name FROM tags AS t JOIN posts AS p ON t.tag_id = p.tag_id WHERE p.post_id = :post_id";

$statement = $db->prepare($query);
$statement->bindValue(':post_id', $post_id);


$statement->execute();
$tags = $statement->fetchAll();
} else {
    $post_id = false;
}

// $query = "SELECT * FROM tags";

// $statement = $db->prepare($query);
// $statement->execute(); 
// $tags = $statement->fetch();




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/icon" href="favicon-32x32.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
    <title>Bricks - Posts</title>
</head>
<body>
    <div id="header">
        <h1><a href="index.php">Posts</a></h1>
    </div>

    <div id="posts">
        <h2><?= $posts['title'] ?></h2>

        <?php if($post_id): ?>

        <form method="post">
            <fieldset>
                <?= date('F j, Y, h:i A', strtotime($posts['created_date'])) ?><a href="edit_post.php?post_id=<?= $posts['post_id'] ?>"> edit</a>

                <?php foreach ($tags as $tag): ?>
                    <div id="post_tag">
                        <a href="show_tag.php?tag_id=<?= $posts['tag_id'] ?>"><?= $tag['name'] ?></a>
                    </div>
                <?php endforeach; ?>

                <div class="post_content">
                    <?= $posts['content'] ?>
                </div>
            </fieldset>
        </form>
        <?php endif ?>
    </div>
    <footer>
        <p>Copyright © 2023 Bricks. All rights reserved.</p>
    </footer>
</body>
</html>