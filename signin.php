<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Sign in</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <!-- My CSS -->
        <link rel="stylesheet" href="main.css">

        <!-- Font awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    </head>
    <body>

        <!-- Sign in form -->   
    
        <div class="container">
            <div class="jumbotron register_box">
                <h2 class="register_title">Sign in</h2>
                    
                <form method="post" name="signInForm" action="">

                <?php if(!empty($loginResult)){?>
				<div class="error-msg"><?php echo $loginResult;?></div>
				<?php }?>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required="required">
                </div>
                <div class="form-group">
                    <label for="password">Password<span class="error required" id="password-info"></span></label>
                    <input type="password" class="form-control" id="password" name="passwordSignIn" required="required">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                    <label class="form-check-label" for="arememberMe"><span><span></span></span>Remember me</label>
                </div>
                 <button type="submit" class="btn btn-primary submit" name="signin-btn">Sign in</button>
                 <p class="divider-text">
                    <span class="bg-light">OR</span>
                </p>
                <p>
                    <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Sign in via Twitter</a>
                    <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Sign in via Facebook</a>
                </p>
                <p class="text-center">Don't have an account? <a href="register.php">Sign up</a> </p> 
                <p class="text-center"><a href="">Forgot your password?</a></p> 
            </form>
            </div>
        </div>

        <!-- Bootstrap Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        
    </body>
</html>