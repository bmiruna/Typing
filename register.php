<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Register</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <!-- My CSS -->
        <link rel="stylesheet" href="main.css">

        <!-- Font awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    </head>
    <body>

        <!-- Register form -->   
        
            <div class="container">
                <div class="jumbotron register_box">
                    <h2 class="register_title">Create account</h2>
                    
                    <form action="" method="post" name="registration" onsubmit="return validateForm()" novalidate>
                       
                        <small class="error" id="fnameErr"></small>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" required>
                        </div>

                        <small class="error" id="lnameErr"></small>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" required>    
                        </div>

                        <small class="error" id="emailErr"></small>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email address" required>
                        </div>

                        <small class="error" id="passwordErr"></small>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Create password" required>
                        </div>

                        <small class="error" id="confirmPassErr"></small>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input type="password" class="form-control" id="confirmPass" name="confirmPass" placeholder="Confirm password" required>
                        </div>

                        <small class="error" id="termsErr"></small>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="agreeTerm" name="agreeTerm">
                            <label class="form-check-label" for="agreeTerm"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>

                        <button type="submit" class="btn btn-primary submit" name="register-btn">Register</button>
                        <p class="divider-text">
                            <span class="bg-light">OR</span>
                        </p>
                        <p>
                            <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
                            <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via Facebook</a>
                        </p>
                        <p class="text-center">Have an account? <a href="signin.php">Sign In</a> </p>  
                    </form>
                </div>
            </div>
        
        <!-- Bootstrap Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        <!-- JavaScript files -->
        <script src="signup_validation.js"></script>
    </body>
</html>