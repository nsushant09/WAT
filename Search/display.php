<?php

    if(isset($_POST['btnSearch'])){
       performDisplayOperation($connection);
    }else if(isset($_POST['btnFilter'])){
        performDisplayOperation($connection);
    }else{
        performDisplayOperation($connection);
    }


    function performDisplayOperation($connection){

        if(isset($_POST['searchValue'])){
            $searchValue = $_POST['searchValue'];
        }else{
            $searchValue = "";
        }
        if(isset($_POST['categoryDropdown'])){
            $category = $_POST['categoryDropdown'];
        }else{
            $category = 'all';
        }

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

        if(isset($_POST['sortRadio'])){

            if($_POST['sortRadio'] == 'nameSortRadio'){
                $query = $query ."ORDER BY name ";
            }else if($_POST['sortRadio'] == 'priceSortRadio'){
                $query = $query ."ORDER BY price";
            }
        }

        $result = mysqli_query($connection, $query);

        if($result){
            if(mysqli_num_rows($result) > 0){
                $count = 0;
    
                //Setting up for row
                echo('<div class="container">');
                echo('<div class="row" >');
    
                while($row = mysqli_fetch_assoc($result)){
    
                    if($count % 3 == 0 ){
                        //TODO:Create new row and display
                        echo('</div>');
                        echo('<div class="row" style="margin-bottom:32px;margin-top:32px">');
                    }
                    //TODO: Show card and all
                    displayCard($row);
                    $count++;
    
                }
    
                echo('</div>');
                echo('</div>');
            }else{
                echo('<div class="container text-center">');
                echo('<h4 class="display-4">No Results Found.</h4>');
                echo('</div>');
            }
        }else{
            echo('<div class="container text-center">');
            echo('<h4 class="display-4">Error Requesting Process</h4>');
            echo('</div>');
        }

    }

    function displayCard($item){

        echo('<div class="col">');
        echo('<div class="card" style="width:22rem;padding:16px;"');

        echo ('<img src="laptop_images/razerblade15.jpeg" class="card-img-top" alt="random" style="max-width:80%"/>');

        echo('<div class="card-body">');

        echo('<h4 class="card-title">' .$item['name'] .'</h4>');

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
        
        echo('</div>'); //card body end
        echo('</div>'); //card end
        echo('</div>'); //col end
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