<?php
session_start();
if (isset($_SESSION['auth'])) {
    $_SESSION['SuccessMessage'] = "You Are Already Logged In";
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in | It Solutions</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../adminassets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../adminassets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../adminassets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../adminassets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../adminassets/plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body  class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>It Solutions Login</b>
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

        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="" method="POST">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck"><label><input type="checkbox"> Remember Me</label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Log In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    include 'includeadmin/db_connect.php';
    if (isset($_POST['login'])) {
        $email =  $_POST['email'];
        $password1 =  $_POST['password'];
        $password = md5($password1);
        
        $email_search = "select * from admin where admin_email='$email'";
        $query = mysqli_query($con, $email_search);

        $email_count = mysqli_num_rows($query);
        if(empty($email) || empty($password1)){
            $_SESSION['errorMessage'] = "All Fields Are Mandatory";
            ?>
                <script>
                location.replace("login.php")
                </script>
            <?php
        }
        if ($email_count) {
            $email_pass = mysqli_fetch_assoc($query);
            $db_email = $email_pass['admin_email'];
            $db_pass = $email_pass['admin_password'];
            $db_admin = $email_pass['admin_user_type'];
            $_SESSION['username'] = $email_pass['admin_username'];
            $_SESSION['id'] = $email_pass['admin_id'];
            $pass_decode = $password == $db_pass;
                if($pass_decode) {
                    if ($db_admin == 'super_admin') {
                        $_SESSION['auth'] = true;
                        $_SESSION['SuccessMessage'] = "Login Successfully";
                        ?>
                            <script>
                                location.replace("./index.php")
                            </script>
                        <?php
                    }
                    else{
                        $_SESSION['errorMessage'] = "You Not Have Access To This Panel";
                        ?>
                            <script>
                                location.replace("login.php")
                            </script>
                    <?php
                    }
                }
                else {
                    $_SESSION['errorMessage'] = "Password Does't Match";
                    ?>
                    <script>
                    location.replace("login.php")
                    </script>
                    <?php
                }    
        }
        else {
            $_SESSION['errorMessage'] = "User Not Found";
            ?>
                <script>
                location.replace("login.php")
                </script>
            <?php
        }
    }
    ?>
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