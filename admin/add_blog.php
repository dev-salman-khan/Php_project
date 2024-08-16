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
            <small>Add Blog</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="">Add Blog</a></li>
        </ol>
    </section>
    <div class="container-fluid">
<div class="row">

<div class="col-md-12">
        <div class="box box-primary" style="margin-top:25px;">
        <div class="box-header with-border" style="margin-bottom:20px;">
                        <h3 class="box-title">Add Blog</h3>
                    </div>
                        
            <form role="form" method="POST" enctype="multipart/form-data" onsubmit="return myFuntion() ">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="box-body">
                                <form role="form" action="" method="POST" enctype="multipart/form-data">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Blog Title<span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="blog_title" required
                                                placeholder="Blog Title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Blog Image<span class="text-danger">*</span> <small
                                                    style="color:blue">[For Best View Of Banner Width="370px"
                                                    Height="235px"]
                                                </small></label>
                                            <input type="file" class="form-control" name="blog_image" required
                                                placeholder=" ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Blog Cover Image<span class="text-danger">*</span> <small
                                                    style="color:blue">[For Best View Of Banner Width="770px"
                                                    Height="450px"]
                                                </small></label>
                                            <input type="file" class="form-control" name="blog_cover_image" required
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password">Blog Small Description<span class="text-danger">*</span>  <small
                                                    style="color:blue">[For Best View Of For small description character must be 150 to 180]
                                                </small></label>
                                            <textarea name="blog_small_description" value="" placeholdder=" " cols="8"
                                                rows="3" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="about university"> Blog Description </label>
                                            <textarea name="blog_description" id="about_university"
                                                placeholdder="About university" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h1> Blog SEO</h1>
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password">SEO Keyword<span class="text-danger">*</span> </label>
                                            <textarea name="seo_keyword" value="" placeholdder="SEO Keyword " cols="8"
                                                rows="3" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password">SEO Description<span class="text-danger">*</span>
                                            </label>
                                            <textarea name="seo_description" value="" placeholdder="SEO Description "
                                                cols="8" rows="3" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" name="add_blog">Add
                                                Blog</button>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                     // putting data by post
                                    if(isset($_POST['add_blog'])){
                                        // blog data is poting
                                        $blog_title = $_POST['blog_title'];
                                        $blog_image = $_FILES['blog_image']['name'];
                                        $blog_cover_image = $_FILES['blog_cover_image']['name'];
                                        $blog_description = $_POST['blog_description'];
                                        $blog_add_by = $_SESSION['username'];
                                        $blog_small_description = $_POST['blog_small_description'];
                                        $course_to_lower = strtolower($blog_title);
                                        $blog_slug = str_replace(' ','-',$course_to_lower);
                                        $blog_status = 1;    
                                        $blog_datetime = date('d-M-Y'); 
                                                   
                                        $seo_keyword = $_POST['seo_keyword'];
                                        $seo_description=  $_POST['seo_description'];
                                        $allowed_extension = array('gif','png','jpg','jpeg');
                                        $file_extension_blog = pathinfo($blog_image, PATHINFO_EXTENSION);
                                        if (!in_array($file_extension_blog,$allowed_extension)) {
                                                $_SESSION['errorMessage'] = "Upload Valid Images. Only PNG, JPEG, JPG And GIF are Allowed.";
                                                    ?>
                                            <script>
                                            window.location.href = "add_blog.php";
                                            </script>
                                            <?php
                                        }
                                        else{
                                            if (file_exists("../upload/blog/".$blog_image) ) {
                                                $_SESSION['errorMessage'] = "Image Already Exists " .$blog_image;
                                                    ?>
                                            <script>
                                            window.location.href = "add_blog.php";
                                            </script>
                                            <?php  
                                            }
                                            else{
                                                $file_extension_cover_image = pathinfo($blog_cover_image, PATHINFO_EXTENSION);
                                                if (!in_array($file_extension_cover_image,$allowed_extension)) {
                                                    $_SESSION['errorMessage'] = "Upload Valid Images. Only PNG, JPEG, JPG And GIF are Allowed.";
                                                    ?>
                                            <script>
                                            window.location.href = "add_blog.php";
                                            </script>
                                            <?php
                                                }
                                                else{
                                                    if (file_exists("../upload/blog/".$blog_cover_image) ) {
                                                        $_SESSION['errorMessage'] = "Image Already Exists " .$blog_cover_image;
                                                        ?>
                                                            <script>
                                                            window.location.href = "add_blog.php";
                                                            </script>
                                                        <?php     
                                                    }
                                                    else{
                                                        // inserting data to data base for blog only
                                                        $insert_blog ="INSERT INTO `blog`(`blog_title`, `blog_image`, `blog_status`, `blog_datetime`, `blog_description`, `blog_slug`, `blog_cover_image`, `blog_small_description`, `blog_add_by`,`seo_keyword`, `seo_description`) VALUES ('$blog_title','$blog_image','$blog_status','$blog_datetime','$blog_description','$blog_slug','$blog_cover_image','$blog_small_description','$blog_add_by','$seo_keyword', '$seo_description')";  
                                                        $result_bolg = mysqli_query($con, $insert_blog);
                                                        $last_id = mysqli_insert_id($con);
                                                        if ($result_bolg){
                                                            move_uploaded_file($_FILES ["blog_image"]["tmp_name"], "../upload/blog/".$blog_image);
                                                            move_uploaded_file($_FILES ["blog_cover_image"]["tmp_name"], "../upload/blog/".$blog_cover_image);
                                                                $_SESSION['SuccessMessage'] = "blog insert successfully";
                                                                ?>
                                                                    <script>
                                                                    location.replace("blog_list.php");
                                                                    </script>
                                                                <?php        
                                                            }
                                                            else{
                                                                $_SESSION['errorMessage'] = "blog not  inserted";
                                                                ?>
                                                                <script>
                                                                location.replace("blog_list.php");
                                                                </script>
                                                            <?php 
                                                            }
                                                        } 
                                                    }
                                                } 
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
    </div>
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
<script>
$(document).ready(function() {
    $('#Table').DataTable();
});
</script>
<script>
function numberonly(input) {
    var num = /[^0-9]/gi;
    inputinputplace(num, "")
}

function checkdelete() {
    return confirm("Are You Sure! You Want To Delete This blog");
}

</script>

<?php include 'includeadmin/footer.php';?>