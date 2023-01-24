<?php
    session_set_cookie_params(0);
    session_start();
    if (!isset($_SESSION['pseudo'])) {
        header("Location: /index.php");
        exit();
    }else{ 
        $_SESSION = array();
        session_unset();
        session_destroy(); 
        header("Location: /index.php");
        exit();
    }
?>