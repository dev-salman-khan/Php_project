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
        <h1>Manager Trainings
            <small>Add Trainings</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="">Add Trainings</a></li>
        </ol>
    </section>
    <section class="content">

        <div class="row">

            <div class="col-md-12">
                <div class="box box-primary" style="margin-top:25px;">
                    <div class="box-header with-border" style="margin-bottom:20px;">
                        <h3 class="box-title">Add Trainings</h3>
                    </div>
                    <div class="box-body">
                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Sertification Code<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="training_sertification_code"
                                            required placeholder="Sertification Code">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Code Title">Code Title<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="training_code_title" required
                                            placeholder="Code Title">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Duration hours/Days">Duration hours/Days<span
                                                class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="training_duration_day" required
                                            placeholder="Duration hours/Days">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Trainings Mode">Trainings Mode<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="training_mode" required
                                            placeholder="Trainings Mode">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Audience">Audience<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="training_audience" required
                                            placeholder="Audience">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Pre Requisties<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="training_per_req" required
                                            placeholder="Pre Requisties">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Cost Per Student<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="training_cost_per_student"
                                            required placeholder="Cost Per Student">
                                    </div>
                                </div>


                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="add_trainings"><i
                                                class="fa fa-plus"></i>&nbsp;Add
                                            Trainings</button>
                                    </div>
                                </div>
                            </div>


                        </form>
                        <?php
                                     // putting data by post
                                    if(isset($_POST['add_trainings'])){
                                        // blog data is poting
                                        $training_sertification_code = $_POST['training_sertification_code'];
                                        $training_code_title = $_POST['training_code_title'];
                                        $training_duration_day = $_POST['training_duration_day'];
                                        $training_mode = $_POST['training_mode'];
                                        $training_audience = $_POST['training_audience'];
                                        $training_per_req = $_POST['training_per_req'];
                                        $training_cost_per_student = $_POST['training_cost_per_student'];
                                        $training_status = '1';
                                        $training_datetime = date('Y-m-d h:i:sa');
                                        $insert_blog ="INSERT INTO `training`( `training_sertification_code`, `training_code_title`, `training_duration_day`, `training_mode`, `training_audience`, `training_per_req`, `training_cost_per_student`, `training_status`, `training_datetime`) VALUES ('$training_sertification_code','$training_code_title','$training_duration_day','$training_mode','$training_audience','$training_per_req','$training_cost_per_student','$training_status','$training_datetime')";  
                                        $result_bolg = mysqli_query($con, $insert_blog);
                                               
                                                if ($result_bolg){
                                                         
                                                    $_SESSION['SuccessMessage'] = "Trainings insert successfully";
                                                    ?>
                        <script>
                        location.replace("add_training.php");
                        </script>
                        <?php        
                                                }
                                                else{
                                                    $_SESSION['errorMessage'] = "Trainings not  inserted";
                                                    ?>
                        <script>
                        location.replace("add_training.php");
                        </script>
                        <?php 
                                                }
                                    } 
                                                   
                                      
                               ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">

        <div class="box box-primary" style="margin-top:25px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-header with-border" style="margin-bottom:20px;">
                        <h3 class="box-title">Trainings List </h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="Table" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>S No</th>
                                        <th>Sertification Code</th>
                                        <th>Code Title</th>
                                        <th>Duration Hour/ Days</th>
                                        <th>Training Mode</th>
                                        <th>Audience</th>
                                        <th>Pre Requisties</th>
                                        <th>Coste Pre Student</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                                $selectquery = "select * from training where training_status = '1'  ORDER BY training_id DESC";
                                                $query_seo = mysqli_query($con, $selectquery);
                                                $i = 1;
                                                while ($trainings_list = mysqli_fetch_array($query_seo)) {
                                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo ucwords($trainings_list['training_sertification_code']) ?></td>
                                        <td><?php echo ucwords($trainings_list['training_code_title']) ?></td>
                                        <td><?php echo ucwords($trainings_list['training_duration_day']) ?></td>
                                        <td><?php echo ucwords($trainings_list['training_mode']) ?></td>
                                        <td><?php echo ucwords($trainings_list['training_audience']) ?></td>
                                        <td><?php echo ucwords($trainings_list['training_per_req']) ?></td>
                                        <td><?php echo ucwords($trainings_list['training_cost_per_student']) ?></td>

                                        <td> <a data-toggle="modal"
                                                data-target="#exampleModal_<?php echo $trainings_list['training_id']; ?>"><button
                                                    type="button" class="btn btn-success "><i
                                                        class="fa fa-edit"></i>&nbsp;Edit</button></a>|<a
                                                href="delete_training.php?training_id=<?php echo $trainings_list['training_id'];?>">
                                                <button onclick="return checkdelete()" type="button"
                                                    class="btn btn-danger"><i
                                                        class="fa fa-trash"></i>&nbsp;Delete</button></a></td>
                                    </tr>
                                    <div class="modal fade" id="exampleModal_<?php echo $trainings_list['training_id']; ?>"
                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Trainings</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" action="" method="POST">

                                                        <input type="hidden" name="update_id"
                                                            value="<?php echo $trainings_list['training_id']; ?>">

                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Sertification Code<span
                                                                            class="text-danger">*</span>
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        name="training_sertification_code" required value="<?php echo $trainings_list['training_sertification_code']; ?>"
                                                                        placeholder="Sertification Code" >
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="Code Title">Code Title<span
                                                                            class="text-danger">*</span>
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        name="training_code_title" required value="<?php echo $trainings_list['training_code_title']; ?>"
                                                                        placeholder="Code Title">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="Duration hours/Days">Duration
                                                                        hours/Days<span class="text-danger">*</span>
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        name="training_duration_day" required value="<?php echo $trainings_list['training_duration_day']; ?>"
                                                                        placeholder="Duration hours/Days">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="Trainings Mode">Trainings Mode<span
                                                                            class="text-danger">*</span>
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        name="training_mode" required value="<?php echo $trainings_list['training_mode']; ?>"
                                                                        placeholder="Trainings Mode">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="Audience">Audience<span
                                                                            class="text-danger">*</span>
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        name="training_audience" required value="<?php echo $trainings_list['training_audience']; ?>"
                                                                        placeholder="Audience">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Pre Requisties<span
                                                                            class="text-danger">*</span>
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        name="training_per_req" required value="<?php echo $trainings_list['training_per_req']; ?>"
                                                                        placeholder="Pre Requisties">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Cost Per Student<span
                                                                            class="text-danger">*</span>
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        name="training_cost_per_student" required value="<?php echo $trainings_list['training_cost_per_student']; ?>"
                                                                        placeholder="Cost Per Student">
                                                                </div>
                                                            </div>


                                                        </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" name="update_class"
                                                        class="btn btn-warning">Edit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

    </section>

</div>


<?php include 'includeadmin/footer.php';?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#Table').DataTable();
});
function checkdelete() {
    return confirm("Are You Sure! You Want To Delete This Training");
}
</script>
<?php 
if (isset($_POST['update_class'])) {
                    $update_id = $_POST['update_id'];
                    $training_sertification_code = $_POST['training_sertification_code'];
                    $training_code_title = $_POST['training_code_title'];
                    $training_duration_day = $_POST['training_duration_day'];
                    $training_mode = $_POST['training_mode'];
                    $training_audience = $_POST['training_audience'];
                    $training_per_req = $_POST['training_per_req'];
                    $training_cost_per_student = $_POST['training_cost_per_student'];
                    $training_status = '1';
                    $training_datetime = date('Y-m-d h:i:sa');
                    $query ="UPDATE `training` SET `training_sertification_code`='$training_sertification_code',`training_code_title`='$training_code_title',`training_duration_day`='$training_duration_day',`training_mode`='$training_mode',`training_audience`='$training_audience',`training_per_req`='$training_per_req',`training_cost_per_student`='$training_cost_per_student',`training_status`='$training_status',`training_datetime`='$training_datetime' WHERE `training_id`='$update_id'";
                    $class_query = mysqli_query($con, $query);
                    if ($class_query){
                        $_SESSION['SuccessMessage'] = "Trainings Updated   Sucessfully";
                        
                        ?>
                            <script>
                            location.replace("add_training.php");
                            </script>
                        <?php
                    } 
                    else{
                        $_SESSION['errorMessage'] = "Trainings not Updated";
                        header('location: add_training.php');
                    } 
                }
        ?>