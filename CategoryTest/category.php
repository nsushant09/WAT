<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <style>
        table{
            border : 1px solid black
        }
        th{
            border : 1px solid black
        }
        tr{
            border : 1px solid black
        }
        td{
            border : 1px solid black
            
        }
    </style>
</head>
<body>

<form method = "POST" action = "insertCategory.php">
        <fieldset><legend>Add Category</legend>
        <label for="categoryNameLabel">Category Name</label>
</br>
        <input type="text" name="categoryName">
</br></br>
        <label for="descriptionLabel">Description</label>
</br>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </fieldset>
</br></br>
        <input type="submit" name="submit" value="Add">
    </form>
    
    <?php
        include 'insertCategory.php';
        include 'selectCategory.php';
    ?>
</body>
</html>