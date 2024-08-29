<?php
$admin_page = basename($_SERVER['PHP_SELF']);
?>
<section class="sidebar">
    <div class="user-panel">
        <div class="pull-left image">
            <img src="../adminassets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p> <?php
                if (isset($_SESSION['auth'])) {
                    echo $_SESSION['username'];
                } else {
                } ?></p>
            <a href=" "><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
        <li>
            <a href="<?php echo ROOT_URL_ADMIN ?>index.php" target="_blank">
                <i class="fa fa-home"></i> <span>Main Site</span>
            </a>
        </li>
        <li <?php if ($admin_page == 'index.php' or $admin_page == '') { ?> class="active" <?php } ?>>
            <a href="index.php">
                <i class="fa fa-tachometer"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview <?php if ($admin_page == 'add_user.php' or $admin_page == 'user_list.php' or $admin_page == 'edit_user.php' or $admin_page == 'website_user_list.php'or $admin_page =='verify_user.php' or $admin_page =='view_userdetails.php') { ?> active <?php } ?>">
            <a href="">
                <i class="fa fa-user-secret"></i> <span>Manager User</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li <?php if ($admin_page == 'add_user.php' or $admin_page == '') { ?> class="active" <?php } ?>><a
                        href="add_user.php"><i class="fa fa-plus"></i> Add User</a></li>
                <li <?php if ($admin_page == 'user_list.php' or $admin_page == 'edit_user.php') { ?> class="active" <?php } ?>><a
                        href="user_list.php"><i class="fa fa-bars"></i>User List </a></li>

  
            </ul>
        </li>
     
        <li
            class="treeview <?php if ($admin_page == 'add_services.php' or $admin_page == 'services_list.php' or $admin_page == 'edit_services.php' ) { ?> active <?php } ?>">
            <a href="">
                <i class="fa fa-gift"></i> <span>Manager Solutions</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li <?php if ($admin_page == 'add_services.php' or $admin_page == '') { ?> class="active" <?php } ?>>
                    <a href="add_services.php"><i class="fa fa-plus"></i> Add Solutions</a>
                </li>
                <li <?php if ($admin_page == 'services_list.php' or $admin_page == 'edit_services.php' or $admin_page == '') { ?> class="active" <?php } ?>>
                    <a href="services_list.php"><i class="fa fa-bars"></i>Solutions List </a>
                   
                </li>
            </ul>
        </li>
        <li
            class="treeview <?php if ($admin_page == 'dash_data.php' or $admin_page == 'add_training.php' ) { ?> active <?php } ?>">
            <a href="">
                <i class="fa fa-gift"></i> <span>Manager Training</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li <?php if ($admin_page == 'dash_data.php' or $admin_page == '') { ?> class="active" <?php } ?>>
                    <a href="dash_data.php"><i class="fa fa-plus"></i> Training Data</a>
                </li>
                <li <?php if ($admin_page == 'add_training.php' or $admin_page == '') { ?> class="active" <?php } ?>>
                    <a href="add_training.php"><i class="fa fa-bars"></i>Add Trainings </a>
                   
                </li>
            </ul>
        </li>
        <li
            class="treeview <?php if ($admin_page == 'enquiry.php' or $admin_page == 'enquiry.php' or $admin_page == 'edit_user.php' or $admin_page == 'enquiry_view.php' or $admin_page=='services_enquiry.php'or $admin_page =='services_enquiry_view.php' or $admin_page == 'properties_enquiry.php' or $admin_page == 'properties_enquiry_view.php') { ?> active <?php } ?>">
            <a href="">
                <i class="fa fa-question-circle"></i> <span>Manager Enquiry</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li <?php if ($admin_page == 'enquiry.php' or $admin_page == 'enquiry_view.php') { ?> class="active" <?php } ?>><a
                        href="enquiry.php"><i class="fa fa-bars"></i>Enquiry List </a></li>

                        <li <?php if ($admin_page == 'services_enquiry.php' or $admin_page == 'services_enquiry_view.php') { ?> class="active" <?php } ?>><a
                        href="services_enquiry.php"><i class="fa fa-bars"></i>Solutions Enquiry List </a></li>
            </ul>
        </li>
        <li <?php if ($admin_page == 'add_testimonial.php' or $admin_page == 'edit_testimonial.php') { ?> class="active" <?php } ?>>
            <a href="add_testimonial.php">
                <i class="fa fa-star"></i> <span>Testimonial</span>
            </a>
        </li>
        </li>
        <li <?php if ($admin_page == 'add_card_or_team.php' or $admin_page == 'edit_card.php') { ?> class="active" <?php } ?>>
            <a href="add_card_or_team.php">
                <i class="fa fa-star"></i> <span>Add Card Or Team</span>
            </a>
        </li>
        <li
            class="treeview <?php if ($admin_page == 'add_blog.php' or $admin_page == 'blog_list.php' or $admin_page == 'edit_blog.php') { ?> active <?php } ?>">
            <a href="">
                <i class="fa fa-newspaper-o"></i> <span>Manager Blog</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
             
                <li <?php if ($admin_page == 'add_blog.php' or $admin_page == '' ) { ?> class="active" <?php } ?>><a href="add_blog.php"><i class="fa fa-plus"></i>Add Blog</a></li>
                        <li <?php if ($admin_page == 'blog_list.php' or $admin_page == 'edit_blog.php') { ?> class="active" <?php } ?>><a href="blog_list.php"><i class="fa fa-bars"></i>Blog List</a></li>
            </ul>
        </li>

       
        <li
            class="treeview <?php if ( $admin_page == 'study_journey.php' or $admin_page == 'home_page.php' or $admin_page == 'edit_journey.php' or $admin_page == 'about_page.php' or $admin_page == 'pages_term.php' or $admin_page == 'pages_pravicy_policy.php' or $admin_page == 'pages_gallery.php'or $admin_page == 'edit_about_page.php'or $admin_page == 'edit_home_page.php') { ?> active <?php } ?>">
            <a href="">
                <i class="fa fa-newspaper-o"></i> <span>Manager Pages</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li <?php if ($admin_page == 'home_page.php') { ?> class="active" <?php } ?>><a
                        href="home_page.php"><i class="fa fa-plus"></i>Home</a></li>
                <li <?php if ($admin_page == 'about_page.php' ) { ?> class="active" <?php } ?>><a
                        href="about_page.php"><i class="fa fa-plus"></i>About Us </a></li>
                        <li <?php if ($admin_page == 'contact_page.php' ) { ?> class="active" <?php } ?>><a
                        href="contact_page.php"><i class="fa fa-plus"></i>Contact Us </a></li>

                <li <?php if ($admin_page == 'pages_term.php' or $admin_page == 'edit_term.php') { ?> class="active" <?php } ?>><a
                        href="pages_term.php"><i class="fa fa-plus"></i>Terms & Condition</a></li>
                <li <?php if ($admin_page == 'pages_pravicy_policy.php' or $admin_page == 'edit_pravicy.php') { ?> class="active"
                    <?php } ?>><a href="pages_pravicy_policy.php"><i class="fa fa-plus"></i>Privacy Policy</a></li>

            </ul>
        </li>
        <li 
            class="treeview <?php if ($admin_page == 'add_sliders.php' or $admin_page == 'edit_slider.php') { ?> active <?php } ?> ">
            <a href="#">
                <i class="fa fa-sliders"></i> <span>Slider</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li <?php if ($admin_page == 'add_sliders.php' or $admin_page == '') { ?> class="active" <?php } ?>><a href="add_sliders.php"><i class="fa fa-plus"></i>Add
                        Slider</a></li>
            </ul>
        </li>
        <li
            class="treeview <?php if ($admin_page == 'add_banner.php' or $admin_page == 'add_banner.php') { ?> active <?php } ?>">
            <a href="">
                <i class="fa fa-file-image-o"></i> <span> Header Banner</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
             
                <li <?php if ($admin_page == 'add_banner.php' or $admin_page == '') { ?> class="active" <?php } ?>><a
                        href="add_banner.php"><i class="fa fa-plus"></i>Add Banner</a></li>
               
            </ul>
        </li>
       
        <li class="treeview <?php if ($admin_page == 'add_seo.php' or $admin_page == 'edit_seo.php') { ?> active <?php } ?> ">
                <a href="#">
                    <i class="fa fa-globe"></i> <span>Manage SEO</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                        <small class="label pull-right bg-red">! SEO Staff !</small>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if ($admin_page == 'add_seo.php' or $admin_page == 'edit_seo.php') { ?> class="active" <?php } ?>><a href="add_seo.php"><i class="fa fa-plus"></i>Add SEO</a></li>
                    
                </ul>
            </li>
         
       
        <li <?php if ($admin_page == 'general_setting.php' or $admin_page == 'edit_general.php') { ?> class="active" <?php } ?>>
            <a href="general_setting.php">
                <i class="fa fa-dashboard"></i> <span>General Setting</span>
            </a>
        </li>
        <li>
            <a href="logout.php" onclick="return checkdelete()">
                <i class="fa  fa-arrow-circle-left"></i> <span>Log Out</span>
            </a>
        </li>
    </ul>
</section>

<script>
function checkdelete() {
    return confirm("Are You Sure! You Want To Log- Out");
}
</script>