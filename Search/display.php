<?php
     include("init.php");

    if(isset($_POST['btnSearch'])){
       performDisplayOperation($connection);
    }

    if(isset($_POST['btnFilter'])){
        performDisplayOperation($connection);
    }


    function performDisplayOperation($connection){

        $searchValue = $_POST['searchValue'];
        $category = $_POST['categoryDropdown'];

        $query = "SELECT * FROM Laptop ";

        if(!empty($searchValue)){
            $query = $query ."WHERE name LIKE '%$searchValue%' ";
        }

        if($category != 'all'){
            if(!empty($searchValue)){
                $query = $query ."AND category ='$category' ";
            }else{
                $query = $query ."WHERE category = '$category' ";
            }
        }

        if(isset($_POST['sortNameRadio'])){
            $query = $query ."ORDER BY name ";
        }else if(isset($_POST['sortPriceRadio'])){
            $query = $query ."ORDER BY price ";
        }

        $result = mysqli_query($connection, $query);

        if($result){
            if(mysqli_num_rows($result) > 0){
                $count = 0;
    
                //Setting up for row
                echo('<div class="container">');
                echo('<div class="row">');
    
                while($row = mysqli_fetch_assoc($result)){
    
                    if($count % 3 == 0 ){
                        //TODO:Create new row and display
                        echo('</div>');
                        echo('<div class="row">');
                    }
                    //TODO: Show card and all
                    displayCard($row);
                    $count++;
    
                }
    
                echo('</div>');
                echo('</div>');
            }else{
                echo('<h3 class="display-3">No Results Found.</h3>');
            }
        }else{
            echo('<h3 class="display-3">Error Requesting Process</h3>');
        }

    }

    function displayCard($item){

        echo('<div class="col">');
        echo('<div class="card" style="width:20rem;padding:8px 16px 8px 16px;"');

        echo ('<img class="card-img-top" src="laptop_images/' .$item['image'] .'" width="80%"');

        echo('<h5 class="card-title">' .$item['name'] .'</h5>');

        echo('<h6 class="card-subtitle mb-2 text-muted">Rs ' .$item['price'] .'</h6>');

        echo('<dl class="row">');
            echo('<dt class="col-sm-4">Brand</dt>');
            echo('<dd class="col-sm-8">' .$item['brand'] .'</dd>');
            echo('<dt class="col-sm-4">Category</dt>');
            echo('<dd class="col-sm-8">' .categoryName($item['category']) .'</dd>');
            echo('<dt class="col-sm-4">Size</dt>');
            echo('<dd class="col-sm-8">' .$item['size'] .'</dd>');
        echo('</dl>');
        

        if(isset($_COOKIE['LOGGED_IN_ADMIN'])){
            echo('<div class="col">');
            echo('<a class="btn btn-primary" href="addupdateform.php?action=update&id=' .$item['id'] .'" style="background-color:#061c34;margin-right:16px">Update</a>');
            echo('<a class="" href="delete.php?action=delete&id=' .$item['id'] .'" style="color:#061c34">Delete</a>');
            echo('</div>'); 
        }

        echo('</div>');
        echo('</div>');
    }

    function categoryName($category){
        switch($category){

            case 'all': 
                return 'All';
            
            case 'chromebook':
                return 'Chromebook';
            
            case 'desktop_replacement':
                return 'Desktop Replacement';
            
            case 'gaming':
                return 'Gaming';
            
            case 'notebook':
                return 'Notebook';
            
            case 'ultrabook':
                return 'Ultrabook';
            
            case 'two_in_one':
                return '2 in 1s';
                
        }
    }

?>