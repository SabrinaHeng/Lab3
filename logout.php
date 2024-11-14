<?php
session_start();    //Starting session
session_unset();    //Unset the session
session_destroy();  //Destroy the session
header("location: login.php");  //Redirect to the login page
exit();
?>