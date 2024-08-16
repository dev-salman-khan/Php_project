<?php include('./includes/header.php'); ?> 
<?php   
       // fetching data 
        $term_fetech = "SELECT * FROM `home` WHERE `home_status`= '1' AND home_id = '1'";
        $term_query = mysqli_query($con, $term_fetech);
        $term_list = mysqli_fetch_array($term_query);   
		$slider = "select * from `slider` where `slider_status`= '1'";
		$slider_fetch = mysqli_query($con, $slider);
    ?>
<header class="slider slider-prlx">
        <div class="swiper-container parallax-slider">
            <div class="swiper-wrapper">
            <?php while ($slider_data = mysqli_fetch_assoc($slider_fetch)) {  ?>

                <div class="swiper-slide">
                    <div class="bg-img valign" data-background="<?php
                                    if (!empty($slider_data['slider_image'])) {
                                        echo ROOT_URL.'upload/home/'. $slider_data['slider_image'];
                                    }
                                    else {echo ROOT_URL . "assets/img/4.jpg";}
                             
                                ?>" data-overlay-dark="5">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2 col-md-12">
                                    <div class="caption">
                                        <h1><?php echo $slider_data['slider_title'] ?></h1>
                                        <p><?php echo $slider_data['slider_sub_title'] ?></p>
										<div class="banner-btn home-slider-btn">
											<a href="<?php echo ROOT_URL;?>our-solutions.php" class="default-btn-one">Our Solutions <span></span></a>
											<a href="<?php echo ROOT_URL;?>contact-us.php" class="default-btn">Contact Us <span></span></a>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <?php } ?>
            </div>
            <!-- slider setting -->
            <div class="control-text">
                <div class="swiper-button-prev swiper-nav-ctrl prev-ctrl cursor-pointer">
                    <span class="arrow prv"></span>
                </div>
                <div class="swiper-button-next swiper-nav-ctrl next-ctrl cursor-pointer">
                    <span class="arrow nxt"></span>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </header>
	
    <section class="feature-section  pt-100">
        <div class="container">
            <div class="row"><?php
			$selectquery = "select * from card where card_status = '1' and card_page ='1' ";
			$query = mysqli_query($con, $selectquery);	
			while ($card_list = mysqli_fetch_assoc($query)) { ?>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-single-item">
					<img src='<?php echo ROOT_URL."upload/card/".$card_list ['card_image']; ?>' alt="icon" style="border-radius:100%;">
                        <h3><?php echo $card_list['card_name']; ?></h3>
                        <p><?php echo $card_list['card_comments']; ?></p>
                    <br></div>
                </div>
				<?php } ?>
              
            </div>
        </div>
    </section>

	<!-- Start Services Section -->
	<section class="services-section bg-grey section-padding">
		<div class="container">
			<div class="row">
                <div class="col-md-12">
					<div class="section-title">
						<h6 class="sub-title"><?php echo $term_list['home_subtile'];?></h6>
						<h2><?php echo $term_list['home_title'];?></h2>
					</div>
                </div>
				<?php
            // blog details are fetch when blog_status is 1 //
              $selectquery_blog = "select * from services where services_status = '1' and services_features_status ='1'  ORDER BY services_id DESC ";
              $query_blog = mysqli_query($con, $selectquery_blog);
              while ($blog = mysqli_fetch_assoc($query_blog)) {             
            ?>
				<div class="col-lg-4 col-md-6">
					<div class="single-services-item">
						<div class="services-icon">
						<a href="<?php echo ROOT_URL;?>solution_details.php/<?php echo $blog['services_slug']?>"> <img src='<?php echo ROOT_URL ."upload/services/" . $blog ['services_image']; ?>'
                                alt="<?php echo $blog['services_title'] ?> "></a>
						</div>
						<h3> <a href="<?php echo ROOT_URL;?>solution_details.php/<?php echo $blog['services_slug']?>"><?php echo $blog['services_title'] ?></a></h3>
						<p><?php echo $blog['services_small_description'] ?> </p>
						<br><div class="services-btn">
							<a  href="<?php echo ROOT_URL;?>solution_details.php/<?php echo $blog['services_slug']?> " class="default-btn"><i class="bi bi-arrow-right-short"></i> Read More</a>
						</div>
					</div>
				</div>
				<?php } ?>
			
			</div>
		</div>
	</section>
	<!-- End Services Section -->
	
	<!-- Start Overview Section -->
	<section class="overview-section section-padding">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="overview-image">
					<img src='<?php echo ROOT_URL."upload/about_image/".$term_list ['home_image']; ?>' alt="image">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="overview-content">
						<h6 class="sub-title"><?php echo $term_list['home_subtitle_1'];?></h6>
						<h2><?php echo $term_list['home_title_1'];?></h2>
						<p><?php echo $term_list['home_description'];?></p>
						<ul class="features-list">
							<li> <span><?php echo $term_list['home_boxone'];?></span></li>
							<li> <span><?php echo $term_list['home_boxtwo'];?></span></li>
							<li> <span><?php echo $term_list['home_boxthree'];?></span></li>
							<li> <span><?php echo $term_list['home_boxfour'];?></span></li>
							<li> <span><?php echo $term_list['home_boxfive'];?></span></li>
							<li> <span><?php echo $term_list['home_boxsix'];?></span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Overview Section -->
	
	<!-- Start Testimonial Section -->
	<section class="testimonial-section pt-50 pb-100">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h6 class="sub-title"><?php echo $term_list['home_subtile_2'];?></h6>
						<h2><?php echo $term_list['home_title_2'];?></h2>
					</div>
				</div>
				<div class="col-lg-12 col-md-12">
					<div class="testimonial-slider owl-carousel owl-theme">
						<!-- testimonials item -->
						<?php		
								//testimonial is fetch here		
								$selectquery = "select * from testimonial where testimonial_status = '1' and  testimonial_page ='index.php'";
								$query = mysqli_query($con, $selectquery);
								$i = 1;
								// using  while loop for showing multiple testimonial  
								while ($Testimonial_list = mysqli_fetch_assoc($query)) {
							?>
						<div class="single-testimonial">
							<div class="rating-box">
								<ul>
									<!-- <li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li> -->
								</ul>
							</div>
							<div class="testimonial-content">
							<p>  <?php echo $Testimonial_list['testimonial_comments']; ?></p>
							
							</div>
							<div class="avatar">
							<img src='<?php echo ROOT_URL."upload/testimonial/".$Testimonial_list['testimonial_image']; ?>'
                                        >
							</div>
							<div class="testimonial-bio">
								<div class="bio-info">
								<h4><?php echo $Testimonial_list['testimonial_name']; ?></h4>
									
								<span><?php echo $Testimonial_list['testimonial_work']; ?>
								</span>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Testimonial Section -->
	
	
	<!-- Start Partner section -->
	<section class="partner-section pt-100 pb-70">
		<div class="container">
			<div class="partner-title">
				<h6 class="sub-title"><?php echo $term_list['home_subtitle_3'];?></h6>
				<h2><?php echo $term_list['home_title_3'];?></h2>
			</div>
			<div class="container">
			<div class="row">
			<?php
            // blog details are fetch when blog_status is 1 //
			$selectquery_blog = "SELECT * FROM blog WHERE blog_status = '1' AND blog_popular=1 ORDER BY blog_id DESC ";
			$query_blog = mysqli_query($con, $selectquery_blog);
              while ($blog = mysqli_fetch_assoc($query_blog)) {             
            ?>
				<div class="col-lg-4 col-md-6">
					<div class="blog-single-item">
						<div class="blog-image">
							<a href="single-blog.html">
							<a href="<?php echo ROOT_URL;?>blog_details.php/<?php echo $blog['blog_slug']?>"> <img src='<?php echo ROOT_URL ."upload/blog/" . $blog ['blog_image']; ?>'
                                alt="<?php echo $blog['blog_title'] ?> "></a>
							</a>
						</div>
						<div class="blog-description">
							<ul class="blog-info">
								
								<li>
									<i class="bi bi-calendar-check"></i> <?php echo $blog['blog_datetime']; ?>
								</li>
							</ul>
							<div class="blog-text">
								<h3>
								<a href="<?php echo ROOT_URL;?>blog_details.php/<?php echo $blog['blog_slug']?>"><?php echo $blog['blog_title'] ?></a>
                                </h3>
								<p>Lorem ipsum dolor sit amet, consectetu adipiscing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua</p>
							 <a href="<?php echo ROOT_URL;?>blog_details.php/<?php echo $blog['blog_slug']?>" class=" read-more mt-5"><i class="bi bi-arrow-right-short"></i> View More</a>
								
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				
			
			
			</div>
		</div>
		</div>
	</section>
	<!-- End Partner section -->
	
<?php
include('./includes/footer.php'); ?>