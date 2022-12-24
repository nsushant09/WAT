<?php
    include('connection.php');

    if(isset($_POST['submit'])){

        $firstName = $_POST['firstName'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        $gender = $_POST['gender'];
        $age = $_POST['age'];

        $query = "INSERT INTO Customer(firstname, lastname, email, password, gender, age) VALUES ('$firstName','$surname', '$email', '$password', '$gender', '$age' )";
        if(mysqli_query($connection,$query)){
            echo "Record inserted successfully";
        }else{
            echo "ERROR: Could not able to execute " .$insertQuery .mysqli_error($connection);
        }
    }
?>