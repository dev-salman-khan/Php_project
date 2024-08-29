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
            <small>Add Sliders</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="">Add Sliders</a></li>
        </ol>
    </section>
    <div class="container col-md-12">
        <div class="box box-primary" style="margin-top:25px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <h2>Add Sliders</h2>
                    </div>
                    <div class="box-body">
                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Title</label><span style="color:red;">*</span>
                                    <input type="text" class="form-control" name="slider_title" id="slider_title" 
                                        >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Sub Title</label><span style="color:red;">*</span>
                                    <input type="text" class="form-control" name="slider_sub_title" 
                                       >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> Image <span class="text-danger">*</span>
                                        <small style="color:blue">[For Best View Of Image Width="1000px"
                                            Height="850px"]
                                        </small></label>
                                    <input type="file" class="form-control" name="slider_image" id="" 
                                        >
                                    
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="add_slider">Add
                                        Sliders</button>

                                </div>
                            </div>
                        </form>
                        <?php
						      // posting data
							if(isset($_POST['add_slider'])){
								$slider_title = $_POST['slider_title'];
								$slider_sub_title = $_POST['slider_sub_title'];
								$slider_image = $_FILES['slider_image']['name'];
								$slider_status = 1;
								$slider_datetime = date('d-m-y h:i:sa');
								$allowed_extension = array('gif','png','jpg','jpeg');
								$file_Sliders = pathinfo($slider_image, PATHINFO_EXTENSION);
								//puting condition for images
										if (!in_array($file_Sliders,$allowed_extension)) {
											$_SESSION['errorMessage'] = "Upload Valid Images. Only PNG, JPEG, JPG And GIF are Allowed.";
											?>
                                            <script>
                                            window.location.href = "add_sliders.php";
                                            </script>
                                            <?php
										}
										else{
										if (file_exists("../upload/home/".$slider_image)) {
											$_SESSION['errorMessage'] = "Image Already Exists " .$slider_image;
											?>
                                            <script>
                                            window.location.href = "add_sliders.php";
                                            </script>
                                            <?php
										}else{
											
											$Sliders_add ="INSERT INTO `slider`(`slider_title`, `slider_sub_title`, `slider_status`, `slider_datetime`, `slider_image`) VALUES ('$slider_title','$slider_sub_title','$slider_status','$slider_datetime','$slider_image')";
											$result = mysqli_query($con, $Sliders_add);
											if ($result){
														move_uploaded_file($_FILES ["slider_image"]["tmp_name"], "../upload/home/".$_FILES["slider_image"]["name"]); 
														$_SESSION['SuccessMessage'] = "Slider insert successfully";
																			?>
                                                        <script>
                                                        location.replace("add_sliders.php");
                                                        </script>
                                                        <?php
											} 
																		
																		else{
																			$_SESSION['errorMessage'] = "Slider not  inserted";
																			header('location: add_sliders.php');
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
                            <h2>Sliders List</h2>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="Table" class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>Sliders Title</th>
                                                <th>Sliders Sub Title</th>
                                                <th>Sliders Image </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                                <?php
											
												   $selectquery = "select * from slider where slider_status = '1'  ORDER BY slider_id DESC";
												   $query = mysqli_query($con, $selectquery);
												   $i = 1;
												   while ($Sliders_list = mysqli_fetch_array($query)) {
												?>
                                                <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $Sliders_list['slider_title']; ?>
                                                <td><?php echo $Sliders_list['slider_sub_title']; ?>
                                                </td>

                                                <td><img src='<?php echo ROOT_URL_ADMIN ."upload/home/" . $Sliders_list ['slider_image']; ?>'
                                                        width='400px' height='100px'></td>
                                                <td><a
                                                        href="edit_slider.php?slider_id=<?php echo $Sliders_list['slider_id'];?>">
                                                        <button onclick="return ()" type="button"
                                                            class="btn btn-success">Edit</button></a>| 
                                                    <a
                                                        href="delete_sliders.php?slider_id=<?php echo $Sliders_list['slider_id'];?>">
                                                        <button onclick="return checkdelete()" type="button"
                                                            class="btn btn-danger">Delete</button></a></td>
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
    function checkdelete() {
        return confirm("Are You Sure! You Want To Delete This Slider");
    }
</script>
<script>
function numberonly(input) {
    var num = /[^0-9]/gi;
    input.value = input.value.replace(num, "")
}
</script>