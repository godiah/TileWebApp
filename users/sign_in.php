<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
@session_start();
?>
    <!-- User Verification -->
    <?php
    if(isset($_POST['btn-signin'])){
        $user=$_POST['user_username'];
        $password=$_POST['userpassword'];
        $ip = getIPAddress();
        //Select Query
        $select_user_in = "Select * from `users` where username = '$user'";
        $result_user_in = mysqli_query($con,$select_user_in);
        $row_count = mysqli_num_rows($result_user_in);
        $row_data = mysqli_fetch_assoc($result_user_in);

        //Cart Items
        $select_user_cart = "Select * from `cart_details` where ip_address = '$ip'";
        $result_user_cart = mysqli_query($con,$select_user_cart);
        $row_count_cart = mysqli_num_rows($result_user_cart);

        if($row_count>0){
            $_SESSION['username']=$user;
            if(password_verify($password,$row_data['user_password'])){
                // echo "<script>alert('Welcome')</script>";
                // echo "<script>window.open('../index.php','_self')</script>";
                if($row_count==1 and $row_count_cart==0){
                    $_SESSION['username']=$user;
                    echo "<script>alert('Welcome $user')</script>";
                    echo "<script>window.open('../index.php','_self')</script>";
                }else{
                    $_SESSION['username']=$user;
                    echo "<script>alert('Welcome $user')</script>";
                    echo "<script>window.open('payment.php','_self')</script>";
                }
            }else{
                echo "<script>alert('Incorrect Password!')</script>";
            }

        }else{
            echo "<script>alert('Incorrect Username!')</script>";
        }
    }
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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <title>Sign In</title>
    <link rel="icon" type="image/x-icon" href="../Images/signin.png">
</head>
<style>    
    .container-fluid{
        background-image: url(../Images/signin.svg) ;
        background-repeat: no-repeat;
        background-position: right;
        margin-top: 30px !important;
        overflow: hidden;        
    }
    .sign-up-form{
        margin-top: 140px;       
    }
    /** Password Toggler **/
    #password-container{
    width: 100%;
    position: relative;
    }
    .fa-eye{
    position: absolute;
    top: 28%;
    right: 3%;
    cursor: pointer;    
    font-size: 1.3rem;
    color: #acacac;
    font-weight: 500;
    }
    a{
        text-decoration: none;
    }
    #forgot a{        
        text-align: right;       
    }
    /* #signin{
    background-color: #49111c;
    color: white;
    }
    #signin:hover{
        background-color: #49111c;  
    } */
</style>
<body>

    <div class="container-fluid">
        <div class="forms-container">
            <div class="sign-up">
            <form action="" method="post" class="sign-up-form">
                <h2 class="title">Sign In</h2>
                <!-- Username -->
                <div class="input-field">
                    <span class="material-icons-outlined">account_circle</span>
                    <input type="text" name="user_username" id="" placeholder="Username" required autocomplete="off">
                </div>            
                <!-- Password -->
                <div class="input-field" id="password-container">
                    <span class="material-icons-outlined">lock</span>
                    <input type="password" name="userpassword" id="password" placeholder="Password" required>
                    <!-- <span class="material-icons-outlined">visibility</span> -->
                    <i class="fa-solid fa-eye" id="togglePassword"></i>                    
                </div>
               <div id="forgot">
                <a href="forgotpassword.php">Forgot password ?</a> 
               </div>       
                <!-- Submit Button -->
                <input type="submit" name="btn-signin" id="signin" class="btn solid" value="Sign In">
                <!-- Social Networks -->
                <p class="social-text">Sign in with social networks</p>
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
                    <p class="mx-1">Don't have an account ? </p>
                    <a href="sign_up.php"> Sign Up</a>
                </div>
            </form>
            </div>
        </div>
    </div>

<!-- JavaScript -->
<!-- Password Toggle -->
<script>   
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');
    togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
<script src="../Js/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="script_users.js"></script>


</body>
</html>