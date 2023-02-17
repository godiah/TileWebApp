<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In & Sign Up Form</title>
    <!-- Bootstrap/CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles_users.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form action="" class="sign-in-form">
                <h2 class="title">Sign In</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password">
                </div>
                <input type="submit" class="btn solid" value="Login">
                <p class="social-text">Or Sign in with social networks</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                </div>
            </form>
        
        
            <form action="" class="sign-up-form">
                <h2 class="title">Sign Up</h2>
                
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username">
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password">
                </div>
                <input type="submit" class="btn solid" value="Login">
                <p class="social-text">Or Sign up with social networks</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>New Here?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Illum rem, quia et accusantium excepturi odit                     
                    cumque beatae corporis blanditiis non itaque.
                </p>
                <button class="btn transparent" id="sign-up-button">Sign Up</button>
            </div>
            <img src="../Images/signup.svg" alt="" class="image">
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>One of us</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Illum rem, quia et accusantium excepturi odit                     
                    cumque beatae corporis blanditiis non itaque.
                </p>
                <button class="btn transparent" id="sign-in-button">Sign In</button>
            </div>
            <img src="../Images/register.svg" alt="" class="image">
        </div>
    </div>
</div>



<!-- JavaScript -->
<script src="Js/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="script_users.js"></script>
</body>
</html>