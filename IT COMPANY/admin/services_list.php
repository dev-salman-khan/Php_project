<?php include 'includeadmin/header.php'; ?>
<aside class="main-sidebar">
    <?php include 'includeadmin/aside.php'; ?>
</aside>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_SESSION['errorMessage'])) {
            ?>
            <div class="alert alert-danger">
                <strong>Action Denied! </strong> <?php echo $_SESSION['errorMessage']; ?>
            </div>
            <?php
                unset($_SESSION['errorMessage']);
            }
            ?>
            <?php
            if (isset($_SESSION['SuccessMessage'])) {
            ?>
            <div class="alert alert-success">
                <strong>Action Accepted! </strong> <?php echo $_SESSION['SuccessMessage']; ?>
            </div>
            <?php
                unset($_SESSION['SuccessMessage']);
            }
            ?>
        </div>
    </div>
    <section class="content-header">
        <h1> Solutions List
            <small>Manager Solutions List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="services_list.php">Solutions List</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="box-header with-border" style="margin-bottom:20px;">
                            <h3 class="box-title">Solutions List</h3>
                        </div>

                        <div class="table-responsive">

                            <form role="form" action="#" method="POST">
                              
                                <button type="submit" style="float:right; margin-bottom:10px;"
                                    onclick="return button3();" name="popular_remove" class="btn btn-primary"><i
                                        class="fa fa-home"></i>Remove Solutions From Home
                                </button>
                                <button type="submit" style="float:right; margin-bottom:10px;"
                                    onclick="return button4();" name="popular_add" class="btn btn-success"><i
                                        class="fa fa-home"></i>Do Solutions Home</button>
                                <table id="University" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>S No</th>
                                            <th> Solutions Title</th>
                                            <th>Solutions Image</th>
                                            <th>Solutions Cover Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $selectquery_services = "select * from services where services_status = '1' ORDER BY services_id DESC";
                                            $query_services = mysqli_query($con, $selectquery_services);
                                            $i = 1;
                                            while ($services_list = mysqli_fetch_array($query_services)) {
                                                ?>
                                        <tr>
                                            <td><?php echo $i;?>&nbsp;<input type="checkbox" class="btn_click"
                                                    value="<?php echo $services_list['services_id']; ?>"
                                                    name="affiliated_popular[]"></< /td>
                                            <td><?php echo $services_list['services_title'];  ?><br>
                                                <?php if($services_list['services_features_status']=='1'){?>
                                                <small class="label label-success">Solutions Home</small>
                                                <?php } ?>
                                               
                                            </td>
                                            <td> <img
                                                    src='<?php echo ROOT_URL_ADMIN ."upload/services/" . $services_list['services_image']; ?>'
                                                    alt="" width="150px" height="150px"></td>
                                            <td> <img
                                                    src='<?php echo ROOT_URL_ADMIN ."upload/services/" . $services_list['services_cover_image']; ?>'
                                                    alt="" width="150px" height="150px"></td>

                                            <td> <a
                                                    href="edit_services.php?services_id=<?php echo $services_list['services_id'];?>">
                                                    <button type="button" class="btn btn-success"
                                                        onclick="return edit()"><i
                                                            class="fa fa-edit"></i>&nbsp;Edit</button>
                                                </a>|<a
                                                    href="delete_services.php?services_id=<?php echo $services_list['services_id'];?>">
                                                    <button onclick="return checkdelete()" type="button"
                                                        class="btn btn-danger"><i
                                                            class="fa fa-trash"></i>&nbsp;Delete</button></a></td>
                                        </tr>
                                        <?php
											$i++;
											}
									?>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<?php include 'includeadmin/footer.php'; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#University').DataTable();
});

function button1() {
    return confirm("Are You Sure! You Want To Do This Solutions On About Page ");

}

function button2() {
    return confirm("Are You Sure! You Want To Remove This Solutions From About Page ");

}

function button4() {
    return confirm("Are You Sure! You Want To Do This Solutions On Features Page ");

}

function button3() {
    return confirm("Are You Sure! You Want To Remove This Solutions From Features Page ");

}

function checkdelete() {
    return confirm("Are You Sure! You Want To Delete This Solutions");
}

function edit() {
    return confirm("Are You Sure! You Want To  Edit This Solutions");
}
</script>

<?php 
         //  doing Popular Courses 
        if(isset($_POST['popular_add'])){
            $affiliated_popular = $_POST['affiliated_popular'];
            $university_number = 1;  
            if(empty($affiliated_popular)){
                ?>
<script>
location.replace("services_list.php");
</script>
<?php
$_SESSION['errorMessage'] = "Plz Checked The Check Box ";


            } else{
            // counting the value when Checkbox is click 
            $courese_count = count($affiliated_popular);
            for($i=0; $i < $courese_count; $i++){
                // updating Each Value 
                $sql_query = "UPDATE `services` SET `services_features_status`='$university_number' WHERE `services_id`='$affiliated_popular[$i]'";
                $rundata_base = mysqli_query($con, $sql_query);
                if($rundata_base){
                    $_SESSION['SuccessMessage'] = "Solutions Has Been Home  successfully";
                    // header('location: courses_list.php');
                    ?>
<script>
location.replace("services_list.php");
</script>
<?php
                } 
                else{
                    $_SESSION['errorMessage'] = "Solutions Has not Been Home ";
                    ?>
<script>
location.replace("services_list.php");
</script>
<?php
                }
            }
        }
    }
    ?>

<?php 
         //  doing Popular Courses 
        if(isset($_POST['popular_remove'])){
            $affiliated_popular = $_POST['affiliated_popular'];
            $university_number = 0;  
            if(empty($affiliated_popular)){
                ?>
<script>
location.replace("services_list.php");
</script>

<?php

$_SESSION['errorMessage'] = "Plz Checked The Check Box ";

            } else{
            // counting the value when Checkbox is click 
            $courese_count = count($affiliated_popular);
            for($i=0; $i < $courese_count; $i++){
                // updating Each Value 
                $sql_query = "UPDATE `services` SET `services_features_status`='$university_number' WHERE `services_id`='$affiliated_popular[$i]'";
                $rundata_base = mysqli_query($con, $sql_query);
                if($rundata_base){
                    $_SESSION['SuccessMessage'] = "Solutions Home Has been Removed  successfully";
                    // header('location: courses_list.php');
                    ?>
<script>
location.replace("services_list.php");
</script>
<?php
                } 
                else{
                    $_SESSION['errorMessage'] = "Solutions Home Not  removed ";
                    ?>
<script>
location.replace("services_list.php");
</script>
<?php
                }
            }
        }
    }
    ?>


