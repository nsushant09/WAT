<?php

    if(isset($_POST['btnSearch'])){
       performProductDisplayOperation($connection);
    }else if(isset($_POST['btnFilter'])){
        performProductDisplayOperation($connection);
    }else{
        performProductDisplayOperation($connection);

        if(isset($_COOKIE['LOGGED_IN_ADMIN'])){
            performUserDisplayOperation($connection);
        }

    }

    function performUserDisplayOperation($connection){
        titleWithInsertion('Users', '+ Insert an User', '../Registration/registration.php');
        $query = "SELECT * FROM User WHERE userRole = 'user' ";
        $result = mysqli_query($connection, $query);
        if($result){
            if(mysqli_num_rows($result) > 0){

                echo('<table class="table"');
                echo('<thead>');
                echo('<tr>');
                echo('<th scope="col">#</th>');
                echo('<th scope="col">Username</th>');
                echo('<th scope="col">Email</th>');
                echo('<th scope="col">Age Range</th>');
                echo('<th scope="col">Role</th>');
                echo('<th scope="col">Status</th>');
                echo('<th scope="col">Update</th>');
                echo('<th scope="col">Delete</th>');
                echo('</tr>');
                echo('</thead>');
                echo('<tbody>');
                while($row = mysqli_fetch_assoc($result)){

                    echo('<tr>');
                    echo('<th scope="row">' .$row['userID'] .'</th>');
                    echo('<td>' .$row['userName'] .'</td>');
                    echo('<td>' .$row['userEmail'] .'</td>');
                    echo('<td>' .$row['userAgeRange'] .'</td>');
                    echo('<td>' .$row['userRole'] .'</td>');
                    echo('<td>' .$row['userStatus'] .'</td>');
                    echo('<td><a style="color:#061c34" href="amendProduct.php?id=' .$row['userID'] .'&action=edit">Update</a></td>');
                    echo('<td><a style="color:#061c34" href="delete.php?id=' .$row['userID'] .'&action=user_delete">Delete</a></td>');
                    echo('</tr>');

                }

                echo('</tbody>');
                echo('</table>');

            }else{
                echo('<div class="container text-center">');
                echo('<h4 class="display-4">No Users Found.</h4>');
                echo('</div>');
            }
        }else{
            echo('<div class="container text-center">');
            echo('<h4 class="display-4">Error Requesting Process</h4>');
            echo('</div>');
        }
    }

    function performProductDisplayOperation($connection){
        titleWithInsertion('Items', '+ Insert an Item', 'addupdateform.php?action=add');

        if(isset($_POST['searchValue'])){
            $searchValue = secureString($_POST['searchValue']);
        }else{
            $searchValue = "";
        }
        if(isset($_POST['categoryDropdown'])){
            $category = secureString($_POST['categoryDropdown']);
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

        // style="border:1px solid #1d385550;border-radius:32px;padding:16px;margin-right:16px;">
        echo('<div class="col">');
        
        echo('<div style="width:22rem;padding:16px" class="card">');

        echo ('<img src="laptop_images/' .$item['image'] .'" class="card-img-top" alt="' .$item['name'] .'" style="max-width:100%;max-height: 300px"/>');

        echo('<div class="card-body">');

        echo('<h2 class="card-title" style="font-family:Trebuchet MS;">' .$item['name'] .'</h2>');

        echo('<h5 class="card-subtitle mb-2 text-muted" style="font-family:Courier">Rs ' .$item['price'] .'</h5>');

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

    function titleWithInsertion($title, $insertString, $insertLink){
        echo('<div class="row">');
            echo '<div class="col-9">';
                echo '<h1 style="font-family:Trebuchet MS;">' .$title .'</h1>';
            echo '</div>';

            if(isset($_COOKIE['LOGGED_IN_ADMIN'])){
                echo '<div class="col-3" style="text-align:end">';
                    echo '<a class="nav-link active" aria-current="page" href="' .$insertLink .'"style="color:#061c34;margin-top:8px;font-weight:bold;">' .$insertString .'</a>';
                echo '</div>';
            }
            
        echo '</div>';
    }

?>