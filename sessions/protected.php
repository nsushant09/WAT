<?php
    include('init.php');
    if(!isset($_SESSION['user'])){
        header('location:sessions.php');
    }
?>

<p>Any page content that you want to protect can be placed here </p>
<a href="logout.php">Logout</a>