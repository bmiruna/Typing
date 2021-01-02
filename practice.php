<?php require_once 'server.php';

if(!isset($_SESSION['id'])){
  header('location: signin.php');
}

$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Practice</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <!-- My CSS -->
        <link rel="stylesheet" href="main.css" type="text/css"> 

        <style>
        body {
          background-color: #add8e6;
        }
        </style>

      </head>
    <body>
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
                                <a class="nav-link" href="sigin.php">Log in</a>
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
      <?php 
      
      $query = "SELECT * FROM scores WHERE scores.user_id = $id ORDER BY created_at DESC LIMIT 5";
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0){
      
      ?>

      <div class="container profile">
      <?php if(!$_SESSION['verified']){ ?>
            <div class="alert alert-warning">
              A confirmation email was sent to <b><?php echo $_SESSION['email']; ?></b>. Check your email address and click on the verification link.
            </div>
          <?php } ?>

        <div class="card details">
                <div class="container-fliud">
                      <div class="wrapper row">
                          <div class="preview col-md-6 info">
                              <div class="preview-pic tab-content">
                                <?php  if (isset($_SESSION['username'])) { ?>
                                <h2 id="profile-title">Your profile</h2>
                                <p><b>Username: </b><?php echo $_SESSION['username']; ?></p>
                                <p><b>Email: </b><?php echo $_SESSION['email']; ?></p>
                                <?php }?>
                              </div>
                          </div>
                          <div class="col-md-6 score-table">
                            <table cellpadding="10" cellspacing="1">
                                <tbody>
                                  <tr>
                                    <th style="text-align: left;"><strong>Score</strong></th>
                                    <th style="text-align: right;"><strong>Time</strong></th>
                                    <th style="text-align: right;"><strong>Added at</strong></th>
                                  </tr>
                                  <?php while($row = mysqli_fetch_assoc($result)) { ?>
                                  <tr>
                                    <td style="text-align: left; border-bottom: #F0F0F0 1px solid;"><strong><?php echo $row["score"]; ?></strong></td>
                                    <td style="text-align: right; border-bottom: #F0F0F0 1px solid;"><?php echo $row["time"]; ?></td>
                                    <td style="text-align: right; border-bottom: #F0F0F0 1px solid;"><?php echo $row["created_at"]; ?></td>                            
                                  </tr>
                                  <?php }?>
                              </tbody>	
                            </table>
                          </div>
                      </div>
                </div>
          </div>
      </div>  
      <?php }?>               
    </body>
</html>