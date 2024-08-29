<?php
    session_start();
    include 'includeadmin/db_connect.php';
   
    $seo_id = $_GET['seo_id'];
    // delete section strt 
    $deleteseo = "UPDATE `seo` SET `seo_status` = '0' WHERE `seo`.`seo_id` = '$seo_id'";
    $query_seo = mysqli_query($con,$deleteseo);
    if($query_seo){
        $_SESSION['SuccessMessage'] = "Seo Deleted Successfully!";
        
        ?>
        <script>
        location.replace("add_seo.php")
        </script>
    <?php
    }
    else{
        $_SESSION['errorMessage'] = "Un Exepted Error";
        ?>
        <script>
        location.replace("add_seo.php")
        </script>
    <?php
    }

?>