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
        <h1> Card or Team
            <small>edit card or Team</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="">Edit card or Team</a></li>
        </ol>
    </section>
    <div class="container col-md-12">
        <div class="box box-primary" style="margin-top:25px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">

                    </div>
                    <?php
                      // card is fetch in form tag
                        $card_id = $_GET['card_id'];					
                        $card_run = "select * from card where card_status = '1' and `card_id`='$card_id'";
                        $test_run = mysqli_query($con, $card_run);
                        $testtimonial_show = mysqli_fetch_assoc($test_run)
					?>
                    <div class="box-header with-border" style="margin-bottom:20px;">
                        <h3 class="box-title">Edit card or Team</h3>
                    </div>
                    <div class="box-body">
                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Card Or Team Page<span class="text-danger">*</span> </label>
                                        <select type="text" class="form-control" name="card_page" required>

                                            <option value="1"
                                                <?=$testtimonial_show['card_page'] == '1' ? ' selected="selected"' : '';?>>
                                                For Card On Home Page</option>
                                            <option value="2"
                                                <?=$testtimonial_show['card_page'] == '2' ? ' selected="selected"' : '';?>>
                                                For Team Expert On About Page</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name<span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="card_name" placeholder="Name"
                                            value="<?php echo $testtimonial_show['card_name']?>" required>

                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Image <span class="text-danger">*</span> <small
                                                style="color:blue">[For Best View Of card image Width="400px"
                                                Height="450px"]
                                            </small></label>
                                        <input type="file" class="form-control" name="card_image" placeholder="Name"
                                            value="">
                                        <input type="hidden" class="form-control" name="card_image_old"
                                            value="<?php echo $testtimonial_show['card_image']?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Description<span class="text-danger">*</span> <small
                                                style="color:blue">[For Best View for Description Characters should be
                                                130 to 140]
                                            </small></label>
                                        <textarea name="card_comments" cols="8" rows="3" class="form-control"
                                            maxlength="141"><?php echo $testtimonial_show['card_comments']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="edit_card">Edit
                                            card Or Team</button>
                                    </div>
                                </div>
                            </div>


                        </form>
                        <?php
						if(isset($_POST['edit_card'])){
                            $card_id = $_GET['card_id'];
							$card_name = $_POST['card_name'];
                            $card_page = $_POST['card_page'];

                            $card_comments = $_POST['card_comments'];
                            $card_image_old = $_POST['card_image_old'];
							$card_image = $_FILES['card_image']['name'];
							$card_status = 1;
							$card_date_time = date('d-m-y h:i:sa');
                            //putting condition for images 
                            if (empty($card_image)) {
                                $update_image = $card_image_old ;
                            }
                            else{
                                
                                $allowed_extension = array('gif','png','jpg','jpeg');
                                $card_image = $_FILES['card_image']['name'];
                                $file_extension = pathinfo($card_image, PATHINFO_EXTENSION);
                                if (!in_array($file_extension,$allowed_extension)) {
                                    $_SESSION['errorMessage'] = "Upload Valid Images. Only PNG, JPEG, JPG And GIF are Allowed.";
                                    header('edit_card.php?id='.$card_id);
                                }
                                if (file_exists("../upload/card/".$card_image)) {
                                    $_SESSION['errorMessage'] = "Image Already Exists " .$card_image;
                                    header('edit_card.php?id='.$card_id);
                                }
                               $update_image = $card_image ;
                            }
							$card_edit ="UPDATE `card` SET `card_page`='$card_page',`card_name`='$card_name',`card_image`='$update_image',`card_comments`='$card_comments',`card_status`='$card_status',`card_datetime`='$card_date_time' WHERE `card_id`='$card_id'";
							$edit_test_result = mysqli_query($con, $card_edit);
                            if ($edit_test_result) {
                                // upload new image if UPDATE Image
                                if (!empty($card_image)) {
                                    // moveing file to the folder
                                    move_uploaded_file($_FILES ["card_image"]["tmp_name"], "../upload/card/".$update_image); 
                                    // remove the old file from folder
                                    unlink("../upload/card/".$card_image_old);
                                }
                                $_SESSION['SuccessMessage'] = " Data Update Successfully";
                                ?>
                        <script>
                        location.replace("add_card_or_team.php");
                        </script>
                        <?php
					        } 
                            
                            else{
                                $_SESSION['errorMessage'] = "Data Not Updated";
                                ?>
                        <script>
                        location.replace("add_card_or_team.php");
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