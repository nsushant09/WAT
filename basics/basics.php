<?php

echo "<h1>Variable</h1>";
$name = "David";
$age = 12;
echo("Hi my name is " .$name ."and I am " .$age ."years old");
echo("Hi my name is $name and I am $age years old");

echo "<h1>Functions</h1>";
// gettype returns the type of the variable
echo gettype($name);
echo '<br/>';
// strlen return the length of passed argument
echo strlen($name);
echo '<br/>';
// strtoupper() return the passed argument to uppercase
echo strtoupper($name);

echo "<h1>Arithmetic</h1>";
$num1 = 9;
$num2 = 12;
$multiplied = $num1 * $num2;
$percentage = ($num1 / $num2) * 100;
$division = $num2 / $num1;

echo("num 1 = " .$num1);
echo("<br/>num 2 = " .$num2);
echo("<br/>num1 as a percentage of num2 = " .$percentage ."%");
echo("<br/>num2 divided by num1 = " .floor($division)." remainder " .($num2 % $num1));

$heightInMeters = 1.8;
$heightInInches = ($heightInMeters * 100) / 2.54;
echo "<h1>Task</h1>";
echo "Name : " .$name;
echo "<br/>Age : " .$age;
echo "<br/>Height in Feet and inches : " .floor($heightInInches / 12) ."ft " .floor($heightInInches % 12) ."ins";


?>