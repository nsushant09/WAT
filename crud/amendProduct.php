<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amend</title>
</head>
<body>
    <form action="updateProduct.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Enter Product Details</legend>
            <input type="hidden" name="productID" value="<?php
                echo($_GET['id']);
            ?>">
            <label for="productName">Product Name:</label>
            <input type="text" name="productName" value="<?php

            ?>">
            <br>
            <br>
            <label for="productPrice">Product Price:</label>
            <input type="text" name="productPrice" value="<?php

            ?>">
            <br>
            <br>
            <label for="productImage">Image Filename:</label>
            <input type="text" name="productImage" value="<?php
            ?>">
        </fieldset>
        <input type="submit" value="Submit" name="btnSubmit">
        <input type="reset" value="Clear" name="btnClear">
    </form>
</body>
</html>