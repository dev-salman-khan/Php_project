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
        <h1>About Page Data
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a class="active">About Page Data</a></li>
        </ol>
    </section>
    <?php   
       // fetching data 
        $term_fetech = "SELECT * FROM `about` WHERE `about_status`= '1' AND about_id = '1'";
        $term_query = mysqli_query($con, $term_fetech);
        $term_list = mysqli_fetch_array($term_query);   
    ?>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border" style="margin-bottom:20px;">
                        <h3 class="box-title">About Page Data</h3>
                    </div>
                    <div class="box-body">
                        <form role="form" method="POST" enctype="multipart/form-data">



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="about university">Description </label>
                                        <textarea name="about_description" id="about_university"
                                            class="form-control"><?php echo $term_list['about_description'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Image <span class="text-danger">*</span> <small
                                                style="color:blue">[For Best View Of about image image Width="1600px"
                                                Height="600px"]
                                            </small></label>
                                        <input type="file" disabled class="form-control" name="about_image" id="abouts_universityss" >
                                        <input type="hidden" class="form-control" name="about_image_old"
                                            value="<?php echo $term_list['about_image']?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Image <span class="text-danger">*</span></label><br>
                                        <img src='<?php echo ROOT_URL_ADMIN."upload/about_image/".$term_list ['about_image']; ?>' width="400px">
                                                
                                    </div>
                                </div>
                                </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Sub Title </label>
                                        <input type="text" class="form-control" id="salman" disabled name="about_sub_tile"
                                            placeholder=" Sub Title" value="<?php echo $term_list['about_sub_tile'];?>"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Title</label>
                                        <input type="text" class="form-control" id="abouts_university" disabled
                                            name="about_tilte" placeholder="Title "
                                            value="<?php echo $term_list['about_tilte'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Sub Title </label>
                                        <input type="text" class="form-control" id="salmans" disabled name="about_sub_title_2"
                                            placeholder=" Sub Title" value="<?php echo $term_list['about_sub_title_2'];?>"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Title</label>
                                        <input type="text" class="form-control" id="abouts_universitys" disabled
                                            name="about_title_2" placeholder="Title "
                                            value="<?php echo $term_list['about_title_2'];?>" required>
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
                                    $about_description = $_POST['about_description'];
                                    $about_image_old = $_POST['about_image_old'];
                                    $about_sub_tile = $_POST['about_sub_tile'];
                                    $about_tilte = $_POST['about_tilte'];
                                    $about_sub_title_2 = $_POST['about_sub_title_2'];
                                    $about_title_2 = $_POST['about_title_2'];
                                    $about_status = 1;
                                    $about_datetime = date('d-m-y h:i:sa');
                                    $about_image = $_FILES['about_image']['name'];
							
                            //putting condition for images 
                            if (empty($about_image)) {
                                $update_image = $about_image_old ;
                            }
                            else{
                                
                                $allowed_extension = array('gif','png','jpg','jpeg');
                                $about_image = $_FILES['about_image']['name'];
                                $file_extension = pathinfo($about_image, PATHINFO_EXTENSION);
                                if (!in_array($file_extension,$allowed_extension)) {
                                    $_SESSION['errorMessage'] = "Upload Valid Images. Only PNG, JPEG, JPG And GIF are Allowed.";
                                    ?>
                                    <script>
                                    location.replace("about_page.php");
                                    </script>
                                    <?php
                                }
                                if (file_exists("../upload/about_image/".$about_image)) {
                                    $_SESSION['errorMessage'] = "Image Already Exists " .$about_image;
                                    ?>
                                    <script>
                                    location.replace("about_page.php");
                                    </script>
                                    <?php
                                }
                               $update_image = $about_image ;
                            }
                                    $update_pravicy_run ="UPDATE `about` SET `about_description`='$about_description',`about_image`='$update_image',`about_sub_tile`='$about_sub_tile',`about_tilte`='$about_tilte',`about_sub_title_2`='$about_sub_title_2',`about_title_2`='$about_title_2',`about_status`='$about_status',`about_datetime`='$about_datetime' WHERE  `about_id`='$dash_id'";
                                    $update_query = mysqli_query($con, $update_pravicy_run);
                                    if ($update_query){
                                        if (!empty($about_image)) {
                                            // moveing file to the folder
                                            move_uploaded_file($_FILES ["about_image"]["tmp_name"], "../upload/about_image/".$update_image); 
                                            // remove the old file from folder
                                            unlink("../upload/about_image/".$about_image_old);
                                        }
                                
                                        $_SESSION['SuccessMessage'] = "About Data  Updated Successfully  ";
                                        ?>
                    <script>
                    location.replace("about_page.php");
                    </script>
                    <?php
                                    } 
                                    
                                    else{
                                        $_SESSION['errorMessage'] = "About Data Not Updated ";
                                        ?>

                    <script>
                    location.replace("about_page.php");
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
        $("#edit_button").hide();
        $("#update_button").show();
    });
    $("#update_button").hide();
});
</script>