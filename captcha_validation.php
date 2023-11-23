<!-- <?php 

    session_start();

    if (isset($_SESSION['captcha']) && $_POST['captcha'] == $_SESSION['captcha']) {
        
        unset($_SESSION['captcha']);

        echo "correct";

    }else {
        echo "wrong!";
    }
?> -->