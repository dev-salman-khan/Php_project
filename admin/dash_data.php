<?php include 'includeadmin/header.php'; 
 ?>
<aside class="main-sidebar">
    <?php include 'includeadmin/aside.php' ?>
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
        <h1>Training Data
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a class="active">Training Data</a></li>
        </ol>
    </section>
    <?php   
       // fetching data 
        $term_fetech = "SELECT * FROM `dash_home` WHERE `dash_status`= '1' AND dash_id = '1'";
        $term_query = mysqli_query($con, $term_fetech);
        $term_list = mysqli_fetch_array($term_query);   
    ?>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border" style="margin-bottom:20px;">
                        <h3 class="box-title">Training Data</h3>
                    </div>
                    <div class="box-body">
                        <form role="form" method="POST">


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Sub Title </label>
                                        <input type="text" class="form-control" id="salman" disabled name="dash_link"
                                            placeholder=" Sub Title" value="<?php echo $term_list['dash_link'];?>"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Title</label>
                                        <input type="text" class="form-control" id="abouts_university" disabled
                                            name="dash_title" placeholder="Title "
                                            value="<?php echo $term_list['dash_title'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="about university">Description </label>
                                        <textarea name="dash_description" id="about_university"
                                            class="form-control"><?php echo $term_list['dash_description'];?></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box-footer">
                                <button type="button" id="edit_button" class="btn btn-success"
                                    onclick="return confirm('Are you want to EDIT record?');"> <i
                                        class="fa fa-edit"></i>&nbsp;EDIT</button>
                                <button type="submit" class="btn btn-primary" style="padding:10px 50px;"
                                    name="update_condition" id="update_button">Update</button>

                            </div>
                        </div>
                    </div>

                    <?php
                                if(isset($_POST['update_condition'])){
                                    $dash_id  = 1;
                                    $dash_link = $_POST['dash_link'];
                                    $dash_title = $_POST['dash_title'];
                                    $dash_description = $_POST['dash_description'];
                                    $dash_status = 1;
                                    $dash_date_time = date('d-m-y h:i:sa');
                                    $update_pravicy_run ="UPDATE `dash_home` SET `dash_link`='$dash_link',`dash_description`='$dash_description',`dash_status`='$dash_status',`dash_date_time`='$dash_date_time',`dash_title` ='$dash_title' WHERE `dash_id`='$dash_id'";
                                    $update_query = mysqli_query($con, $update_pravicy_run);
                                    if ($update_query){
                                
                                        $_SESSION['SuccessMessage'] = "Dashboard Data  Updated Successfully  ";
                                        ?>
                                        <script>
                                        location.replace("dash_data.php");
                                        </script>
                                        <?php
                                    } 
                                    
                                    else{
                                        $_SESSION['errorMessage'] = "Dashboard Data Not Updated ";
                                        ?>

                        <script>
                        location.replace("dash_data.php");
                        </script>
                        <?php
                                    }
                                }
                                
                            ?>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include 'includeadmin/footer.php' ?>
</script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
</script>
<script src="https://ckeditor.com/latest/ckeditor.js"></script>
<script>
CKEDITOR.replace('about_university');
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#Table').DataTable();
});
$(document).ready(function() {
    $('#edit_button').click(function() {
        $('#salman').prop('disabled', false);
        $('#abouts_university').prop('disabled', false);
        $("#edit_button").hide();
        $("#update_button").show();
    });
    $("#update_button").hide();
});
</script>