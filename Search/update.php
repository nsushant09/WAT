<?php

    include("init.php");

        $id = secureString($_POST['id']);
        $name = secureString($_POST['name']);
        $price = secureString($_POST['price']);
        $category = secureString($_POST['category']);
        $brand = secureString($_POST['brand']);
        $size = secureString($_POST['size']);
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

            if(move_uploaded_file($imageTempName, $location)){
                $_SESSION['addUpdateFormMessage'] = "Data Updated Sucessfully along with Image"; 
            }else{
                $_SESSION['addUpdateFormMessage'] = "Data Updated Sucessfully without Image"; 
            }

        }else{
            $_SESSION['addUpdateFormMessage'] = mysqli_error($connection);
        }
        header("Location:{$_SERVER['HTTP_REFERER']}");

    }

?>