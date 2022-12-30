<?php
    include('init.php');


    if(isset($_GET['action']) && $_GET['action'] == 'update'){
        $action = $_GET['action'];
        $id = $_GET['id'];
        $query = "SELECT * FROM User WHERE userID = '$id' LIMIT 1";
        $result = mysqli_query($connection, $query);

        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $_SESSION['username'] = $row['userName'];
                $_SESSION['email'] = $row['userEmail'];
                $_SESSION['ageRange'] = $row['userAgeRange'];
                $_SESSION['chkTandC'] = $row['userStatus'];
            }
        }else{
            $_SESSION['registrationUpdateMessage'] = "Could not fetch Data";
        }
    }else{
        $action = 'add';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title><?php
        if($action == 'add'){
            echo "Registration";
        }else{
            echo "User Update";
        }
    ?></title>
</head>
<body>

    <div class="container">
        <?php
            if(isset($_SESSION['registrationUpdateMessage'])){
                echo('<div class ="alert alert-dark" role="alert">' .$_SESSION['registrationUpdateMessage'] .'</div>');
                unset($_SESSION['registrationUpdateMessage']);
            } 
        ?>
        <div class="h1"><?php
            if($action == 'add'){
                echo "Register";
            }else{
                echo "Update";
            }
        ?></div>
        <form action="<?php
            if($action == 'add'){
                echo "register.php";
            }else{
                echo "update_user.php";
            }
        ?>" method="POST">

            <?php
                if($action == 'update'){
                    echo('<div class="mb-3">');
                    echo('<input type="hidden" name="id" value="'.$id .'"');
                    echo('</div>');

                    echo('<div class="mb-3">');
                    echo('<input type="hidden" name="status" value="'.$_SESSION['chkTandC'] .'"');
                    echo('</div>');
                }
            ?>

            <div class="mb-3">
                <label for="usernameLabel" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" value="<?php
                    if(isset($_SESSION['username'])){
                        echo $_SESSION['username'];
                        unset($_SESSION['username']);
                    }
                    ?>">
                <div id="usernameError" class="form-text"><?php
                    if(isset($_SESSION['usernameError'])){
                        echo $_SESSION['usernameError'];
                        unset($_SESSION['usernameError']);
                    }
                ?></div>
            </div>

            <div class="mb-3">
                <label for="emailLabel" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" value="<?php
                    if(isset($_SESSION['email'])){
                        echo $_SESSION['email'];
                        unset($_SESSION['email']);
                    }
                ?>">
                <div id="emailError" class="form-text"><?php
                    if(isset($_SESSION['emailError'])){
                        echo $_SESSION['emailError'];
                        unset($_SESSION['emailError']);
                    }
            ?></div>
            </div>

            <?php

                if($action == 'add'){
                    echo '<div class="mb-3">';
                    echo '<label for="passwordLabel" class="form-label">Password</label>';
                    echo '<input type="password" class="form-control" name="password" value="">';
                    echo '<div id="passwordError" class="form-text">';
                        if(isset($_SESSION['passwordError'])){
                            echo $_SESSION['passwordError'];
                            unset($_SESSION['passwordError']);
                        }
                    echo '</div>';
                    echo '</div>';
                }

            ?>

            <div class="mb-3">
                <label for="ageRangeLabel" class="form-label">Age</label>
                <select class="form-select" name="ageRange" id="ageRange">
                <option value="unselected"<?php
                    if(isset($_SESSION['ageRange']) && $_SESSION['ageRange'] == 'unselected') echo "SELECTED";
                ?>>Select Age Range</option>
                <option value="teen" <?php
                    if(isset($_SESSION['ageRange']) && $_SESSION['ageRange'] == 'teen') echo "SELECTED";
                ?>>3-18</option>
                <option value="adult"  <?php
                    if(isset($_SESSION['ageRange']) && $_SESSION['ageRange'] == 'adult') echo "SELECTED";
                ?>>19-59</option>
                <option value="aged"  <?php
                    if(isset($_SESSION['ageRange']) && $_SESSION['ageRange'] == 'aged') echo "SELECTED";
                ?>>60+</option>
            </select>
            <?php
                unset($_SESSION['ageRange']);
            ?>
                <div id="ageRangeError" class="form-text"><?php
                    if(isset($_SESSION['ageRangeError'])){
                        echo $_SESSION['ageRangeError'];
                        unset($_SESSION['ageRangeError']);
                    }
            ?></div>
            </div>

            <div class="mb-3">
                <input type="checkbox" class="form-check-input" name="<?php
                    if($action == 'add'){
                        echo('chkTandC');
                    }else{
                        echo('status');
                    }
                ?>" <?php
                    if(isset($_SESSION['chkTandC'])){
                        if($_SESSION['chkTandC'] == 'on' || $_SESSION['chkTandC'] == 'active') echo("CHECKED");
                        unset($_SESSION['chkTandC']);
                    }
                ?>>
                <label for="chkTandCLabel" class="form-check-label"><?php
                    if($action == 'add'){
                        echo 'I agree the terms and conditions.';
                    }else{
                        echo 'User Status [ACTIVE]';
                    }
                ?></label>
                <div id="chkTandCError" class="form-text"><?php
                    if(isset($_SESSION['chkTandCError'])){
                        echo $_SESSION['chkTandCError'];
                        unset($_SESSION['chkTandCError']);
                    }
                ?></div>
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" id="submitButtonID" value="<?php
                    if($action == 'add'){
                        echo "Register";
                    }else{
                        echo "Update";
                    }
                ?>" name="btnSubmit">


                <input type="reset" class="btn btn-outline-primary" id="cancelButtonID" value="Cancel" name="btnCancel">

            </div>

        </form>

        <?php
            if($action == 'add' && !isset($_COOKIE['LOGGED_IN_ADMIN'])){
                echo ('<div id="extrasNoteID">Already a user? <a href="loginform.php">Login</a></div>');
            }else{
                echo ('<div id="extrasNoteID">Back to <a href="main.php">Dashboard</a></div>');
            }
        ?>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>