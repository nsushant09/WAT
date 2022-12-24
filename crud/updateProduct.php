<?php

    include("connection.php");
    $updateId = $_POST['productID'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productImage = $_POST['productImage'];

    if(isset($_POST['btnSubmit'])){
        $query = "UPDATE Product SET ProductName = '$productName', ProductPrice = '$productPrice' , ProductImageName = '$productImage' WHERE ProductID = $updateId";
        if(mysqli_query($connection, $query)){
            header("location:crud.php");
        }else{
            echo("</br>Could not update data");
        }
    }
?>