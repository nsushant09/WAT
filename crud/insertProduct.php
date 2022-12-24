<?php
    include("connection.php");

    if(isset($_POST['btnSubmit'])){

        $productName = trim($_POST['productName']);
        $productPrice = number_format($_POST['productPrice'], 2);
        $productImage = trim($_POST['productImage'])
        $location = "uploads/" .$productImage;


        if(
            !empty($productName) and
            !empty($productPrice) and
        ){
            $query = "INSERT INTO Product (ProductName, ProductPrice, ProductImageName) VALUES ('$productName','$productPrice','$productImage')";

            if(mysqli_query($connection, $query)){
                echo("<br>Inserted data successfully ");
            }else{
                echo("Unable to insert the data to database");
            }
        }else{
            echo("Invalid Inputs");
        }

        header("Location: {$_SERVER['HTTP_REFERER']}");


    }
?>