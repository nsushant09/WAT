<?php
    include('init.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Registration</title>
</head>
<body>

    <div class="container">
        <?php
            if(isset($_SESSION['registrationError'])){
                echo('<div class ="alert alert-danger" role="alert">' .$_SESSION['registrationError'] .'</div>');
            } 
        ?>
        <div class="h1">Register</div>
        <form action="register.php" method="POST">

            <div class="mb-3">
                <label for="usernameLabel" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" value="<?php
                    if(isset($_SESSION['username'])){
                        echo $_SESSION['username'];
                    }
                    ?>">
                <div id="usernameError" class="form-text"><?php
                    if(isset($_SESSION['usernameError'])){
                        echo $_SESSION['usernameError'];
                    }
                ?></div>
            </div>

            <div class="mb-3">
                <label for="emailLabel" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" value="<?php
                    if(isset($_SESSION['email'])){
                        echo $_SESSION['email'];
                    }
                ?>">
                <div id="emailError" class="form-text"><?php
                    if(isset($_SESSION['emailError'])){
                        echo $_SESSION['emailError'];
                    }
            ?></div>
            </div>

            <div class="mb-3">
                <label for="passwordLabel" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" value="<?php
                    if(isset($_SESSION['password'])){
                        echo $_SESSION['password'];
                    }?>">
                <div id="passwordError" class="form-text"><?php
                    if(isset($_SESSION['passwordError'])){
                        echo $_SESSION['passwordError'];
                    }
                ?></div>
            </div>

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
                <div id="ageRangeError" class="form-text"><?php
                    if(isset($_SESSION['ageRangeError'])){
                        echo $_SESSION['ageRangeError'];
                    }
            ?></div>
            </div>

            <div class="mb-3">
                <input type="checkbox" class="form-check-input" name="chkTandC" value="<?php
                    if(isset($_SESSION['chkTandC'])){
                        if($_SESSION['chkTandC'] == 'on') echo("CHECKED");
                    }
                ?>">
                <label for="chkTandCLabel" class="form-check-label">I agree the terms and conditions.</label>
                <div id="chkTandCError" class="form-text"><?php
                    if(isset($_SESSION['chkTandCError'])){
                        echo $_SESSION['chkTandCError'];
                    }
                ?></div>
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" id="submitButtonID" value="Submit" name="btnSubmit">
                <input type="reset" class="btn btn-outline-primary" id="cancelButtonID" value="Cancel" name="btnCancel">
            </div>

        </form>

        <div id="extrasNoteID">Already a user? <a href="loginform.php">Login</a></div>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>