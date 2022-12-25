<?php
    include("init.php");

    if(isset($_POST['btnSubmit'])){

            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $ageRange = $_POST['ageRange'];

            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['email'] = $email;
            $_SESSION['ageRange'] = $ageRange;

        if(isset($_POST['chkTandC'])){
            $_SESSION['chkTandC'] = $_POST['chkTandC'];
            validUsername($username);
            validEmail($email);
            validPassword($password);
            validAgeRange($ageRange);

            
            if(
                validUsername($username) and
                validEmail($email) and
                validPassword($password) and
                validAgeRange($ageRange)
            ){
                $password = md5($password);
                $query = "INSERT INTO User(userName, userPassword, userEmail, userAgeRange) VALUES ('$username','$password','$email','$ageRange')";

                if(mysqli_query($connection, $query)){
                    setcookie("LOGGED_IN_USER", $username, time() + 600, "/");
                    session_destroy();
                    header("location:main.php");
                }else{
                    $_SESSION['registrationError'] = "Could not register user";
                    header('location:registration.php');
                }
            }else{
                header('location:registration.php');
            }

            unset($_SESSION['chkTandCError']);
        }else{
            $_SESSION['chkTandCError'] = "<br>Please Agree the Terms and Condition";
            unset($_SESSION['chkTandC']);
            header('location:registration.php');
        }
    }

    function validUsername($username){
        if(empty($username)){
            $_SESSION['usernameError'] = "Please fill username<br>";
            return false;
        }else if(strlen($username) < 6){
            $_SESSION['usernameError'] = "Username must be at least 6 characters<br>";
            return false;
        }else if(strlen($username) > 20){
            $_SESSION['usernameError'] = "Username must be less than 20 letters<br>";
            return false;
        }

        unset($_SESSION['usernameError']);
        return true;
    }

    function validEmail($email){
        $regexPattern = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix';
        if(empty($email)){
            $_SESSION['emailError'] = "Please fill email<br>";
            return false;
        }else if(!preg_match($regexPattern, $email)){
            $_SESSION['emailError'] = "Invalid Email Address<br>";
            return false;
        }
        unset($_SESSION['emailError']);
        return true;
    }

    function validPassword($password){
        // Minimum eight characters, at least one uppercase letter, one lowercase letter and one number;
        $regexPattern = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$^";
        if(empty($password)){
            $_SESSION['passwordError'] = "Please enter a password<br>";
            return false;
        }else if(!preg_match($regexPattern, $password)){
            $_SESSION['passwordError'] = "Please confirm that your password contains, At least one uppercase letter,one lowercase letter and one number<br>";
            return false;
        }
        unset($_SESSION['passwordError']);
        return true;
    }

    function validAgeRange($ageRange){
        if($ageRange == "unselected"){
            $_SESSION['ageRangeError'] = "Please select an age range<br>";
            return false;
        }
        unset($_SESSION['ageRangeError']);
        return true;
    }
?>