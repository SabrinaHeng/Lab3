<?php

include "db.php";

if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $sql = "DELETE FROM student WHERE id='$id'";
    $result = mysqli_query($conn,$sql);

    if ($result){
        echo "<script> alert('User Deletes Successfully'); window.location='view.php'</script>";
    }else{
        echo "<script> alert('User Not Deleted'); window.location='view.php'</scrpit>";
    }
}


?>