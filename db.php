<?php

$servername = "localhost";
$username = "root";
$password = "admin123";
$database = "test_db";

// create connection
$conn = mysqli_connect($servername,$username,$password,$database);

//check connection
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}else{
    //echo "Connected Successfully";
}

?>