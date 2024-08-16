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
   <?php   
       // fetching data 
        $term_fetech = "SELECT * FROM `contact` WHERE `contact_status`= '1' AND contact_id = '1'";
        $term_query = mysqli_query($con, $term_fetech);
        $term_list = mysqli_fetch_array($term_query);   
    ?>
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="page-title-content">
						<h2>Contact Us</h2>
						<ul>
							<li><a href="index.php">Home</a>
							</li>
							<li>Contact Us</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page Title Section -->
	
	<!-- Start Contact Section -->
	<div class="contact-section section-padding">
		<div class="container">
			<div class="section-title">
				<h6 class="sub-title"><?php echo $term_list['contact_subtilte'];?></h6>
				<h2><?php echo $term_list['contact_title'];?></h2>
			</div>
			<div class="row align-items-center">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact-form">
						<p class="form-message"></p>
						<form id="contact-form" class="contact-form form"  method="POST">
							<div class="row">
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<input type="text" name="message_enquiry_name"  class="form-control" required placeholder="Your Name">
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<input type="email" name="message_enquiry_email"  class="form-control" required placeholder="Your Email">
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<input type="text" name="message_enquiry_phone"  required class="form-control" placeholder="Your Phone">
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<input type="text" name="message_enquiry_subject"  class="form-control" required placeholder="Your Subject">
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
									<div class="form-group">
										<textarea name="message_enquiry_message" class="form-control" cols="30" rows="6" required placeholder="Your Message"></textarea>
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
									<button type="submit" name="send_message" class="default-btn submit-btn">Send Message</button>
								</div>
							</div>
						</form>

					<?php 
				if (isset($_POST['send_message'])) {
						$message_enquiry_name = $_POST['message_enquiry_name'];
						$message_enquiry_phone = $_POST['message_enquiry_phone'];
						$message_enquiry_email = $_POST['message_enquiry_email'];
						$message_enquiry_subject = $_POST['message_enquiry_subject'];
						$message_enquiry_message = $_POST['message_enquiry_message'];
						$message_enquiry_datetime = date('d-m-y h:i:s');
						$message_enquiry_status = 1;

						$inser_query = "INSERT INTO  message_enquiry(message_enquiry_name,message_enquiry_phone,message_enquiry_email,message_enquiry_subject,message_enquiry_message,message_enquiry_datetime) VALUES ('$message_enquiry_name','$message_enquiry_phone','$message_enquiry_email','$message_enquiry_subject','$message_enquiry_message','$message_enquiry_datetime')";
						$query = mysqli_query($con, $inser_query);

                        if ($query) {
                            ?>
                                <script>
                                    alert("Thank you! We Will Contact You Shortly");
                                    location.replace('contact-us.php');
                                </script>
                            <?php
                            }  else {
                            ?>
                                <script>
                                    alert("Your Message Not Send !! Please Try Again");
                                    location.replace('index.php');
                                </script>
                    <?php
                            }
                        }
                        
                    ?>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact Section -->
	
	<!-- Start Contact Info Section -->
	<section class="contact-info-wrapper bg-grey">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h6 class="sub-title"><?php echo $term_list['contact_subtitle_1'];?></h6>
						<h2><?php echo $term_list['contact_title_1'];?></h2>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="contact-info-content">
						<h5><?php echo $term_list['contact_name'];?></h5>
						<p><?php echo $term_list['contact_addr'];?></p>
						<a href="tel:<?php echo $term_list['contact_number'];?>"><?php echo $term_list['contact_number'];?></a>
						<a href="mailto:<?php echo $term_list['contact_email'];?>"><?php echo $term_list['contact_email'];?></a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="contact-info-content">
						<h5><?php echo $term_list['contact_name_1'];?></h5>
						<p> <?php echo $term_list['contact_addr_1'];?></p>
						<a href="tel:<?php echo $term_list['contact_num_1'];?>"><?php echo $term_list['contact_num_1'];?></a>
						<a href="mailto:<?php echo $term_list['contact_email_1'];?>"><?php echo $term_list['contact_email_1'];?></a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="contact-info-content">
						<h5><?php echo $term_list['contact_name_2'];?></h5>
						<p><?php echo $term_list['contact_addr_2'];?></p>
						<a href="tel:<?php echo $term_list['contact_num_2'];?>"><?php echo $term_list['contact_num_2'];?></a>
						<a href="mailto:<?php echo $term_list['contact_email_2'];?>"><?php echo $term_list['contact_email_2'];?></a>
					</div>
				</div>
			</div>
		</div>
    </section>
	<!-- End Contact Info Section -->
	
    <!-- Start Map Section -->
    <div class="container">
           <div class="location-map col-lg-12 col-md-12 col-sm-12" id="map">
                    <div class="mapouter ct-info-box">
                        <div class="gmap_canvas">
							<iframe src="<?php echo $general['general_iframe_address'] ?>" style="border:0; width: 100%; height: 350px;" allowfullscreen="" loading="lazy"></iframe>	
						</div>
                </div>
             </div>
     </div>
    <!-- End Map Section -->
	<br>
	
	
<?php
include('./includes/footer.php'); ?>