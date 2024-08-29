<?php include 'includeadmin/header.php';?>
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
        <h1>Manager Solution
            <small>Edit Solution</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="">Edit Solution</a></li>
        </ol>
    </section>
    <div class="container-fluid">
<div class="row">

<div class="col-md-12">
        <div class="box box-primary" style="margin-top:25px;">
            <div class="row">
                <div class="col-md-12">
                <div class="box-header with-border" style="margin-bottom:20px;">
                        <h3 class="box-title">Edit Solution </h3>
                    </div>
                    <div class="box-body">
                        <?php       
                                $services_id = $_GET['services_id'];
                                $selectquery_services = "SELECT * FROM `services` WHERE services_id = '$services_id' and services_status = '1'";
                                $query_services = mysqli_query($con, $selectquery_services);
                                 $services_edit = mysqli_fetch_assoc($query_services);                            
                            ?>
                        <form role="form" method="POST" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Solution Title<span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" name="services_title"
                                        value="<?php echo $services_edit['services_title']?>" required placeholder="Solution Title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Solution Image<span class="text-danger">*</span> <small
                                                    style="color:blue">[For Best View Of Banner Width="650px"
                                                    Height="450px"]
                                                </small></label>
                                    <input type="file" class="form-control" name="services_image"
                                        value="<?php echo $services_edit['services_image']?>">
                                    <input type="hidden" name="services_image_old"
                                        value="<?php echo $services_edit['services_image']?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Solution Cover Image<span class="text-danger">*</span> <small
                                                    style="color:blue">[For Best View Of Banner Width="800px"
                                                    Height="450px"]
                                                </small> </label>
                                    <input type="file" class="form-control" name="services_cover_image" placeholder="">
                                    <input type="hidden" name="services_cover_image_old"
                                        value="<?php echo $services_edit['services_cover_image']?>">
                                </div>
                            </div>
                          
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">Solution Small Description<span class="text-danger">*</span><small
                                            style="color:blue">[For Best View Of For small description character must be
                                            150 to 180]
                                        </small> </label>
                                    <textarea name="services_small_description" value="" placeholdder="SEO Keyword "
                                        cols="8" rows="3" class="form-control"
                                        required><?php echo $services_edit['services_small_description']?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="about university">Solution Description</label>
                                    <textarea name="services_description" id="about_university"
                                        placeholdder="About university"
                                        class="form-control"><?php echo $services_edit['services_description']?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">SEO Keyword<span class="text-danger">*</span> </label>
                                    <textarea name="seo_keyword" value="" placeholdder="SEO Keyword " cols="8" rows="3"
                                        class="form-control" required><?php echo $services_edit['seo_keyword']?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">SEO Description<span class="text-danger">*</span> </label>
                                    <textarea name="seo_description" value="" placeholdder="SEO Description " cols="8"
                                        rows="3" class="form-control"
                                        required><?php echo $services_edit['seo_description']?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="add_services">Edit Solution</button>
                                </div>
                            </div>
                        </form>
                        <?php
                            // data  is posing 
                            if(isset($_POST['add_services'])){
                                    $services_id = $_GET['services_id'];
                                    $services_title = $_POST['services_title'];
                                    $bolg_add_by =$_SESSION['username'];
                                    $services_img_01 = $_FILES['services_image']['name'];
                                    $services_img_02 = $_FILES['services_cover_image']['name'];
                                    $services_description =$_POST['services_description'];
                                    $services_small_description =$_POST['services_small_description'];
                                    $course_to_lower = strtolower($services_title);
                                    $services_slug = str_replace(' ','-',$course_to_lower);
                                    $services_status = 1;
                                    $services_datetime = date('d-M-y');
                                    $image_01 = $_POST['services_image_old'];
                                    $image_02 = $_POST['services_cover_image_old'];
                                    //seo start //
                                              
                                    $seo_keyword = $_POST['seo_keyword'];
                                    $seo_description=  $_POST['seo_description'];
                                    if (empty($services_img_01)) {
                                        $update_image = $image_01 ;
                                    }
                                else{
                                    $allowed_extension = array('gif','png','jpg','jpeg');
                                    $services_img_01 = $_FILES['services_image']['name'];
                                    $image_new = pathinfo($services_img_01, PATHINFO_EXTENSION);
                                    if (!in_array($image_new,$allowed_extension)) {
                                        $_SESSION['errorMessage'] = "Upload Valid Images. Only PNG, JPEG, JPG And GIF are Allowed.";
                                        ?>
                                        <script>
                                        const myKeysValue = window.location.search;
                                        const urlParams = new URLSearchParams(myKeysValue);
                                        const services_id = urlParams.get('services_id');
                                        location.replace("edit_services.php?services_id=" + services_id);
                                        </script>
                                        <?php
                                    }
                                    if (file_exists("../upload/services/".$services_img_01)) {
                                        $_SESSION['errorMessage'] = "Image Already Exists " .$services_img_01;
                                        ?>
                                    <script>
                                    const myKeysValue = window.location.search;
                                    const urlParams = new URLSearchParams(myKeysValue);
                                    const services_id = urlParams.get('services_id');
                                    location.replace("edit_services.php?services_id=" + services_id);
                                    </script>
                                    <?php
                                    }
                                    $update_image = $services_img_01 ;
                                }
                                    if (empty($services_img_02)) {
                                        $update_image_02 = $image_02 ;
                                    }
                                else{
                                    $allowed_extension_2 = array('gif','png','jpg','jpeg');
                                    $services_img_02 = $_FILES['services_cover_image']['name'];
                                    $file_services_cover_image = pathinfo($services_img_02, PATHINFO_EXTENSION);
                                    if (!in_array($file_services_cover_image,$allowed_extension_2)) {
                                        $_SESSION['errorMessage'] = "Upload Valid Images. Only PNG, JPEG, JPG And GIF are Allowed.";
                                            ?>
                                        <script>
                                        const myKeysValue = window.location.search;
                                        const urlParams = new URLSearchParams(myKeysValue);
                                        const services_id = urlParams.get('services_id');
                                        location.replace("edit_services.php?services_id=" + services_id);
                                        </script>
                                        <?php
                                    }
                                    if (file_exists("../upload/services/".$services_img_02)) {
                                        $_SESSION['errorMessage'] = "Image Already Exists ".$services_img_02;
                                        ?>
                                        <script>
                                        const myKeysValue = window.location.search;
                                        const urlParams = new URLSearchParams(myKeysValue);
                                        const services_id = urlParams.get('services_id');
                                        location.replace("edit_services.php?services_id=" + services_id);
                                        </script>
                                        <?php
                                        
                                    }
                                    $update_image_02 = $services_img_02 ; 
                                  
                                }
                                     // services data is inserting in database
                                    $query_services_run = "UPDATE `services` SET `services_title`='$services_title',`services_image`='$update_image',`services_status`='$services_status',`services_datetime`='$services_datetime',`services_description`='$services_description',`services_slug`='$services_slug',`services_cover_image`='$update_image_02',`services_small_description`='$services_small_description',`services_add_by`='$bolg_add_by' ,`seo_keyword`='$seo_keyword',`seo_description`='$seo_description' WHERE `services_id`='$services_id'";
                                    $updatequery_services = mysqli_query($con, $query_services_run);
                                    if ($updatequery_services) {
                                        // upload new image if UPDATE Image
                                        if (!empty($services_img_01)) {
                                            // moveing file to the folder
                                            move_uploaded_file($_FILES ["services_image"]["tmp_name"], "../upload/services/".$services_img_01);
                                            // remove the old file from folder
                                            unlink("../upload/services/".$image_01);
                                         }
                                  
                                        if (!empty($services_img_02)) {
                                            // moveing file to the folder
                                            // header('location: services_list.php');
                                            move_uploaded_file($_FILES ["services_cover_image"]["tmp_name"], "../upload/services/".$services_img_02);
                                            // remove the old file from folder
                                            unlink("../upload/services/".$image_02);
                                        }
                                       
                                     
                                         ?>
                                        <script>
                                        location.replace("services_list.php");
                                        </script>
                                        <?php
                                        $_SESSION['SuccessMessage'] = "Solution Data Update Successfully!";
                                      
                                }
                                else {
                                    $_SESSION['errorMessage'] = "Solution Not Updated!";
                                    ?>
                                        <script>
                                        location.replace("services_list.php");
                                        </script>
                                        <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- </div> -->
</div>
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
<?php include 'includeadmin/footer.php';?>