<?php
    include("init.php");
    if(isset($_POST['btnSubmit'])){
        
        $usernameLogin = secureString($_POST['username'], FILTER_SANITIZE_STRING);
        $passwordLogin = md5(secureString($_POST['password'], FILTER_SANITIZE_STRING));
        $chkRemember = 'off';
        if(isset($_POST['chkRemember'])){
            $chkRemember = $_POST['chkRemember'];
        }

        $_SESSION['username'] = $usernameLogin;
        $query = "SELECT * FROM User WHERE userName = '$usernameLogin' AND userPassword = '$passwordLogin' LIMIT 1";
        $result = mysqli_query($connection, $query);
        if($result){

            if(mysqli_num_rows($result) == 0){
                $_SESSION['loginError'] = "Invalid Username or Password";
                header("Location: {$_SERVER['HTTP_REFERER']}");
            }else{
                while($row = mysqli_fetch_assoc($result)){
                    if($row['userRole'] == 'user'){
                        if($chkRemember == 'on'){
                            setcookie("LOGGED_IN_USER",$row['userName'], time() + (86400 * 7),"/");
                        }else{
                            setcookie("LOGGED_IN_USER", $row['userName'], time() + 600, "/");
                        }
                        setcookie("LOGGED_IN_ADMIN", "", time() - 3600 , "/");
                    }else{
                        if($chkRemember == 'on'){
                            setcookie("LOGGED_IN_ADMIN",$row['userName'], time() + (86400 * 7),"/");
                        }else{
                            setcookie("LOGGED_IN_ADMIN", $row['userName'], time() + 600, "/");
                        }
                        setcookie("LOGGED_IN_USER", "", time() - 3600 , "/");
                    }
                }
                unset($_SESSION['username']);
                header('location:main.php');
            }
        }else{
            $_SESSION['loginError'] = "Could not fetch data";
            header("Location: {$_SERVER['HTTP_REFERER']}");
        }

    }
?>