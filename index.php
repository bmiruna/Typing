<?php 
  require_once 'server.php';

  if(!isset($_SESSION['id'])){
    header('location: signin.php');
  }

  if(isset($_GET['token'])){
    $token = $_GET['token'];
    verifyUser($token);
  }

  if(isset($_GET['password-token'])){
    $passToken = $_GET['password-token'];
    resetPassword($passToken);
  }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Typing Practice</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <!-- My CSS -->
        <link rel="stylesheet" href="main.css">

      </head>
    <body>

        <!-- Navbar -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Typing</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                         <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Practice</a>
                    </li>
                </ul>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item">
                      <a class="nav-link" href="register.php" target="_blank">Sign up</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="signin.php" target="_blank">Sign in</a>
                    </li>
                </ul>
              </div>
        </nav>

        <!-- Content -->   

        <div class="container">
          <!-- notification message -->
          <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-success">
              <h3>
                <?php 
                  echo $_SESSION['message']; 
                  unset($_SESSION['message']);
                ?>
              </h3>
            </div>
          <?php } ?>

          <!-- logged in user information -->
          <?php  if (isset($_SESSION['username'])) { ?>
            <p>Welcome, <strong><?php echo $_SESSION['username'].'!'; ?></strong></p>
            <p> <a href="index.php?logout=1" style="color: red;">Logout</a> </p>
          <?php } ?>

          <?php if(!$_SESSION['verified']){ ?>
            <div class="alert alert-warning">
              A confirmation email was sent to <b><?php echo $_SESSION['email']; ?></b>. Check your email address and click on the verification link.
            </div>
          <?php } ?>

          <?php if($_SESSION['verified']){ ?>
            <button class="btn btn-primary">I am verified</button>
          <?php } ?>

        </div>
		

        <!-- Bootstrap Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>