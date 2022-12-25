<?php
    include('init.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <p><?php
        if(isset($_SESSION['registrationError'])){
            echo $_SESSION['registrationError'];
        }
    ?></p>
    <form action="register.php" method="POST">
        <fieldset>
            <legend>Register New User</legend>
            <label for="usernameError"><?php
                if(isset($_SESSION['usernameError'])){
                    echo $_SESSION['usernameError'];
                }
            ?></label>
            <label for="usernameLabel">Username:</label>
            <input type="text" name="username" value="<?php
                if(isset($_SESSION['username'])){
                    echo $_SESSION['username'];
                }
            ?>">
            <br>
            <br>
            <label for="emailError"><?php
                if(isset($_SESSION['emailError'])){
                    echo $_SESSION['emailError'];
                }
            ?></label>
            <label for="emailLabel">Email:</label>
            <input type="email" name="email" value="<?php
                if(isset($_SESSION['email'])){
                    echo $_SESSION['email'];
                }
            ?>">
            <br>
            <br>
            <label for="passwordError"><?php
                if(isset($_SESSION['passwordError'])){
                    echo $_SESSION['passwordError'];
                }
            ?></label>
            <label for="passwordLabel">Password:</label>
            <input type="password" name="password" value="<?php
                if(isset($_SESSION['password'])){
                    echo $_SESSION['password'];
                }
            ?>">
            <br>
            <br>
            <label for="ageRangeError"><?php
                if(isset($_SESSION['ageRangeError'])){
                    echo $_SESSION['ageRangeError'];
                }
            ?></label>
            <label for="ageRangeLabel">Age :</label>
            <select name="ageRange" id="ageRange">
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
            <br>
            <br>
            <input type="checkbox" name="chkTandC" <?php
                if(isset($_SESSION['chkTandC'])){
                    if($_SESSION['chkTandC'] == 'on') echo("CHECKED");
                }
            ?>>
            <label for="termsAndConditionLabel">I agree to terms and conditions.</label>
            <label for="termsAndConditionError"><?php
                if(isset($_SESSION['chkTandCError'])){
                    echo($_SESSION['chkTandCError']);
                }
            ?></label>
            <br>
            <br>
            <input type="submit" value="Submit" name="btnSubmit">
            <input type="reset" value="Cancel" name="btnCancel">
        </fieldset>
        <p>Already a user? <a href="loginform.php">Login</a></p>
    </form>
</body>
</html>