<?php

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-11-17
    Description: Final Project - Bricks CMS.

****************/
session_start();

include('nav.php');

if ($_POST && !empty($_POST['user_name']) && !empty($_POST['password'])) {
    $user_name = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    $query = "SELECT * FROM users WHERE user_name = :user_name";
    $statement = $db->prepare($query);
    
    $statement->bindValue(":user_name", $user_name);

    $statement->execute();
    $record = $statement->fetch();
    
    if ($password === $record['password']) {
        header("Location: login_success.php");
    } else {
        header("Location: login_error.php");
    }   
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
    <title>Bricks - Account</title>
</head>
<body>
    <div id="header">
        <h1><a href="index.php">Account</a></h1>
    </div>
    
    <form method="post" id="account">
        <h2>User Login</h2>
        <div id="user_name">
            <input id="user_name_input" name="user_name" placeholder="User Name">
        </div>    
        
        <div id="password">
            <input id="password_input" name="password" placeholder="Password" type="password">
            
        </div>

        <div>
            <a href="signUp.php">Create an account!</a>
        </div>
                
        <div id="account_submit">
            <input id="submit" type="submit">
            
        </div>
    </form>
    <footer>
        <p>Copyright © 2023 Bricks. All rights reserved.</p>
    </footer>
</body>
</html>