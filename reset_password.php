<?php require_once 'server.php' ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Reset password</title>

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
                <h2 class="register_title">Reset your password</h2>
                    
                <form method="post" action="">

                    <?php require_once 'errors.php'; ?>
                
                    <div class="form-group">
                        <label for="passwordRecover">Password</label>
                        <input type="password" id="passwordRecover" class="form-control" name="passwordRecover" required="required">
                    </div>

                    <div class="form-group">
                        <label for="passwordConf">Confirm password</label>
                        <input type="password" id="passwordConf" class="form-control" name="passwordConf" required="required">
                    </div>

                    <input type="submit" class="btn btn-primary submit" name="reset-btn" value="Reset">
                 
                </form>
            </div>
        </div>

        <!-- Bootstrap Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        
    </body>
</html>