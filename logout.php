<?php

/*******w******** 
    
    Name: Qiaoran Xue
    Date: 2023-11-22
    Description: Lego blog - Logout

****************/

include('nav.php');

session_start();

session_destroy();

header("Location: index.php");

?>

