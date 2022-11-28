<?php
    include 'connection.php';

    echo("<h2>Select ALL from the Customer Table</h2>");
    $query = "SELECT * FROM Customer";
    displayQueryResults($query, $connection);


    echo("<h2>Select ALL from the Customer Table with Age > 22</h2>");
    $query = "SELECT * FROM Customer WHERE Age > 22";
    displayQueryResults($query, $connection);

    echo("<h2>Select Females from the Customer Table with Age >= 22</h2>");
    $query = "SELECT * FROM Customer WHERE Gender =\"F\" AND Age >= 22";
    displayQueryResults($query, $connection);

    echo("<h2>Select Males from the Customer Table list by age descending</h2>");
    $query = "SELECT * FROM Customer WHERE Gender = \"M\" ORDER BY Age DESC";
    displayQueryResults($query, $connection);

    echo("<h2>Select All from the Customer Table with \"a\" in the first name</h2>");
    $query = "SELECT * FROM Customer WHERE FirstName LIKE '%a%'";
    displayQueryResults($query, $connection);

    function displayQueryResults($query, $connection){
        $result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($result)){
            echo($row['FirstName'] ." " .$row['LastName'] ." " .$row['Email'] ."</br>");
        }
    }
?>