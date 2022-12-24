<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions</title>
</head>
<body>
    <h3>Login</h3>
    <form action="login.php" method="POST">
        <label for="txtUserLabel">Username:</label>
        <input type="text" name="txtUser" value=""/>
        <br>
        <br>
        <label for="txtPassLabel">Password</label>
        <input type="password" name="txtPass"/>
        <br>
        <br>
        <input type="submit" name="subLogin" value="Submit"/>
    </form>
</body>
</html>