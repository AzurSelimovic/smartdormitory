<?php 
    session_start();
    unset($_SESSION['mUserId']);
    unset($_SESSION['password']);
    unset($_SESSION['img_url']);
    unset($_SESSION['account_type']);
    header('Location: login.php');
?>