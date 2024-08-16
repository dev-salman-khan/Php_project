<?php session_start();
if (!isset($_SESSION['auth'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Change Password | Impulse Laundry Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../adminassets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../adminassets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../adminassets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../adminassets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../adminassets/plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Change Password </b>
        </div>
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
        <div class="register-box-body">
            <form method="POST">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Old Password" name="old_password" id="old_password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="New Password" name="new_password" id="new_password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Confirm New Password" name="confirm_new_password" id="confirm_new_password" required>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button id="change_password" type="submit" name="change_password" class="btn btn-primary btn-block btn-flat">Change Password
                            <i class="fa  fa-caret-righ"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <?php
        include 'includeadmin/db_connect.php';
        if (isset($_POST['change_password'])) {
            $old_password =  $_POST['old_password'];
            $old_password_md5 = md5($old_password);
            $new_password =  $_POST['new_password'];
            $new_password_md5 = md5($new_password);
            $confirm_new_password = $_POST['confirm_new_password'];
            $user_id = $_SESSION['id'];
            $password_search = "select * from admin where admin_id='$user_id'";
            $password_query = mysqli_query($con, $password_search);
            $fetch_password = mysqli_fetch_array($password_query);
            $db_password = $fetch_password['admin_password'];
            if ($old_password_md5 == $db_password) {
                if ($new_password == $confirm_new_password) {
                    $update_password = "UPDATE `admin` SET `admin_password`='$new_password_md5' WHERE admin_id = $user_id";
                    $update_query = mysqli_query($con, $update_password);
                    $_SESSION['SuccessMessage'] = "Password Update Successfully!";
                    header('location:change_password.php');
                }
                else {
                    $_SESSION['errorMessage'] = "Both Password Should Match!";
                    ?>
                    <script>
                        location.replace("change_password.php")
                    </script>
                <?php
                }
            } else {
                $_SESSION['errorMessage'] = "Old Password Incorrect!";
                ?>
                <script>
                    location.replace("change_password.php")
                </script>
        <?php
            }
        } ?>
    </div>
    <script src="../adminassets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../adminassets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../adminassets/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
        });
    </script>
</body>

</html>