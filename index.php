<?php 
  require_once 'server.php';

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
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">

        <style>
        h1 {
        text-align: center;
        font-size : 60px;
        }
        h2{
        text-align: left;
        margin-top: 5%;
        margin-bottom: 5%;
        text-transform: uppercase;
        font-family: 'Josefin Sans', sans-serif;
        }
        body {
        background-color:#ccccff;
        }
        p {
          color: navy;
          text-align: left;
          font-size: 30px;
          font-family: 'Josefin Sans', sans-serif;
          
        }
        img {
          height: 250px;
          width: 300px;
          display:block;
          margin-left: auto;
          margin-right: auto;

        }
        .column {
          float: left;
          width: 32.50%;
          padding: 5px;
        }

        .row::after {
          content:" ";
          clear: both;
          display: table;
        }

        </style>

      </head>

<body >
 
   <!-- Navbar -->

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="tastatura/keyboard.php">Typing</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                 <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="practice.php">Practice</a>
            </li>
        </ul>
        <ul class="navbar-nav justify-content-end">
        <?php if(!isset($_SESSION['id'])){?>
                    <li class="nav-item">
                        <a class="nav-link" href="signin.php">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Sign up</a>
                    </li>
                <?php } else{ ?>
                    <li class="nav-item">
                        <a href="practice.php?logout=1" class="nav-link">Logout</a>
                    </li>
                <?php }?>
        </ul>
      </div>
</nav>

<!-- Content -->   

<div class="container photos">
      <div class="row">
        <div class="column">
          <img src="img/img1.jpg" style="width:100%">
        </div>
        <div class="column">
          <img src="img/black.jpg" style="width:100%">
        </div>
        <div class="column">
          <img src="img/img2.jpg" style="width:100%">
        </div>
        
      </div>
      <h2>What is Typing Practice and how we use it?</h2>

      <p>We are here to help those who want to improve their typing skills.</p> 
      <p>How do we do this? We created this app, where you can practice your abilities through three levels of difficulty - easy, medium, hard.</p>
      <p>Creating an account, you'll be able to keep track of your scores and see the progress during the time. </p>
      <p>In case you have not an account yet, just press the <b>Sign up</b> button. Good luck! </p>

      <p>In case you have more questions, send us an email to: <b>typing.practice.verify@gmail.com</b></p>
  </div>
  <!-- Bootstrap Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>