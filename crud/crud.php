<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
</head>
<body>
    
    <form method="POST" action="insertProduct.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Enter New Product Details</legend>
            <label for="productName">Product Name:</label>
            <br>
            <input type="text" name="productName">
            <br>
            <br>
            <label for="productPrice">Price:</label>
            <br>
            <input type="text" name="productPrice">
            <br>
            <br>
            <label for="productImage">Image File:</label>
            <br>
            <input type="text" name="productImage">
            <br>
            <br>
            <input type="submit" value="Submit" name="btnSubmit">
            <input type="reset" value="Clear" name="btnClear">
        </fieldset>
    </form>

    <a href="displayProducts.php">Display Products</a>

</body>
</html>