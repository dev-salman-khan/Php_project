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
            <small>Edit SEO</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="">Edit SEO</a></li>
        </ol>
    </section>
    <div class="container col-md-12">
        <div class="box box-primary" style="margin-top:25px;">
            <div class="row">
                <div class="col-md-12">
                  
                    <div class="box-header with-border" style="margin-bottom:20px;">
                    <h3 class="box-title">Edit Seo</h3>
                </div>
                    <div class="box-body">
                    <?php
                        //  getting seo id 
                        $seo_id = $_GET['seo_id'];
                        // fetching datafrom database 
                        $selectquery_seo = "select * from seo where seo_status = '1' and seo_id ='$seo_id'";
                        $query_seo = mysqli_query($con, $selectquery_seo);
                         $seo_edit = mysqli_fetch_array($query_seo);
                    ?>
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
                                    <input type="text" class="form-control" value = "<?php echo $seo_edit['seo_title']; ?>"name="seo_title" placeholder="SEO Title"
                                        required>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">SEO Keyword<span class="text-danger">*</span> </label>
                                   
                                    <textarea name="seo_keyword" value=""
                                    placeholdder="SEO Keyword " cols="8" rows="3" class="form-control"
                                     required><?php echo $seo_edit['seo_keyword']; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">SEO Description<span class="text-danger">*</span> </label>
                                        <textarea name="seo_description" value=""
                                    placeholdder="SEO Description " cols="8" rows="3" class="form-control"
                                     required><?php echo $seo_edit['seo_description']; ?></textarea>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="edit_seo">Edit
                                        SEO</button>
                                </div>
                            </div>
                        </form>
                        <?php
                          // datais posting in seo database
                        if(isset($_POST['edit_seo'])){
                            $seo_page_slug = $_POST['seo_page_slug'];
                            $seo_title = $_POST['seo_title'];
                            $seo_keyword = $_POST['seo_keyword'];
                            $seo_description=  $_POST['seo_description'];
                            $seo_datetime = date('Y-m-d h:i:sa');
                            $seo_status = 1 ;
                            $seo_id = $_GET['seo_id'];
                            // updating data in database
                            $edit_data_seo = "UPDATE `seo` SET `seo_page_slug`='$seo_page_slug',`seo_title`='$seo_title',`seo_keyword`='$seo_keyword',`seo_description`='$seo_description',`seo_datetime`='$seo_datetime',`seo_status`='$seo_status' WHERE `seo_id`='$seo_id'";
                            // run query
                            $seo_query_run_1 = mysqli_query($con , $edit_data_seo);
                            if($seo_query_run_1){
                                $_SESSION['SuccessMessage'] = "SEO Updated successfully";
                            
                                ?>
                                    <script>
                                    location.replace("add_seo.php");
                                    </script>
                                    <?php
                             }else{
                                $_SESSION['errorMessage'] = "SEO Not  inserted";
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
</div>
<?php include 'includeadmin/footer.php';?>