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
        <h1>Manager Blog
            <small>Edit Blog</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="">Edit Blog</a></li>
        </ol>
    </section>
    <div class="container-fluid">
<div class="row">

<div class="col-md-12">
        <div class="box box-primary" style="margin-top:25px;">
            <div class="row">
                <div class="col-md-12">
                <div class="box-header with-border" style="margin-bottom:20px;">
                        <h3 class="box-title">Edit Blog </h3>
                    </div>
                    <div class="box-body">
                        <?php       
                                $blog_id = $_GET['blog_id'];
                                $selectquery_blog = "SELECT * FROM `blog` WHERE blog_id = '$blog_id' and blog_status = '1'";
                                $query_blog = mysqli_query($con, $selectquery_blog);
                                 $blog_edit = mysqli_fetch_assoc($query_blog);                            
                            ?>
                        <form role="form" method="POST" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Blog Title<span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" name="blog_title"
                                        value="<?php echo $blog_edit['blog_title']?>" required placeholder="Blog Title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Blog Image<span class="text-danger">*</span><small
                                                    style="color:blue">[For Best View Of Banner Width="370px"
                                                    Height="235px"]
                                                </small></label>
                                    <input type="file" class="form-control" name="blog_image"
                                        value="<?php echo $blog_edit['blog_image']?>">
                                    <input type="hidden" name="blog_image_old"
                                        value="<?php echo $blog_edit['blog_image']?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Blog Cover Image<span class="text-danger">*</span> <small
                                                    style="color:blue">[For Best View Of Banner Width="770px"
                                                    Height="450px"]
                                                </small> </label>
                                    <input type="file" class="form-control" name="blog_cover_image" placeholder="">
                                    <input type="hidden" name="blog_cover_image_old"
                                        value="<?php echo $blog_edit['blog_cover_image']?>">
                                </div>
                            </div>
                          
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">Blog Small Description<span class="text-danger">*</span><small
                                            style="color:blue">[For Best View Of For small description character must be
                                            150 to 180]
                                        </small> </label>
                                    <textarea name="blog_small_description" value="" placeholdder="SEO Keyword "
                                        cols="8" rows="3" class="form-control"
                                        required><?php echo $blog_edit['blog_small_description']?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="about university">Blog Description</label>
                                    <textarea name="blog_description" id="about_university"
                                        placeholdder="About university"
                                        class="form-control"><?php echo $blog_edit['blog_description']?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">SEO Keyword<span class="text-danger">*</span> </label>
                                    <textarea name="seo_keyword" value="" placeholdder="SEO Keyword " cols="8" rows="3"
                                        class="form-control" required><?php echo $blog_edit['seo_keyword']?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">SEO Description<span class="text-danger">*</span> </label>
                                    <textarea name="seo_description" value="" placeholdder="SEO Description " cols="8"
                                        rows="3" class="form-control"
                                        required><?php echo $blog_edit['seo_description']?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="add_blog">Edit Blog</button>
                                </div>
                            </div>
                        </form>
                        <?php
                            // data  is posing 
                            if(isset($_POST['add_blog'])){
                                    $blog_id = $_GET['blog_id'];
                                    $blog_title = $_POST['blog_title'];
                                    $bolg_add_by =$_SESSION['username'];
                                    $blog_img_01 = $_FILES['blog_image']['name'];
                                    $blog_img_02 = $_FILES['blog_cover_image']['name'];
                                    $blog_description =$_POST['blog_description'];
                                    $blog_small_description =$_POST['blog_small_description'];
                                    $course_to_lower = strtolower($blog_title);
                                    $blog_slug = str_replace(' ','-',$course_to_lower);
                                    $blog_status = 1;
                                    $blog_datetime = date('d-M-y');
                                    $image_01 = $_POST['blog_image_old'];
                                    $image_02 = $_POST['blog_cover_image_old'];
                                    //seo start //
                                              
                                    $seo_keyword = $_POST['seo_keyword'];
                                    $seo_description=  $_POST['seo_description'];
                                    if (empty($blog_img_01)) {
                                        $update_image = $image_01 ;
                                    }
                                else{
                                    $allowed_extension = array('gif','png','jpg','jpeg');
                                    $blog_img_01 = $_FILES['blog_image']['name'];
                                    $image_new = pathinfo($blog_img_01, PATHINFO_EXTENSION);
                                    if (!in_array($image_new,$allowed_extension)) {
                                        $_SESSION['errorMessage'] = "Upload Valid Images. Only PNG, JPEG, JPG And GIF are Allowed.";
                                        ?>
                                        <script>
                                        const myKeysValue = window.location.search;
                                        const urlParams = new URLSearchParams(myKeysValue);
                                        const blog_id = urlParams.get('blog_id');
                                        location.replace("edit_blog.php?blog_id=" + blog_id);
                                        </script>
                                        <?php
                                    }
                                    if (file_exists("../upload/blog/".$blog_img_01)) {
                                        $_SESSION['errorMessage'] = "Image Already Exists " .$blog_img_01;
                                        ?>
                                    <script>
                                    const myKeysValue = window.location.search;
                                    const urlParams = new URLSearchParams(myKeysValue);
                                    const blog_id = urlParams.get('blog_id');
                                    location.replace("edit_blog.php?blog_id=" + blog_id);
                                    </script>
                                    <?php
                                    }
                                    $update_image = $blog_img_01 ;
                                }
                                    if (empty($blog_img_02)) {
                                        $update_image_02 = $image_02 ;
                                    }
                                else{
                                    $allowed_extension_2 = array('gif','png','jpg','jpeg');
                                    $blog_img_02 = $_FILES['blog_cover_image']['name'];
                                    $file_blog_cover_image = pathinfo($blog_img_02, PATHINFO_EXTENSION);
                                    if (!in_array($file_blog_cover_image,$allowed_extension_2)) {
                                        $_SESSION['errorMessage'] = "Upload Valid Images. Only PNG, JPEG, JPG And GIF are Allowed.";
                                            ?>
                                        <script>
                                        const myKeysValue = window.location.search;
                                        const urlParams = new URLSearchParams(myKeysValue);
                                        const blog_id = urlParams.get('blog_id');
                                        location.replace("edit_blog.php?blog_id=" + blog_id);
                                        </script>
                                        <?php
                                    }
                                    if (file_exists("../upload/blog/".$blog_img_02)) {
                                        $_SESSION['errorMessage'] = "Image Already Exists ".$blog_img_02;
                                        ?>
                                        <script>
                                        const myKeysValue = window.location.search;
                                        const urlParams = new URLSearchParams(myKeysValue);
                                        const blog_id = urlParams.get('blog_id');
                                        location.replace("edit_blog.php?blog_id=" + blog_id);
                                        </script>
                                        <?php
                                        
                                    }
                                    $update_image_02 = $blog_img_02 ; 
                                  
                                }
                                     // blog data is inserting in database
                                    $query_blog_run = "UPDATE `blog` SET `blog_title`='$blog_title',`blog_image`='$update_image',`blog_status`='$blog_status',`blog_datetime`='$blog_datetime',`blog_description`='$blog_description',`blog_slug`='$blog_slug',`blog_cover_image`='$update_image_02',`blog_small_description`='$blog_small_description',`blog_add_by`='$bolg_add_by' ,`seo_keyword`='$seo_keyword',`seo_description`='$seo_description' WHERE `blog_id`='$blog_id'";
                                    $updatequery_blog = mysqli_query($con, $query_blog_run);
                                    if ($updatequery_blog) {
                                        // upload new image if UPDATE Image
                                        if (!empty($blog_img_01)) {
                                            // moveing file to the folder
                                            move_uploaded_file($_FILES ["blog_image"]["tmp_name"], "../upload/blog/".$blog_img_01);
                                            // remove the old file from folder
                                            unlink("../upload/blog/".$image_01);
                                         }
                                     
                                        if (!empty($blog_img_02)) {
                                            // moveing file to the folder
                                            // header('location: blog_list.php');
                                            move_uploaded_file($_FILES ["blog_cover_image"]["tmp_name"], "../upload/blog/".$blog_img_02);
                                            // remove the old file from folder
                                            unlink("../upload/blog/".$image_02);
                                        }
                                       
                                     
                                         ?>
                                        <script>
                                        location.replace("blog_list.php");
                                        </script>
                                        <?php
                                        $_SESSION['SuccessMessage'] = "Blog Data Update Successfully!";
                                      
                                }
                                else {
                                    $_SESSION['errorMessage'] = "Blog Not Updated!";
                                    ?>
                                        <script>
                                        location.replace("blog_list.php");
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