<?php
    session_start();
    include 'includeadmin/db_connect.php';
    $blod_id = $_GET['services_id'];
    // delete section strt 
    $delete_image = "SELECT * FROM `services` WHERE `services_status` = '1' AND `services`.`services_id` = '$blod_id'";
    $fetch_query = mysqli_query($con, $delete_image);
    if($fetch_query){
        $res = mysqli_fetch_assoc($fetch_query);
        unlink("../upload/services/".$res['services_image']);
        unlink("../upload/services/".$res['services_cover_image']);
           $deleteservices = "UPDATE `services` SET `services_status` = '0' WHERE `services`.`services_id` = '$blod_id'";
           $query_services = mysqli_query($con,$deleteservices);
          if($query_services){
            $_SESSION['SuccessMessage'] = "Solutions Deleted Successfully!";
            ?>
            <script>
            location.replace("services_list.php")
            </script>
        <?php
          }
          else{
             $_SESSION['errorMessage'] = "Un Exepted Error";
             ?>
             <script>
             location.replace("services_list.php")
             </script>
         <?php
          }
   }
?>
