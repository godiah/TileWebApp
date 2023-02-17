<?php
//include dB connection
// include('./includes/connect.php');

//getting products
function getproducts(){
    global $con;
    //condition checking isset or not
     if(!isset($_GET['application'])){
     if(!isset($_GET['material'])){     
     if(!isset($_GET['shape'])){     
     if(!isset($_GET['color'])){     
    $select_query = "Select * from `tileproducts` order by rand() limit 0,9";
    $result_query = mysqli_query($con,$select_query);
    while($row = mysqli_fetch_assoc($result_query)){
        $id = $row['product_id'];
        $title = $row['product_title'];
        $description= $row['product_description'];
        $application = $row['application_id'];
        $material = $row['material_id'];
        $shape = $row['shape_id'];
        $color = $row['color_id'];
        $image = $row['image1'];
        $price = $row['price'];
        echo "<div class='col-md-4 mb-3'>
        <div class='card'>
            <img src='./admin/product_images/$image' class='card-img-top' alt='$title'>
                <div class='card-body'>
                    <h5 class='card-title'>$title</h5>
                    <p class='card-text'>$description</p>
                    <p class='card-text'>ksh. $price/= </p>
                    <a href='index.php?add_to_cart=$id' class='btn btn-primary'>Add To Cart</a>
                    <a href='product_details.php?product_id=$id' class='btn btn-secondary'>View More</a>                            
                </div>
        </div>
    </div>  ";
    }    
}
}
}
}
}

//Displaying All Products in the Inventory
function getallproducts(){
    global $con;
    //condition checking isset or not
     if(!isset($_GET['application'])){
     if(!isset($_GET['material'])){     
     if(!isset($_GET['shape'])){     
     if(!isset($_GET['color'])){     
    $select_query = "Select * from `tileproducts` order by rand()";
    $result_query = mysqli_query($con,$select_query);
    while($row = mysqli_fetch_assoc($result_query)){
        $id = $row['product_id'];
        $title = $row['product_title'];
        $description= $row['product_description'];
        $application = $row['application_id'];
        $material = $row['material_id'];
        $shape = $row['shape_id'];
        $color = $row['color_id'];
        $image = $row['image1'];
        $price = $row['price'];
        echo "<div class='col-md-4 mb-3'>
        <div class='card'>
            <img src='./admin/product_images/$image' class='card-img-top' alt='$title'>
                <div class='card-body'>
                    <h5 class='card-title'>$title</h5>
                    <p class='card-text'>$description</p>
                    <p class='card-text'>ksh. $price/= </p>
                    <a href='index.php?add_to_cart=$id' class='btn btn-primary'>Add To Cart</a>
                    <a href='product_details.php?product_id=$id' class='btn btn-secondary'>View More</a>                            
                </div>
        </div>
    </div>  ";
    }    
}
}
}
}
}



//Getting Unique Applications
function getuniqueapplications(){
    global $con;
    //condition checking isset or not
     if(isset($_GET['application'])){
    $application_id = $_GET['application'];         
    $select_query = "Select * from `tileproducts` where application_id = $application_id";
    $result_query = mysqli_query($con,$select_query);
    $num_rows = mysqli_num_rows($result_query);
    if($num_rows==0){
        echo "<h2 class='text-center text-danger'>Product is out of stock</h2>";
    }
    while($row = mysqli_fetch_assoc($result_query)){
        $id = $row['product_id'];
        $title = $row['product_title'];
        $description= $row['product_description'];
        $application = $row['application_id'];
        $material = $row['material_id'];
        $shape = $row['shape_id'];
        $color = $row['color_id'];
        $image = $row['image1'];
        $price = $row['price'];
        echo "<div class='col-md-4 mb-3'>
        <div class='card'>
            <img src='./admin/product_images/$image' class='card-img-top' alt='$title'>
                <div class='card-body'>
                    <h5 class='card-title'>$title</h5>
                    <p class='card-text'>$description</p>
                    <p class='card-text'>ksh. $price/= </p>
                    <a href='index.php?add_to_cart=$id' class='btn btn-primary'>Add To Cart</a>
                    <a href='product_details.php?product_id=$id' class='btn btn-secondary'>View More</a>                            
                </div>
        </div>
    </div>  ";
    }    
}
}

//Displaying Tile Applications in Side Nav
function getapplication(){
    global $con;
    $select_application = "Select * from `tileApplications`";
        $result_application = mysqli_query($con,$select_application);  
        while($row_data = mysqli_fetch_assoc($result_application)){
        $application_title = $row_data['application_title'];
        $application_id = $row_data['application_id'];
        echo "<li class='nav-items'>
        <a href='index.php?application= $application_id' class='nav-links text-dark'>$application_title</a></li>";        
       }
}

//Displaying Tile Materials in Side Nav
function getmaterial(){
    global $con;
    $select_material = "Select * from `tilematerial`";
            $result_material = mysqli_query($con,$select_material);  
            while($row_data = mysqli_fetch_assoc($result_material)){
            $material_title = $row_data['material_tile'];
            $material_id = $row_data['material_id'];
            echo "<li class='nav-items'>
            <a href='index.php?material= $material_id' class='nav-links text-dark'>$material_title</a></li>";        
            }
}

//Getting Unique Materials
function getuniquematerials(){
    global $con;
    //condition checking isset or not
     if(isset($_GET['material'])){
    $material_id = $_GET['material'];         
    $select_query = "Select * from `tileproducts` where material_id = $material_id";
    $result_query = mysqli_query($con,$select_query);
    $num_rows = mysqli_num_rows($result_query);
    if($num_rows==0){
        echo "<h2 class='text-center text-danger'>Product is out of stock</h2>";
    }
    while($row = mysqli_fetch_assoc($result_query)){
        $id = $row['product_id'];
        $title = $row['product_title'];
        $description= $row['product_description'];
        $application = $row['application_id'];
        $material = $row['material_id'];
        $shape = $row['shape_id'];
        $color = $row['color_id'];
        $image = $row['image1'];
        $price = $row['price'];
        echo "<div class='col-md-4 mb-3'>
        <div class='card'>
            <img src='./admin/product_images/$image' class='card-img-top' alt='$title'>
                <div class='card-body'>
                    <h5 class='card-title'>$title</h5>
                    <p class='card-text'>$description</p>
                    <p class='card-text'>ksh. $price/= </p>
                    <a href='index.php?add_to_cart=$id' class='btn btn-primary'>Add To Cart</a>
                    <a href='product_details.php?product_id=$id' class='btn btn-secondary'>View More</a>                            
                </div>
        </div>
    </div>  ";
    }    
}
}

//Displaying Tile Shapes&Sizes in Side Nav
function getshape(){
    global $con;
    $select_shape = "Select * from `tileShapes&Sizes`";
    $result_shape = mysqli_query($con,$select_shape);  
    while($row_data = mysqli_fetch_assoc($result_shape)){
    $shape_tile = $row_data['shape_tile'];
    $shape_id = $row_data['shape_id'];
    echo "<li class='nav-items'>
    <a href='index.php?shape= $shape_id' class='nav-links text-dark'>$shape_tile</a></li>";        
    }
}

//Getting Unique Shapes&Sizez
function getuniqueshapes(){
    global $con;
    //condition checking isset or not
     if(isset($_GET['shape'])){
    $shape_id = $_GET['shape'];         
    $select_query = "Select * from `tileproducts` where shape_id = $shape_id";
    $result_query = mysqli_query($con,$select_query);
    $num_rows = mysqli_num_rows($result_query);
    if($num_rows==0){
        echo "<h2 class='text-center text-danger'>Product is out of stock</h2>";
    }
    while($row = mysqli_fetch_assoc($result_query)){
        $id = $row['product_id'];
        $title = $row['product_title'];
        $description= $row['product_description'];
        $application = $row['application_id'];
        $material = $row['material_id'];
        $shape = $row['shape_id'];
        $color = $row['color_id'];
        $image = $row['image1'];
        $price = $row['price'];
        echo "<div class='col-md-4 mb-3'>
        <div class='card'>
            <img src='./admin/product_images/$image' class='card-img-top' alt='$title'>
                <div class='card-body'>
                    <h5 class='card-title'>$title</h5>
                    <p class='card-text'>$description</p>
                    <p class='card-text'>ksh. $price/= </p>
                    <a href='index.php?add_to_cart=$id' class='btn btn-primary'>Add To Cart</a>
                    <a href='product_details.php?product_id=$id' class='btn btn-secondary'>View More</a>                            
                </div>
        </div>
    </div>  ";
    }    
}
}

//Displaying Tile Colors in Side Nav
function getcolor(){
    global $con;
    $select_color = "Select * from `tileColors`";
            $result_color = mysqli_query($con,$select_color);  
            while($row_data = mysqli_fetch_assoc($result_color)){
            $color_tile = $row_data['color_tile'];
            $color_id = $row_data['color_id'];
            echo "<li class='nav-items'>
            <a href='index.php?color= $color_id' class='nav-links text-dark'>$color_tile</a></li>";        
            }
}

//Getting Unique Colors
function getuniquecolors(){
    global $con;
    //condition checking isset or not
     if(isset($_GET['color'])){
    $color_id = $_GET['color'];         
    $select_query = "Select * from `tileproducts` where color_id = $color_id";
    $result_query = mysqli_query($con,$select_query);
    $num_rows = mysqli_num_rows($result_query);
    if($num_rows==0){
        echo "<h2 class='text-center text-danger'>Product is out of stock</h2>";
    }
    while($row = mysqli_fetch_assoc($result_query)){
        $id = $row['product_id'];
        $title = $row['product_title'];
        $description= $row['product_description'];
        $application = $row['application_id'];
        $material = $row['material_id'];
        $shape = $row['shape_id'];
        $color = $row['color_id'];
        $image = $row['image1'];
        $price = $row['price'];
        echo "<div class='col-md-4 mb-3'>
        <div class='card'>
            <img src='./admin/product_images/$image' class='card-img-top' alt='$title'>
                <div class='card-body'>
                    <h5 class='card-title'>$title</h5>
                    <p class='card-text'>$description</p>
                    <p class='card-text'>ksh. $price/= </p>
                    <a href='index.php?add_to_cart=$id' class='btn btn-primary'>Add To Cart</a>
                    <a href='product_details.php?product_id=$id' class='btn btn-secondary'>View More</a>                            
                </div>
        </div>
    </div>  ";
    }    
}
}

//Searching Products
function searchproduct(){
        global $con; 
        if(isset($_GET['search_data_product'])){  
        $search_value = $_GET['search_data']; 
        $search_query = "Select * from `tileproducts` where product_keywords like
         '%$search_value%'";
        $result_query = mysqli_query($con,$search_query);
        $num_rows = mysqli_num_rows($result_query);
        if($num_rows==0){
            echo "<h2 class='text-center text-danger'>Product is out of stock or unavailable</h2>";
        }
        while($row = mysqli_fetch_assoc($result_query)){
            $id = $row['product_id'];
            $title = $row['product_title'];
            $description= $row['product_description'];
            $application = $row['application_id'];
            $material = $row['material_id'];
            $shape = $row['shape_id'];
            $color = $row['color_id'];
            $image = $row['image1'];
            $price = $row['price'];
            echo "<div class='col-md-4 mb-3'>
            <div class='card'>
                <img src='./admin/product_images/$image' class='card-img-top' alt='$title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$title</h5>
                        <p class='card-text'>$description</p>
                        <p class='card-text'>ksh. $price/= </p>
                        <a href='index.php?add_to_cart=$id' class='btn btn-primary'>Add To Cart</a>
                        <a href='product_details.php?product_id=$id' class='btn btn-secondary'>View More</a>                            
                    </div>
            </div>
        </div>  ";
        }  
    }  
    }

//View Details
function viewdetails(){
    global $con;
    //condition checking isset or not
     if(isset($_GET['product_id'])){   
     if(!isset($_GET['application'])){
     if(!isset($_GET['material'])){     
     if(!isset($_GET['shape'])){     
     if(!isset($_GET['color'])){ 
        $product_id = $_GET['product_id'];    
    $select_query = "Select * from `tileproducts` where product_id=$product_id ";
    $result_query = mysqli_query($con,$select_query);
    while($row = mysqli_fetch_assoc($result_query)){
        $id = $row['product_id'];
        $title = $row['product_title'];
        $description= $row['product_description'];
        $application = $row['application_id'];
        $material = $row['material_id'];
        $shape = $row['shape_id'];
        $color = $row['color_id'];
        $image1 = $row['image1'];
        $image2 = $row['image2'];
        $image3 = $row['image3'];
        $price = $row['price'];
        echo "<div class='col-md-4 mb-3'>
        <div class='card'>
            <img src='./admin/product_images/$image1' class='card-img-top' alt='$title'>
                <div class='card-body'>
                    <h5 class='card-title'>$title</h5>
                    <p class='card-text'>$description</p>
                    <p class='card-text'>ksh. $price/= </p>
                    <a href='index.php?add_to_cart=$id' class='btn btn-primary'>Add To Cart</a>
                    <a href='index.php' class='btn btn-secondary'>Home</a>                            
                </div>
        </div>
    </div>
    <div class='col-md-8'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h4 class='text-center text-info mb-4'>Related Products</h4>
                    </div>
                    <div class='col-md-6'>
                    <img src='./admin/product_images/$image2' class='card-img-top' alt='$title'>
                    </div>
                    <div class='col-md-6'>
                    <img src='./admin/product_images/$image3' class='card-img-top' alt='$title'>
                    </div>
                </div>
            </div>
    ";
    }    
}
}
}
}
}
}

//IP Address
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;

//Cart Function
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "Select * from `cart_details` where ip_address='$ip' and
        product_id=$get_product_id";
        $result_query = mysqli_query($con,$select_query);
        $num_rows = mysqli_num_rows($result_query);
        if($num_rows>0){
            echo "<script>alert('Product already added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }else{
            $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values 
            ($get_product_id,'$ip',0)";
            $result_query = mysqli_query($con,$insert_query);
            echo "<script>alert('Product added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";

        }
    }
}

//Cart Items Number
function cart_item_number(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip = getIPAddress();
        $select_query = "Select * from `cart_details` where ip_address='$ip'";
        $result_query = mysqli_query($con,$select_query);
        $cart_items = mysqli_num_rows($result_query);
        }else{
        global $con;
        $ip = getIPAddress();
        $select_query = "Select * from `cart_details` where ip_address='$ip'";
        $result_query = mysqli_query($con,$select_query);
        $cart_items = mysqli_num_rows($result_query);
        }
        echo "$cart_items";
    }

//Total Price
function total_price(){
    global $con;
    $total_price=0;
    $ip = getIPAddress();
    $cart_query = "Select * from  `cart_details` where ip_address='$ip'";
    $result = mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_product="Select * from  `tileproducts` where product_id='$product_id'";
        $result_product = mysqli_query($con,$select_product);
        while($row_price=mysqli_fetch_array($result_product)){
            $product_price = array($row_price['price']);
            $product_sum = array_sum($product_price);
            $total_price+=$product_sum;
    }
}
    echo"$total_price";
}

//Get User Order Details
function pending_order_details(){
    global $con;
    $user =  $_SESSION['username'];
    $user_details = "Select * from  `users` where username = '$user'";
    $result_user = mysqli_query($con,$user_details);
    while($row_query=mysqli_fetch_array($result_user)){
        $user_id = $row_query['user_id'];
        if(!isset($_GET['my_orders'])){
            if(!isset($_GET['my_wishlist'])){
                if(!isset($_GET['coupons'])){
                    if(!isset($_GET['edit_account'])){
                        if(!isset($_GET['delete_account'])){
                            $get_pendingOrders = "Select * from  `users_orders` where user_id = '$user_id'
                            and order_status = 'pending'";
                            $result_pendingOrders = mysqli_query($con,$get_pendingOrders);
                            $pending_orders = mysqli_num_rows($result_pendingOrders);
                            if($pending_orders>0){
                                echo "
                                <h3 class='text-center mt-5'>You have <span class='text-danger'> $pending_orders </span> pending orders</h3>
                                <p class='text-center'><a href='profile.php?my_orders' 
                                style='color:#49111c;text-decoration:none;font-size:22px;'>Order Details</a></p>";                                
                            }else{
                                echo "<h3 class='text-center'>No Pending Orders</h3>
                                <a href='../index.php'>Explore Produts</a>";
                            }
                        }
                    }
                }
            }
        }
    }
}

?>