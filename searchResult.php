<?php

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-11-02
    Description: Final Project - Bricks CMS.

****************/

include('nav.php');

$total_pages = 0;

if(isset($_POST['submit']) && !empty($_POST['key'])) {
    $key= filter_input(INPUT_POST, 'key', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tag_id= filter_input(INPUT_POST, 'tag_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (isset($_POST['tag_id'])) {
        $query = "SELECT * FROM posts WHERE title LIKE :keyword AND tag_id = :tag_id ORDER BY created_date DESC";
        
        $statement = $db->prepare($query);

        $statement->bindValue(":keyword", '%'.$key.'%');
        $statement->bindValue(":tag_id", $tag_id);
    } else {
        $query = "SELECT * FROM posts WHERE title LIKE :keyword ORDER BY created_date DESC";
        
        $statement = $db->prepare($query);

        $statement->bindValue(":keyword", '%'.$key.'%');
    }

    $statement->execute();

    $total_rows = $statement->rowCount();

    // $number_per_page = 2;
    // $total_pages = ceil($total_rows / $number_per_page);
    

    // if (isset($_GET['page'])) {
    //     $page = $_GET['page'];
    // }
    // else {
    //     $page = 1;
    // }

    // $start_from = ($page-1) * $number_per_page;

    // $query = "SELECT * FROM posts WHERE title LIKE :keyword LIMIT $start_from, $number_per_page";
    // $statement = $db->prepare($query);
    // $statement->bindValue(":keyword", '%' . $key . '%');
    // $statement->execute();

    $results = $statement->fetchAll();

} 
// else {
//     header("Location: index.php");
// }

// if (isset($_GET['page'])) {
//     $query = "SELECT * FROM posts WHERE title LIKE :keyword LIMIT $page, $number_per_page";
//     $statement = $db->prepare($query);
//     $statement->bindValue(":keyword", '%' . $key . '%');
//     $statement->execute();

//     $results = $statement->fetchAll();
    
// }

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
            <?php if (!empty($results)): ?>
                <?php foreach ($results as $result): ?>
                    <li><h2><a href="show_post.php?post_id=<?= $result['post_id'] ?>"><?= $result['title'] ?></a></h2></li>
                <?php endforeach; ?>
            <?php else: ?>
                <div id="nothingFound">
                    <h2><?= 'Oops... Nothing found! ' ?></h2>
                    <img src="images/sad.jpg" alt="sad lego">
                </div>   
            <?php endif; ?>

            <?php if ($total_pages > 1): ?>
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <a href="searchResult.php?page=<?= $i ?>"><?= $i ?></a>
                <?php endfor; ?>
            <?php endif; ?>
        </ul>
    </div>
    <footer>
        <p>Copyright © 2023 Bricks. All rights reserved.</p>
    </footer>
</body>
</html>