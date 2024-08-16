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
        <h1>Contact Page Data
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a class="active">Contact Page Data</a></li>
        </ol>
    </section>
    <?php   
       // fetching data 
        $term_fetech = "SELECT * FROM `contact` WHERE `contact_status`= '1' AND contact_id = '1'";
        $term_query = mysqli_query($con, $term_fetech);
        $term_list = mysqli_fetch_array($term_query);   
    ?>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border" style="margin-bottom:20px;">
                        <h3 class="box-title">Contact Page Data</h3>
                    </div>
                    <div class="box-body">
                        <form role="form" method="POST" enctype="multipart/form-data">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Sub Title </label>
                                        <input type="text" class="form-control" id="salman" disabled name="contact_subtilte"
                                            placeholder=" Sub Title" value="<?php echo $term_list['contact_subtilte'];?>"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Title</label>
                                        <input type="text" class="form-control" id="abouts_university" disabled
                                            name="contact_title" placeholder="Title "
                                            value="<?php echo $term_list['contact_title'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Sub Title </label>
                                        <input type="text" class="form-control" id="salmans" disabled
                                            name="contact_subtitle_1" placeholder=" Sub Title"
                                            value="<?php echo $term_list['contact_subtitle_1'];?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Title</label>
                                        <input type="text" class="form-control" id="abouts_universitys" disabled
                                            name="contact_title_1" placeholder="Title "
                                            value="<?php echo $term_list['contact_title_1'];?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Contact Info Name </label>
                                        <input type="text" class="form-control" id="1" disabled name="contact_name"
                                            placeholder=" Contact Info Name" value="<?php echo $term_list['contact_name'];?>"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Contact Info Address</label>
                                        <input type="text" class="form-control" id="2" disabled
                                            name="contact_addr" placeholder="Contact Info Address "
                                            value="<?php echo $term_list['contact_addr'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Contact Info Number </label>
                                        <input type="text" class="form-control" id="3" disabled
                                            name="contact_number" placeholder=" Contact Info Number"
                                            value="<?php echo $term_list['contact_number'];?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Contact Info Email</label>
                                        <input type="text" class="form-control" id="4" disabled
                                            name="contact_email" placeholder="Contact Info Email "
                                            value="<?php echo $term_list['contact_email'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Contact Info Name 2</label>
                                        <input type="text" class="form-control" id="5" disabled name="contact_name_1"
                                            placeholder=" Contact Info Name 2" value="<?php echo $term_list['contact_name_1'];?>"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Contact Info Address 2</label>
                                        <input type="text" class="form-control" id="6" disabled
                                            name="contact_addr_1" placeholder="Contact Info Address 2 "
                                            value="<?php echo $term_list['contact_addr_1'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Contact Info Number 2</label>
                                        <input type="text" class="form-control" id="7" disabled
                                            name="contact_num_1" placeholder=" Contact Info Number 2"
                                            value="<?php echo $term_list['contact_num_1'];?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Contact Info Email 2</label>
                                        <input type="text" class="form-control" id="8" disabled
                                            name="contact_email_1" placeholder="Contact Info Email 2"
                                            value="<?php echo $term_list['contact_email_1'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Contact Info Name 3</label>
                                        <input type="text" class="form-control" id="9" disabled name="contact_name_2"
                                            placeholder=" Contact Info Name 3" value="<?php echo $term_list['contact_name_2'];?>"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Contact Info Address 3</label>
                                        <input type="text" class="form-control" id="10" disabled
                                            name="contact_addr_2" placeholder="Contact Info Address 3"
                                            value="<?php echo $term_list['contact_addr_2'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Contact Info Number 3</label>
                                        <input type="text" class="form-control" id="11" disabled
                                            name="contact_num_2" placeholder=" Contact Info Number 3"
                                            value="<?php echo $term_list['contact_num_2'];?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Contact Info Email 3</label>
                                        <input type="text" class="form-control" id="12" disabled
                                            name="contact_email_2" placeholder="Contact Info Email 3"
                                            value="<?php echo $term_list['contact_email_2'];?>" required>
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
                                    $contact_subtilte = $_POST['contact_subtilte'];
                                    $contact_title = $_POST['contact_title'];
                                    $contact_subtitle_1 = $_POST['contact_subtitle_1'];
                                    $contact_title_1 = $_POST['contact_title_1'];
                                    $contact_name = $_POST['contact_name'];
                                    $contact_addr = $_POST['contact_addr'];
                                    $contact_number = $_POST['contact_number'];
                                    $contact_email = $_POST['contact_email'];
                                    $contact_name_1 = $_POST['contact_name_1'];
                                    $contact_addr_1 = $_POST['contact_addr_1'];
                                    $contact_num_1 = $_POST['contact_num_1'];
                                    $contact_email_1 = $_POST['contact_email_1'];
                                    $contact_name_2 = $_POST['contact_name_2'];
                                    $contact_addr_2 = $_POST['contact_addr_2'];
                                    $contact_num_2 = $_POST['contact_num_2'];
                                    $contact_email_2 = $_POST['contact_email_2'];
                                    $contact_status = 1;
                                    $contact_datetime = date('d-m-y h:i:sa');
                                    $update_pravicy_run ="UPDATE `contact` SET `contact_subtilte`='$contact_subtilte',`contact_title`='$contact_title',`contact_subtitle_1`='$contact_subtitle_1',`contact_title_1`='$contact_title_1',`contact_name`='$contact_name',`contact_addr`='$contact_addr',`contact_number`='$contact_number',`contact_email`='$contact_email',`contact_name_1`='$contact_name_1',`contact_addr_1`='$contact_addr_1',`contact_num_1`='$contact_num_1',`contact_email_1`='$contact_email_1',`contact_name_2`='$contact_name_2',`contact_addr_2`='$contact_addr_2',`contact_num_2`='$contact_num_2',`contact_email_2`='$contact_email_2',`contact_status`='$contact_status',`contact_datetime`='$contact_datetime' WHERE `contact_id`='$dash_id'";
                                   
                                    $update_query = mysqli_query($con, $update_pravicy_run);
                                    if ($update_query){
                                    
                                        $_SESSION['SuccessMessage'] = "Contact Data  Updated Successfully  ";
                                        ?>
                                        <script>
                                        location.replace("contact_page.php");
                                        </script>
                                        <?php
                                    } 
                                    
                                    else{
                                        $_SESSION['errorMessage'] = "Contact Data Not Updated ";
                                        ?>

                                    <script>
                                    location.replace("contact_page.php");
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
        $('#abouts_universityss').prop('disabled', false);
        $('#salmans').prop('disabled', false);
        $('#abouts_universitys').prop('disabled', false);
        $('#1').prop('disabled', false);
        $('#2').prop('disabled', false);
        $('#3').prop('disabled', false);
        $('#4').prop('disabled', false);
        $('#5').prop('disabled', false);
        $('#6').prop('disabled', false);
        $('#7').prop('disabled', false);
        $('#8').prop('disabled', false);
        $('#9').prop('disabled', false);
        $('#10').prop('disabled', false);
        $('#11').prop('disabled', false);
        $('#12').prop('disabled', false);
        $("#edit_button").hide();
        $("#update_button").show();
    });
    $("#update_button").hide();
});
</script>