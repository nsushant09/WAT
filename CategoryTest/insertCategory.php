<?php
    include('connection.php');

    if(isset($_POST['submit'])){

        $description = trim($_POST['description']);
        $categoryName = trim($_POST['categoryName']);

        $query = "INSERT INTO Category(cname, description) VALUES ('$categoryName','$description')";

        if(!empty($categoryName) or !empty($description)){
            if(mysqli_query($connection,$query)){
                echo "Record inserted successfully";
            }else{
                echo "ERROR: Could not able to execute " .$query .mysqli_error($connection);
            }
        }else{
            echo("Please fill all the details");
        }



    }
?>