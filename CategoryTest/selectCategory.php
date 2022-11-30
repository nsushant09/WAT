<?php
    include 'connection.php';

    echo("<h1>List All Category</h1>");
    echo("<table style= \"border:1px solid black\" ;>");
    echo("<tr>");
    echo("<th>ID</th>");
    echo("<th>Name</th>");
    echo("<th>Description</th>");
    echo("<th>Status</th>");
    echo("</tr>");

    $query = "SELECT * FROM Category";
    displayQueryResults($query, $connection);

    echo("</table>");

    function displayQueryResults($query, $connection){
        $result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($result)){
            echo("<tr>");
            echo("<td>" .$row['id'] ."</td>");
            echo("<td>" .$row['cname'] ."</td>");
            echo("<td>" .$row['description'] ."</td>");
            echo("<td>" .$row['status'] ."</td>");
            echo("</tr>");
        }
    }
?>