<?php include 'includeadmin/header.php';

 ?>
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
        <h1> Sliders
            <small>Edit Sliders</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="">Edit Sliders</a></li>
        </ol>
    </section>
    <div class="container col-md-12">
        <div class="box box-primary" style="margin-top:25px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <h2>Edit Sliders</h2>
                    </div>
                    <?php       
                        $slider_id = $_GET['slider_id'];
                        $selectquery_blog = "select * from `slider` where `slider_status`= '1' And slider_id = '$slider_id'";
                        $query_blog = mysqli_query($con, $selectquery_blog);
                        $blog_edit = mysqli_fetch_assoc($query_blog);                            
                    ?>
                    <div class="box-body">
                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Title</label><span style="color:red;">*</span>
                                    <input type="text" class="form-control" name="slider_title" value="<?php echo $blog_edit['slider_title'];?>" id="slider_title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Sub Title</label><span style="color:red;">*</span>
                                    <input type="text" class="form-control" name="slider_sub_title"  value="<?php echo $blog_edit['slider_sub_title'];?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> Image <span class="text-danger">*</span>
                                        <small style="color:blue">[For Best View Of Image Width="1000px"
                                            Height="850px"]
                                        </small></label>
                                    <input type="file" class="form-control" name="slider_image" id="">
                                    <input type="hidden" class="form-control" name="slider_image_old" id="" value="<?php echo $blog_edit['slider_image'];?>">

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="edit_slider">Edit
                                        Sliders</button>

                                </div>
                            </div>
                        </form>
                        <?php
						      // posting data
							if(isset($_POST['edit_slider'])){
								$slider_title = $_POST['slider_title'];
								$slider_sub_title = $_POST['slider_sub_title'];
								$slider_image_old = $_POST['slider_image_old'];
								$slider_image = $_FILES['slider_image']['name'];
								$slider_status = 1;
								$slider_datetime = date('d-m-y h:i:sa');
						
                                	//puting condition for images
                                    if (empty($slider_image)) {
                                        $update_image = $slider_image_old ;
                                    }
                                else{
                                    $allowed_extension = array('gif','png','jpg','jpeg');
                                    $slider_image = $_FILES['slider_image']['name'];
                                    $image_new = pathinfo($slider_image, PATHINFO_EXTENSION);
                                    if (!in_array($image_new,$allowed_extension)) {
                                        $_SESSION['errorMessage'] = "Upload Valid Images. Only PNG, JPEG, JPG And GIF are Allowed.";
                                        ?>
                                        <script>
                                        const myKeysValue = window.location.search;
                                        const urlParams = new URLSearchParams(myKeysValue);
                                        const slider_id = urlParams.get('slider_id');
                                        location.replace("edit_slider.php?slider_id=" + slider_id);
                                        </script>
                                        <?php
                                    }
                                    if (file_exists("../upload/home/".$slider_image)) {
                                        $_SESSION['errorMessage'] = "Image Already Exists " .$slider_image;
                                        ?>
                                    <script>
                                    const myKeysValue = window.location.search;
                                    const urlParams = new URLSearchParams(myKeysValue);
                                    const slider_id = urlParams.get('slider_id');
                                    location.replace("edit_slider.php?slider_id=" + slider_id);
                                    </script>
                                    <?php
                                    }
                                    $update_image = $slider_image ;
                                }
                                          // inseting data in database
											$banner_add ="UPDATE `slider` SET `slider_title`='$slider_title',`slider_sub_title`='$slider_sub_title',`slider_status`='$slider_status',`slider_datetime`='$slider_datetime',`slider_image`='$update_image' WHERE `slider_id`='$slider_id'";
										    $result = mysqli_query($con, $banner_add);
											if ($result){
                                                if (!empty($slider_image)) {
                                                    // moveing file to the folder
													move_uploaded_file($_FILES ["slider_image"]["tmp_name"], "../upload/home/".$_FILES["slider_image"]["name"]); 
                                                    // remove the old file from folder
                                                    unlink("../upload/home/".$slider_image_old);
                                                 }
													$_SESSION['SuccessMessage'] = "Slider Updated successfully";
																			?>
																<script>
																location.replace("add_sliders.php");
																</script>
																<?php
																		} 
																		
																		else{
																			$_SESSION['errorMessage'] = "Slider inserted";
																			?>
                                            <script>
                                            window.location.href = "add_sliders.php";
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
</script>