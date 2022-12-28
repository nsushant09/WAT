<?php

    include("init.php");
    $deleteId = $_GET['id'];
    
    if(isset($_GET['id']) && isset($_GET['action'])){
        $query = "DELETE FROM Laptop WHERE id = $deleteId"; 
        if(mysqli_query($connection, $query)){
            $_SESSION['dashboardMessage'] = "Successfully Deleted item";
        }
        else{
            $_SESSION['dashboardMessage'] = "Could not delete item";
        }
        header("Location: {$_SERVER['HTTP_REFERER']}");  
    }
?>