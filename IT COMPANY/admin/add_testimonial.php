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
            <small>Add Testimonial</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="">Add Testimonial</a></li>
        </ol>
    </section>
    <div class="container col-md-12">
        <div class="box box-primary" style="margin-top:25px;">
            <div class="row">
                <div class="col-md-12">
                <div class="box-header with-border" style="margin-bottom:20px;">
                        <h3 class="box-title">Add Testimonial</h3>
                    </div>
                    <div class="box-body">
                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name<span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="testimonial_name"
                                            placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Work<span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="testimonial_work"
                                            placeholder="Work" required>
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
                                            placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Testimonial Page<span class="text-danger">*</span> </label>
                                        <select type="text" class="form-control" name="testimonial_page" required>
                                            <option value="">--SELECT PAGE--</option>
                                            <option value="index.php">Home</option>
                                            <option value="about-us.php">About Us</option>
                                           
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
                                            maxlength="141"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="add_testimonial"> <i class="fa fa-plus"></i>&nbsp;Add
                                            Testimonial</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                        // data is post for testimonial 
						if(isset($_POST['add_testimonial'])){
							$testimonial_name = $_POST['testimonial_name'];
                            $testimonial_work = $_POST['testimonial_work'];
                            $testimonial_page = $_POST['testimonial_page'];
                            $testimonial_comments = $_POST['testimonial_comments'];
							$testimonial_image = $_FILES['testimonial_image']['name'];
							$testimonial_status = 1;
							$testimonial_date_time = date('d-m-y h:i:sa');
                            $allowed_extension = array('gif','png','jpg','jpeg');
                            $file_extension = pathinfo($testimonial_image, PATHINFO_EXTENSION);
                            //putting condition to Images
                            if (!in_array($file_extension,$allowed_extension)) {
                                $_SESSION['errorMessage'] = "Upload Valid Images. Only PNG, JPEG, JPG And GIF are Allowed.";
                                ?>
                        <script>
                        window.location.href = "add_testimonial.php";
                        </script>
                        <?php
                            }
                            else{
                                if (file_exists("../upload/testimonial/".$testimonial_image)) {
                                        $_SESSION['errorMessage'] = "Image Already Exists " .$testimonial_image;
                                   ?>
                        <script>
                        window.location.href = "add_testimonial.php";
                        </script>
                        <?php
                                }
                                else{
                                    $testimonial_add ="INSERT INTO `testimonial`(`testimonial_page`,`testimonial_name`,`testimonial_work`, `testimonial_image`, `testimonial_comments`, `testimonial_status`, `testimonial_datetime`) VALUES ('$testimonial_page','$testimonial_name','$testimonial_work','$testimonial_image','$testimonial_comments','$testimonial_status','$testimonial_date_time')";
                                    $add_test_result = mysqli_query($con, $testimonial_add);
                                    if ($add_test_result){
                                        move_uploaded_file($_FILES ["testimonial_image"]["tmp_name"], "../upload/testimonial/".$testimonial_image); 
                                        $_SESSION['SuccessMessage'] = "Testimonial Added successfully";
                                        ?>
                                            <script>
                                            location.replace("add_testimonial.php");
                                            </script>
                                        <?php
					                } 
                                    
                                    else{
                                        $_SESSION['errorMessage'] = "Testimonial Not inserted";
                                        ?>
                                        <script>
                                        location.replace("add_testimonial.php");
                                        </script>
                                        <?php
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
    <div class="row">
        <section class="content">
            <div class="container col-md-12 col-xs-12">
                <div class="box box-primary" style="margin-top:25px;">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="box-body">
                            <div class="box-header with-border" style="margin-bottom:20px;">
                        <h3 class="box-title"> Testimonial List</h3>
                    </div>
                                <div class="table-responsive">
                                    <table id="Table" class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>Testimonial Image</th>
                                                <th>Testimonial Page</th>
                                                <th>Testimonial Name</th>
                                                <th>Testimonial Work</th>
                                                <th>Testimonial comments</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
												   $selectquery = "select * from testimonial where testimonial_status = '1' ";
												   $query = mysqli_query($con, $selectquery);
												   $i = 1;
												   while ($Testimonial_list = mysqli_fetch_assoc($query)) {
                                                       ?>
                                                       <tr>
                                                <td><?php echo $i ?></td>
                                                <td><img src='<?php echo ROOT_URL_ADMIN."upload/testimonial/".$Testimonial_list ['testimonial_image']; ?>'
                                                        width='250px' height='100px'></td>
                                                <td><?php echo ucwords($Testimonial_list['testimonial_page']); ?></td>
                                                <td><?php echo $Testimonial_list['testimonial_name']; ?></td>
                                                <td><?php echo $Testimonial_list['testimonial_work']; ?></td>
                                                <td><?php echo $Testimonial_list['testimonial_comments']; ?></td>
                                                <td>
                                                    <a
                                                        href="edit_testimonial.php?testimonial_id=<?php echo $Testimonial_list['testimonial_id'];?>">
                                                        <button type="button" class="btn btn-success" onclick="return edit()" title="Edit Testimonial"> <i class="fa fa-edit"></i>&nbsp;Edit</button></a>|
                                                    <a
                                                        href="del_testimonial.php?testimonial_del_id=<?php echo $Testimonial_list['testimonial_id'];?>">
                                                        <button onclick="return checkdelete()" type="button"title="Delete Testimonial"
                                                            class="btn btn-danger"> <i class="fa fa-trash"></i>&nbsp;Delete</button></a>
                                                </td>
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
    </div>
    </section>
</div>
<?php include 'includeadmin/footer.php'; ?>
<script>
function numberonly(input) {
    var num = /[^0-9]/gi;
    input.value = input.value.replace(num, "")
}

function checkdelete() {
    return confirm("Are You Sure! You Want To Delete This Testimonail");
}
function edit() {
    return confirm("Are You Sure! You Want To Edit This Testimonail");
}
</script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#Table').DataTable();
});
</script>