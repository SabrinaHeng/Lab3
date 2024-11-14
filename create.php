<?php
session_start();    //Starting session
if(!isset($_SESSION['username'])){  //If session is not set then redirect to Login Page
    header("Location: login.php"); //Redirecting To Login Page
    exit(); //Stop script
}
?>

<html>
    <head>
        <title> Student Information Registration System </title>
    </head>

    <style> 
        body{
            background-image: url(utmkl.jpg_large);
            background-size: cover;
            background-position: center; /* Center the image */
            background-attachment: fixed; /* Keep the image fixed during scrolling */
            height:100vh;
        }
    </style>

    <body style="background-color: pink;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
    <img src="images.png" alt="" width="100" height="40">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="http://localhost/Registration/view.php">User List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="http://localhost/Registration/update.php?id=6%27">Update List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="http://localhost/Registration/create.php">Student Information Registration System</a>
        </li>
       </ul>
        <ul class="navbar-nav ms-auto">
            <a class="nav-link" aria-current="page" href="logout.php">Logout</a>
        </ul>
      </ul>
    </div>
  </div>
</nav><br>

<div class="container m-6 p-5">
    <div class="row justify-content-center">
        <div class="m-3 p-3 col-xl-6 col-lg-7 col-md-9 col-sm-12 text-center bg-light bg-gradient rounded border border-5 shadow">
            <h2> Student Information </h2><br><br>
        
            <form align = "center" action="create.php" method="POST">
                    <!-- Name -->
                    <div class="row mb-3 row justify-content-center">
                        <label for="name" class="col-sm-3 col-lg-3 col-form-label">Name</label>
                        <div class="col-sm-8 col-lg-7">
                            <input type="text" class="form-control" name="name" required>
                        </div>
                    </div>

                    <!-- Gender -->
                    <div class="row justify-content-center">
                        <label for="gender" class="col-sm-3 col-lg-3 col-form-label">Gender</label>
                        <div class="col-sm-8 col-lg-7">
                            <div class="form-check form-check-inline">
                            <input type="radio" id="male" name="gender" value="Male">
                            <label for="male"> Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input type="radio" id="female" name="gender" value="Female">
                            <label for="female"> Female</label> <br>
                            </div>
                        </div>
                    </div>

                    <!-- Matric No -->
                    <div class="row justify-content-center">
                        <label for="matricNo" class="col-sm-3 col-lg-3 col-form-label">Matric No.</label>
                        <div class="col-sm-8 col-lg-7">
                        <input type="text" class="form-control" name="matricNo" required><br>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="row justify-content-center">
                        <label for="password" class="col-sm-3 col-lg-3 col-form-label">Email</label>
                        <div class="col-sm-8 col-lg-7">
                        <input type="email" class="form-control" name="email" required><br>
                        </div>
                    </div>

                    <!-- Course -->
                    <div class="row justify-content-center">
                        <label for="password" class="col-sm-3 col-lg-3 col-form-label">Course</label>
                        <div class="col-sm-8 col-lg-7">
                        <select name="course" id="course">
                            <option value="softwareengineering">Software Engineering</option>
                            <option value="dataengineering">Data Engineering</option>
                            <option value="networking">Network and Security</option>
                            <option value="bioinfo">Bioinfomatics</option>
                            <option value="graphic">Graphics and Multimedia Software</option>

                            </select>
                        </div>
                    </div><br>

                    <div class="row justify-content-center">
                        <div class="col">
                            <button type="submit" class="btn btn-outline-dark">
                                Submit
                            </button>
                        </div>
                    </div>

<?php

    include "db.php";
    include "asset.html";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $matricNo = $_POST['matricNo'];
        $email = $_POST['email'];
        $course = $_POST['course'];

        $sql = "INSERT INTO student (name,gender,matricNo,email,course) VALUES('$name','$gender','$matricNo','$email','$course')";

        //Checking
        if(mysqli_query($conn,$sql)){
            echo "<div class= text-success> New record created successfully </div>";
        }else{
            echo "<div class= text-danger> Error: ". $sql. "</div><br>". mysqli_error($conn);
        }
    }

?>

</form>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="d-flex justify-content-center">
            <a href="view.php">
                <button class="btn btn-secondary"> Back to User List </button>
            </a>
        </div>
    </div>

</div>
</div>
    </body>
</html>