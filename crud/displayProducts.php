<?php
    include("connection.php");

    $query = "SELECT * FROM Product";
    $result = mysqli_query($connection, $query);

    // Displaying the data in table
    echo("<h3>Manage Products</h3>");
    echo("<table>");
    echo("<tr>");
    echo("<th>Product Name</th>");
    echo("<th>Price</th>");
    echo("<th>Image</th>");
    echo("<th>Amend</th>");
    echo("<th>Delete</th>");
    echo("</tr>");

    while($row = mysqli_fetch_assoc($result)){
        $imageDisplayString = "<img src =\"uploads/" .$row['ProductImageName'] ."\"alt=\"" .$row['ProductName'] ."\"width=\"100px\">";

        echo("<tr>");
        echo("<td>" .$row['ProductName'] ."</td>");
        echo("<td>" .$row['ProductPrice'] ."</td>");
        echo("<td>" .$imageDisplayString ."</td>");
        echo("<td><a href=\"amendProduct.php?id=" .$row['ProductID'] ."&action=edit\">Amend</a></td>");
        echo("<td><a href=\"deleteProduct.php?id=" .$row['ProductID'] ."&action=delete\">Delete</a></td>");
        echo("</tr>");
    }

    echo("</table>");
?>