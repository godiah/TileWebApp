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
    <title>Cart Details</title>
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
    .cart_img{
        width: 80px;
        height: 80px;
        object-fit: contain;
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
    <a href='../users/sign_in.php' style='text-decoration: none; color: black;'>
        <span class='material-icons-outlined'>login</span>
    </a>
    ";
}else{
    echo "
    <a href='../users/sign_out.php' style='text-decoration: none; color: black;'>
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
          <a class="nav-link" href="about_us.php">About Us</a>
        </li>    
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>
            <sup><?php cart_item_number();?></sup>  
          </a>
        </li>      
       </ul>
    </div>
  </div>
</nav>
</div>

<?php 
cart();
?>

<!-- Cart Details Table -->
<div class="container">
    <div class="row">
        <form action="" method="post" >
        <table class="table table-bordered text-center" style="border-radius: 15px;" >
            
            <tbody>
                <!-- Dynamic Data -->
                <?php
                    global $con;
                    $total_price=0;
                    $ip = getIPAddress();
                    $cart_query = "Select * from  `cart_details` where ip_address='$ip'";
                    $result = mysqli_query($con,$cart_query);
                    $result_count=mysqli_num_rows($result);
                    if($result_count>0){
                        echo "
                        <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan='2'>Operations</th>
                </tr>
            </thead>";
                    while($row=mysqli_fetch_array($result)){
                        $product_id=$row['product_id'];
                        $select_product="Select * from  `tileproducts` where product_id='$product_id'";
                        $result_product = mysqli_query($con,$select_product);
                        while($row_price=mysqli_fetch_array($result_product)){
                            $product_price = array($row_price['price']);
                            $price_table = $row_price['price'];
                            $product_title = $row_price['product_title'];
                            $product_image1 = $row_price['image1'];
                            $product_sum = array_sum($product_price);                            
                            $total_price+=$product_sum;
              
                ?>
                <tr >
                    <td ><?php echo $product_title ?></td>
                    <td><img src="admin/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                    <td><input type="text" name="quantity" id="qty" class="form-input w-50" autocomplete="off"></td>
                    <?php
                        $ip = getIPAddress();
                        if(isset($_POST['update_cart'])){
                            $qty=$_POST['quantity'];
                            $update_cart="Update `cart_details` set quantity=$qty where ip_address='$ip'";
                            $result_cart = mysqli_query($con,$update_cart);
                            $total_price=$total_price*$qty;
                        }
                    ?>
                    <td>Ksh. <?php echo$price_table ?>/=</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                    <td  class="text-center">
                        <!-- <button class="bg-primary px-3 py-2 mx-2  text-white border-0" style="border-radius: 5px; ">Update</button> -->
                        <input type="submit" value="Update Quantity" name="update_cart"
                        class="bg-primary px-3 py-2 mx-2  text-white border-0" style="border-radius: 5px; ">
                        <!-- <button class="bg-danger px-3 py-2 mx-2  text-white border-0" style="border-radius: 5px; ">Remove</button> -->
                        <input type="submit" value="Remove Product" name="remove"
                        class="bg-danger px-3 py-2 mx-2  text-white border-0" style="border-radius: 5px; ">
                    </td>
                </tr>
                <?php
                      }
                    }
                }else{
                   echo "<h2 class='text-center text-danger'>Cart is empty!</h2>
                   
                   "; 
                }
                ?>
            </tbody>
        </table>
        <!-- Sub Total -->
        <div class="d-flex" style="display: flex; justify-content: space-between;" >
        <?php
            $ip = getIPAddress();
            $cart_query = "Select * from  `cart_details` where ip_address='$ip'";
            $result = mysqli_query($con,$cart_query);
            $result_count=mysqli_num_rows($result);
            if($result_count>0){
                echo "
                <div>
            <h4 class='px-3 '>Subtotal: <strong style='color: #49111c;'>Ksh. $total_price/=</strong> </h4>
            </div>
            <div>
            <input type='submit' value='Continue Shopping' name='continue_shopping' class='bg-primary px-3 py-2 mx-2  text-white border-0' style='border-radius: 5px; '>
            <button class='bg-success px-3 py-2 border-0' style='border-radius: 5px; background-color: #49111c;'>
            <a href='./users/checkout.php' class='text-white text-decoration-none'>Checkout</a></button>
            </div>
                ";
            }else{
                echo "
                <input type='submit' value='Continue Shopping' name='continue_shopping' class='bg-primary px-3 py-2 mx-2  text-white border-0' style='border-radius: 5px; '>
                ";
            }
            if(isset($_POST['continue_shopping'])){
                echo "<script>window.open('index.php','_self')</script>";
            }

        ?>
            
        </div>
        
    </div>
    
</div></form>
<!-- Remove Item Function -->
<?php
    function removeItem(){
        global $con;
        if(isset($_POST['remove'])){
            foreach($_POST['removeitem'] as $remove_id);
            echo $remove_id;
            $delete_query= "Delete  from `cart_details` where product_id=$remove_id";
            $run_delete=mysqli_query($con,$delete_query);
            if($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
    echo $remove_item=  removeItem();
?>





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