<?php

    include('init.php');

    $action = $_GET['action'];

    if($action == 'add'){
    }else{
        $id = $_GET['id'];
        $query = "SELECT * FROM Laptop WHERE id = '$id' LIMIT 1";
        $result = mysqli_query($connection, $query);
        if($result){

        }
        while($row = mysqli_fetch_assoc($result)){
            $_SESSION['name'] = $row['name'];
            $_SESSION['brand'] = $row['brand'];
            $_SESSION['size'] = $row['size'];
            $_SESSION['category'] = $row['category'];
            $_SESSION['price'] = $row['price'];
            $_SESSION['isInStock'] = $row['instock'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../Registration/styles.css">
    <title><?php
        if($action == 'add'){
            echo "Insert Item";
        }else{
            echo "Update Item";
        }
    ?></title>
</head>
<body>

    <div class="container">

        <?php
            if(isset($_SESSION['addUpdateFormMessage'])){
                echo('<div class ="alert alert-dark" role="alert">' .$_SESSION['addUpdateFormMessage'] .'</div>');
                unset($_SESSION['addUpdateFormMessage']);
            } 
        ?>

        <div class="h1"><?php
            if($action == 'add'){
                echo "Insert";
            }else{
                echo "Update";
            }
        ?></div>
        <form action="<?php
            if($action == 'add'){
                echo "insert.php";
            }else{
                echo "update.php";
            }
        ?>" method="POST" enctype="multipart/form-data">

            <?php
                if($action == 'update'){
                    echo('<div class="mb-3">');
                    echo('<input type="hidden" name="id" value="'.$id .'"');
                    echo('</div>');
                }
            ?>

            <div class="mb-3">
                <label for="nameLabel" class="form-label">Device Name</label>
                <input type="text" class="form-control" name="name" value="<?php
                    if(isset($_SESSION['name'])){
                        echo $_SESSION['name'];
                        unset($_SESSION['name']);
                    }
                    ?>">
                <div id="nameError" class="form-text"><?php
                    if(isset($_SESSION['nameError'])){
                        echo $_SESSION['nameError'];
                        unset($_SESSION['nameError']);
                    }
                ?></div>
            </div>

            <div class="mb-3">
                <label for="brandLabel" class="form-label">Brand</label>
                <input type="text" class="form-control" name="brand" value="<?php
                    if(isset($_SESSION['brand'])){
                        echo $_SESSION['brand'];
                        unset($_SESSION['brand']);
                    }
                ?>">
                <div id="brandError" class="form-text"><?php
                    if(isset($_SESSION['brandError'])){
                        echo $_SESSION['brandError'];
                        unset($_SESSION['brandError']);
                    }
            ?></div>
            </div>

            <div class="mb-3">
                <label for="sizeLabel" class="form-label">Size (in inches)</label>
                <input type="text" class="form-control" name="size" value="<?php
                    if(isset($_SESSION['size'])){
                        echo $_SESSION['size'];
                        unset($_SESSION['size']);
                    }?>">
                <div id="sizeError" class="form-text"><?php
                    if(isset($_SESSION['sizeError'])){
                        echo $_SESSION['sizeError'];
                        unset($_SESSION['sizeError']);
                    }
                ?></div>
            </div>

            <div class="mb-3">
                <label for="priceLabel" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" value="<?php
                    if(isset($_SESSION['price'])){
                        echo $_SESSION['price'];
                        unset($_SESSION['price']);
                    }?>">
                <div id="priceError" class="form-text"><?php
                    if(isset($_SESSION['priceError'])){
                        echo $_SESSION['priceError'];
                        unset($_SESSION['priceError']);
                    }
                ?></div>
            </div>

            <div class="mb-3">
                <label for="categoryLabel" class="form-label">Category</label>
                <select class="form-select" name="category" id="category">
                <option value="chromebook" <?php
                    if(isset($_SESSION['category']) && $_SESSION['category'] == 'chromebook') echo "SELECTED";
                ?>>Chromebook</option>
                <option value="desktop_replacement"  <?php
                    if(isset($_SESSION['category']) && $_SESSION['category'] == 'desktop_replacement') echo "SELECTED";
                ?>>Desktop Replacement</option>
                <option value="gaming"  <?php
                    if(isset($_SESSION['category']) && $_SESSION['category'] == 'gaming') echo "SELECTED";
                ?>>Gaming</option>
                <option value="notebook"  <?php
                    if(isset($_SESSION['category']) && $_SESSION['category'] == 'notebook') echo "SELECTED";
                ?>>Notebook</option>
                <option value="ultrabook"  <?php
                    if(isset($_SESSION['category']) && $_SESSION['category'] == 'ultrabook') echo "SELECTED";
                ?>>Ultrabook</option>
                <option value="two_in_one"  <?php
                    if(isset($_SESSION['category']) && $_SESSION['category'] == 'two_in_one') echo "SELECTED";
                ?>>2 in 1s</option>
            </select>
                <div id="categoryError" class="form-text"><?php
                    if(isset($_SESSION['categoryError'])){
                        echo $_SESSION['categoryError'];
                        unset($_SESSION['categoryError']);
                    }
            ?></div>
            </div>
            <?php
                unset($_SESSION['category']);
            ?>

            <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input name="image" class="form-control" type="file" id="formFile">
            </div>
            
            <?php
                if($action == 'update'){
                    echo('<div class="mb-3">');
                        echo('<input type="checkbox" class="form-check-input" name="chkIsInStock"' .returnInStock() .'>');
                        echo('<label for="chkIsInStock" class="form-check-label" style="margin-left:8px;"> Is Item In Stock?</label>');
                    echo('</div>');
                }

                function returnInStock(){
                    if(isset($_SESSION['isInStock'])){
                        if($_SESSION['isInStock'] == '1'){
                            unset($_SESSION['isInStock']);
                            return "CHECKED";
                        }
                        unset($_SESSION['isInStock']);
                        return "";
                    }
                    return "";
                }
            ?>

            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-primary" id="submitButtonID" value="<?php
                    if($action == 'add'){
                        echo "Add";
                    }else{
                        echo "Update";
                    }
                ?>" name="btnSubmit">
            </div>

        </form>

        <div id="extrasNoteID">Back to <a href="admin_dashboard.php">Dashboard</a></div>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>