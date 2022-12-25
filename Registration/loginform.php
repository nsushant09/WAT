<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Login</title>
    <style>
        body{
            box-sizing:content-box;
        }
    </style>
</head>
<body>
    <form action="login.php" method="POST">
        <fieldset>
            <legend>Login</legend>
            <label for="usernameLabel">Username:</label>
            <input type="text" name="username">
            <br>
            <br>
            <label for="passwordLabel">Password:</label>
            <input type="password" name="password">
            <br>
            <br>
            <input type="checkbox" name="chkRemember">
            <label for="rememberMeLabel">Remember Me</label>
            <br>
            <br>
            <label for="loginErrorLabel"><?php
                if(isset($_SESSION['loginError'])){
                    echo $_SESSION['loginError'];
                }
            ?></label>
            <input type="submit" name="btnSubmit" value="Submit">
            <input type="reset" name="btnReset" value="Clear">
        </fieldset>
    </form>
    <p>New user? <a href="registration.php">Register</a></p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>