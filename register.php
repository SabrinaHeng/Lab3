<html>
    <head>
        <title>Register</title>
    </head>

    <style> 
        body{
            background-image: url(UTM.jpg);
            background-size: cover;
            background-position: center; /* Center the image */
            background-attachment: fixed; /* Keep the image fixed during scrolling */
            height:100vh;
        }
    </style>

    <body>

        <nav class="navbar navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <img src="images.png" alt="" width="100" height="40">
            </div>
        </nav><br>

        <div class="container m-6 p-5">
            <div class="row justify-content-center">
                <div class="m-5 p-5 col-xl-6 col-lg-7 col-md-9 col-sm-12 text-center bg-light bg-gradient rounded border border-5 shadow">
                <h2> Register </h2><br><br>
        
                <form action="register.php" method="POST">
                    <!-- Username -->
                    <div class="row mb-3 row justify-content-center">
                        <label for="username" class="col-sm-3 col-lg-3 col-form-label">Username</label>
                        <div class="col-sm-8 col-lg-7">
                            <input type="text" class="form-control" id="username" name="username" placeholder="">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="row justify-content-center">
                        <label for="password" class="col-sm-3 col-lg-3 col-form-label">Password</label>
                        <div class="col-sm-8 col-lg-7">
                            <input type="password" class="form-control" id="password" name="password" placeholder="">
                        </div>
                    </div><br>

                    <div class="row justify-content-center">
                        <div class="col">
                            <button class="btn btn-outline-dark">
                                Sign Up
                            </button>
                        </div>
                    </div>

                </form>

                <div class="row justify-content-center">
                    <div class="col">
                        <a href="login.php">Already have an account? Login here</a>
                    </div>
                </div>

<?php
include "db.php";
include "asset.html";

if($_SERVER["REQUEST_METHOD"] == "POST"){  //Check if the form is submitted
    $username = mysqli_real_escape_string($conn,$_POST['username']);     //Get the username value from the form
    $password = password_hash($_POST['password'],PASSWORD_BCRYPT);    //Get the password value from the form

    $sql = "INSERT INTO student_reg (username,password) VALUES ('$username','$password')";

    if(mysqli_query($conn,$sql)){
        echo "New record created successfully";
    }else{
        echo "Error: ".$sql ."<br>".mysqli_error($conn);
    }
}