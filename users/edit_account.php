<?php
if(isset($_GET['edit_account'])){
    $user_session = $_SESSION['username'];
    $select = "Select * from  `users` where username = '$user_session'";
    $result = mysqli_query($con,$select);
    $row_fetch = mysqli_fetch_assoc($result);
    $user_id = $row_fetch['user_id']; 
    $username = $row_fetch['username']; 
    $useremail = $row_fetch['user_email'];  
    $useraddress = $row_fetch['user_address']; 
    $usermobile= $row_fetch['user_mobile'];
    
    if(isset($_POST['btn-update'])){
        $upd_id = $user_id;
        $username = $_POST['user_username']; 
        $useremail = $_POST['useremail']; 
        $useraddress = $_POST['useraddress']; 
        $usermobile= $_POST['usertelno'];
        $profile_img= $_FILES['userprofile']['name'];
        $user_img_temp= $_FILES['userprofile']['tmp_name'];
        move_uploaded_file($user_img_temp,"users_profiles/$profile_img");

        $update = "Update `users` set username='$username',
        user_email='$useremail',user_image='$profile_img',
        user_address='$useraddress',user_mobile='$usermobile' where 
        user_id=$upd_id";
        $run_update = mysqli_query($con,$update);
        if($run_update){
            echo "<script>alert('Details Updated Successfuly')</script>";
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
    <title>Edit Account</title>
</head>
<body>
    <h3 class="text-center text-success mt-3 mb-3">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-2">
            <input type="text" value="<?php echo $username ?>" class="form-control w-50 m-auto" name="user_username" placeholder="Username" autocomplete="off">
        </div>
        <div class="form-outline mb-2">
            <input type="email" value="<?php echo $useremail ?>" class="form-control w-50 m-auto" name="useremail" placeholder="Email" autocomplete="off">
        </div>
        <div class="form-outline mb-2 d-flex w-50 m-auto">
            <input type="file"  class="form-control m-auto" name="userprofile">
            <img src="users_profiles/<?php echo $profile_img ?>" alt="" class="edit_img">
        </div>
        <div class="form-outline mb-2">
            <input type="text" value="<?php echo $useraddress ?>" class="form-control w-50 m-auto" name="useraddress" placeholder="Address" autocomplete="off">
        </div>
        <div class="form-outline mb-2">
            <input type="tel" value="<?php echo $usermobile?>" class="form-control w-50 m-auto" name="usertelno" placeholder="Telephone Number" autocomplete="off">
        </div>
        <input type="submit" class="btn btn-success " name="btn-update" value="Update Details">

    </form>
    
</body>
</html>