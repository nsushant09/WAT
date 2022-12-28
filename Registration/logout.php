<?php
    include('init.php');
    session_destroy();
    setcookie("LOGGED_IN_USER", "", time() - 3600, "/");
    setcookie("LOGGED_IN_ADMIN","", time() - 3600, "/");
    header('location:loginform.php');
?>