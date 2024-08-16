<?php include('./includes/header.php'); ?> 

	<!-- Start Page Title Section -->
	<div class="page-title-area item-bg1"  style="background-image:url(<?php
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
						<h2>Terms And Conditions</h2>
						<ul>
							<li><a href="index.php">Home</a>
							</li>
							<li>Terms And Conditions</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php   
        $term_fetech = "SELECT * FROM `term_codition`  where `term_codition_status`= '1'";
        $term_query = mysqli_query($con, $term_fetech);
        $term_list = mysqli_fetch_array($term_query);   
    ?>
    <!-- Contact section start -->
<section class="contact section-padding">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-12 col-lg-12">
                <h1><?php echo $term_list['term_condition_title']?></h1>
                <?php echo $term_list['term_codition_description']?>

            </div>
        </div>
    </div>
</section>
<!-- Contact section End -->

<!-- Map section End -->
<?php include ('includes/footer.php'); ?>

