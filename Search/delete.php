<?php

    include("init.php");
    $action = $_GET['action'];
    $deleteId = $_GET['id'];
    

    if(isset($_GET['id']) && isset($_GET['action'])){

        if($action == "delete"){
            $query = "DELETE FROM Laptop WHERE id = $deleteId"; 
            if(mysqli_query($connection, $query)){
                $_SESSION['dashboardMessage'] = "Successfully Deleted item";
            }
            else{
                $_SESSION['dashboardMessage'] = "Could not delete item";
            }
        }

        if($action == "user_delete"){
            $query = "DELETE FROM User WHERE id = $deleteId"; 
            if(mysqli_query($connection, $query)){
                $_SESSION['dashboardMessage'] = "Successfully Deleted User ";
            }
            else{
                $_SESSION['dashboardMessage'] = "Could not delete User";
            }
        }
        header("Location: {$_SERVER['HTTP_REFERER']}");  
    }
?>