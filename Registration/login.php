<?php
    include("init.php");
    if(isset($_POST['btnSubmit'])){
        
        $usernameLogin = $_POST['username'];
        $passwordLogin = md5($_POST['password']);
        $chkRemember = 'off';
        if(isset($_POST['chkRemember'])){
            $chkRemember = $_POST['chkRemember'];
        }

        $query = "SELECT * FROM User WHERE userName = '$usernameLogin' AND userPassword = '$passwordLogin' LIMIT 1";
        $result = mysqli_query($connection, $query);
        if($result){

            while($row = mysqli_fetch_assoc($result)){
                if($row['userRole'] == 'user'){
                    if($chkRemember == 'on'){
                        setcookie("LOGGED_IN_USER",$row['userName'], time() + (86400 * 7),"/");
                    }else{
                        setcookie("LOGGED_IN_USER", $row['userName'], time() + 600, "/");
                    }
                }else{
                    if($chkRemember == 'on'){
                        setcookie("LOGGED_IN_ADMIN",$row['userName'], time() + (86400 * 7),"/");
                    }else{
                        setcookie("LOGGED_IN_ADMIN", $row['userName'], time() + 600, "/");
                    }
                }
            }
            header('location:main.php');
        }else{
            $_SESSION['loginError'] = "<br>Invalid Username or Password";
            header('location:loginform.php');
        }

    }
?>