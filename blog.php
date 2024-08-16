<?php
include('./includes/header.php'); ?> 
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
							<h2>Blogs</h2>
							<ul>
								<li><a href="index.php">Home</a>
								</li>
								<li>Blogs</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
	</div>
	<!-- End Page Title Section -->
	<!-- Start Blog Section -->
	<section class="blog-section section-padding">
		<div class="container">
			<div class="row">
			<?php
            // blog details are fetch when blog_status is 1 //
              $selectquery_blog = "select * from blog where blog_status = '1'  ORDER BY blog_id DESC ";
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
								<p><?php echo $blog['blog_small_description'] ?></p>
							 <a href="<?php echo ROOT_URL;?>blog_details.php/<?php echo $blog['blog_slug']?>" class="read-more  mt-5"><i class="bi bi-arrow-right-short"></i> View More</a>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<!-- End Blog Section -->
<?php
include('./includes/footer.php'); ?> 