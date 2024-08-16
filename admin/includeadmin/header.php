<?php
session_start();
if (!isset($_SESSION['auth'])) {
    $_SESSION['SuccessMessage'] = "You Are Logged In First"; //user if not login condition
    header('location:login.php');
}
include('includeadmin/db_connect.php');
define('ROOT_URL_ADMIN',"http://localhost/php_project/it_company/");
$admin_name = basename($_SERVER['PHP_SELF']);
switch ($admin_name) {
    
	case 'index.php':
		$admin_title = "IT Solutions";
		break;
	case 'add_user.php':
		$admin_title = "Add User | IT Solutions";
		break;
	case 'user_list.php':
		$admin_title = "User List | IT Solutions";
		break;
	case 'edit_user.php':
		$admin_title = "Edit User | IT Solutions";
		break;
    case 'general_setting.php':
        $admin_title = "General Setting | IT Solutions";
        break;
    case 'edit_general.php':
        $admin_title = "Edit General Setting | IT Solutions";
        break;
    
    case 'services_enquiry.php':
        $admin_title = "Solutions Enquiry | IT Solutions";
         break;
    case 'services_enquiry_view.php':
        $admin_title = "Solutions Enquiry view | IT Solutions";
        break;
    case 'enquiry.php':
        $admin_title = "Enquiry | IT Solutions";
        break;
    case 'enquiry_view.php':
        $admin_title = "Enquiry view | IT Solutions";
        break;
    case 'add_banner.php':
        $admin_title = "Add Banner | IT Solutions";
        break;
    case 'add_testimonial.php':
        $admin_title = "Add Testimonial | IT Solutions";
        break;
    case 'pages_about.php':
        $admin_title = "About Pages | IT Solutions";
        break;
    case 'about_edit.php':
        $admin_title = "Edit Abouts  Pages | IT Solutions";
        break;
    case 'add_seo.php':
        $admin_title = " Add Seo | IT Solutions";
        break;
    case 'edit_seo.php':
        $admin_title = " Edit Seo | IT Solutions";
        break;
    case 'add_blog.php':
        $admin_title = " Add Blog | IT Solutions";
        break;
    case 'blog_list.php':
        $admin_title = " Blog List | IT Solutions";
        break;
    case 'add_services.php':
        $admin_title = " Add Solutions | IT Solutions";
        break;
    case 'services_list.php':
        $admin_title = " Solutions List | IT Solutions";
        break;
    case 'edit_testimonial.php':
        $admin_title = " Edit Testimonial | IT Solutions";
        break;
    case 'edit_blog.php':
        $admin_title = " Edit Blog| IT Solutions";
        break;
    case 'edit_services.php':
        $admin_title = " Edit Solutions| IT Solutions";
        break;
    case 'pages_home.php':
        $admin_title = "Home Setting| IT Solutions";
        break;
    case 'home_edit.php':
        $admin_title = " Edit Home Page| IT Solutions";
        break;
    case 'pages_term.php':
        $admin_title = " Terms & Conditions | IT Solutions";
        break;
    case 'pages_pravicy_policy.php':
        $admin_title = " Pravicy Policy | IT Solutions";
        break;
    case 'edit_pravicy.php':
        $admin_title = "Edit Pravicy Policy | IT Solutions";
        break;
    case 'edit_term.php':
        $admin_title = "Edit  Terms & Conditions| IT Solutions";
        break;
    case 'edit_card.php':
        $admin_title = "Edit card or team | IT Solutions";
        break;
    case 'contact_page.php':
        $admin_title = "Contact Us Page| IT Solutions";
        break;
    case 'about_page.php':
        $admin_title = "About Us page | IT Solutions";
        break;
    case 'edit_about_page.php':
        $admin_title = "Edit About Us page | IT Solutions";
        break;
    case 'home_page.php':
        $admin_title = "Home page | IT Solutions";
        break;
     case 'add_training.php';
        $admin_title = "Add Traning | IT Solutions";
        break;
    case'add_card_or_team.php';
        $admin_title = "Add Card or Team Expert | IT Solutions";
        break;
    case'add_sliders.php';
        $admin_title = "Add Sliders | IT Solutions";
        break;
    case'edit_sliders.php';
        $admin_title = "Edit Sliders | IT Solutions";
        break;
    }
    // general data of web site query
    $user_fetch = "select * from `general_tbl` where `general_status`= '1'";
    $query = mysqli_query($con, $user_fetch);
    $general = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $admin_title; ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet"
        href="<?php echo ROOT_URL_ADMIN ?>adminassets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="<?php echo ROOT_URL_ADMIN ?>adminassets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="<?php echo ROOT_URL_ADMIN ?>adminassets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL_ADMIN ?>adminassets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL_ADMIN ?>adminassets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL_ADMIN ?>adminassets/bower_components/morris.js/morris.css">
    <link rel="stylesheet"
        href="<?php echo ROOT_URL_ADMIN ?>adminassets/bower_components/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet"
        href="<?php echo ROOT_URL_ADMIN ?>adminassets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet"
        href="<?php echo ROOT_URL_ADMIN ?>adminassets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet"
        href="<?php echo ROOT_URL_ADMIN ?>adminassets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> -->

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<!-- calender -->
<link rel="stylesheet" href="<?php echo ROOT_URL_ADMIN ?>adminassets/bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo ROOT_URL_ADMIN ?>adminassets/bower_components/fullcalendar/dist/fullcalendar.min.css">
<link rel="stylesheet" href="<?php echo ROOT_URL_ADMIN ?>adminassets/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
<link rel="stylesheet" href="<?php echo ROOT_URL_ADMIN ?>adminassets/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="<?php echo ROOT_URL_ADMIN ?>adminassets/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>


<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <?php
			if (isset($_SESSION['auth'])) {
				// if ($_SESSION['user_type'] == 'super_admin') {
			?>
            <a href="index.php" class="logo">
                <span class="logo-mini"><b>A T S</b></span>
                <span class="logo-lg"><b>IT Solutions</b></span>
            </a>
            <?php
				// }
            }
			// 	if ($_SESSION['user_type'] == 'hotel_admin') {
			// 		<a href="hotel_admin.php" class="logo">
			// 			<span class="logo-mini"><b>LMS</b></span>
			// 			<span class="logo-lg"><b>Laundry </b>LMS</span>
			// 		</a>
			// 	<?php
			// 	}
			// 	if ($_SESSION['user_type'] == 'vendor_admin') {
			// 		<a href="vendor_admin.php" class="logo">
			// 			<span class="logo-mini"><b>WA</b></span>
			// 			<span class="logo-lg"><b>Wish Abroad</b></span>
			// 		</a>
			// <?php
			// 	} else {
			// 	}
			// } ?>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="../adminassets/dist/img/user2-160x160.jpg" class="user-image"
                                    alt="User Image">
                                <span class="hidden-xs"> <?php
															if (isset($_SESSION['auth'])) {
																echo $_SESSION['username'];
															} else {
															}
															?> </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="../adminassets/dist/img/user2-160x160.jpg" class="img-circle"
                                        alt="User Image">
                                    <p>
                                        <?php
										if (isset($_SESSION['auth'])) {
											echo $_SESSION['username'];
										} else {
										}
										?>
                                        <small> <?php
												// $user_type = $_SESSION['user_type'];
												// echo "$user_type";
												?>
                                        </small>
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="change_password.php">
                                            <button class="btn btn-primary">Change Password</button>
                                        </a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="logout.php">
                                            <button class="btn btn-danger" onclick="return signout()">Signout</button>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <script>
        function signout() {
            return confirm("Are You Sure! You Want To Sign-Out");
        }
        </script>