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
        <h1> Card Or Team
            <small>Add Card Or Team</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="">Add Card Or Team</a></li>
        </ol>
    </section>
    <div class="container col-md-12">
        <div class="box box-primary" style="margin-top:25px;">
            <div class="row">
                <div class="col-md-12">
                <div class="box-header with-border" style="margin-bottom:20px;">
                        <h3 class="box-title">Add Card Or Team</h3>
                    </div>
                    <div class="box-body">
                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Card Or Team Page<span class="text-danger">*</span> </label>
                                        <select type="text" class="form-control" name="card_page" required>
                                            <option value="">--SELECT PAGE--</option>
                                            <option value="1">For Card On Home Page</option>
                                            <option value="2">For Team Expert On About Page</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name<span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="card_name"
                                            placeholder="Name" required>
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
                                        <input type="file" class="form-control" name="card_image"
                                            placeholder="Name" required>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Description<span class="text-danger">*</span> <small
                                                style="color:blue">[For Best View for Description Characters should be 130 to 140]
                                            </small></label>
                                        <textarea name="card_comments" cols="8" rows="3" class="form-control"
                                            maxlength="141"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="add_card_or_team"> <i class="fa fa-plus"></i>&nbsp;Add
                                            card</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                        // data is post for card 
						if(isset($_POST['add_card_or_team'])){
							$card_name = $_POST['card_name'];
                            
                            $card_page = $_POST['card_page'];
                            $card_comments = $_POST['card_comments'];
							$card_image = $_FILES['card_image']['name'];
							$card_status = 1;
							$card_date_time = date('d-m-y h:i:sa');
                            $allowed_extension = array('gif','png','jpg','jpeg');
                            $file_extension = pathinfo($card_image, PATHINFO_EXTENSION);
                            //putting condition to Images
                            if (!in_array($file_extension,$allowed_extension)) {
                                $_SESSION['errorMessage'] = "Upload Valid Images. Only PNG, JPEG, JPG And GIF are Allowed.";
                                ?>
                        <script>
                        window.location.href = "add_card_or_team_or_team.php";
                        </script>
                        <?php
                            }
                            else{
                                if (file_exists("../upload/card/".$card_image)) {
                                        $_SESSION['errorMessage'] = "Image Already Exists " .$card_image;
                                   ?>
                        <script>
                        window.location.href = "add_card_or_team_or_team.php";
                        </script>
                        <?php
                                }
                                else{
                                    $card_add ="INSERT INTO `card`(`card_page`,`card_name`, `card_image`, `card_comments`, `card_status`, `card_datetime`) VALUES ('$card_page','$card_name','$card_image','$card_comments','$card_status','$card_date_time')";
                                    $add_test_result = mysqli_query($con, $card_add);
                                    if ($add_test_result){
                                        move_uploaded_file($_FILES ["card_image"]["tmp_name"], "../upload/card/".$card_image); 
                                        $_SESSION['SuccessMessage'] = "Data Added successfully";
                                        ?>
                                            <script>
                                            location.replace("add_card_or_team.php");
                                            </script>
                                        <?php
					                } 
                                    
                                    else{
                                        $_SESSION['errorMessage'] = "Data Not inserted";
                                        ?>
                                        <script>
                                        location.replace("add_card_or_team.php");
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
                        <h3 class="box-title"> Card Or Team List</h3>
                    </div>
                                <div class="table-responsive">
                                    <table id="Table" class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>Card Or Team Image</th>
                                                <th>Card  Or Team</th>
                                                <th>Card Name</th>
                                                <th>Card Or Team Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
												   $selectquery = "select * from card where card_status = '1' ";
												   $query = mysqli_query($con, $selectquery);
												   $i = 1;
												   while ($card_list = mysqli_fetch_assoc($query)) {
                                                       ?>
                                                       <tr>
                                                <td><?php echo $i ?></td>
                                                <td><img src='<?php echo ROOT_URL_ADMIN."upload/card/".$card_list ['card_image']; ?>'
                                                        width='250px' height='100px'></td>
                                                
                                            
                                                <td><?php $user_type = $card_list['card_page'];
                                                if ($user_type == '1') {
                                                ?>
                                                    <span class="label bg-navy">
                                                        <?php
                                                        echo "Card For Home Page";
                                                        ?>
                                                    </span>
                                                <?php
                                                }
                                                 else {
                                                    if ($user_type == '2') {
                                                        ?>
                                                            <span class="label bg-green">
                                                                <?php
                                                                echo "Team Expert for About Page";
                                                                ?>
                                                            </span>
                                                        <?php
                                                        }
                                                }
                                                ?></td>
                                                <td><?php echo $card_list['card_name']; ?></td>
                                               
                                                <td><?php echo $card_list['card_comments']; ?></td>
                                                <td>
                                                    <a
                                                        href="edit_card.php?card_id=<?php echo $card_list['card_id'];?>">
                                                        <button type="button" class="btn btn-success" onclick="return edit()" title="Edit card"> <i class="fa fa-edit"></i>&nbsp;Edit</button></a>|
                                                    <a
                                                        href="del_card.php?card_del_id=<?php echo $card_list['card_id'];?>">
                                                        <button onclick="return checkdelete()" type="button"title="Delete card"
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
    return confirm("Are You Sure! You Want To Delete This Card Or Team");
}
function edit() {
    return confirm("Are You Sure! You Want To Edit This Card Or Team");
}
</script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#Table').DataTable();
});
</script>