<?php //Check user login
    if (!isset($_SESSION['userId'])){
        header("Location: login.php?error=nouserlogin"); //Redirects to login if no session.
                exit();
 }