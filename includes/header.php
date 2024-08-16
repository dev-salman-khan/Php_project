<?php
    //session start
    session_start();
    include 'admin/includeadmin/db_connect.php';
	define('ROOT_URL',"http://localhost/php_project/it_company/");
	  $admin_name = basename($_SERVER['PHP_SELF']); 
	  // switch condition for echo title name
	  $slug = str_replace('/','',$admin_name);
	  $admin_name3 = $_SERVER['SCRIPT_NAME'];
	  $admin_nameee = basename($_SERVER['SCRIPT_NAME']); 
	  // it is for adding banner in the every page
	 
	   // general data of web site query
	   $user_fetch = "select * from `general_tbl` where `general_status`= '1'";
	   $query = mysqli_query($con, $user_fetch);
	   $general = mysqli_fetch_assoc($query);
	  //  fecthing Banner 
	   $banner_sql = "SELECT * FROM `banner` WHERE banner_page_status='1' AND banner_page_name ='$admin_nameee'"; //path for showing image for every banner in web pages
	   $banner_query = mysqli_query($con, $banner_sql);
	   // seo is fetch here
	  $selectquery_seo = "select * from seo where seo_status = '1' and seo_page_slug = '$admin_name'";
	  $query_seo_run = mysqli_query($con, $selectquery_seo);
	  $seo_fetch = mysqli_fetch_array($query_seo_run);
	  // blog seo 
	  $Blog_seo = "SELECT * FROM `blog` where blog_slug ='$slug' AND blog_status = 1";
	  $Blog_fun = mysqli_query($con, $Blog_seo);
	  $blog_des = mysqli_fetch_assoc($Blog_fun);
	  // services seo 
	  $services_data = "SELECT * FROM `services` where services_slug ='$slug' AND services_status = 1";
	  $services_seo = mysqli_query($con, $services_data);
	  $services_des = mysqli_fetch_assoc($services_seo);

?>


<!doctype html>
<html lang="zxx">


<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	
    <title><?php 
    if (!empty($seo_fetch['seo_title'])) { echo  $seo_fetch['seo_title']; } 
    
    else { 
        if (!empty($services_des['services_title'])) { echo  $services_des['services_title']; } 
    
        else {
       
           
        if(empty($blog_des['blog_title'])){echo"Atech Solutions";}
        else{echo $blog_des['blog_title'];}
        }}?></title>
    <meta name="keyword" content="<?php if (!empty($seo_fetch['seo_keyword'])) { echo  $seo_fetch['seo_keyword']; } else {
         if (!empty($blog_des['seo_keyword'])) { echo  $blog_des['seo_keyword']; } 
         else {
            if (!empty($services_des['seo_keyword'])) { echo  $services_des['seo_keyword']; } 
    
         else {
            if (!empty($blog_des['seo_keyword'])) { echo  $blog_des['seo_keyword']; } 
    
            
                else {
        echo"Atech Solutions";} } }}?>">
    <meta name="description" content="<?php if (!empty($seo_fetch['seo_description'])) { echo  $seo_fetch['seo_description']; } else {
       
            if (!empty($blog_des['seo_description'])) { echo  $blog_des['seo_description']; } 
           
        else {
        if(empty($services_des['seo_description'])){ echo "Atech Solutions";}else{echo $services_des['seo_description'];}}} ?>">
    <meta name="author" content="Admin">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title -->
	<title>AtechSolutions</title>
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
	<!-- Favicon -->
	
	<!-- Bootstrap Min CSS -->
	<link rel="stylesheet" href="<?php echo ROOT_URL?>assets/css/bootstrap.min.css">
	<!-- Animate Min CSS -->
	<link rel="stylesheet" href="<?php echo ROOT_URL?>assets/css/animate.min.css">
	<!-- FlatIcon CSS -->
	<link rel="stylesheet" href="<?php echo ROOT_URL?>assets/css/flaticon.css">
	<!-- Font Awesome Min CSS -->
	<link rel="stylesheet" href="<?php echo ROOT_URL?>assets/css/fontawesome.min.css">
	<!-- Bootstrap Icon CSS -->
	<link rel="stylesheet" href="<?php echo ROOT_URL?>assets/css/bootstrap-icons.css">
	<!-- Mean Menu CSS -->
	<link rel="stylesheet" href="<?php echo ROOT_URL?>assets/css/meanmenu.css">
	<!-- Magnific Popup Min CSS -->
	<link rel="stylesheet" href="<?php echo ROOT_URL?>assets/css/magnific-popup.min.css">
	<!-- Swiper Min CSS -->
	<link rel="stylesheet" href="<?php echo ROOT_URL?>assets/css/swiper.min.css">
	<!-- Owl Carousel Min CSS -->
	<link rel="stylesheet" href="<?php echo ROOT_URL?>assets/css/owl.carousel.min.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="<?php echo ROOT_URL?>assets/css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="<?php echo ROOT_URL?>assets/css/responsive.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	
</head>
<body>
	<!-- Start Preloader Section -->
	<div class="preloader">
		<div class="loader">
			<div class="shadow"></div>
			<div class="box"></div>
		</div>
	</div> 
	<!-- End Preloader Section -->
	<!-- Start Navbar Section -->
	<div class="navbar-area">
		<div class="techvio-responsive-nav">
			<div class="container">
				<div class="techvio-responsive-menu">
					<div class="logo">
						<a href="index.html">
							<img src="<?php echo ROOT_URL ."upload/general/logo/" . $general['general_imgicon']; ?>" class="white-logo" alt="logo">
							<img src="<?php echo ROOT_URL ."upload/general/logo/" . $general['image_2']; ?>" alt="logo">
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="techvio-nav">
			<div class="container">
				<nav class="navbar navbar-expand-md navbar-light">
					<a class="navbar-brand" href="index.html">
						<img src="<?php echo ROOT_URL ."upload/general/logo/" . $general['general_imgicon']; ?>" class="white-logo" alt="logo">
						<img src="<?php echo ROOT_URL ."upload/general/logo/" . $general['image_2']; ?>" class="black-logo" alt="logo">
					</a>
					<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
						<ul class="navbar-nav">
                            <li class="nav-item">
								<a class="<?php if($admin_nameee =='index.php'){echo 'active';}?>" href="<?php echo ROOT_URL?>index.php">Home</a>
							</li> 
							<li class="nav-item">
								<a class="<?php if($admin_nameee =='about-us.php'){echo 'active';}?>"  href="<?php echo ROOT_URL?>about-us.php">About Us</a>
							</li>
							<li class="nav-item">
								<a class="<?php if($admin_nameee =='our-solutions.php'){echo 'active';}?>"  href="<?php echo ROOT_URL?>our-solutions.php">Our Solutions <i class="fas fa-chevron-down"></i></a>
								<ul class="dropdown-menu">
								<?php 
                                              // puttnig sql for new recorded Blog
                                                $blog_detailquery2 = "SELECT * FROM services Where services_status='1' ORDER BY services_id DESC LIMIT 5";
                                                $blog_run = mysqli_query($con, $blog_detailquery2);
                                                while($blog_related_list = mysqli_fetch_assoc($blog_run)){
                                            ?>
                                            <li class="nav-item"><a  class="nav-link" href="<?php echo ROOT_URL;?>solution_details.php/<?php echo $blog_related_list['services_slug']?>"><?php echo $blog_related_list['services_title'] ?></a></li>
                                            <?php } ?>
								</ul>
							</li>
							
							<li class="nav-item">
								<a class="<?php if($admin_nameee =='blog.php'){echo 'active';}?>"    href="<?php echo ROOT_URL?>blog.php">Blogs</a>
							</li>
							<li class="nav-item">
								<a class="<?php if($admin_nameee =='trainings.php'){echo 'active';}?>" href="<?php echo ROOT_URL?>trainings.php">Trainings</a>
							</li>
							<li class="nav-item">
								<a class="<?php if($admin_nameee =='contact-us.php'){echo 'active';}?>"  href="<?php echo ROOT_URL?>contact-us.php">Contact Us</a>
							</li>
						</ul>
						<div class="other-option">
							<a class="default-btn" href="<?php echo ROOT_URL?>contact-us.php">Get It Support <span></span></a>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<!-- End Navbar Section -->