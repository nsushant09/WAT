<?php
    include("init.php");
    if(!isset($_COOKIE['LOGGED_IN_USER'])){
        header('location:../Registration/loginform.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/094c35d6d0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="container" style="margin:32px auto 32px auto">

        <!-- Nav bar that contains dashboard name and logout -->
        <nav class="navbar navbar-light justify-content-between">
            <h2><?php
                echo "Welcome, " .$_COOKIE['LOGGED_IN_USER'];
            ?></h2>
            <?php
                if(isset($_SESSION['dashboardMessage'])){
                    echo('<div class ="alert alert-dark" role="alert">' .$_SESSION['dashboardMessage'] .'</div>');
                    unset($_SESSION['dashboardMessage']);
                } 
            ?>
            <a class="nav-link active" aria-current="page" href="../Registration/logout.php" style="color:#061c34">Logout</a>
        </nav>


        <!-- Form for actions, div that contains searching methods i.e radio, dropdown text -->
        <form action="" method="POST">
            <div class="container text-center">

            <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="d-flex form-inputs">
                    <input class="form-control" type="text" placeholder="Search any product..." name="searchValue">
                    <i class="bx bx-search"></i>
                </div>
            </div>
            </div>

            <div class="row justify-content-md-center" style="margin-top:16px;">
            <label for="nameLabel" class="form-label">Device Category</label>
            <div class="col-md-8">
                    <!-- Dropdown to select category -->
                    <select class="form-select" name="categoryDropdown" aria-label="Default select example">
                        <option selected value="all">All</option>
                        <option value="chromebook">Chromebook</option>
                        <option value="desktop_replacement">Desktop Replacement</option>
                        <option value="gaming">Gaming</option>
                        <option value="notebook">Notebook</option>
                        <option value="ultrabook">Ultrabook</option>
                        <option value="two_in_one">2 in 1s</option>
                    </select>
            </div>
            </div>

            
            
            <div class="row justify-content-md-center" style="margin-top:16px;">

                <div class="col-md-8">
                <label for="nameLabel" class="form-label">Sort : </label>
                    <!-- Radio Group to sort with name or price -->
                    <div class="form-check form-check-inline">
                            <input class="form-check-input" value="nameSortRadio" type="radio" name="sortRadio" <?php
                                if(isset($_POST['sortRadio'])){
                                    if($_POST['sortRadio'] == 'on') {
                                        echo "UNCHECKED";
                                    }else {
                                        echo "CHECKED";
                                    }
                                } 
                            ?>>
                            <label class="form-check-label" for="flexRadioDefault1">Name</label>
                    </div>

                    <div class="form-check form-check-inline">
                            <input class="form-check-input" value="priceSortRadio" type="radio" name="sortRadio" <?php
                                if(isset($_POST['sortRadio'])){
                                    if($_POST['sortRadio'] == 'on') {
                                        echo "UNCHECKED";
                                    }else {
                                        echo "CHECKED";
                                    }
                                } 
                            ?>>
                            <label class="form-check-label" for="flexRadioDefault2">Price</label>
                    </div>

                </div>
            </div>


            <div class="d-grid gap-2 col-6 mx-auto">
                <input type="submit" id="btnFilter"class="btn btn-primary" type="button" name="btnFilter" style="background-color:#061c34;margin:16px;" value="Filter">
            </div>

            </div>

        </form>

        <div class="row">
            <div class="col-9">
                <h1>Items</h1>
            </div>
            <div class="col-3" style="text-align:end">
                <a class="nav-link active" aria-current="page" href="addupdateform.php?action=add" style="color:#061c34">+ Insert an Item</a>
            </div>
        </div>


        <?php
            include('display.php');
        ?>
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
