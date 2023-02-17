<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tile Color Form</title>
  <!-- Font Family -->
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <!-- Bootstrap/CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="../styles.css" rel="stylesheet">
    <link href="./styles_admin.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet"> 
</head>
<style>
  body{
    background-color: white;
    color: black;
  }
  .row{
    margin-top: 30px;
  }
</style>
<body>

<?php
include('../includes/connect.php');
if(isset($_POST['insert_color'])){
  $color_tile = $_POST['color_tile'];

  //select data from dB
  $select_query = "Select * from `tileColors` where color_tile='$color_tile'";
  $result_select = mysqli_query($con,$select_query);
  $number=mysqli_num_rows( $result_select);
  if($number>0){
    echo "<script>alert('Tile color already exists')</script>";
    
  }else{
    $insert_query = "insert into `tileColors` (color_tile) values ('$color_tile')";
    $result = mysqli_query($con,$insert_query);
    if($result){
      echo "<script>alert('Tile color has been added successfully')</script>";
    }
  }  
}
?>


  <!-- Tile Color Form -->
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <h1 class="text-center">Insert Tile Color Form</h1>
  <form action="" method="post">
    <div class="input-group mb-3 w-90">
  <span class="input-group-text"><i class="fa-solid fa-receipt"></i></span>
  <div class="form-floating">
  <input type="text" class="form-control" name="color_tile" id="floatingInputGroup1" placeholder="Insert Color">    
  </div>
    </div>
  <div class="input-group mb-3 w-10" style="width: 350px; height: 50px; text-align: center; margin-left: 155px;"> 
  <div class="form-floating">
    <input type="submit" class="form-control bg-success text-white" name="insert_color" id="floatingInputGroup1" value="Insert Tile Color">    
  </div>
  </div>
  </form>
  </div>
  <div class="col-md-3"></div>
</div>

<!-- Footer -->
<footer class="sticky-footer">
    <p>
        Copyright &copy;, All rights,reserved  <br>
        Designed by Mugunieri <br>
        2023
    </p>
</footer>
</body>
</html>
