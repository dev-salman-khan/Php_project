<?php include 'includeadmin/header.php'; 
 ?>
<aside class="main-sidebar">
    <?php include 'includeadmin/aside.php' ?>
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
    <div class="container col-md-12">
        <div class="box box-primary" style="margin-top:25px;">
            <div class="box-header with-border">
                <h3 class="box-title">Update User Data</h3>
            </div>
            <form role="form" action="" method="POST">
                <?php
                include 'includeadmin/db_connect.php';
                $get_user_id = $_GET['user_id'];
                $user_fetch = "select * from admin where admin_id = $get_user_id";
                $query = mysqli_query($con, $user_fetch);
                $user_data = mysqli_fetch_array($query)
                ?>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="username">User Name</label>
                                    <input type="text" class="form-control" value="<?php echo $user_data['admin_username'] ?>" id="admin_username" name="admin_username" placeholder="Enter The Username" required minlength="5">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" value="<?php echo $user_data['firstname'] ?>"  id="firstname" name="firstname" placeholder="Enter The First Name" required minlength="4">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" value="<?php echo $user_data['admin_lastname'] ?>" id="admin_lastname" name="admin_lastname" placeholder="Enter The Last Name" required minlength="4">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control"value="<?php echo $user_data['admin_password'] ?>" id="admin_password" name="admin_password" placeholder="Enter The Password" required minlength="5">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control"  id="admin_confirmpassword" name="admin_confirmpassword" placeholder="Enter The Confirm Password" required minlength="4">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E - Mail</label>
                                    <input type="email" class="form-control" value="<?php echo $user_data['admin_email'] ?>" id="admin_email" name="admin_email" placeholder="Enter The E- Mail" required minlength="5">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" value="<?php echo $user_data['phonenumber'] ?>" id="phonenumber" name="phonenumber" placeholder="Enter The Phone Number" minlength="10" maxlength="10" ondrop="return false;" onpaste="return false" onkeyup="numberonly(this)" required>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                <?php
                ?>
                <div class="box-footer col-lg-12">
                    <button type="submit" class="btn btn-primary" name="update_user">Update User</button>
                </div>
            </form>
            <!-- updating the data -->
            <?php
            include 'includeadmin/db_connect.php';
            if (isset($_POST['update_user'])) {
                $get_user_id = $_GET['user_id'];
                $admin_entrydt = date('d-m-y h:i:s');
                $admin_status = 1;
                $admin_lastname = $_POST['admin_lastname'];
                $phonenumber = $_POST['phonenumber'];
                $firstname = $_POST['firstname'];
                // $admin_user_type = $_POST['admin_user_type'];
                $password1 = md5($admin_password);
                    $update_query = "UPDATE `admin` SET `admin_password`='$password1',`admin_entrydt`='$admin_entrydt',`admin_status`='$admin_status',`admin_lastname`='$admin_lastname',`phonenumber`='$phonenumber',`firstname`='$firstname',`last_login`='$last_login',`user_deleted_date`='$user_deleted_date' WHERE admin_id=$get_user_id";
                    $updatequery = mysqli_query($con, $update_query);
                    if ($updatequery) {
                        $_SESSION['SuccessMessage'] = "User Data Update Successfully!";
                    ?>
                        <script>
                            const myKeysValue = window.location.search;
                            const urlParams = new URLSearchParams(myKeysValue);
                            const user_id = urlParams.get('user_id');
                            location.replace("user_list.php?user_id=" + user_id);
                        </script>
                    <?php
                    } else {
                        $_SESSION['errorMessage'] = "Un Execpted Error!";
                        
                        
                    }
                } 
            ?>
        </div>
    </div>
</div>
<?php include 'includeadmin/footer.php' ?>
