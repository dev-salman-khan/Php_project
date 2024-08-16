<?php include 'includeadmin/header.php';
include 'includeadmin/db_connect.php';
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
		<h1>Manager Banner
			<small>Add Banner</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="">Add Banner</a></li>
		</ol>
	</section>
	<div class="container col-md-12">
		<div class="box box-primary" style="margin-top:25px;">
			<div class="row">
				<div class="col-md-12">
					<div class="box-header with-border" style="margin-bottom:20px;">
                    <h3 class="box-title">Add banner</h3>
                </div>
					<div class="box-body">
						<form role="form" action="" method="POST" enctype="multipart/form-data">
							<div class="col-md-6">
								<div class="form-group">
									<label for="username">Pages List </label>
									<select type="text" class="form-control" name="banner_page_name" required>
									<option value="">--SELECT PAGES--</option>
                                            <option value="about-us.php">About Us</option>
										    <option value="contact-us.php">Contact Us</option>
                                            <option value="our-solutions.php">Our Solutions </option>
											<option value="solution_details.php">Solution Details</option>
                                            <option value="privacy-policy.php">Pravicy And Policy</option>
										    <option value="terms-and-conditions.php">Terms and Conditions</option>
										    <option value="trainings.php">Training</option>
										    <option value="blog.php">Blog </option>
											<option value="blog_details.php">Blog Details</option>
											

									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="password">Banner<span class="text-danger">*</span> <small style="color:blue">[For Best View Of banner Width:1920px Heigth:1000px"]
                                    </small></label>
									<input type="file" class="form-control" name="banner_page_banner" required>

								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<button type="submit" class="btn btn-primary" name="edit_banner"><i class="fa fa-plus"></i>&nbsp;Add
										Banner</button>

								</div>
							</div>
						</form>
						<?php
						      // posting data
							if(isset($_POST['edit_banner'])){
								$banner_name = $_POST['banner_page_name'];
								$banner_page_banner = $_FILES['banner_page_banner']['name'];
								$banner_page_status = 1;
								$banner_page_date_time = date('d-m-y h:i:sa');
								$allowed_extension = array('gif','png','jpg','jpeg');
								$file_banner = pathinfo($banner_page_banner, PATHINFO_EXTENSION);
								//puting condition for images
								if (!in_array($file_banner,$allowed_extension)) {
									$_SESSION['errorMessage'] = "Upload Valid Images. Only PNG, JPEG, JPG And GIF are Allowed.";
									?>
									<script>
									window.location.href = "add_banner.php";
									</script>
									<?php
										}
										else{
										if (file_exists("../upload/header/".$banner_page_banner)) {
											$_SESSION['errorMessage'] = "Image Already Exists " .$banner_page_banner;
											?>
												<script>
												window.location.href = "add_banner.php";
												</script>
											<?php
										}
									else{
										// inseting data in database
										$banner_add ="INSERT INTO `banner`( `banner_page_name`, `banner_page_banner`, `banner_page_status`, `banner_page_date_time`) VALUES ('$banner_name','$banner_page_banner','$banner_page_status','$banner_page_date_time')";
										$result = mysqli_query($con, $banner_add);
										if ($result){
											move_uploaded_file($_FILES ["banner_page_banner"]["tmp_name"], "../upload/header/".$_FILES["banner_page_banner"]["name"]); 
											$_SESSION['SuccessMessage'] = "Banner insert successfully";
											?>
												<script>
												location.replace("add_banner.php");
												</script>
											<?php
										} 
										
										else{
											$_SESSION['errorMessage'] = "banner not  inserted";
											?>
											<script>
											location.replace("add_banner.php");
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
						<div class="box-header with-border" style="margin-bottom:20px;">
                    <h3 class="box-title">Banner List</h3>
                </div>
							<div class="box-body">
								<div class="table-responsive">
									<table id="Table" class="table table-bordered table-hover table-striped">
										<thead>
											<tr>
												<th>S No</th>
												<th>Banner Page Name</th>
												<th>Banner Image</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											
											$selectquery = "select * from banner where banner_page_status = '1'  ORDER BY banner_id DESC";
											$query = mysqli_query($con, $selectquery);
											$i = 1;
											while ($Banner_list = mysqli_fetch_array($query)) {
												?>
												<tr>
													<td><?php echo $i ?></td>
													<td><?php echo ucwords($Banner_list['banner_page_name']); ?>
													</td>
													<td><img src='<?php echo ROOT_URL_ADMIN ."upload/header/" . $Banner_list ['banner_page_banner']; ?>'width='400px' height='100px'></td>
													<td> <a href="delete_banner.php?banner_id=<?php echo $Banner_list['banner_id'];?>">
													<button onclick="return checkdelete()" type="button"
													class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</button></a></td>
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
    return confirm("Are You Sure! You Want To Delete This Banner");
}
</script>
