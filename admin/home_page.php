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
        <h1>Home Page Data
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a class="active">Home Page Data</a></li>
        </ol>
    </section>
    <?php   
       // fetching data 
        $term_fetech = "SELECT * FROM `home` WHERE `home_status`= '1' AND home_id = '1'";
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

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Sub Title </label>
                                        <input type="text" class="form-control" id="salman" disabled name="home_subtile"
                                            placeholder=" Sub Title" value="<?php echo $term_list['home_subtile'];?>"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Title</label>
                                        <input type="text" class="form-control" id="abouts_university" disabled
                                            name="home_title" placeholder="Title "
                                            value="<?php echo $term_list['home_title'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Sub Title </label>
                                        <input type="text" class="form-control" id="salmans" disabled
                                            name="home_subtitle_1" placeholder=" Sub Title"
                                            value="<?php echo $term_list['home_subtitle_1'];?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Title</label>
                                        <input type="text" class="form-control" id="abouts_universitys" disabled
                                            name="home_title_1" placeholder="Title "
                                            value="<?php echo $term_list['home_title_1'];?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="about university">Description </label>
                                        <textarea name="home_description" id="about_university"
                                            class="form-control"><?php echo $term_list['home_description'];?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Box 1 Name </label>
                                        <input type="text" class="form-control" id="1" disabled name="home_boxone"
                                            placeholder=" Box 1 Name" value="<?php echo $term_list['home_boxone'];?>"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Box 2 Name</label>
                                        <input type="text" class="form-control" id="2" disabled
                                            name="home_boxtwo" placeholder="Box 2 Name "
                                            value="<?php echo $term_list['home_boxtwo'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Box 3 Name </label>
                                        <input type="text" class="form-control" id="3" disabled
                                            name="home_boxthree" placeholder=" Box 3 Name"
                                            value="<?php echo $term_list['home_boxthree'];?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Box 4 Name</label>
                                        <input type="text" class="form-control" id="4" disabled
                                            name="home_boxfour" placeholder="Box 4 Name "
                                            value="<?php echo $term_list['home_boxfour'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Box 5 Name </label>
                                        <input type="text" class="form-control" id="5" disabled
                                            name="home_boxfive" placeholder=" Box 5 Name"
                                            value="<?php echo $term_list['home_boxfive'];?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Box 6 Name</label>
                                        <input type="text" class="form-control" id="6" disabled
                                            name="home_boxsix" placeholder="Box 6 Name "
                                            value="<?php echo $term_list['home_boxsix'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Sub Title </label>
                                        <input type="text" class="form-control" id="7" disabled
                                            name="home_subtile_2" placeholder=" Sub Title"
                                            value="<?php echo $term_list['home_subtile_2'];?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Title</label>
                                        <input type="text" class="form-control" id="8" disabled
                                            name="home_title_2" placeholder="Title "
                                            value="<?php echo $term_list['home_title_2'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Sub Title </label>
                                        <input type="text" class="form-control" id="9" disabled
                                            name="home_subtitle_3" placeholder=" Sub Title"
                                            value="<?php echo $term_list['home_subtitle_3'];?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Title</label>
                                        <input type="text" class="form-control" id="10" disabled
                                            name="home_title_3" placeholder="Title "
                                            value="<?php echo $term_list['home_title_3'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Image <span class="text-danger">*</span> <small
                                                style="color:blue">[For Best View Of about image image Width="650px"
                                                Height="550px"]
                                            </small></label>
                                        <input type="file" disabled class="form-control" name="home_image"
                                            id="abouts_universityss">
                                        <input type="hidden" class="form-control" name="home_image_old"
                                            value="<?php echo $term_list['home_image']?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Image <span class="text-danger">*</span></label><br>
                                        <img src='<?php echo ROOT_URL_ADMIN."upload/about_image/".$term_list ['home_image']; ?>'
                                            width="400px">

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
                                    $home_title = $_POST['home_title'];
                                    $home_subtile = $_POST['home_subtile'];
                                    $home_title_1 = $_POST['home_title_1'];
                                    $home_subtitle_1 = $_POST['home_subtitle_1'];
                                    $home_description = $_POST['home_description'];
                                    $home_boxone = $_POST['home_boxone'];
                                    $home_boxtwo = $_POST['home_boxtwo'];
                                    $home_boxthree = $_POST['home_boxthree'];
                                    $home_boxfour = $_POST['home_boxfour'];
                                    $home_boxfive = $_POST['home_boxfive'];
                                    $home_boxsix = $_POST['home_boxsix'];
                                    $home_title_2 = $_POST['home_title_2'];
                                    $home_subtile_2 = $_POST['home_subtile_2'];
                                    $home_title_3 = $_POST['home_title_3'];
                                    $home_subtitle_3 = $_POST['home_subtitle_3'];
                                  
                                    $home_status = 1;
                                    $home_datetime = date('d-m-y h:i:sa');
                                    $home_image_old = $_POST['home_image_old'];
                                    $home_image = $_FILES['home_image']['name'];
							
                            //putting condition for images 
                            if (empty($home_image)) {
                                $update_image = $home_image_old ;
                            }
                            else{
                                
                                $allowed_extension = array('gif','png','jpg','jpeg');
                                $home_image = $_FILES['home_image']['name'];
                                $file_extension = pathinfo($home_image, PATHINFO_EXTENSION);
                                if (!in_array($file_extension,$allowed_extension)) {
                                    $_SESSION['errorMessage'] = "Upload Valid Images. Only PNG, JPEG, JPG And GIF are Allowed.";
                                    ?>
                    <script>
                    location.replace("home_page.php");
                    </script>
                    <?php
                                }
                                if (file_exists("../upload/about_image/".$home_image)) {
                                    $_SESSION['errorMessage'] = "Image Already Exists " .$home_image;
                                    ?>
                    <script>
                    location.replace("home_page.php");
                    </script>
                    <?php
                                }
                               $update_image = $home_image ;
                            }
                                    $update_pravicy_run ="UPDATE `home` SET `home_title`='$home_title',`home_subtile`='$home_subtile',`home_image`='$update_image',`home_title_1`='$home_title_1',`home_subtitle_1`='$home_subtitle_1',`home_description`='$home_description',`home_boxone`='$home_boxone',`home_boxtwo`='$home_boxtwo',`home_boxthree`='$home_boxthree',`home_boxfour`='$home_boxfour',`home_boxfive`='$home_boxfive',`home_boxsix`='$home_boxsix',`home_title_2`='$home_title_2',`home_subtile_2`='$home_subtile_2',`home_title_3`='$home_title_3',`home_subtitle_3`='$home_subtitle_3',`home_status`='$home_status',`home_datetime`='$home_datetime' WHERE  `home_id`='$dash_id'";
                                    $update_query = mysqli_query($con, $update_pravicy_run);
                                    if ($update_query){
                                        if (!empty($home_image)) {
                                            // moveing file to the folder
                                            move_uploaded_file($_FILES ["home_image"]["tmp_name"], "../upload/about_image/".$home_image); 
                                            // remove the old file from folder
                                            unlink("../upload/about_image/".$home_image_old);
                                        }
                                
                                        $_SESSION['SuccessMessage'] = "Home Data  Updated Successfully  ";
                                        ?>
                    <script>
                    location.replace("home_page.php");
                    </script>
                    <?php
                                    } 
                                    
                                    else{
                                        $_SESSION['errorMessage'] = "Home Data Not Updated ";
                                        ?>

                    <script>
                    location.replace("home_page.php");
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
        $("#edit_button").hide();
        $("#update_button").show();
    });
    $("#update_button").hide();
});
</script>