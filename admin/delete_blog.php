<?php
    session_start();
    include 'includeadmin/db_connect.php';
    $blod_id = $_GET['blog_id'];
    // delete section strt 
    $delete_image = "SELECT * FROM `blog` WHERE `blog_status` = '1' AND `blog`.`blog_id` = '$blod_id'";
    $fetch_query = mysqli_query($con, $delete_image);
    if($fetch_query){
        $res = mysqli_fetch_assoc($fetch_query);
        unlink("../upload/blog/".$res['blog_image']);
        unlink("../upload/blog/".$res['blog_cover_image']);
           $deleteblog = "UPDATE `blog` SET `blog_status` = '0' WHERE `blog`.`blog_id` = '$blod_id'";
           $query_blog = mysqli_query($con,$deleteblog);
          if($query_blog){
            $_SESSION['SuccessMessage'] = "Blog Deleted Successfully!";
            ?>
            <script>
            location.replace("blog_list.php")
            </script>
        <?php
          }
          else{
             $_SESSION['errorMessage'] = "Un Exepted Error";
             ?>
             <script>
             location.replace("blog_list.php")
             </script>
         <?php
          }
   }
?>
