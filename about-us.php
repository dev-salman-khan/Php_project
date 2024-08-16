<?php
include('./includes/header.php'); ?>

<!-- Start Page Title Section -->
<div class="page-title-area" style="background-image:url(<?php
// banner  is fetch here
while ($banner = mysqli_fetch_assoc($banner_query)) {
    if (empty($banner['banner_page_banner'])) {
        echo ROOT_URL.'assets/img/page-title-bg.jpg';

    }
    else {  
        echo ROOT_URL.'upload/header/'. $banner['banner_page_banner'];
    }
}
?>)">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>About Us</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php   
       // fetching data 
        $term_fetech = "SELECT * FROM `about` WHERE `about_status`= '1' AND about_id = '1'";
        $term_query = mysqli_query($con, $term_fetech);
        $term_list = mysqli_fetch_array($term_query);   
    ?>
<!-- End Page Title Section -->
<br><br>
<div class="container">
    <?php echo $term_list['about_description'];?>
</div><br><br>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="portfolio-details-image">
			<img src='<?php echo ROOT_URL."upload/about_image/".$term_list ['about_image']; ?>' alt="image">
            </div>
        </div>
    </div>
</div>



<!-- Start Team Section -->
<section class="team-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h6 class="sub-title"><?php echo $term_list['about_sub_tile'];?></h6>
                    <h2><?php echo $term_list['about_tilte'];?></h2>
                </div>
            </div>
            <?php
			$selectquery = "select * from card where card_status = '1' and card_page ='2' ";
			$query = mysqli_query($con, $selectquery);	
			while ($card_list = mysqli_fetch_assoc($query)) { ?>
            <div class="col-lg-3 col-md-6">
                <div class="single-team-box">
                    <div class="team-image">
                        <img src='<?php echo ROOT_URL."upload/card/".$card_list ['card_image']; ?>' alt="team">
                        <div class="team-social-icon">
                            <a class="active"><?php echo $card_list['card_comments']; ?></a>

                        </div>
                    </div>
                    <div class="team-info">
                        <h3><?php echo $card_list['card_name']; ?></h3>
                    </div>
                </div>
            </div>
            <?php }?>

        </div>
    </div>
</section>
<!-- End Team Section -->

<!-- Start Testimonial Section -->
<section class="testimonial-section pt-50 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h6 class="sub-title"><?php echo $term_list['about_sub_title_2'];?></h6>
                    <h2><?php echo $term_list['about_title_2'];?></h2>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="testimonial-slider owl-carousel owl-theme">
                    <!-- testimonials item -->
                    <?php		
								//testimonial is fetch here		
								$selectquery = "select * from testimonial where testimonial_status = '1' and  testimonial_page ='about-us.php'";
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
                            <p> <?php echo $Testimonial_list['testimonial_comments']; ?></p>

                        </div>
                        <div class="avatar">
                            <img
                                src='<?php echo ROOT_URL."upload/testimonial/".$Testimonial_list['testimonial_image']; ?>'>
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





<?php
include('./includes/footer.php'); ?>