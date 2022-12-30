<?php
    include("init.php");
    $id = secureString($_POST['id'], FILTER_SANITIZE_INT);
    $username = secureString($_POST['username'], FILTER_SANITIZE_STRING);
    $email = secureString($_POST['email'], FILTER_SANITIZE_EMAIL);
    $ageRange = secureString($_POST['ageRange'], FILTER_SANITIZE_STRING);
    $status = secureString($_POST['status'], FILTER_SANITIZE_STRING);
    if($status == 'on'){
        $status = 'active';
    }else{
        $status = 'inactive';
    }

    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['ageRange'] = $ageRange;

    validUsername($username);
    validEmail($email);
    validAgeRange($ageRange);

    if(
        validUsername($username) and
        validEmail($email) and
        validAgeRange($ageRange)
    ){

        $password = md5($password);
        $updateAt = date("Y:m:d H:i:s");
        $query = "UPDATE User SET userName = '$username' , userEmail = '$email' , userAgeRange = '$ageRange' , userStatus = '$status', userUpdatedAt = '$updateAt' WHERE userID = '$id'";
        
        if(mysqli_query($connection, $query)){
            $_SESSION['dashboardMessage'] = "User Data Updated Successfully";
            header("location:main.php");
        }else{
            $_SESSION['registrationUpdateMessage'] = "User Data Update Failure <br>" .mysqli_error($connection);
            header("Location: {$_SERVER['HTTP_REFERER']}");
        }



    }else{
        header("Location: {$_SERVER['HTTP_REFERER']}");
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
        return true;
    }

    function validAgeRange($ageRange){
        if($ageRange == "unselected"){
            $_SESSION['ageRangeError'] = "Please select an age range<br>";
            return false;
        }
        return true;
    }
?>