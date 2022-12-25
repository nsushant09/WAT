<?php
    include('init.php');

    if(!isset($_COOKIE['LOGGED_IN_USER'])){
        header('location:../Registration/loginform.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1><?php
        echo("<p>Hello " .$_COOKIE['LOGGED_IN_USER'] .",Welcome to the dashboard</p>");
    ?></h1>
    <a href="../Registration/logout.php">Logout</a>
</body>
</html>
