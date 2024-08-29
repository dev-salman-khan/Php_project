<?php
    session_start();
    include 'includeadmin/db_connect.php';
   
    $enquiry_id = $_GET['services_enquiry_id'];
    // delete section strt 
    $deletequery = "UPDATE `product_enquiry` SET `product_enquiry_status` = '0' WHERE `product_enquiry`.`product_enquiry_id` = '$enquiry_id'";
    $query = mysqli_query($con,$deletequery);
    if($query){
        $_SESSION['SuccessMessage'] = "Solutions Enquiry Deleted Successfully!";
        header('location:services_enquiry.php');
    }
    else{
        $_SESSION['errorMessage'] = "Un Exepted Error";
    }

?>