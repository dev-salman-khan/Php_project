
<?php
    session_start();
    include 'includeadmin/db_connect.php';
   
    $testimonial_id = $_GET['testimonial_del_id'];
    $deletetestimonial = "SELECT * FROM `testimonial` WHERE `testimonial_status` = '1' AND `testimonial`.`testimonial_id` = '$testimonial_id'";
    $query_testimonial = mysqli_query($con, $deletetestimonial);
    // delete section strt 
    if($query_testimonial){
        $res = mysqli_fetch_assoc($query_testimonial);
        unlink("../upload/testimonial/".$res['testimonial_image']);
        $delete_0 = "UPDATE `testimonial` SET `testimonial_status` = '0' WHERE `testimonial`.`testimonial_id` = '$testimonial_id'";
        $query_testimonial2 = mysqli_query($con,$delete_0);
        if($query_testimonial2){
            $_SESSION['SuccessMessage'] = "testimonial Deleted Successfully!";
          
            ?>
            <script>
            location.replace("add_testimonial.php")
            </script>
        <?php
        }
        else{
            $_SESSION['errorMessage'] = "testimonial  Not Deleted";
            ?>
            <script>
            location.replace("add_testimonial.php")
            </script>
        <?php
        }
    }
?>