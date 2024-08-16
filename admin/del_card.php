
<?php
    session_start();
    include 'includeadmin/db_connect.php';
   
    $card_id = $_GET['card_del_id'];
    $deletecard = "SELECT * FROM `card` WHERE `card_status` = '1' AND `card`.`card_id` = '$card_id'";
    $query_card = mysqli_query($con, $deletecard);
    // delete section strt 
    if($query_card){
        $res = mysqli_fetch_assoc($query_card);
        unlink("../upload/card/".$res['card_image']);
        $delete_0 = "UPDATE `card` SET `card_status` = '0' WHERE `card`.`card_id` = '$card_id'";
        $query_card2 = mysqli_query($con,$delete_0);
        if($query_card2){
            $_SESSION['SuccessMessage'] = "Data Deleted Successfully!";
          
            ?>
            <script>
            location.replace("add_card_or_team.php")
            </script>
        <?php
        }
        else{
            $_SESSION['errorMessage'] = "Data  Not Deleted";
            ?>
            <script>
            location.replace("add_card_or_team.php")
            </script>
        <?php
        }
    }
?>