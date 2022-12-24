<?php
    include("init.php");

    //Gather detail submitted from POST and store 
    $txtUser = $_POST['txtUser'];
    $txtPass = $_POST['txtPass'];

    $query = "SELECT * FROM users WHERE username = '$txtUser' AND password = '$txtPass'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['user'] = $txtUser;
    }else{
        $_SESSION['error'] = "User not recognised";
    }
    header('location:sessions.php');
?>