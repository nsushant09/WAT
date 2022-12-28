<?php
    include("init.php");

    if(isset($_POST['btnSubmit'])){

        eraseSessionErrors();

        $name = trim($_POST['name']);
        $price = trim($_POST['price']);
        $category = trim($_POST['category']);
        $brand = trim($_POST['brand']);
        $size = trim($_POST['size']);

        $image = $_FILES['image']['name'];
        $imageSize = $_FILES['image']['size'];
        $imageType = $_FILES['image']['type'];
        $imageTempName = $_FILES['image']['tmp_name'];
        $location = "laptop_images/" .$image;

        $_SESSION['name'] = $name;
        $_SESSION['price'] = $price;
        $_SESSION['category'] = $category;
        $_SESSION['brand'] = $brand;
        $_SESSION['size'] = $size;


        validateName($name);
        validatePrice($price);
        validateImage($image, $imageType);

        if(
            validateName($name) and 
            validatePrice($price) and
            validateImage($image, $imageType)
        ){

            $query = "INSERT INTO Laptop(name, price, image, category, brand, size) VALUES ('$name','$price','$image','$category','$brand','$size')";
            if(mysqli_query($connection, $query)){

                if(move_uploaded_file($imageTempName, $location)){
                    session_unset();
                    $_SESSION['addUpdateFormMessage'] = "Data inserted successfully along with Image";
                }else{
                    $_SESSION['addUpdateFormMessage'] = "Data inserted successfully without Image";
                }
            }else{
                $_SESSION['addUpdateFormMessage'] = "Could not insert data";
            }

            header("Location:{$_SERVER['HTTP_REFERER']}");


        }else{
            header("Location:{$_SERVER['HTTP_REFERER']}");
        }

    }

    function validateName($name){
        if(empty($name)){
            $_SESSION['nameError'] = "Please fill device name";
            $_SESSION['addUpdateFormMessage'] = "Could not validate device name fill";
            return false;
        }else if(strlen($name) > 50){
            $_SESSION['nameError'] = "Make sure you device name is less than 50 characters";
            $_SESSION['addUpdateFormMessage'] = "Could not validate less than 50";
            return false;
        }else{
            return true;
        }
    }

    function validatePrice($price){
        if(empty($price)){
            $_SESSION['priceError'] = "Please enter the price";
            return false;
        }else{
            return true;
        }
    }

    function validateImage($image, $imageType){
        if(empty($image)){
            return true;
        }else if($imageType != 'image/jpeg' and $imageType != 'image/jpg' and $imageType != 'image/png' and $imageType != 'image/gif'){
            $_SESSION['imageError'] = "Please select an image of valid type<br>i.e jpeg, jpg, png, gif";
            return false;
        }else{
            return true;
        }
    }

    function eraseSessionErrors(){
        unset($_SESSION['nameError']);
        unset($_SESSION['priceError']);
        unset($_SESSION['imageError']);

    }
?>