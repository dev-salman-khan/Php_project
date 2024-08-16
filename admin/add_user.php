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
        <h1>Manager User
            <small>Add User</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="../admin/add_user.php">Add User</a></li>
        </ol>
    </section>
    <div class="container col-md-12">
        <div class="box box-primary" style="margin-top:25px;">
            <form role="form" action="" method="POST">
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">User Name</label>
                                    <input type="text" class="form-control" id="admin_username" name="admin_username" placeholder="Enter The Username" required minlength="5">
                                </div>
                            </div>
                            
                        </div>

                    </div>
                 
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter The First Name" required minlength="4">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" id="admin_lastname" name="admin_lastname" placeholder="Enter The Last Name" required minlength="4">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Enter The Password" required minlength="5">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" id="admin_confirmpassword" name="admin_confirmpassword" placeholder="Enter The Confirm Password" required minlength="4">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E - Mail</label>
                                    <input type="email" class="form-control" id="admin_email" name="admin_email" placeholder="Enter The E- Mail" required minlength="5">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Enter The Phone Number" minlength="10" maxlength="10" ondrop="return false;" onpaste="return false" onkeyup="numberonly(this)" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" name="add_user"> <i class="fa fa-plus"></i>&nbsp;Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- saving the data -->
            <?php
            if (isset($_POST['add_user'])) {
                $admin_username = $_POST['admin_username'];
                $admin_email = $_POST['admin_email'];
                $admin_password = $_POST['admin_password'];
                $admin_confirmpassword = $_POST['admin_confirmpassword'];
                $admin_entrydt = date('d-m-y h:i:s');
                $admin_status = 1;
                $admin_lastname = $_POST['admin_lastname'];
                $phonenumber = $_POST['phonenumber'];
                $firstname = $_POST['firstname'];
                // $admin_user_type = $_POST['admin_user_type'];
                $last_login = '';
                $user_deleted_date = '';
         
                $password1 = md5($admin_password);
                $emailquery = "select * from admin where admin_email='$admin_email'";
                $query = mysqli_query($con, $emailquery);
                $emailcount = mysqli_num_rows($query);

                if ($emailcount > 0) {
                    $_SESSION['errorMessage'] = "Email Already Exients!";
                ?>
                    <script>
                        location.replace("add_user.php")
                    </script>
                    <?php
                } else {
                    if ($admin_password == $admin_confirmpassword) {
                        $query ="INSERT INTO  `admin` VALUES ('','$admin_username','$admin_email','$password1','$admin_entrydt','$admin_status','$admin_lastname','$phonenumber','$firstname','$last_login','$user_deleted_date','')";
                        $savequery = mysqli_query($con, $query);
                        if ($savequery){
                            $_SESSION['SuccessMessage'] = "New User Add Successfully!";
                    ?>
                            <script>
                                location.replace("user_list.php")
                            </script>
                        <?php
                        } else {
                            $_SESSION['errorMessage'] = "Password Does Not Match!";
                        ?>
                            <script>
                                location.replace("add_user.php")
                            </script>
            <?php
                        }
                    } else {
                        $_SESSION['errorMessage'] = "Un Execpted Error!";
                        ?>
                        <script>
                            location.replace("add_user.php")
                        </script>
        <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</div>

<script>
    function numberonly(input) {
        var num = /[^0-9]/gi;
        input.value = input.value.replace(num, "")
    }
</script>

<?php include 'includeadmin/footer.php' ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#Table').DataTable();
    });
</script>