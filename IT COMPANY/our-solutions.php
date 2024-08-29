<?php

include('./includes/header.php'); ?> 
<!-- Start Page Title Section -->
	<div class="page-title-area item-bg2"  style="background-image:url(<?php
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
						<h2>Our Solutions</h2>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li>Our Solutions</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page Title Section -->
	
	<!-- Start Services Section -->
	<section class="services-section section-padding">
		<div class="container">
			<div class="row">
			<?php
            // blog details are fetch when blog_status is 1 //
              $selectquery_blog = "select * from services where services_status = '1'  ORDER BY services_id DESC ";
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
	

<?php
include('./includes/footer.php'); ?> 