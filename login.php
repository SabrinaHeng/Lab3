<html>
    <head>
        <title>Login</title>
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
                <h2> Login </h2><br><br>
        
                <form action="login.php" method="POST">
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
                                Login
                            </button>
                        </div>
                    </div>

                </form>

                <div class="row justify-content-center">
                    <div class="col">
                        <a href="register.php">Dont't have an account? Register here</a>
                    </div>
                </div>


<?php
session_start();        //starting session
include "db.php";
include "asset.html";

if($_SERVER["REQUEST_METHOD"] == "POST"){  //Check if the form is submitted
    $username = mysqli_real_escape_string($conn,$_POST['username']);     //Get the username value from the form
    $password = $_POST['password'];    //Get the password value from the form

    $sql = "SELECT * FROM student_reg WHERE username = '$username'";        
    $result= mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)== 1){       //Check if user exists
        while($row = mysqli_fetch_assoc($result)){  //Get the data from database
            if(password_verify($password,$row['password'])){    //CHeck if password match
                $_SESSION['username'] = $username;      //Set the session variable
                header("Location: view.php");  ///Redirect to the home page
            }else{
                echo "<div class= text-danger fw-light>"."<small>"."Invalid username or password."."</small>"."<div>";
            }
        }
    }else{
        echo "<div class= text-danger fw-light>"."<small>"."No user found with that username."."</small>"."<div>";
    }
}

?>
                </div>
            </div>
        </div>
    </p>
    </body>
</html>
