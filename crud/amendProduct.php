<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amend</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Enter Product Details</legend>
            <label for="productName">Product Name:</label>
            <input type="text" name="productName">
            <br>
            <br>
            <label for="productPrice">Product Price:</label>
            <input type="text" name="productPrice">
            <br>
            <br>
            <label for="productImage">Image Filename:</label>
            <input type="text" name="productImage">
        </fieldset>
        <input type="submit" value="Submit" name="btnSubmit">
        <input type="reset" value="Clear" name="btnClear">
    </form>
</body>
</html>

<?php

    include("connection.php");
    $updateId = $_GET['id'];
    $productName = $_GET['productName'];
    $productPrice = $_GET['productPrice'];
    $productImage = $_GET['productImage'];

    if(isset($_GET['id']) && isset($_GET['action'])){
        $query = "UPDATE Product SET ProductName = '$productName', ProductPrice = '$productPrice' , ProductImageName = '$productImage'";
        if(mysqli_query($connection, $query)){
            header("location:crud.php");
        }else{
            echo("</br>Could not update data");
        }
    }
?>