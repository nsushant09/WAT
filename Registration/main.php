<?php
    if(isset($_COOKIE['LOGGED_IN_USER'])){
        header('location:../Search/dashboard.php');
    }else if(isset($_COOKIE['LOGGED_IN_ADMIN'])){
        header('location:../Search/admin_dashboard.php');
    }else{
        header('location:loginform.php');
    }
?>