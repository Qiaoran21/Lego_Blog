<?php

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-11-17
    Description: Lego blog - Signup success

****************/

include('nav.php');


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
    <title>Bricks - Congrats</title>
</head>
<body>
    <div id="header">
        <h1><a href="index.php">Congratuations!</a></h1>
    </div>    

    <div id="congrats_content">
        <div id="congrats_message">
            <h2>🥳 You are now a Bricks member! </h2>
            You can now <a href="login.php">log in</a>.</p>
        </div>
        
        <div>
            <img id="congrats_img" src="images/congrats.jpg" alt="happy lego people" width="400">
        </div>
    </div>
    <footer>
        <p>Copyright © 2023 Bricks. All rights reserved.</p>
    </footer>
</body>
</html>