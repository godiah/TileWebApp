<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_application = $_POST['product_application'];   
    $product_material = $_POST['product_material'];
    $product_shape = $_POST['product_shape'];
    $product_color = $_POST['product_color'];
    $product_price = $_POST['product_price'];
    $status= 'true';
    //Accessing Images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
    //Accessing Image Temporary Name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];   

    //Checking all fields entered
    if($product_title=='' or $product_description=='' or $product_keywords=='' or
    $product_application=='' or $product_material=='' or $product_shape=='' or 
    $product_color=='' or $product_price=='' or $product_image1==''){
        echo "<script>Kindly fill all the fields</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        //Insert Products
        $insert_product = "insert into `tileproducts`
        (product_title,product_description,product_keywords,application_id,
        material_id,shape_id,color_id,image1,image2,image3,price,date,status)
        values ('$product_title','$product_description','$product_keywords',
        '$product_application','$product_material','$product_shape',
        '$product_color','$product_image1','$product_image2','$product_image3',
        '$product_price',NOW(),'$status')";
        //Execute Query    
        $result_query = mysqli_query($con,$insert_product);
        if($result_query){
            echo "<script>alert('Product added succesfully')</script>";
        }
    }  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
     <!-- Font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <!-- Bootstrap/CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">    
    <!-- <link href="./styles_admin.css" rel="stylesheet"> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet"> 
    <style>
        body{
            /* font-family: 'Poppins', sans-serif; */
            background-color: #e6e8ed;
        }
        
        #product_title{
            outline: #e6e8ed;
        }
    </style>
</head>
<body>
 <!-- Products Form -->
 <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">

    <div class="container mt-3">
    <h1 class="text-center">
        Insert Product
    </h1>
    <!-- Form -->
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Title -->
       <div class="form-outline mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" class="form-control" 
            placeholder="Enter Product Title" autocomplete="off" required="required">       
        </div> 
        <!-- Description -->
        <div class="form-outline mb-4">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" name="product_description" id="product_description" class="form-control" 
            placeholder="Enter product Description" autocomplete="off" required="required">       
        </div>
        <!-- Keywords -->
        <div class="form-outline mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" name="product_keywords" id="product_keywords" class="form-control" 
            placeholder="Enter product Keywords" autocomplete="off" required="required">       
        </div>
        <!-- Applications -->
        <div class="form-outline mb-4">
            <select name="product_application" id="" class="form-select">
                <option value="">Select Application</option>
                <!-- Fetching Data from dB -->
                <?php
                    $select_query="Select * from `tileApplications`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $application_title=$row['application_title'];
                        $application_id=$row['application_id'];
                        echo "<option value='$application_id'>$application_title</option>";
                    }
                ?>  
            </select>
        </div>
        <!-- Material -->
        <div class="form-outline mb-4">
            <select name="product_material" id="" class="form-select">
                <option value="">Select Material</option>
                <!-- Fetching Data from dB -->
                <?php
                    $select_query="Select * from `tilematerial`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $material_title=$row['material_tile'];
                        $material_id=$row['material_id'];
                        echo "<option value='$material_id'>$material_title</option>";
                    }
                ?>                 
            </select>
        </div>
         <!-- Shape&Size -->
         <div class="form-outline mb-4">
            <select name="product_shape" id="" class="form-select">
                <option value="">Select Shape&Size</option>
               <!-- Fetching Data from dB -->
               <?php
                    $select_query="Select * from `tileShapes&Sizes`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $shape_tile=$row['shape_tile'];
                        $shape_id=$row['shape_id'];
                        echo "<option value='$shape_id'>$shape_tile</option>";
                    }
                ?>                  
            </select>
        </div>
         <!-- Color -->
         <div class="form-outline mb-4">
            <select name="product_color" id="" class="form-select">
                <option value="">Select Color</option>
                <!-- Fetching Data from dB -->
               <?php
                    $select_query="Select * from `tileColors`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $color_tile=$row['color_tile'];
                        $color_id=$row['color_id'];
                        echo "<option value='$color_id'>$color_tile</option>";
                    }
                ?>                
            </select>
        </div>
        <!-- Product Image 1 -->
        <div class="form-outline mb-4">
            <label for="product_image1" class="form-label">Product Image 1</label>
            <input type="file" name="product_image1" id="product_image1" class="form-control" 
             required="required">       
        </div>
        <!-- Product Image 2 -->
        <div class="form-outline mb-4">
            <label for="product_image2" class="form-label">Product Image 2</label>
            <input type="file" name="product_image2" id="product_image2" class="form-control">       
        </div>
        <!-- Product Image 3 -->
        <div class="form-outline mb-4">
            <label for="product_image3" class="form-label">Product Image 3</label>
            <input type="file" name="product_image3" id="product_image3" class="form-control">       
        </div>
        <!-- Price -->
        <div class="form-outline mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" id="product_price" class="form-control" 
            placeholder="Enter product Price" autocomplete="off" required="required">       
        </div>
        <!-- Submit Button -->
        <div class="form-outline mb-4">            
           <input type="submit" name="insert_product" 
           class="btn btn-success mb-3 px-3"
           value="Insert Product">
        </div>
    </form>

 </div>

    </div>
    <div class="col-md-3"></div>
 </div>

<!-- JavaScript -->
<script src="Js/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="../Js/script_admin.js"></script>
</body>
</html>