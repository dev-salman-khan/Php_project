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
        <h1> Blog List
            <small>Manager Blog List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="blog_list.php">Blog List</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="box-header with-border" style="margin-bottom:20px;">
                            <h3 class="box-title">Blog List</h3>
                        </div>
                        <div class="table-responsive">
                        <form role="form" action="#" method="POST">
                            <button type="submit" style="float:right; margin-bottom:10px;"
                                    onclick="return button1();" name="popular_removes"
                                    class="btn btn-primary"><i class="fa fa-home"></i>Remove From Popular Blog 
                                </button>
                                <button type="submit" style="float:right; margin-bottom:10px;"
                                    onclick="return button2();" name="popular_adds"
                                    class="btn btn-success"><i class="fa fa-home"></i>Do Popular Blog </button>
                            <table id="blog" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S No</th>
                                        <th>Blog Title</th>
                                        <th>Blog Image</th>
                                        <th>Blog Cover Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            $selectquery_blog = "select * from blog where blog_status = '1' ORDER BY blog_id DESC";
                                            $query_blog = mysqli_query($con, $selectquery_blog);
                                            $i = 1;
                                            while ($blog_list = mysqli_fetch_array($query_blog)) {
                                                ?>
                                    <tr>
                                        <td><?php echo $i ?> <input type="checkbox" class="btn_click"
                                                    value="<?php echo $blog_list['blog_id']; ?>"
                                                    name="affiliated_popular[]"></td>
                                        <td><?php echo $blog_list['blog_title'];  ?><br><?php if($blog_list['blog_popular']=='1'){?>
                                                <small class="label label-success">Popular Blog </small>
                                                <?php } ?></td>
                                        <td> <img
                                                src='<?php echo ROOT_URL_ADMIN ."upload/blog/" . $blog_list['blog_image']; ?>'
                                                alt="" width="150px" height="150px"></td>
                                        <td> <img
                                                src='<?php echo ROOT_URL_ADMIN ."upload/blog/" . $blog_list['blog_cover_image']; ?>'
                                                alt="" width="150px" height="150px"></td>

                                        <td> <a href="edit_blog.php?blog_id=<?php echo $blog_list['blog_id'];?>">
                                                <button type="button" class="btn btn-success" onclick="return edit()"><i
                                                        class="fa fa-edit"></i>&nbsp;Edit</button>
                                            </a>|<a href="delete_blog.php?blog_id=<?php echo $blog_list['blog_id'];?>">
                                                <button onclick="return checkdelete()" type="button"
                                                    class="btn btn-danger"><i
                                                        class="fa fa-trash"></i>&nbsp;Delete</button></a></td>
                                    </tr>
                                    <?php
											$i++;
											}
									?>
                            </table>
                        </form>
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
    $('#blog').DataTable();
});

function checkdelete() {
    return confirm("Are You Sure! You Want To Delete This Blog");
}

function edit() {
    return confirm("Are You Sure! You Want To  Edit This blog");
}
function button2() {
    return confirm("Are You Sure! You Want To Do  This blog On Home Page");
}
function button1() {
    return confirm("Are You Sure! You Want To  Remove This blog  From Home Page");
}
</script>




<!-- new  -->

<?php 
         //  doing Popular Courses 
        if(isset($_POST['popular_adds'])){
            $affiliated_popular = $_POST['affiliated_popular'];
            $university_number = 1;  
            if(empty($affiliated_popular)){
                ?>
<script>
location.replace("blog_list.php");
</script>
<?php
$_SESSION['errorMessage'] = "Plz Checked The Check Box ";


            } else{
            // counting the value when Checkbox is click 
            $courese_count = count($affiliated_popular);
            for($i=0; $i < $courese_count; $i++){
                // updating Each Value 
                $sql_query = "UPDATE `blog` SET `blog_popular`='$university_number' WHERE `blog_id`='$affiliated_popular[$i]'";
                $rundata_base = mysqli_query($con, $sql_query);
                if($rundata_base){
                    $_SESSION['SuccessMessage'] = "blog Has Been Popular  successfully";
                    // header('location: courses_list.php');
                    ?>
<script>
location.replace("blog_list.php");
</script>
<?php
                } 
                else{
                    $_SESSION['errorMessage'] = "blog Has not Been Popular ";
                    ?>
<script>
location.replace("blog_list.php");
</script>
<?php
                }
            }
        }
    }
    ?>

<?php 
         //  doing Popular Courses 
        if(isset($_POST['popular_removes'])){
            $affiliated_popular = $_POST['affiliated_popular'];
            $blog_number = 0;  
            if(empty($affiliated_popular)){
                ?>
<script>
location.replace("blog_list.php");
</script>

<?php

$_SESSION['errorMessage'] = "Plz Checked The Check Box ";

            } else{
            // counting the value when Checkbox is click 
            $courese_count = count($affiliated_popular);
            for($i=0; $i < $courese_count; $i++){
                // updating Each Value 
                $sql_query = "UPDATE `blog` SET `blog_popular`='$blog_number' WHERE `blog_id`='$affiliated_popular[$i]'";
                $rundata_base = mysqli_query($con, $sql_query);
                if($rundata_base){
                    $_SESSION['SuccessMessage'] = "blog Popular Has been Removed  successfully";
                    // header('location: courses_list.php');
                    ?>
<script>
location.replace("blog_list.php");
</script>
<?php
                } 
                else{
                    $_SESSION['errorMessage'] = "blog Popular Not  removed ";
                    ?>
<script>
location.replace("blog_list.php");
</script>
<?php
                }
            }
        }
    }
    ?>



