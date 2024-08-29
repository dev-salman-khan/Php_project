<?php
    session_start();
    include 'includeadmin/db_connect.php';
   
    $enquiry_id = $_GET['enquiry_id'];
    // delete section strt 
    $deletequery = "UPDATE `message_enquiry` SET `message_enquiry_status` = '0' WHERE `message_enquiry`.`message_enquiry_id` = '$enquiry_id'";
    $query = mysqli_query($con,$deletequery);
    if($query){
        $_SESSION['SuccessMessage'] = "Enquiry Deleted Successfully!";
        header('location:enquiry.php');
    }
    else{
        $_SESSION['errorMessage'] = "Un Exepted Error";
    }

?>