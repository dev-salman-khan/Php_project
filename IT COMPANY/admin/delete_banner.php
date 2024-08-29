<?php
    session_start();
    include 'includeadmin/db_connect.php';
   
    $banner_id = $_GET['banner_id'];
    // delete section strt 
    $deletebanner = "UPDATE `banner` SET `banner_page_status` = '0' WHERE `banner`.`banner_id` = '$banner_id'";
    $query_banner = mysqli_query($con,$deletebanner);
    if($query_banner){
        $_SESSION['SuccessMessage'] = "banner Deleted Successfully!";
        ?>
<script>
location.replace("add_banner.php")
</script>
<?php
    }
    else{
        $_SESSION['errorMessage'] = "Un Exepted Error";
        ?>
<script>
location.replace("add_banner.php")
</script>
<?php
    }

?>