<?php
    include('init.php');


    if(isset($_SESSION['user'])){
        echo("<h3>Welcome you are logged in </h3>");
        echo("<br><a href=\"protected.php\">Protected</a>");
        echo("<br><a href=\"logout.php\">Logout</a>");

    }else{
        echo("<br>");
        if(isset($_SESSION['error'])){
            echo("<br>" .$_SESSION['error']);   
            echo("<br>Please Login");
        }
        include('loginform.php');
    }
?>