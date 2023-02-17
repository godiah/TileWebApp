<!-- Connect to dB -->
<?php 
include('includes/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheckOut</title>
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
    /* #searchbar{
        border-radius: 25%;
    } */
    
    
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
          <a class="nav-link" href="#">About Us</a>
        </li>          
       </ul>
    </div>
  </div>
</nav>
</div>

<div class="row px-1">
    <div class="col-md-12">
        <div class="row">
            <?php
                if(!isset($_SESSION['username'])){
                        // include('./users/sign_in.php');
                        echo "<script>window.open('sign_in.php','_self')</script>";           
                }else{
                    echo "<script>window.open('payment.php','_self')</script>";
                }
            ?>
        </div>

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

<?php
//Sessions()
// 
// session_start();
// //Session Variables
// $_SESSION['username']="Godiah";
// $_SESSION['password']="Godiah";
// echo"Data saved";

//Getting Session Variables
// 
// session_start();
// if(isset($_SESSION['username'])){
// echo "Welcome".$_SESSION['username'];
// echo "and password is".$_SESSION['password'];
// }else{
//     echo "Log In";
// }

//Log Out
// 
// session_start();
// session_unset();
// session_destroy();
?>