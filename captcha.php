<?php

    session_start();

    if(isset($_GET['captcha_text']) && isset($_SESSION['captcha'])) {
        
        $captcha_text = $_GET['captcha_text'];

        $image = imagecreate(100, 30);

        $bacground_colour = imagecolorallocate($image, 0,0,0);

        $text_colour = imagecolorallocate($image, 255,255,255);

        imagestring($image, 4, 25,8, $captcha_text, $text_colour);

        header("Content-type: image/png");

        imagepng($image);

        imagecolorallocate($text_colour);
        imagecolorallocate($bacground_colour);

        imagedestroy($image);


    }

?>