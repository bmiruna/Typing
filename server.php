<?php
session_start();

require_once 'configuration.php';
require_once 'verificationEmail.php';

$username = "";
$email = "";
$errors = array();

// Register

if(isset($_POST['register-btn'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPass']);

    if(empty($username)){
        $errors['username'] = "Username required";
    }

    if(empty($email)){
        $errors['email'] = "Email required";
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Invalid email address';
    }

    if(empty($password)){
        $errors['password'] = "Password required";
    }

    if($password !== $confirmPassword){
        $errors['password'] = "Passwords don't match";
    }

    if ($stmt = $conn->prepare("SELECT * FROM users WHERE username = ?")) {
    
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
       
        if ($stmt->num_rows > 0) {
            // Username already exists
            $errors['username'] = 'Username already exists';
        } 
        $stmt->close();
    } 

    if ($stmt = $conn->prepare("SELECT * FROM users WHERE email = ?")) {
    
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
       
        if ($stmt->num_rows > 0) {
            // Username already exists
            $errors['email'] = 'Email exists, please choose another!';
        } 
        $stmt->close();
    }
    
    if(count($errors) === 0){

        $password = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50)); //used to generate verification link
        $verified = false;

        $query = 'INSERT INTO users (username, email, password, verified, token) VALUES (?, ?, ?, ?, ?)';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssis',  $username, $email, $password, $verified, $token);
        

        if($stmt->execute()){
            // login automatically

            // id of last inserted
            // $userId = $conn->insert_id;
            // $_SESSION['id'] = $userId;
            // $_SESSION['username'] = $username;
            // $_SESSION['email'] = $email;
            // $_SESSION['verified'] = $verified;

            // After login, send a verification email to the user's email

            sendVerificationEmail($email, $token);

            // redirect
            $_SESSION['message'] = "You are logged in";
            $_SESSION['alert-class'] = "alert-success";
            header('location: signin.php');
            exit();

        } else{
            $errors['dbError'] = 'Failed to register';
        }
        
    }    
}

// Login

if(isset($_POST['signin-btn'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['passwordSignIn']);

    if(empty($username)){
        $errors['username'] = "Username required";
    }

    if(empty($password)){
        $errors['password'] = "Password required";
    }

    if(count($errors) === 0){
        
        $query = "SELECT * FROM users WHERE username=? LIMIT 1";
        if($stmt = $conn->prepare($query)){
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if(password_verify($password, $user['password'])){

                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['verified'] = $user['verified'];

                // redirect
                $_SESSION['message'] = "You are logged in";
                $_SESSION['alert-class'] = "alert-success";
                header('location: index.php');
                exit();
            } else{
                $errors['login'] = "Wrong password or username";
            }
            
        }

    }
}

// Logout

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);
    unset($_SESSION['message']);

    header('location: index.php');
    exit();
}

// Verify if user exists function
function verifyUser($token){
    global $conn;

    $query = "SELECT * FROM users WHERE token = '$token' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        $update = "UPDATE users SET verified = 1 WHERE token= '$token'";

        if(mysqli_query($conn, $update)){

            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = 1;
    
            // redirect
            $_SESSION['message'] = "Your email address was successfully verified";
            $_SESSION['alert-class'] = "alert-success";
            header('location: index.php');
            exit();
        }
    } else {
        echo 'User not found';
    }
}

// Recover password

if(isset($_POST['recover-btn'])){
    $email = $_POST['email'];

    $query = "SELECT * FROM users WHERE email=? LIMIT 1";
    if($stmt = $conn->prepare($query)){
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        
        $token = $user['token'];

        sendPasswordResetLink($email, $token);
        
        header('location: after_reset.php');
        exit();
        
    }
}

// User click on the reset button in reset_password.php

if(isset($_POST['reset-btn'])){

    $password = $_POST['passwordRecover'];
    $passwordConf = $_POST['passwordConf'];

    if($password !== $passwordConf){
        $errors['password'] = "Password don't match.";
    }

    $email = $_SESSION['email'];

    if(count($errors) == 0){

        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "UPDATE users SET password = ? WHERE email= ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $password, $email);
        

        if($stmt->execute()){
            header('location: signin.php');
            exit();

        } else{
            $errors['dbError'] = 'Failed';
           
        }
    }

}

// Function for resetting the password
function resetPassword($token){
    global $conn;

    $query = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    $_SESSION['email'] = $user['email'];
    header('location: reset_password.php');
    exit();

}

if(isset($_POST['save-btn'])){


    $scor = mysqli_real_escape_string($conn, $_POST['scor']);
    $time = mysqli_real_escape_string($conn, $_POST['timer']);
    $userId = $_SESSION['id'];

    if(empty($scor)){
        echo "Score field is empty";
    } else if(empty($time)){
        echo "Time field is empty";
    } else {

    
    $query = "INSERT INTO scores (score, time, user_id) VALUES ('$scor', '$time', '$userId')";

    if(mysqli_query($conn, $query)){
        header('location: ../practice.php');
        exit();
    } else {
        echo "Failed";
    }

   //header('location: ../practice.php?time='.$time.'&score='.$_POST['myScore']);
    }

}

?>