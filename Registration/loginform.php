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
    <title>Login</title>
</head>
<body>

    <div class="container">
        <div class="h1">
            Login
        </div>
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="usernameLabel" class="form-label">Username</label>
                <input type="text" class="form-control" name="username">
                <div id="usernameError" class="form-text"></div>
            </div>

            <div class="mb-3">
                <label for="passwordLabel" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
                <div id="passwordError" class="form-text"></div>
            </div>

            <div class="mb-3">
                <input type="checkbox" class="form-check-input" name="chkRemember">
                <label for="chkRemember" class="form-check-label">Remember me</label>
            </div>

            <?php
                if(isset($_SESSION['loginError'])){
                    echo('<div class ="alert alert-danger" role="alert">' .$_SESSION['loginError'] .'</div>');
                } 
            ?>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" id="submitButtonID" value="Submit" name="btnSubmit">
                <input type="reset" class="btn btn-outline-primary" id="cancelButtonID" value="Cancel" name="btnCancel">
            </div>

        </form>
        
        <div id="extrasNoteID">New user? <a href="registration.php">Register</a></p>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>