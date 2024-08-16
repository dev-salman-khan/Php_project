

<?php
    session_start();
    include 'includeadmin/db_connect.php';
   
    $user_id = $_GET['view_id'];
    // delete section strt 
    $deletequery = "UPDATE `users` SET `users_status` = '0' WHERE `users`.`users_id` = '$user_id'";
    $query = mysqli_query($con,$deletequery);
    if($query){
        $_SESSION['SuccessMessage'] = "User Deleted Successfully!";
        ?>
            <script>
                location.replace("website_user_list.php");
            </script>
        <?php
    }
    else{
        $_SESSION['errorMessage'] = "Un Exepted Error";
        ?>
            <script>
                location.replace("website_user_list.php");
            </script>
        <?php
    }

?>