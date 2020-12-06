<?php

require 'constant.php';

// connect to the database
$conn = mysqli_connect(HOST, USER, PASSWORD, DBNAME);

if($conn->connect_error){
    die('Connection failed: '.$conn->connect_error);
}

?>