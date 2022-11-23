<!DOCTYPE html>
<html>
<head><title>WAT Week 5 Progress Check</title></head>
<body>
<h1>WAT Week 5 Progress Check</h1>
<h1>Generate Statements</h1>
<?php
    //declare two variables assign one your name and the other your id
    $name = "Sushant Neupane";
    $id = "c7297955"
    //echo out a statement beow using concatenation
    //My name is Paul and my id is c123456
    echo("</br>My name is " .$name ." and my id is " .$id);
    
?>
<h1>Use Arithmetic Operators </h1>
<?php
    /*Calculate annual interest paid for a loan.  Declare two variables one to 
    *hold the value of loan and one the interest rate.  Set these to 500 and 3.5
    *respectively.  Calculate the annual interest payable based on the formula
    *interest paid = (loan amount / 100) x rate of interest
    *Display the following statement using your variables:
    * Loan: 500
    * Rate: 3.5%
    * Payable: £17.50
    */
    $loan = 500;
    $rate = 3.5;
    $payable = ($loan / 100) * $rate;
    echo("</br>Loan : " .$loan);
    echo("</br>Rate : " .$rate);
    echo("</br>Payable : &pound" .$payable);
    
?>
<h1>Use Conditional Statements</h1>
<?php
    /*The date function below is set to provide the hour
    *in 24-hour format.  Produce a statement that tests 
    * to see if the hour is greater than 12 and less than 18
    * echo 'afternoon' if true and 'not afternoon' if false
    */
    $hour=Date('G');
    if($hour > 12 and $hour < 18){
        echo("</br>Afternoon");
    }else{
        echo("</br>Not Afternoon");
    }
   
?>
<h1>Loops</h1>
<?php
    //declare an array to hold the name of 4 colours
    //set up a while loop - don't forget the counter
    //set the loop condition to loop for the length of the array
    //in the loop echo out the counter and a colour from the array
    //at the location pointed to by the counter
    //Don't forget to increment the counter
    //Output like below:
    //0 Blue
    //1 Yellow
    //2 Red
    //3 Black
    $colour = array("Blue", "Yellow", "Red", "Black");
    $arrayCounter = 0;
    while($arrayCounter < sizeof($colour)){
        echo("</br>" .$arrayCounter ." " .$colour[$arrayCounter])
        $arrayCounter++;
    }

?>
</body>
</html>
