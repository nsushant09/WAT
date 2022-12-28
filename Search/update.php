<?php

    include("init.php");

        $id = trim($_POST['id']);
        $name = trim($_POST['name']);
        $price = trim($_POST['price']);
        $category = trim($_POST['category']);
        $brand = trim($_POST['brand']);
        $size = trim($_POST['size']);
        $instock = 0;
        if(isset($_POST['chkIsInStock'])){
            $_POST['chkIsInStock'] == 'on' ? $instock = 1 : $instock = 0;
            $_SESSION['isInStock'] = $instock;
        }

        $image = $_FILES['image']['name'];
        $imageSize = $_FILES['image']['size'];
        $imageType = $_FILES['image']['type'];
        $imageTempName = $_FILES['image']['tmp_name'];
        $location = "laptop_images/" .$image;


    if(isset($_POST['btnSubmit'])){
        $updatedAt = date("Y:m:d H:i:s");
        $query = "UPDATE Laptop SET name = '$name' , price = '$price', image = '$image', category = '$category', brand = '$brand', size = '$size', instock = '$instock', updated_at = '$updatedAt' WHERE id = '$id'";

        if(mysqli_query($connection, $query)){
            $_SESSION['addUpdateFormMessage'] = "Data Updated Sucessfully"; 

        }else{
            $_SESSION['addUpdateFormMessage'] = mysqli_error($connection);
        }
        header("Location:{$_SERVER['HTTP_REFERER']}");

    }

?>