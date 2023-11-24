<?php

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-10-30
    Description: Final Project - Bricks CMS.

****************/
session_start();

include('nav.php');

if (isset($_GET['post_id'])) {
    $post_id = filter_input(INPUT_GET, 'post_id', FILTER_SANITIZE_NUMBER_INT);

    // fetch all post info
    $query = "SELECT * FROM posts WHERE post_id = :post_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':post_id', $post_id);

    $statement->execute();
    $posts = $statement->fetch();

    // fetch all comments for post
    $query = "SELECT * FROM comments AS c JOIN posts AS p ON c.post_id = p.post_id WHERE p.post_id = :post_id ORDER BY c.created_date DESC";
    $statement = $db->prepare($query);
    $statement->bindValue(':post_id', $post_id);

    $statement->execute();
    $comments = $statement->fetchAll();

    // fetch tag for post
    $query = "SELECT t.name FROM tags AS t JOIN posts AS p ON t.tag_id = p.tag_id WHERE p.post_id = :post_id";

    $statement = $db->prepare($query);
    $statement->bindValue(':post_id', $post_id);

    $statement->execute();
    $tags = $statement->fetchAll();

    // fetch images for post
    // $query = "SELECT i.image_path FROM images AS i JOIN posts AS p ON i.post_id = p.post_id WHERE p.post_id = :post_id";

    // $statement = $db->prepare($query);
    // $statement->bindValue(':post_id', $post_id);

    // $statement->execute();
    // $images = $statement->fetchAll();
    
} else {
    $post_id = false;
}


//$captcha = rand(1111, 9999);
//$_SESSION['captcha'] = $captcha;

// submit new comment
if ($_POST && !empty($_POST['user']) && !empty($_POST['comment']) && !empty($_POST['captcha'])) {
    $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $captcha_input = filter_input(INPUT_POST, 'captcha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (isset($_SESSION['captcha']) && !empty($_POST['captcha']) && $_POST['captcha'] == $_SESSION['captcha']) {
         
        $_SESSION['user'] = $user;
        $_SESSION['comment'] = $comment;

        $query = "INSERT INTO comments (post_id, user, comment) VALUES (:post_id, :user, :comment)";
        $statement = $db->prepare($query);
        $statement->bindValue(':post_id', $post_id);
        $statement->bindValue(':user', $user);
        $statement->bindValue(':comment', $comment);

        if ($statement->execute()) {
            header("Location: show_post.php?post_id=$post_id");
            
            unset($_SESSION['user']);
            unset($_SESSION['comment']);
        } 
    } else {
        $error_message = "Incorrect Code";

        $captcha = rand(1111, 9999);
        $_SESSION['captcha'] = $captcha;

        $_SESSION['user'] = $user;
        $_SESSION['comment'] = $comment;
    }
} else {
    $captcha = rand(1111, 9999);
    $_SESSION['captcha'] = $captcha;
}

// retrive "user" and "comment" input if any.
if (isset($_SESSION['user'])) {
    $user_input = $_SESSION['user'];
} else {
    $user_input = '';
}

if (isset($_SESSION['comment'])) {
    $comment_input = $_SESSION['comment'];
} else {
    $comment_input = '';
}

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

        <form method="post" id="post">
            <fieldset>
                <?= date('F j, Y, h:i A', strtotime($posts['created_date'])) ?><a href="edit_post.php?post_id=<?= $posts['post_id'] ?>"> edit</a>

                <?php foreach ($tags as $tag): ?>
                    <div id="post_tag">
                        <a href="show_tag.php?tag_id=<?= $posts['tag_id'] ?>"><?= $tag['name'] ?></a>
                    </div>
                <?php endforeach; ?>

                <!-- <div class="post_image">
                   <img src="uploads/ . <?= $images['image_path'] ?>" alt="post images"> 
                </div> -->


                <div class="post_content">
                    <?= $posts['content'] ?>
                </div>

                <div id="comments">
                    <h4>Comments:</h4>
                    <?php foreach ($comments as $comment): ?>
                        <div id="comment">
                            <div id="comment_author">
                                <?= $comment['user'] ?> 
                            </div>
                            <div id="comment_date">
                                <?= $comment['created_date'] ?>
                            </div>
                            <div id="comment_content">
                                <?= $comment['comment'] ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </fieldset>
        </form>
        <?php endif ?>
    </div>

    <form method="post" id="comment_input">
    <div id="comment_input_author">
    <input type="text" id="user" name="user" placeholder="Author" value="<?= ($user_input) ?>">
</div>

<div id="comment_input_content">
    <textarea name="comment" id="comment" cols="50" rows="3" placeholder="Comment..."><?= ($comment_input) ?></textarea>
</div>

        <div id="captcha">
            <p><?php if(isset($error_message)): ?> 
                    <?= $error_message ?>
                <?php endif; ?></p>
            <img src="captcha.php?captcha_text=<?= $_SESSION['captcha'] ?>" >
            <input type="text" name="captcha" id="captcha"></input>
            <!-- <input type="submit" name='verify' value='Verify'> -->
        </div>
        
        <div id="comment_input_submit">
            <input type="submit" name='submit' value='Submit'>
        </div>
    </form>

    <footer>
        <p>Copyright © 2023 Bricks. All rights reserved.</p>
    </footer>
</body>
</html>