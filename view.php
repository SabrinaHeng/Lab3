<?php
session_start();    //Starting session
if(!isset($_SESSION['username'])){  //If session is not set then redirect to Login Page
    header("Location: login.php"); //Redirecting To Login Page
    exit(); //Stop script
}
?>

<html>
    <head>
        <title> User List </title>
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

    <body style="text-align:center;background-color: lightblue;">

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
    <img src="images.png" alt="" width="100" height="40">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost/Registration/view.php">User List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="http://localhost/Registration/update.php?id=6%27">Update List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/Registration/create.php">Student Information Registration System</a>
        </li>
       </ul>
        <ul class="navbar-nav ms-auto">
            <a class="nav-link" aria-current="page" href="logout.php">Logout</a>
        </ul>
      </ul>
    </div>
  </div>
</nav><br>
<!--Container-->
        <div class="table-container p-5">
            <div class="row justify-content-center">
                <div class="m-1 p-5 col-xl-10 col-lg-12 col-md-12 col-sm-12 text-center bg-light bg-gradient rounded border border-5 shadow">
                <h2> User List </h2><br><br>
            <div class="table-responsive">
                <table class="table table-striped" style="text-align:center;" align=center>
                    <thead>
                    <tr style="background-color: lightslategray;">
                    <td><b> ID </b></td>
                    <td style="width: 20%;"><b> Name </b></td>
                    <td style="width: 10%;"><b> Gender </b></td>
                    <td><b> Matric No. </b></td>
                    <td><b> Email </b></td>
                    <td><b>  Course </b></td>
                    <td></td>
                    <td></td>
                    
                    </tr>
                    </thead>
                
        <?php

        include "db.php";
        include "asset.html";

        $sql = "SELECT * FROM student";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0){         //check the record exist or not
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>". $row['id'] . "</td>";
                echo "<td>". $row['name'] . "</td>";
                echo "<td>". $row['gender']. "</td>";
                echo "<td>". $row['matricNo']. "</td>";
                echo "<td>". $row['email'] . "</td>";
                echo "<td>". $row['course']. "</td>";
                echo "<td> <a href=update.php?id=". $row['id']."'> <button class='btn btn-primary'> Update </button></a> </td>";
                echo "<td> <a href=delete.php?id=". $row['id']."'> <button class='btn btn-danger'> Delete </button></a> </td>";
                echo "<tr>";
            }
        }else{
            echo "<tr> <td colspan='6'> No Data Found </td> </tr>";
        }

        ?>

    </table>
    </div>
    </div>
    </div>
    </div>

    <div class="row justify-content-center">
        <div class="col">
            <a href="create.php">
            <button class="btn btn-secondary"> Add New Information </button></a>
        </div>
    </div>
    </table>
    </body>

</html>