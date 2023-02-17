<!-- Connect to dB -->
<?php 
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  $_SESSION['username'] ?></title>
    <link rel="icon" type="image/x-icon" href="../Images/signup.ico">
    <!-- Bootstrap/CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="../styles.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet"> 
</head>
<style>
    body{
        overflow-x: hidden;
    }
    nav{
    border-radius: 1px 15px 1px 15px;
    }
    #login_section{
    background-color: white;
    display:flex;
    justify-content: end;       
    }
    #welcome{
    margin-right: 13px;
    font-size: 13px;
    font-weight: 700;
    }
    .material-icons-outlined{
    vertical-align: middle;
    line-height: 3px;
    margin-top: 1px;
    margin-right: 8px;
    transition: all 0.3s;     
    }
    /* Profile SideBar */
    .sidebar-list{
    margin: 3px;
    padding: 0;    
    list-style-type: none; 
    font-weight: 900;
    color: #49111c;   
    }
    .sidebar-list-item{
    padding: 3px;
    margin: 3px;
    margin-left: 0;
    text-align: center;
    }
    .sidebar-list-item:hover{
    cursor: pointer;
    background-color: rgba(255, 255, 255, 0.2);    
    }
    .sidebar-list a{
    text-decoration: none;
    color: #49111c;  
    }
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
  border-radius: 50%;
  margin-bottom: 5px;
    }
    #layout{
    background-color: #FCEDDA;
    padding: 10px;
    border-radius: 15px;
    min-height: 100%;
    }
    .row{
    margin-left: 5px;
    }
    .edit_img{
        width: 100px;
        height: 100px;
        object-fit: contain;
        border-radius: 50%;
    } 
    #label_{
        text-align: left !important;
    }  
</style>
<body>
<!-- Log in -->
<div id="login_section">
    <?php
    if(!isset($_SESSION['username'])){
    echo "
    <h5 id='welcome'>Guest</h5>
    ";
    }else{
    echo "
    <h5 id='welcome'>".$_SESSION['username']."</h5>
    ";
    }

    if(!isset($_SESSION['username'])){
    echo "
    <a href='sign_in.php' style='text-decoration: none; color: black;'>
        <span class='material-icons-outlined'>login</span>
    </a>
    ";
    }else{
    echo "
    <a href='sign_out.php' style='text-decoration: none; color: black;'>
        <span class='material-icons-outlined'>logout</span>
    </a>
    ";
    }
    ?>
</div>

<!-- Navigation Bar -->
<div class="container-fluid p-0 mb-1">
    <nav class="navbar navbar-expand-lg" style="background-color: #FCEDDA;">
    <div class="container-fluid">
        <div class="logo">
        <img src="../Images/logo.png" alt="Logo Image" id="logo_img">
        <a href="../index.php" style="margin:auto">
            <h1>Professional Tile Solutions</h1>
        </a>
        </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../all_products.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../about_us.php">About Us</a>
        </li>    
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i>
            <sup><?php cart_item_number();?></sup>  
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_price();?></a>
        </li>      
       </ul>
      <form class="d-flex" role="search" id="searchform" action="../searchproduct.php" method="get">        
        <input class="form-control me-2" type="search" id="searchbar" 
        placeholder="Search" aria-label="Search" name="search_data">        
        <button class="btn btn-outline-light" type="submit" id="searchBtn" name="search_data_product">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>
    </div>
    </div>
    </nav>
</div>
<?php cart(); ?>

<!-- Profile Panel -->
<div class="row mb-1" style="height: 100vh;">
    <div class="col-md-2 p-0">
        <div id="layout">
            <ul class="sidebar-list">    
                <a href="#">
                    <li class="sidebar-list-item text-center"><h4>My Profile</h4></li>
                </a>
                    <!--Accessing User Profile Image  -->
                    <?php
                    $user =  $_SESSION['username'];
                    $profile_img = "Select * from `users` where username = '$user'";
                    $profile_img = mysqli_query($con,$profile_img);
                    $fetch_img = mysqli_fetch_array($profile_img);
                    $profile_img = $fetch_img['user_image']; 
                    echo "
                    <a href='#'>
                    <img src='users_profiles/$profile_img' alt='Profile Picture' 
                    class='center' 
                    style='border: 3px solid #49111c;'>
                    </a>
                    ";
                    ?>                
                <a href="profile.php">
                    <li class="sidebar-list-item"><span class="material-icons-outlined">inventory</span>Pending Orders</li>  
                </a> 
                <a href="profile.php?my_orders">
                    <li class="sidebar-list-item "><span class="material-icons-outlined">favorite_border</span>My Orders</li> 
                </a>                 
                <a href="profile.php?my_wishlist">
                    <li class="sidebar-list-item"><span class="material-icons-outlined">loyalty</span>My Wishlist</li>
                </a>
                <a href="profile.php?coupons">
                    <li class="sidebar-list-item"><span class="material-icons-outlined">card_giftcard</span>Coupons</li>
                </a>
                <a href="profile.php?edit_account">
                    <li class="sidebar-list-item"><span class="material-icons-outlined">edit</span>Edit My Account</li>
                </a>
                <a href="profile.php?delete_account">
                    <li class="sidebar-list-item"><span class="material-icons-outlined">delete</span>Delete My Account</li>
                </a>   
            </ul>
        </div> 
    </div>
    <div class="col-md-10" >
        <?php
        // Pending Orders Function 
        pending_order_details();
        // Edit User Account
        if(isset($_GET['edit_account'])){
            include ('edit_account.php');
        }
        // User Orders
        if(isset($_GET['my_orders'])){
            include ('my_orders.php');
        } 
        
        ?>
    </div>
</div>

<!-- Footer -->
<footer class="sticky-footer">
    <p>
        Copyright &copy;, All rights,reserved  <br>
        Designed by Mugunieri <br>
        2023
    </p>
</footer>

<!-- JavaScript -->
<script src="../Js/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>