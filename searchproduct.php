<!-- Connect to dB -->
<?php 
include('includes/connect.php');
include('functions/common_functions.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Tiles Solution</title>
    <link rel="icon" type="image/x-icon" href="Images/faveicon.ico.png">
    <!-- Bootstrap/CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet"> 
</head>
<style>
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
    margin-top: 5px;
    margin-right: 8px;
    transition: all 0.3s;     
    }
    .material-icons-outlined:hover{
        transform: scale(1.1);
    }
    
    
</style>
<body>
<!-- Log in -->
<div id="login_section">
<?php
if(!isset($_SESSION['username'])){
    echo "
    <h5 id='welcome'>Welcome Guest</h5>
    ";
}else{
    echo "
    <h5 id='welcome'>Welcome ".$_SESSION['username']."</h5>
    ";
}

if(!isset($_SESSION['username'])){
    echo "
    <a href='./users/sign_in.php' style='text-decoration: none; color: black;'>
        <span class='material-icons-outlined'>login</span>
    </a>
    ";
}else{
    echo "
    <a href='./users/sign_out.php' style='text-decoration: none; color: black;'>
        <span class='material-icons-outlined'>logout</span>
    </a>
    ";
}
?>
</div>

<!-- Navigation Bar -->
<div class="container-fluid p-0 mb-4">
<nav class="navbar navbar-expand-lg" style="background-color: #FCEDDA;">
  <div class="container-fluid">
    <div class="logo">
        <img src="./Images/logo.png" alt="Logo Image" id="logo_img">
        <a href="index.php" style="margin:auto">
            <h1>Professional Tile Solutions</h1>
        </a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="all_products.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>    
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>
          <sup><?php cart_item_number();?></sup> 
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_price();?></a>
        </li>      
       </ul>
      <form class="d-flex" role="search" id="searchform"
      action="" method="get">        
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
<?php 
cart();
?>

<!-- Products & SideBar -->
<div class="row">
    <!-- Products -->
    <div class="col-md-9">
        <div class="container">
        <div class="row px-1">
            <!-- Fetching Products -->
            <?php
            //Calling Functions
            searchproduct();
            getuniqueapplications();
            getuniquematerials();
            getuniqueshapes();
            getuniquecolors();
            ?>                     
        </div>
    </div>
    </div>
    <!-- SideBar -->    
    <div class="col-md-3 p-0" style="background-color: #FCEDDA; ">
    <!-- Applications -->
    <ul class="navbar-nav me-auto" id="sidebartitle">
        <li class="nav-items-title">
            <a href="#" class="nav-links"><h4>Applications</h4></a>
        </li>
    <?php
    //Calling Function
    getapplication();
    ?>   
    </ul>
    <!-- Materials -->
    <ul class="navbar-nav me-auto" id="sidebartitle">
        <li class="nav-items-title">
            <a href="#" class="nav-links"><h4>Materials</h4></a>
        </li>
        <?php
            getmaterial();
        ?>
    </ul>
       
    <!-- Shapes & Sizes -->
    <ul class="navbar-nav me-auto" id="sidebartitle">
        <li class="nav-items-title">
            <a href="#" class="nav-links"><h4>Shapes & Sizes</h4></a>
        </li>
        <?php
            getshape();
        ?>        
    </ul>

     <!-- Colors -->
     <ul class="navbar-nav me-auto" id="sidebartitle">
        <li class="nav-items-title">
            <a href="#" class="nav-links"><h4>Colors</h4></a>
        </li>
        <?php
            getcolor();
        ?>        
    </ul>
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
<script src="Js/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>