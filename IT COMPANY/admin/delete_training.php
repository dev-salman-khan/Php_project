<?php
    session_start();
    include 'includeadmin/db_connect.php';
   
    $training_id = $_GET['training_id'];
    // delete section strt 
    $deletetraining = "UPDATE `training` SET `training_status` = '0' WHERE `training`.`training_id` = '$training_id'";
    $query_training = mysqli_query($con,$deletetraining);
    if($query_training){
        $_SESSION['SuccessMessage'] = "training Deleted Successfully!";
        
        ?>
        <script>
        location.replace("add_training.php")
        </script>
    <?php
    }
    else{
        $_SESSION['errorMessage'] = "Un Exepted Error";
        ?>
        <script>
        location.replace("add_training.php")
        </script>
    <?php
    }

?>