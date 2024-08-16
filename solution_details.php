<?php include ('includes/header.php');
$full_slug = $_SERVER['PATH_INFO'];
$slug = str_replace('/','',$full_slug);
//blog details is fetch here by the slug {slug= blog title}//
$blog_detailquery = "select * from services where services_status ='1' and services_slug='$slug'";
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
                    <h2>Solutions</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Our Solutions</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--// Breadcrumb -->
<!-- Page Conttent -->
<?php 
$blog_detailquery2 = " SELECT * FROM services Where services_status='1' ORDER BY services_id DESC LIMIT 6";
$blog_run = mysqli_query($con, $blog_detailquery2);
if(mysqli_num_rows($blog_query) > 0){
?>
<main class="page-content section">

    <!-- Blog Grids Area -->
    <div class="blog-grids-area pt-80 pt-md-60 pt-sm-40 pt-xs-30 pb-110 pb-md-90 pb-sm-70 pb-xs-60">
        <div class="container">

            <div class="row ">
                <div class="col-lg-8">
                    <div class="blog-details-warpper">

                        <div class="details-image mt-30">
                            <h2><?php echo $blog_list_web['services_title'] ?></h2>
                            <p> </p>
                            <img src='<?php echo ROOT_URL ."upload/services/" . $blog_list_web ['services_cover_image']; ?>'
                                alt="<?php echo $blog_list_web['services_title'] ?>">
                        </div>

                        <div class="details-contents-wrap">
                            <?php echo $blog_list_web['services_description'] ?>
                        </div>
                        <div class="row comments-area mt-5 mb-5">

                            <div class="row">
                                <div class="col-md-12">
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
                                </div>
                            </div>
                            <form action="#" method="POST">
                                <div class="">
                                    <h3 class="comment-reply-title  ">Leave a Reply</h3>
                                    <div class="comment-respond">
                                        <p class="comment-form-comment">
                                            <label>Comment</label>
                                            <textarea name="product_enquiry_interest" id="comment" cols="45" rows="5"
                                                maxlength="65525" required="required"></textarea>
                                        </p>
                                        <p class="comment-form-author">
                                            <label>Name <span class="required">*</span>
                                            </label>
                                            <input type="text" name="product_enquiry_name"
                                                placeholder="Your Name"><input type="hidden"
                                                name="product_enquiry_service_id"
                                                value="<?php echo $blog_list_web['services_id'] ?>">
                                        </p>
                                        <p class="comment-form-email">
                                            <label>Email <span class="required">*</span>
                                            </label>
                                            <input type="email" name="product_enquiry_email" placeholder="Email"
                                                required>
                                        </p>
                                        <p class="comment-form-url">
                                            <label>Phone Number</label>
                                            <input type="text" name="product_enquiry_phone" placeholder="Phone Number"
                                                required>
                                        </p>
                                        <p class="comment-form-url">

                                            <label>Details Of Solution
                                            </label><textarea name="product_enquiry_details"
                                                placeholder="Message"><?php echo $blog_list_web['services_title'] ?></textarea>
                                        </p>

                                        <p class="form-submit">
                                            <input type="submit" name="message" id="submit" class="submit"
                                                value="Post Comment">
                                        </p>


                                    </div>
                                </div>
                            </form>
                            <?php
                                        // inserting Service query 
                                        if(isset($_POST['message'])){
                                            $product_enquiry_service_id = $_POST['product_enquiry_service_id'];
                                            $product_enquiry_name = $_POST['product_enquiry_name'];
                                                $product_enquiry_phone = $_POST['product_enquiry_phone'];
                                                $product_enquiry_moblie = $_POST['product_enquiry_moblie'];
                                                $product_enquiry_email = $_POST['product_enquiry_email'];
                                                $product_enquiry_interest = $_POST['product_enquiry_interest'];
                                                $product_enquiry_details = $_POST['product_enquiry_details'];
                                                $product_enquiry_status = '1';
                                                $product_enquiry_date = date('d-m-y h:i:sa');
                                                $message_run ="INSERT INTO `product_enquiry`( `product_enquiry_service_id`, `product_enquiry_name`, `product_enquiry_phone`, `product_enquiry_moblie`, `product_enquiry_email`, `product_enquiry_interest`, `product_enquiry_details`, `product_enquiry_status`, `product_enquiry_date`) VALUES ('$product_enquiry_service_id','$product_enquiry_name','$product_enquiry_phone','$product_enquiry_moblie','$product_enquiry_email','$product_enquiry_interest','$product_enquiry_details','$product_enquiry_status','$product_enquiry_date')";
                                                
                                                $succes_run = mysqli_query($con, $message_run);
                                                if($succes_run){
                                                    $_SESSION['SuccessMessage'] = "Service Enquiry Sent Successfully!";
                                                    ?>
                            <script>
                            var url =
                                "<?php echo ROOT_URL;?>solution_details.php/<?php echo $blog_list_web['services_slug']?>";
                            location.replace(url);
                            </script>
                            <?php
                                                } else {
                                                    $_SESSION['errorMessage'] = "Un Execpted Error!";
                                                   ?>
                            <script>
                            var url =
                                "<?php echo ROOT_URL;?>solution_details.php/<?php echo $blog_list_web['services_slug']?>";
                            location.replace(url);
                            </script>
                            <?php
                                                }

                                        }
                                        ?>


                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
             
					<aside class="widget-area" id="secondary">
						<section class="widget widget_techvio_posts_thumb">
							<h3 class="widget-title">Popular Solutions</h3>
                            <?php
                            // puttnig sql for new recorded Blog
                            $blog_detailquery2 = " SELECT * FROM services Where services_status='1' ORDER BY services_id DESC LIMIT 5";
                            $blog_run = mysqli_query($con, $blog_detailquery2);
                                while($blog_related_list = mysqli_fetch_assoc($blog_run)){
                            ?>
							<article class="item">
                            <a class="thumb"
                                            href="<?php echo ROOT_URL;?>solution_details.php/<?php echo $blog_related_list['services_slug']?>">
                                            <img src='<?php echo ROOT_URL ."upload/services/" . $blog_related_list ['services_image']; ?>'
                                                alt="<?php echo $blog_related_list['services_title'] ?> "  ></a>
								<div class="info">
                                    <h4 class="title usmall">
                                        <a
                                        href="<?php echo ROOT_URL;?>solution_details.php/<?php echo $blog_related_list['services_slug']?>"><?php echo $blog_related_list['services_title'] ?></a>
                                    </h4>
                                    <!-- <span>June 10, 2023</span> -->
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