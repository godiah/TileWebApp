<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap/CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles_users.css">
    <!-- <link rel="stylesheet" href="../assets/css/demo.css"> -->
    <link rel="stylesheet" href="../assets/css/intlTelInput.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">     
    <title>Sign Up</title>
    <link rel="icon" type="image/x-icon" href="../Images/signin.png">
    
</head>
<body>
    <!-- Registering Users -->
    <?php
        if(isset($_POST['btn-signup'])){
            $ip = getIPAddress();
            $user = $_POST['user_username'];
            $email = $_POST['useremail'];
            $password = $_POST['userpassword'];            
            $cfmpassword = $_POST['confrim_password']; 
            $hashpassword = password_hash($password,PASSWORD_DEFAULT);         
            $address = $_POST['useraddress'];
            $mobile = $_POST['usermobile'];

            //profile Picture
            $profilepic = $_FILES['userprofile']['name'];
            $tempprofilepic = $_FILES['userprofile']['tmp_name'];
            move_uploaded_file($tempprofilepic,"./users_profiles/$profilepic");

            //Select Query
            $select_user = "Select * from `users` where username = '$user' or user_email = '$email'";
            $result_count = mysqli_query($con,$select_user);
            $rows_count = mysqli_num_rows($result_count);
            if($rows_count>0){                
                echo "<script>alert('Username or Email already exists!')</script>";
            }else if($password!=$cfmpassword){
                echo "<script>alert('Password Mismatch!')</script>";
            }            
            else{
                 //Insert User Into The System
                    $insert_user = "insert into `users`
                    (username,user_email,user_password,user_image,
                    user_ip,user_address,user_mobile) 
                    values ('$user ','$email','$hashpassword','$profilepic',
                    '$ip','$address','$mobile')";
                    $result_user = mysqli_query($con,$insert_user);
                        if($result_user){
                            echo "<script>alert('Registration Successful!')</script>";
                        }
            }
            //Items Present In Cart
            $select_cart = "Select * from `cart_details` where ip_address='$ip'";
            $result_cart = mysqli_query($con,$select_cart);
            $rows_cart_count = mysqli_num_rows($result_cart);
            if( $rows_cart_count>0){
                $_SESSION['username']=$user;
                echo "<script>window.open('payment.php','_self')</script>";
            }else{
                echo "<script>window.open('../index.php','_self')</script>";
            }

        }
    ?>
    <div class="container-fluid">
        <div class="forms-container">
            <div class="sign-up">
            <form action="" method="post" enctype="multipart/form-data" class="sign-up-form">
                <h2 class="title mt-3">Sign Up</h2>
                <!-- Username -->
                <div class="input-field">
                    <span class="material-icons-outlined">account_circle</span>
                    <input type="text" name="user_username" id="" placeholder="Username" required>
                </div>
                <!-- Email -->
                <div class="input-field">
                    <span class="material-icons-outlined">email</span>
                    <input type="email" name="useremail" id="" placeholder="Email" required>
                </div>
                <!-- Password -->
                <div class="input-field">
                    <span class="material-icons-outlined">lock</span>
                    <input type="password" name="userpassword" id="" placeholder="Password" required>
                </div>
                <!-- Confirm Password -->
                <div class="input-field">
                    <span class="material-icons-outlined">lock</span>
                    <input type="password" name="confrim_password" id="" placeholder="Confirm Password" required>
                </div>
                <!-- Profile Picture -->
                <div class="input-field" id="file">
                    <span class="material-icons-outlined">image</span>
                    <input type="file" name="userprofile" id="" placeholder="Profile Picture">
                </div>
                <!-- Address -->
                <div class="input-field">
                    <span class="material-icons-outlined">place</span>
                    <input type="text" name="useraddress" id="" placeholder="Address" required>
                </div>
                <!-- Mobile -->
                <div class="input-field">
                    <span class="material-icons-outlined">phone</span>
                    <input type="tel" name="usermobile" id="phone" placeholder="Mobile Number" required>
                </div>
                <!-- Submit Button -->
                <input type="submit" name="btn-signup" class="btn solid" value="Sign Up">
                <!-- Social Networks -->
                <p class="social-text">Sign up with social networks</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fa-brands fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fa-brands fa-pinterest-p"></i>
                    </a>
                </div>
                <div class="d-flex">
                    <p class="mx-1">Already have an account ? </p>
                    <a href="sign_in.php"> Sign In</a>
                </div>
            </form>
            </div>
        </div>
    </div>

<!-- JavaScript -->
<script src="../Js/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="script_users.js"></script>
<script src="../assets/js/intlTelInput.js"></script>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input,{});
</script>
</body>
</html>