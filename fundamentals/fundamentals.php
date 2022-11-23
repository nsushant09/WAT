<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Web Applications and Technologies</title>
      <link href="./main.css" type="text/css" rel="stylesheet"/>
   </head>
   <body>
      <header>
         <h1>Sushant Neupane C7297955</h1> 
      </header>
      
      <section id="container">
         <h1>Fundamentals of PHP</h1>
         <?php
         echo "<h2>Selection</h2>";
         $day = date('l'); 
         echo "It's " .$day;
         if($day == 'Wednesday'){
            echo "<br/>It's Midweek";
         }else{
            echo "<br/>It's not Midweek";
         }

         date_default_timezone_set('Asia/Kathmandu');
         $date = date('H');
         if($date < 12){
            echo "<br/>Good Morning";
         }else if($date < 18){
            echo "<br/>Good Afternoon";
         }else{
            echo "<br/>GoodNight";
         }

         $password = "password";
         if(strlen($password) > 4 and strlen($password) < 10){
            echo "<br/>Password length is valid";
         }else{
            echo "<br/>Password length is invalid";
         }
        
         if($password == 'password' or $password == 'username'){
            echo "<br/>Password valid";
         }else{
            echo "<br/>Password invalid";
         }

         echo "<br/><h1>Ticket Discounting</h1>";
         $initialTicketPrice = 25;
         $passengerAge = 15;
         $finalTicketPrice = $initialTicketPrice;
         $isMember = true;
         if($passengerAge < 12){
            $finalTicketPrice -= ($initialTicketPrice * 0.5);
         }else if($passengerAge < 18 || $passengerAge > 65){
            $finalTicketPrice -= ($initialTicketPrice * 0.25);
         }else{}//blank else

         if($isMember){
            $finalTicketPrice -= ($finalTicketPrice * 0.10);
         }

         //output of the form 
         echo("<br/>Initial Ticket Price: " .$initialTicketPrice);
         echo("<br/>Age : " .$passengerAge);
         echo("<br/>Member : " .($isMember ? "YES" : "NO"));
         echo("<br/>Final Ticket Price : " .number_format($finalTicketPrice, 2));

         echo("<h2>Arrays</h2>");
         
         echo("<h3>Simple Arrays</h3>");
         $products = array("t-shirt", "cap", "mug");
         print_r($products);
         echo("<br/>Overriding array at index 1 i.e cap with shirt");
         $products[1] = "shirt";
         print_r($products);
         echo("<br/>Adding an item on the end of the array i.e skirt at the last element");
         array_push($products, "skirt");
         echo("<br/>Displaying the items using for loop");
         echo("<br/>Items in my products array");
         for($i = 0; $i < sizeof($products) ; $i++){
            echo("<br/>The item at index [" .$i ."] is : " .$products[$i]);
         }

         echo("<h3>Associative Arrays</h3>");
         $customer = array(
            'CustId' => 12, 
            'CustName' => 'Sarah',
            "CustAge" => 23,
            "CustGender" => "F"
         );
         print_r($customer);
         echo("</br>Modyfying the value of CustAge and adding a new key => value pair for email</br>");
         $customer["CustAge"] = 31;
         $customer["CustEmail"] = "sarah@gmail.com";
         print_r($customer);
         echo("</br>Items in my customer array");
         echo("</br>The item at index[CustName] is: " .$customer["CustName"]);
         echo("</br>The item at index[CustEmail] is: " .$customer["CustEmail"]);

         echo("<h3>Multi-Dimensional Arrays</h3>");
         $stock = array(
            "id1" => array("description" => "t-shirt", "price" => 9.99 , "stock" => 100, "colour" => array("blue", "green", "red")),
            "id2" => array("description" => "cap", "price" => 4.99, "stock" => 50, "colour" => array("blue", "black", "grey")),
            "id3" => array("description" => "mug", "price" => 6.99, "stock" => 30, "colour" => array("yellow", "green", "pink"))
         );
         print_r($stock);
         echo("</br>This is my order");
         showRequiredInformation($stock, "id1", 1);
         showRequiredInformation($stock, "id2", 2);
         function showRequiredInformation($array, $itemKey, $colorIndex){
            echo("</br>" .$array[$itemKey]["colour"][$colorIndex] ." " .$array[$itemKey]["description"]);
            echo("</br>Price: " .$array[$itemKey]["price"]);
         }

         echo("<h2>Loops</h2>");
         echo("<h3>While Loop</h3>");
         $counter = 1;
         while($counter < 6){
            echo("Count: " .$counter ."</br>");
            $counter++;
         }
         $counter = 1;
         $shirtPrice = 9.99;
         $total = 0;

         echo("<table style=\"border: 1px solid black;\">");
         echo("<tr style=\"border: 1px solid black;\">");
         echo("<th style=\"border: 1px solid black;\">Quantity</th>");
         echo("<th style=\"border: 1px solid black;\">Price</th>");
         echo("</tr>");
         while($counter <= 10){
            $total = $counter * $shirtPrice;
            echo("<tr style=\"border: 1px solid black;\">");
            echo("<td style=\"border: 1px solid black;\">" .$counter ."</td>");
            echo("<td style=\"border: 1px solid black;\">" .$total ."</td>");
            echo("</tr>");
            $counter++;
         }
         echo("</table>");
         echo("<h3>For Loops</h3>");
         $names = array("Peter", "Kat", "Laura", "Ali", "Popacatapetal");
         for($i = 0; $i < 5; $i++){
            echo($names[$i] ."</br>");
         }

         echo("<h3>For Each Loops</h3>");
         $names = array(
            "Peter" => "c123456",
            "Kat" => "c654321",
            "Laura" => "c987654",
            "Ali" => "c654987",
            "Popacatapetal" => "c765984"
         );
         foreach($names as $studentName => $studentID){
            echo("</br>Name : " .$studentName ."ID: " .$studentID);
         }

         echo("<h3>City Task</h3>");
         $city = array("Peter" => "LEEDS", "Kat" => "bradford" , "Laura" => "wakeFIeld");
         print_r($city);
         foreach($city as $studentName => $cityName){
            $cityName = strtolower($cityName);
            $cityName = ucfirst($cityName);
            $city[$studentName] = $cityName;
         }
         echo("</br>");
         print_r($city);

         echo("<h2>Some Useful Functions.</h2>");
         echo('<form name = "passwordValidation" action = "" method = "POST">');
         echo('<input type="text" name="password" placeholder="Password">');
         echo('<input type="submit" name = "btnValidate" value = "Validate">');
         echo('</form>');
         $password2 = "";
         if(isset($_POST['password']) and !empty($_POST['password'])){
            $password2 = $_POST['password'];
            validatePassword($password2);
         }else{
            echo("</br>Please enter a password");
         }

         function validatePassword($password){
            echo("</br>Password is : " .$password);
               if(strlen($password) >= 6 and strlen($password) <= 8){
                  if(is_numeric($password)){
                     echo("</br>Password cannot be a number");
                  }else{
                     echo("</br>Password OK");
                     echo("</br>md5 Encrypted Valid Password : " .md5($password));
                     echo("</br>sha1 Encrypted Valid Password : " .sha1($password));
                  }
               }else{
                  echo("</br>Your password must be between 6 and 8 characters in length");
               }
         }

         
		?>
      </section>
      <footer>   
         <small> <a href="./">Home</a></small>
      </footer>
   </body>
</html>
