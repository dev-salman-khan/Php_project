
  <!-- Start Footer & Subscribe Section -->
	<section class="footer-subscribe-wrapper">
		<!-- Start Subscribe Section -->
	<!-- Start Footer Section -->
    <div class="footer-area ptb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="single-footer-widget">
							<a class="footer-logo" href="#">
								<img src="<?php echo ROOT_URL ."upload/general/logo/" . $general['general_imgicon']; ?>" class="white-logo" alt="logo">
							</a>
                            <p><?php echo $general['general_about_us'];?></p>
							
							<ul class="footer-social">
								<?php
                                    if ($general['general_facebook'] != '#') {
                                        ?>
                                            <li class="list-inline-item "><a target="_blank" href="<?php echo $general['general_facebook'] ?>"><i class="fab fa-facebook-f" ></i></a></li>
                                        <?php
                                    }
                                    if ($general['general_twitter'] != '#') {
                                        ?>
                                            <li class="list-inline-item"><a target="_blank" href="<?php echo $general['general_twitter'] ?>"><i class="fab fa-twitter" ></i></a></li>
                                        <?php
                                    }
                                    if ($general['general_linkedin'] != '#') {
                                        ?>
                                            <li class="list-inline-item"><a target="_blank" href="<?php echo $general['general_linkedin'] ?>"><i class="fab fa-linkedin-in" ></i></a></li>
                                        <?php
                                    }
                                    if ($general['general_pinterest'] != '#') {
                                        ?>
                                           <li class="list-inline-item"><a target="_blank" href="<?php echo $general['general_pinterest'] ?>"><i class="fab fa-pinterest" ></i></a></li>
                                        <?php
                                    }
                                    if ($general['general_instagram'] != '#') {
                                        ?>
                                         <li class="list-inline-item"><a target="_blank" href="<?php echo $general['general_instagram'] ?>"><i class="fab fa-instagram" ></i></a></li>
                                        <?php
                                    }
                                    
                            ?>
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget">
							<div class="footer-heading">
								<h3>Our Solutions</h3>
							</div>
							<ul class="footer-quick-links">
							<?php 
                                 // puttnig sql for new recorded Blog
                                    $blog_detailquery2 = "SELECT * FROM services Where services_status='1' ORDER BY services_id DESC LIMIT 5";
                                    $blog_run = mysqli_query($con, $blog_detailquery2);
                                    while($blog_related_list = mysqli_fetch_assoc($blog_run)){
                                ?>
                                <li><a href="<?php echo ROOT_URL;?>solution_details.php/<?php echo $blog_related_list['services_slug']?>"><?php echo $blog_related_list['services_title'] ?></a></li>
                                <?php } ?> 
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget">
							<div class="footer-heading">
								<h3>Useful Links</h3>
							</div>
							<ul class="footer-quick-links">
								
							    <li><a href="<?php echo ROOT_URL?>index.php">Home</a></li>
								<li><a href="<?php echo ROOT_URL?>about-us.php">About Us</a></li>
								<li><a href="<?php echo ROOT_URL?>our-solutions.php">Our Solutions</a></li>
								<li><a href="<?php echo ROOT_URL?>blog.php">Blogs</a></li>
								<li><a href="<?php echo ROOT_URL?>trainings.php">Trainings</a></li>
								<li><a href="<?php echo ROOT_URL?>contact-us.php">Contact Us</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="single-footer-widget">
							<div class="footer-heading">
								<h3>Contact Info</h3>
							</div>
							<div class="footer-info-contact">
								<i class="flaticon-phone-call"></i>
								<h3>Phone</h3>
								<span><a href="tel:<?php echo $general['general_mobilno'] ?>"><?php echo $general['general_mobilno'] ?></a></span>
							</div>
							<div class="footer-info-contact">
								<i class="flaticon-envelope"></i>
								<h3>Email</h3>
								<span><a href="mailto:<?php echo $general['general_emailid'] ?>"><?php echo $general['general_emailid'] ?></a></span>
							</div>
							<div class="footer-info-contact">
								<i class="flaticon-placeholder"></i>
								<h3>Address</h3>
								<p><?php echo $general['general_address'] ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Section -->
		<a  class="whats-app" href="<?php echo $general['general_whatsapp'] ?>" target="_blank">
    <i class="fab fa-whatsapp my-float"></i></a>
	</section>
	<!-- End Footer & Subscribe Section -->
	
	<!-- Start Copy Right Section -->
	<div class="copyright-area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-md-6">
					<p><i class="far fa-copyright"></i> 2024 <?php echo $general['general_companyname'] ?> </p>
				</div>
				<div class="col-lg-6 col-md-6">
					<ul>
						<li><a href="<?php echo ROOT_URL?>terms-and-conditions.php">Terms & Conditions</a></li>
						<li><a href="<?php echo ROOT_URL?>privacy-policy.php">Privacy Policy</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- End Copy Right Section -->
	
	<!-- Start Go Top Section -->
	<div class="go-top">
		<i class="fas fa-chevron-up"></i>
		<i class="fas fa-chevron-up"></i>
	</div>
	<!-- End Go Top Section -->
	
	<!-- jQuery Min JS -->
	<script src="<?php echo ROOT_URL?>assets/js/jquery.min.js"></script>
	<!-- Popper Min JS -->
	<script src="<?php echo ROOT_URL?>assets/js/popper.min.js"></script>
	<!-- Bootstrap Min JS -->
	<script src="<?php echo ROOT_URL?>assets/js/bootstrap.bundle.min.js"></script>
	<!-- Mean Menu JS  -->
	<script src="<?php echo ROOT_URL?>assets/js/jquery.meanmenu.js"></script>
	<!-- Appear Min JS -->
	<script src="<?php echo ROOT_URL?>assets/js/jquery.appear.min.js"></script>
	<!-- CounterUp Min JS -->
	<script src="<?php echo ROOT_URL?>assets/js/jquery.waypoints.min.js"></script>
	<script src="<?php echo ROOT_URL?>assets/js/jquery.counterup.min.js"></script>
	<!-- Owl Carousel Min JS -->
	<script src="<?php echo ROOT_URL?>assets/js/owl.carousel.min.js"></script>
	<!-- Magnific Popup Min JS -->
	<script src="<?php echo ROOT_URL?>assets/js/jquery.magnific-popup.min.js"></script>
	<!-- Isotope Min JS -->
	<script src="<?php echo ROOT_URL?>assets/js/isotope.pkgd.min.js"></script>
	<!-- Swiper Min JS -->
	<script src="<?php echo ROOT_URL?>assets/js/swiper.min.js"></script>
	<!-- WOW Min JS -->
	<script src="<?php echo ROOT_URL?>assets/js/wow.min.js"></script>
	<!-- Main JS -->
	<script src="<?php echo ROOT_URL?>assets/js/main.js"></script>
	
</body>
</html>