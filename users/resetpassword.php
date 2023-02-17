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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <title>Password Reset</title>
    <link rel="icon" type="image/x-icon" href="../Images/password-reset.png">
    <style>
        .container-fluid{
        background-image: url(../Images/forgot_password.svg) ;
        background-repeat: no-repeat;
        background-position: center;
        margin-top: 30px !important;
        overflow: hidden;        
        }
        .sign-up-form{
        margin-top: 200px;       
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="forms-container">
            <div class="sign-up">
            <form action="" method="post" class="sign-up-form">
                <h2 class="title">Reset Password</h2>
                <!-- Password -->
                <div class="input-field" id="">
                    <span class="material-icons-outlined">lock</span>
                    <input type="password" name="newpassword" id="password" placeholder="New Password" required>                  
                </div>            
                <!-- Confirm Password -->
                <div class="input-field" id="">
                    <span class="material-icons-outlined">lock</span>
                    <input type="password" name="newpasswordcfm" id="" placeholder="Confirm New Password" required>                  
                </div>      
                <!-- Reset Button -->
                <input type="submit" name="btn-reset" id="signin" class="btn solid" value="Reset Password" style="width: 250px;">                
            </form>
            </div>
        </div>
    </div>
<?php
if(isset($_POST['btn-reset'])){
    $newpswd = $_POST['newpassword'];
    $newpswdhash = password_hash($newpswd,PASSWORD_DEFAULT);
    $newpswdcfm = $_POST['newpasswordcfm'];

    
    
    
    
    $select_newpswd = "Select * from `users` where username = '$user'";
    $result_user = mysqli_query($con,$select_newpswd);
    if(!$result_user){
        echo "<script>alert('Username does not exist')</script>";
    }
     if($newpswd!=$newpswdcfm){
        echo "<script>alert('password mismatch')</script>";
    }else{
        $update_newpswd = "Update `users` set user_password = '$newpswd ' where username = '$user'";
        $result_newpswd = mysqli_query($con,$update_newpswd);
        if($result_newpswd){
            echo "<script>alert('password reset successful')</script>";
            echo "<script>window.open('sign_in.php','_self')</script>";
        }
    }
}
?>
<!-- JavaScript -->
<script src="../Js/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="script_users.js"></script>
</body>
</html>