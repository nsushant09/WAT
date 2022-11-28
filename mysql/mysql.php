<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sushant Neupane C7297955</title>
</head>
<body>
    <form method = "POST" action = "insertRecord.php">
        <fieldset><legend>Enter Customer Details</legend>
        <label for="firstNameLabel">First Name : </label>
        <input type="text" name="firstName">
</br></br>
        <label for="surnameLabel">Surname : </label>
        <input type="text" name="surname">
</br></br>
        <label for="emailLabel">Email :</label>
        <input type="email" name="email">
</br></br>
        <label for="passwordLabel">Password : </label>
        <input type="password" name = "password">
</br></br>
        <label for="genderLabel">Gender :</label>
        <select name="gender" id="genderId">
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select>
</br></br>
        <label for="ageLabel">Age : </label>
        <input type="number" name="age">
        </fieldset>
</br></br>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="clear" value="Clear">
    </form>

    <?php
        include 'selectRecord.php';
        ?>

</body>
</html>