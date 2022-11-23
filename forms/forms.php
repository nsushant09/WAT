<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Processing Input from HTML Forms</h1>
<h2>Login Form using GET</h2>
<form method="POST" action="forms.php">
<fieldset>
		<legend>
			Login
		</legend>
		<label for="email">Email: </label>
		<input type="text" name="txtEmail"/><br />
		<label for="passwd">Password: </label>
		<input type="password" name="txtPass" /><br />
		<input type="submit" value="Submit" name="loginSubmit"  />
		<input type="reset" value="Clear" />
	</fieldset>
</form>

    <?php
    if(isset($_POST['loginSubmit'])){
        $email = $_POST['txtEmail'];
        $password = $_POST['txtPass'];
        echo("</br>Email: " .$email);
        echo(" Password : " .$password); 
    }
    ?>

<form method="POST" action="forms.php">
	<fieldset>
		<legend>Comments</legend>
		<label for="email">Email: </label>
		<input type="text" name="txtEmail" value="Email" /><br />
		<textarea rows="4" cols="50" name="txtMessage"></textarea><br />
		<label for="confirm">Click to Confirm: </label>
		<input type="checkbox" name="btnConfirm" value="agree"><br />
		<input type="submit" value="Submit" name="btnSubmit"/>
		<input type="reset" value="Clear" />
    </fieldset>
</form>
<?php
if(isset($_POST['btnSubmit'])){
    if(!empty($_POST['txtEmail'])){
        echo("</br>Email : " .($_POST['txtEmail']));
        echo("</br>Comments : " .($_POST['txtMessage']));
        echo("</br>" .(isset($_POST['btnConfirm']) ? "Agreed" : "Not Agreed" ));
    }else{
        echo("</br>Email must not be empty");
    }
}
?>

<h2>Inline PHP</h2>
<input type="text" name="txtEmail" value="
<?php
    if(isset($_POST['txtEmail'])){
        echo $_POST['txtEmail']; 
    }
?>" /><br/>

<h2>Tax Calculator</h2>
<form method = "POST" action = "forms.php">
    <fieldset>
        <legend>Without Tax Calculator</legend>
        <label for="afterTaxPrice">After Tax Price : </label>
        <input type="number" name="tvAfterTaxPrice">
        <label for="taxRate">Tax Rate: </label>
        <input type="number" name="tvRate">
        <input type="submit" value="Submit" name = "taxBtnSubmit"/>
        <input type="reset" value="Clear"/>
    </fieldset> 
</form>
<?php
    if(isset($_POST['taxBtnSubmit'])){
        $afterTaxPrice = $_POST['tvAfterTaxPrice'];
        $taxRate = $_POST['tvRate'];
        $priceBeforeTax = (100 * $afterTaxPrice) / (100 + $taxRate);
        echo("<h3>Price before tax = &pound" .$priceBeforeTax ."</h3>");
    }
?>

<h1>Passing data Appended to an URL </h1>
<h2>Pick a category</h2>
<a href = "forms.php?cat=Films">Films</a>
<a href = "forms.php?cat=Books">Books</a>
<a href = "forms.php?cat=Music">Music</a>
<?php
    if(isset($_GET['cat'])){
        $cat = $_GET['cat'];
        echo("</br>The category chosen is " .$cat);
    }   
?>

<h1>Order Form</h1>
<p></br>Please fill out this form to place your order</p>

<form method="post" action="">
    <fieldset>
        <legend>Enter your login details</legend>
        <label for="usernameLabel">User Name : </label>
        <input type="text" name="tvUsername">
        <label for="emailLabel">Email : </label>
        <input type="email" name = "tvEmail">
    </fieldset>
    <fieldset>
        <legend>Pizza Selection</legend>
        <label for="sizeLabel">Size : </label>
        <input type="radio" name="size" value="Small"> Small
        <input type="radio" name="size" value="Medium"> Medium 
        <input type="radio" name="size" value="Large"> Large
        </br>
        <label for="toppingLabel">Topping :</label>
        <select name="topping" id="topping">
            <option value="Topping 1">Topping 1</option>
            <option value="Topping 2">Topping 2</option>
            <option value="Topping 3">Topping 3</option>
        </select>
        </br>
        <label for="extrasLabel">Extras : </label>
        <input type="checkbox" name="extras[]" value="Parmesan"> Parmesan 
        <input type="checkbox" name="extras[]" value="Olives"> Olives 
        <input type="checkbox" name="extras[]" value="Capers"> capers
    </br>
    </fieldset>
    <input type="submit" value="Submit" name="btnSubmit">
    <input type="reset" value="Clear" name="btnClear">
</form>
<?php
    if(isset($_POST['btnSubmit'])){
        $username = $_POST['tvUsername'];
        $email = $_POST['tvEmail'];
        $size = $_POST['size'];
        $topping = $_POST['topping'];
        $extras = $_POST['extras'];

        echo("</br>Customer ID: <span style=\"font-weight:bold;\">" .$username ."</span>");
        echo("</br>Email: <span style=\"font-weight:bold;\">" .$email ."</span>");
        echo("</br>Your order: <span style=\"font-weight:bold;\">" .$size ." " .$topping ."</span>");
        echo("</br>Extra Toppings :<span style=\"font-weight:bold;\">");
        foreach($extras as $e){
            echo(" " .$e);
        }
        echo("</span>");



    }
?>
</body>
</html>