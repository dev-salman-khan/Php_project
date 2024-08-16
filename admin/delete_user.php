<?php
    session_start();
    include 'includeadmin/db_connect.php';
   
    $user_id = $_GET['user_id'];
    // delete section strt 
    $deletequery = "UPDATE `admin` SET `admin_status` = '0' WHERE `admin`.`admin_id` = '$user_id'";
    $query = mysqli_query($con,$deletequery);
    if($query){
        $_SESSION['SuccessMessage'] = "User Deleted Successfully!";
        header('location:user_list.php');
    }
    else{
        $_SESSION['errorMessage'] = "Un Exepted Error";
    }

?>