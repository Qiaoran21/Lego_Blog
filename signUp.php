<?php

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-11-17
    Description: Final Project - Bricks CMS.

****************/

include('nav.php');

if ($_POST && !empty($_POST['user_name']) && !empty($_POST['password']) && !empty($_POST['email'])) {
    $user_name = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    
    $query = "INSERT INTO users (user_name, password, email) VALUES (:user_name, :password, :email)";
    $statement = $db->prepare($query);
    
    $statement->bindValue(":user_name", $user_name);
    $statement->bindValue(":password", $password);
    $statement->bindValue(":email", $email);
    
    if($statement->execute()){
        header("Location: congrats.php");
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
    <title>Bricks - Sign Up</title>
</head>
<body>
    <div id="header">
        <h1><a href="index.php">Sign Up</a></h1>
    </div>
    
    <form method="post" id="account">
        <h2>Create a new account</h2>
        <div id="user_name">
            <input id="user_name" name="user_name" placeholder="User Name">
        </div>    
        
        <div id="password">
            <input id="password" name="password" placeholder="Password">
        </div>

        <div id="email">
            <input id="email" name="email" placeholder="Email">
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