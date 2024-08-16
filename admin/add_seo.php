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
        <h1>Manager SEO
            <small>Add SEO</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="">Add SEO</a></li>
        </ol>
    </section>
    <div class="container col-md-12">
        <div class="box box-primary" style="margin-top:25px;">
            <div class="row">
                <div class="col-md-12">

                    <div class="box-header with-border" style="margin-bottom:20px;">
                        <h3 class="box-title">Add Seo </h3>
                    </div>
                    <div class="box-body">
                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Pages List <span class="text-danger">*</span><small
                                            style="color:blue">
                                        </small></label>
                                    <select type="text" class="form-control" name="seo_page_slug" required>
                                        <option value="">--Select Pages--</option>
                                        <option value="index.php">Home</option>
                                        <option value="about-us.php">About Us</option>
                                        <option value="contact-us.php">Contact Us</option>
                                        <option value="our-solutions.php">Our Solutions </option>
                                        <option value="privacy-policy.php">Pravicy And Policy</option>
                                        <option value="terms-and-conditions.php">Terms and Conditions</option>
                                        <option value="trainings.php">Training</option>
                                        <option value="blog.php">Blog </option>


                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">SEO Title<span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" name="seo_title" placeholder="SEO Title"
                                        required>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">SEO Keyword<span class="text-danger">*</span> </label>

                                    <textarea name="seo_keyword" value="" placeholdder="SEO Keyword " cols="8" rows="3"
                                        class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">SEO Description<span class="text-danger">*</span> </label>
                                    <textarea name="seo_description" value="" placeholdder="SEO Description " cols="8"
                                        rows="3" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="add_seo"><i
                                            class="fa fa-plus"></i>&nbsp;Add
                                        SEO</button>
                                </div>
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['add_seo'])){
                                $seo_page_slug = $_POST['seo_page_slug'];
                                $seo_title = $_POST['seo_title'];
                                $seo_keyword = $_POST['seo_keyword'];
                                $seo_description=  $_POST['seo_description'];
                                $seo_datetime = date('Y-m-d h:i:sa');
                                $seo_status = 1 ;
                                // inserting data in database
                                $add_data_seo = "INSERT INTO `seo`(`seo_page_slug`, `seo_title`, `seo_keyword`, `seo_description`, `seo_datetime`, `seo_status`) VALUES ('$seo_page_slug','$seo_title','$seo_keyword','$seo_description','$seo_datetime','$seo_status')";
                                // run query
                                // echo $add_data_seo;
                                // die;
                                $seo_query_run = mysqli_query($con , $add_data_seo);
                                if($seo_query_run){
                                    $_SESSION['SuccessMessage'] = "SEO insert successfully";
                                
                                    ?>
                        <script>
                        location.replace("add_seo.php");
                        </script>
                        <?php
                                }
                                else{
                                    $_SESSION['errorMessage'] = "SEO not  inserted";
                                    ?>
                                    <script>
                                    location.replace("add_seo.php");
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
    <div class="row">
        <section class="content">
            <div class="container col-md-12 col-xs-12">
                <div class="box box-primary" style="margin-top:25px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-header with-border" style="margin-bottom:20px;">
                                <h3 class="box-title">Seo List </h3>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="Table" class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th> Page Name</th>
                                                <th>Page Title</th>
                                                <th>Page Keyword</th>
                                                <th>Page Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $selectquery = "select * from seo where seo_status = '1'  ORDER BY seo_id DESC";
                                                $query_seo = mysqli_query($con, $selectquery);
                                                $i = 1;
                                                while ($seo_list = mysqli_fetch_array($query_seo)) {
                                                    ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo ucwords($seo_list['seo_page_slug']) ?></td>
                                                <td><?php echo $seo_list['seo_title'];  ?></td>
                                                <td><?php echo $seo_list['seo_keyword'];  ?></td>
                                                <td><?php echo $seo_list['seo_description'];  ?></td>
                                                <td> <a href="edit_seo.php?seo_id=<?php echo $seo_list['seo_id'];?>">
                                                        <button type="button" class="btn btn-success"> <i
                                                                class="fa fa-edit"></i>&nbsp;Edit</button>
                                                    </a>|<a
                                                        href="delete_seo.php?seo_id=<?php echo $seo_list['seo_id'];?>">
                                                        <button onclick="return checkdelete()" type="button"
                                                            class="btn btn-danger"><i
                                                                class="fa fa-trash"></i>&nbsp;Delete</button></a></td>
                                            </tr>
                                            <?php
                                                $i++;
                                                }
                                                ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- </div> -->
    </div>
</div>
<?php include 'includeadmin/footer.php';?>
</script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#Table').DataTable();
});
</script>
<script>
function numberonly(input) {
    var num = /[^0-9]/gi;
    input.value = input.value.replace(num, "")
}

function checkdelete() {
    return confirm("Are You Sure! You Want To Delete This Seo");
}
</script>