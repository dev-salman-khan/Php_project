<?php
    session_start();
    include 'includeadmin/db_connect.php';
    $slider_id = $_GET['slider_id'];
    // delete section strt 
    $delete_image = "SELECT * FROM `slider` WHERE `slider_status` = '1' AND `slider`.`slider_id` = '$slider_id'";
    $fetch_query = mysqli_query($con, $delete_image);
    if($fetch_query){
        $res = mysqli_fetch_assoc($fetch_query);
        unlink("../upload/home/".$res['slider_image']);
           $deleteblog = "UPDATE `slider` SET `slider_status` = '0' WHERE `slider`.`slider_id` = '$slider_id'";
           $query_blog = mysqli_query($con,$deleteblog);
          if($query_blog){
            $_SESSION['SuccessMessage'] = "Slider Deleted Successfully!";
             	?>
																<script>
																location.replace("add_sliders.php");
																</script>
																<?php
          }
          else{
             $_SESSION['errorMessage'] = "Un Exepted Error";
             	?>
																<script>
																location.replace("add_sliders.php");
																</script>
																<?php
          }
   }
?>
