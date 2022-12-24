<?php

    include("connection.php");
    $deleteId = $_GET['id'];
    
    if(isset($_GET['id']) && isset($_GET['action'])){
        $query = "DELETE Product WHERE ProductID = '$delteId'";
        if(mysqli_query($connection, $query)){
            echo("<br>Deletion Succesfull");
            header("location:crud.php");
        }

        if(mysqli_affected_rows($connection) > 0){
            header("Location: {$_SERVER['HTTP_REFERER']}")            
        }else{
            echo("Error in query: $query" .mysqli_error($connection));
            exit;
        }
    }
?>