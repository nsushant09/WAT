<?php
    $hostname = 'localhost:8889';
    $username = 'root';
    $password = 'root';
    $databaseName = 'Category';
    $connection = mysqli_connect($hostname, $username, $password, $databaseName) or die("Unable to connect to database!");
?>