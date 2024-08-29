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
        <h1> Testimonial
            <small>edit Testimonial</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="">Edit Testimonial</a></li>
        </ol>
    </section>
    <div class="container col-md-12">
        <div class="box box-primary" style="margin-top:25px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                      
                    </div>
                    <?php
                      // testimonial is fetch in form tag
                        $testimonial_id = $_GET['testimonial_id'];					
                        $testimonial_run = "select * from testimonial where testimonial_status = '1' and `testimonial_id`='$testimonial_id'";
                        $test_run = mysqli_query($con, $testimonial_run);
                        $testtimonial_show = mysqli_fetch_assoc($test_run)
					?>
                    <div class="box-header with-border" style="margin-bottom:20px;">
                        <h3 class="box-title">Edit Testimonial</h3>
                    </div>
                    <div class="box-body">
                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name<span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="testimonial_name"
                                            placeholder="Name"   value="<?php echo $testtimonial_show['testimonial_name']?>" required>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Work<span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="testimonial_work"
                                            placeholder="Work"  value="<?php echo $testtimonial_show['testimonial_work']?>" required>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Image <span class="text-danger">*</span> <small
                                                style="color:blue">[For Best View Of testimonial image Width="80px"
                                                Height="80px"]
                                            </small></label>
                                        <input type="file" class="form-control" name="testimonial_image"
                                            placeholder="Name"  value="">
                                            <input type="hidden" class="form-control" name="testimonial_image_old" value="<?php echo $testtimonial_show['testimonial_image']?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                        <label for="">Testimonial Page<span class="text-danger">*</span> </label>
                                     <select type="text" class="form-control" name="testimonial_page" required>
									     <option value="">--SELECT PAGE--</option>
                                                <option value="about-us.php"
                                                    <?=$testtimonial_show['testimonial_page'] == 'about-us.php' ? ' selected="selected"' : '';?>>
                                                    About Us</option>
                                                <option value="index.php"
                                                    <?=$testtimonial_show['testimonial_page'] == 'index.php' ? ' selected="selected"' : '';?>>
                                                    Home</option>
									 </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Comments<span class="text-danger">*</span> <small
                                                style="color:blue">[For Best View for Comments Characters should be 141]
                                            </small></label>
                                        <textarea name="testimonial_comments" cols="8" rows="3" class="form-control"
                                            maxlength="141"><?php echo $testtimonial_show['testimonial_comments']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="edit_testimonial">Edit
                                            Testimonial</button>
                                    </div>
                                </div>
                            </div>


                        </form>
                    <?php
						if(isset($_POST['edit_testimonial'])){
                            $testimonial_id = $_GET['testimonial_id'];
							$testimonial_name = $_POST['testimonial_name'];
                            $testimonial_page = $_POST['testimonial_page'];
                            $testimonial_work = $_POST['testimonial_work'];
                            $testimonial_comments = $_POST['testimonial_comments'];
                            $testimonial_image_old = $_POST['testimonial_image_old'];
							$testimonial_image = $_FILES['testimonial_image']['name'];
							$testimonial_status = 1;
							$testimonial_date_time = date('d-m-y h:i:sa');
                            //putting condition for images 
                            if (empty($testimonial_image)) {
                                $update_image = $testimonial_image_old ;
                            }
                            else{
                                
                                $allowed_extension = array('gif','png','jpg','jpeg');
                                $testimonial_image = $_FILES['testimonial_image']['name'];
                                $file_extension = pathinfo($testimonial_image, PATHINFO_EXTENSION);
                                if (!in_array($file_extension,$allowed_extension)) {
                                    $_SESSION['errorMessage'] = "Upload Valid Images. Only PNG, JPEG, JPG And GIF are Allowed.";
                                    header('add_testimonial.php?id='.$testimonial_id);
                                }
                                if (file_exists("../upload/testimonial/".$testimonial_image)) {
                                    $_SESSION['errorMessage'] = "Image Already Exists " .$testimonial_image;
                                    header('add_testimonial.php?id='.$testimonial_id);
                                }
                               $update_image = $testimonial_image ;
                            }
							$testimonial_edit ="UPDATE `testimonial` SET `testimonial_page`='$testimonial_page',`testimonial_name`='$testimonial_name',`testimonial_work`='$testimonial_work',`testimonial_image`='$update_image',`testimonial_comments`='$testimonial_comments',`testimonial_status`='$testimonial_status',`testimonial_datetime`='$testimonial_date_time' WHERE `testimonial_id`='$testimonial_id'";
							$edit_test_result = mysqli_query($con, $testimonial_edit);
                            if ($edit_test_result) {
                                // upload new image if UPDATE Image
                                if (!empty($testimonial_image)) {
                                    // moveing file to the folder
                                    move_uploaded_file($_FILES ["testimonial_image"]["tmp_name"], "../upload/testimonial/".$update_image); 
                                    // remove the old file from folder
                                    unlink("../upload/testimonial/".$testimonial_image_old);
                                }
                                $_SESSION['SuccessMessage'] = " Testimonial Update Successfully";
                                ?>
                                    <script>
                                    location.replace("add_testimonial.php");
                                    </script>
                                <?php
					        } 
                            
                            else{
                                $_SESSION['errorMessage'] = "Testimonial Not Updated";
                                ?>
                                <script>
                                location.replace("add_testimonial.php");
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
<?php include 'includeadmin/footer.php'; ?>

