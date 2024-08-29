<?php include ('includes/header.php');
$full_slug = $_SERVER['PATH_INFO'];
$slug = str_replace('/','',$full_slug);
//blog details is fetch here by the slug {slug= blog title}//
$blog_detailquery = "select * from blog where blog_status ='1' and blog_slug='$slug'";
$blog_query = mysqli_query($con, $blog_detailquery);
$blog_query2 = mysqli_query($con, $blog_detailquery);
$blog_list_web = mysqli_fetch_assoc($blog_query2);
?>
<!-- Breadcrumb -->
<!-- Start Page Title Section -->
<div class="page-title-area item-bg2" style="background-image:url(<?php
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
                    <h2><?php echo $blog_list_web['blog_title'] ?></h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li> Blog Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--// Breadcrumb -->
<!-- Page Conttent -->
<?php 
$blog_detailquery2 = " SELECT * FROM blog Where blog_status='1' ORDER BY blog_id DESC LIMIT 6";
$blog_run = mysqli_query($con, $blog_detailquery2);
if(mysqli_num_rows($blog_query) > 0){
?>
<main class="page-content section">

    <!-- Blog Grids Area -->
    <div class="blog-grids-area pt-80 pt-md-60 pt-sm-40 pt-xs-30 pb-110 pb-md-90 pb-sm-70 pb-xs-60">
        <div class="container">

            <div class="row ">
                <div class="col-lg-8 mb-5">
                    <div class="blog-details-warpper">

                        <div class="details-image mt-30">
                            <h2><?php echo $blog_list_web['blog_title'] ?></h2>
                            <p> </p>
                            <img src='<?php echo ROOT_URL ."upload/blog/" . $blog_list_web ['blog_cover_image']; ?>'
                                alt="<?php echo $blog_list_web['blog_title'] ?>">
                        </div>

                        <div class="details-contents-wrap">
                            <?php echo $blog_list_web['blog_description'] ?>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-4">
             
					<aside class="widget-area" id="secondary">
						<section class="widget widget_techvio_posts_thumb">
							<h3 class="widget-title">Popular Blogs</h3>
                            <?php
                            // puttnig sql for new recorded Blog
                            $blog_detailquery2 = " SELECT * FROM blog Where blog_status='1' ORDER BY blog_id DESC LIMIT 5";
                            $blog_run = mysqli_query($con, $blog_detailquery2);
                                while($blog_related_list = mysqli_fetch_assoc($blog_run)){
                            ?>
							<article class="item">
                            <a class="thumb"
                                            href="<?php echo ROOT_URL;?>blog_details.php/<?php echo $blog_related_list['blog_slug']?>">
                                            <img src='<?php echo ROOT_URL ."upload/blog/" . $blog_related_list ['blog_image']; ?>'
                                                alt="<?php echo $blog_related_list['blog_title'] ?> "  ></a>
								<div class="info">
                                    <h4 class="title usmall">
                                        <a
                                        href="<?php echo ROOT_URL;?>blog_details.php/<?php echo $blog_related_list['blog_slug']?>"><?php echo $blog_related_list['blog_title'] ?></a>
                                    </h4>
                                    <span>									<i class="bi bi-calendar-check"></i> <?php echo $blog_related_list['blog_datetime']; ?></span>
								</div>
							</article>
                            <?php } ?>
							
						</section>
						
					</aside>
				</div>  
              
            </div>
        </div>
        <!--// Blog Grids Area -->
</main>

<?php
}
else{
    ?>
<script>
var url = "<?php echo ROOT_URL?>";
location.replace(url + 'index.php');
</script>
<?php 
}
?>
<!--// Page Conttent -->

<?php include ('includes/footer.php'); ?>