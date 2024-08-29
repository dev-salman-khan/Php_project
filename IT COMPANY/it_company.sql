-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2024 at 03:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it_company`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `about_description` text NOT NULL,
  `about_image` varchar(255) NOT NULL,
  `about_sub_tile` varchar(255) NOT NULL,
  `about_tilte` varchar(255) NOT NULL,
  `about_sub_title_2` varchar(255) NOT NULL,
  `about_title_2` varchar(255) NOT NULL,
  `about_status` int(11) NOT NULL DEFAULT 1,
  `about_datetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about_description`, `about_image`, `about_sub_tile`, `about_tilte`, `about_sub_title_2`, `about_title_2`, `about_status`, `about_datetime`) VALUES
(1, '<p>&nbsp;</p>\r\n\r\n<div class=\"container\">\r\n<h1>Who We Are</h1>\r\n&nbsp;\r\n\r\n<p>Atech Solutions Pvt. Ltd. the leading platform for all IT Solutions. Our proficient team meets every clientï¿½s requirement by providing the best services considering every project as a priority.</p>\r\n&nbsp;\r\n\r\n<p>We provide 360ï¿½ IT Solutions and Services across the entire IT spectrum, from optimizing resources to maintaining infrastructure to migrating to the Cloud, making sure that your information is secure.</p>\r\n&nbsp;\r\n\r\n<p>With our highly qualified and certified team with decades of practical hands-on experience in the industry, we boost your business with our IT Infrastructure Management.</p>\r\n&nbsp;\r\n\r\n<p>Our services include IT Infrastructure Solutions, Web/App Development, Cloud Solutions, Data Solutions, IT Security Solutions, and Outsourcing are curated efficiently to execute successful projects with our clients. We value every concern and strive to be one step ahead to grow and improvise our methods.</p>\r\n</div>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-12 col-md-12\">\r\n<div class=\"portfolio-details-image\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"container\">\r\n<div class=\"align-items-center row\">\r\n<div class=\"col-lg-6\">\r\n<h1>Our Vision</h1>\r\n&nbsp;\r\n\r\n<p>To digitally transform the businesses irrespective of their size and type by leveraging modern IT &amp; Cloud computing technology to reduce the carbon footprint of your busines</p>\r\n</div>\r\n\r\n<div class=\"col-lg-6\">\r\n<h1>Our Mission</h1>\r\n&nbsp;\r\n\r\n<p>To keep you ahead in the competition and be your partner in the digital transformation journey</p>\r\n</div>\r\n</div>\r\n</div>\r\n', 'fddff.jpg', 'Expert Team', 'Team Member', 'Our Testimonial', 'Client Feedback', 1, '14-04-24 11:27:10am');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `admin_entrydt` varchar(255) DEFAULT NULL,
  `admin_status` int(11) DEFAULT 1,
  `admin_lastname` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `last_login` varchar(255) DEFAULT NULL,
  `user_deleted_date` varchar(255) DEFAULT NULL,
  `admin_user_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_email`, `admin_password`, `admin_entrydt`, `admin_status`, `admin_lastname`, `phonenumber`, `firstname`, `last_login`, `user_deleted_date`, `admin_user_type`) VALUES
(1, 'admin', 'admin@admin.com', '797cb93f8b1159e6dc68b2b7fddd6c55', '09-01-23 06:46:33', 1, 'admin', '061039355', 'admin', '', '', 'super_admin');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_page_name` varchar(255) NOT NULL,
  `banner_page_banner` text NOT NULL,
  `banner_page_status` int(11) NOT NULL DEFAULT 1,
  `banner_page_date_time` varchar(255) NOT NULL,
  `banner_added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_page_name`, `banner_page_banner`, `banner_page_status`, `banner_page_date_time`, `banner_added_by`) VALUES
(1, 'contact_us.php', 'contact.jpg', 0, '04-03-24 06:19:12am', ''),
(2, 'contact_us.php', 'contact.jpg', 0, '04-03-24 06:20:21am', ''),
(3, 'features.php', 'feartes.jpg', 0, '04-03-24 06:56:37am', ''),
(4, 'about.php', 'abouts.jpg', 0, '04-03-24 06:57:21am', ''),
(5, 'properties.php', 'properties.jpg', 0, '04-03-24 06:57:46am', ''),
(6, 'blog.php', 'blog.jpg', 0, '04-03-24 06:58:05am', ''),
(7, 'about_us.php', 'abouts-s.jpg', 0, '04-03-24 07:00:23am', ''),
(8, 'blog_details.php', 'blog-details.jpg', 0, '04-03-24 10:10:12am', ''),
(9, 'properties_details.php', 'properties_details.jpg', 0, '04-03-24 02:23:32pm', ''),
(10, 'services.php', 'services.jpg', 0, '04-03-24 03:46:02pm', ''),
(11, 'services_details.php', 'services_details.jpg', 0, '04-03-24 03:46:45pm', ''),
(12, 'terms_and_conditions.php', 'terms.jpg', 0, '06-03-24 08:44:04am', ''),
(13, 'pravicy_and_policy.php', 'sfsf.jpg', 0, '06-03-24 08:50:19am', ''),
(14, 'our-solutions.php', 'page-title-bg.jpg', 1, '03-04-24 09:37:25pm', ''),
(15, 'solution_details.php', 'fsd.jpg', 1, '03-04-24 09:59:12pm', ''),
(16, 'about-us.php', 'fdgfgf.jpg', 1, '03-04-24 10:12:47pm', ''),
(17, 'training.php', 'page-title-bg-2.jpg', 0, '03-04-24 10:15:01pm', ''),
(18, 'blog.php', 'hgfhfg.jpg', 1, '03-04-24 10:16:10pm', ''),
(19, 'blog_details.php', 'fgfgd.jpg', 1, '04-04-24 12:36:46pm', ''),
(20, 'contact-us.php', 'gfgfd.jpg', 1, '04-04-24 12:38:57pm', ''),
(21, 'training.php', 'gfdfgjmj.jpg', 0, '04-04-24 12:39:58pm', ''),
(22, 'trainings.php', 'fdd.jpg', 1, '04-04-24 12:45:17pm', ''),
(23, 'pravicy_and_policy.php', 'ghghg.jpg', 0, '05-04-24 04:49:33pm', ''),
(24, 'pravicy_and_policy.php', 'ghhkkk.jpg', 0, '05-04-24 04:51:32pm', ''),
(25, 'privacy-policy.php', 'ggjj.jpg', 1, '05-04-24 04:51:54pm', ''),
(26, 'terms-and-conditions.php', 'jkll.jpg', 1, '05-04-24 04:52:34pm', '');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` text NOT NULL,
  `blog_image` text NOT NULL,
  `blog_status` int(11) NOT NULL DEFAULT 1,
  `blog_datetime` varchar(255) NOT NULL,
  `blog_description` text NOT NULL,
  `blog_slug` text NOT NULL,
  `blog_cover_image` varchar(255) NOT NULL,
  `blog_small_description` varchar(255) NOT NULL,
  `blog_add_by` varchar(255) NOT NULL,
  `seo_keyword` text NOT NULL,
  `seo_description` text NOT NULL,
  `blog_popular` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_image`, `blog_status`, `blog_datetime`, `blog_description`, `blog_slug`, `blog_cover_image`, `blog_small_description`, `blog_add_by`, `seo_keyword`, `seo_description`, `blog_popular`) VALUES
(1, 'Duplex Appartment Latest Design', 'sgs.jpg', 0, '10-Mar-24', '<p>Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising a pain wasnad I will give complete take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids</p>\r\n\r\n<p>Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising is pain wasnad I will give complete take a trivial example, which of us ever undertakes laborious</p>\r\n', 'duplex-appartment-latest-design', 'dsfds.jpg', 'Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete ', 'admin', 'Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete ', 'Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete ', '1'),
(2, 'Everything you need to know about geo-blocking ', 'pexels-photo-7014337.webp', 1, '16-Aug-24', '<h3>Planning for a Safe Return to the Workplace IT Solutions</h3>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.</p>\r\n', 'everything-you-need-to-know-about-geo-blocking-', 'hj.jpg', 'Lorem ipsum dolor sit amet, consectetu adipiscing elit, sed eiusmod tempor incididunt ut labore dolore ', 'admin', 'Lorem ipsum dolor sit amet, consectetu adipiscing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua', 'Lorem ipsum dolor sit amet, consectetu adipiscing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua', '1'),
(3, '5 Technology Considerations for Office Relocations ', 'gddfg.webp', 1, '16-Aug-24', '<h3>Planning for a Safe Return to the Workplace IT Solutionsdd</h3>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.</p>\r\n', '5-technology-considerations-for-office-relocations-', 'free-photo-of-an-artist-s-illustration-of-artificial-intelligence-ai-this-image-depicts-how-ai-could-adapt-to-an-infinite-amount-of-uses-it-was-created-by-nidia-dias-as-part-of-the-visualising-ai-pr.jpg', 'Lorem ipsum dolor sit amet, consectetu adipiscing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua', 'admin', 'Lorem ipsum dolor sit amet, consectetu adipiscing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua', 'Lorem ipsum dolor sit amet, consectetu adipiscing elit, sed eiusmod tempor incididunt ut labore dolore magna aliqua', '1');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `card_id` int(11) NOT NULL,
  `card_page` varchar(255) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `card_image` varchar(255) NOT NULL,
  `card_comments` text NOT NULL,
  `card_status` int(11) NOT NULL DEFAULT 1,
  `card_datetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`card_id`, `card_page`, `card_name`, `card_image`, `card_comments`, `card_status`, `card_datetime`) VALUES
(1, '1', 'Endless Possibilities', 'endless-possibilities.png', 'Open the door to progressing possibilities with ATech solutions. We enhance your presence in the Digital world by working by your side throug', 1, '09-04-24 08:48:15pm'),
(2, '2', 'Mohd Maqsood ', 'masqood.jpg', 'Being Tech Support, System & Security Administrator, Architect, consultant, and IT Security engineer, Maqsood is an IT Professional with 18+ ', 0, '09-04-24 08:56:15pm'),
(3, '1', 'Seamless Experience', 'professional.png', 'We execute every project with utmost professionalism. Ensuring your requirements meet our efficiency, we make sure we provide you with a seam', 1, '09-04-24 08:48:51pm'),
(4, '2', 'Evolving Ideas', 'pexels-photo-7282818.webp', 'Our evolving ideas work effortlessly with your business plan. With our team working for you with the advanced IT Infrastructure, we ensure de', 1, '16-08-24 03:02:16am'),
(5, '2', 'for test ', 'photo.jpg', 'We execute every project with utmost professionalism. Ensuring your requirements meet our efficiency, we make sure we provide you with a seam', 0, '14-04-24 11:18:12am');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_subtilte` varchar(255) NOT NULL,
  `contact_title` varchar(255) NOT NULL,
  `contact_subtitle_1` varchar(255) NOT NULL,
  `contact_title_1` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_addr` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_name_1` varchar(255) NOT NULL,
  `contact_addr_1` varchar(255) NOT NULL,
  `contact_num_1` varchar(255) NOT NULL,
  `contact_email_1` varchar(255) NOT NULL,
  `contact_name_2` varchar(255) NOT NULL,
  `contact_addr_2` varchar(255) NOT NULL,
  `contact_num_2` varchar(255) NOT NULL,
  `contact_email_2` varchar(255) NOT NULL,
  `contact_status` int(11) NOT NULL DEFAULT 1,
  `contact_datetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_subtilte`, `contact_title`, `contact_subtitle_1`, `contact_title_1`, `contact_name`, `contact_addr`, `contact_number`, `contact_email`, `contact_name_1`, `contact_addr_1`, `contact_num_1`, `contact_email_1`, `contact_name_2`, `contact_addr_2`, `contact_num_2`, `contact_email_2`, `contact_status`, `contact_datetime`) VALUES
(1, 'Let.s Talk', 'Countact Us', 'Find Us', 'Contact Info', 'USA Office', '2151 W Highland Ave, Chicago, IL 60659, USA', '132-134-1324', 'info@atechsolutionsgroup.', 'India Office', 'Shastripuram Main Rd, Kings Colony, Nawab Saheb Kunta, Hyderabad, Shivarampally Jagir, Telangana 500053', '132-134-1324', 'info@atechsolutionsgroup.com', 'UAE Office', '500001 Sharjah in United Arab Emirates', '132-134-1324', 'info@atechsolutionsgroup.com', 1, '09-04-24 10:53:38am');

-- --------------------------------------------------------

--
-- Table structure for table `dash_home`
--

CREATE TABLE `dash_home` (
  `dash_id` int(11) NOT NULL,
  `dash_link` varchar(255) NOT NULL,
  `dash_description` text NOT NULL,
  `dash_status` int(11) NOT NULL DEFAULT 1,
  `dash_date_time` varchar(255) NOT NULL,
  `dash_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dash_home`
--

INSERT INTO `dash_home` (`dash_id`, `dash_link`, `dash_description`, `dash_status`, `dash_date_time`, `dash_title`) VALUES
(1, 'WE ARE WORLD CLASS', '<p>Organizations are often in the need of corporate training services for their employees, if you are thinking about corporate training in Chicago, you should consider Atech Solutions. We are conducting some of the best corporate training programs for corporate employees.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>At Atech Solutions, we conduct customized programs for startups, corporate businesses. Our expert trainers design and develop courses, training skills, and offer a wide range of corporate training solutions worldwide. The training modules differ from industry to industry. It also depends on the seniority and the learning ability of the employees.​Currently, we have a Microsoft Certified Trainer (MCT) on board with us who inspires learning who believes knowledge increases by sharing but not saving.</p>\r\n', 1, '05-04-24 04:28:32pm', 'We are on a mission to help you succeed');

-- --------------------------------------------------------

--
-- Table structure for table `general_tbl`
--

CREATE TABLE `general_tbl` (
  `general_id` int(11) NOT NULL,
  `general_imgicon` varchar(255) NOT NULL,
  `general_companyname` text NOT NULL,
  `general_contactpersonname` varchar(255) NOT NULL,
  `general_address` text NOT NULL,
  `general_pincode` varchar(255) NOT NULL,
  `general_city` varchar(255) NOT NULL,
  `general_county` varchar(255) NOT NULL,
  `general_currancy` varchar(255) NOT NULL,
  `general_sessionid` varchar(255) NOT NULL,
  `general_sessionmonth` varchar(255) NOT NULL,
  `general_phoneno` varchar(255) NOT NULL,
  `general_emailid` varchar(255) NOT NULL,
  `general_entrydt` varchar(255) NOT NULL,
  `general_status` int(11) NOT NULL DEFAULT 1,
  `genaral_addby` int(11) NOT NULL,
  `general_currencysysmbol` varchar(255) NOT NULL,
  `general_gstno` varchar(255) NOT NULL,
  `general_gstpercentage` varchar(255) NOT NULL,
  `general_numberemi` varchar(255) NOT NULL,
  `general_numberlatepay` varchar(255) NOT NULL,
  `general_adnacepaymnetpercentage` varchar(255) NOT NULL,
  `general_mobilno` varchar(255) NOT NULL,
  `general_website` text NOT NULL,
  `general_panno` varchar(255) NOT NULL,
  `general_financial_start_date` varchar(255) NOT NULL,
  `general_financial_end_date` varchar(255) NOT NULL,
  `genaral_statename` varchar(255) NOT NULL,
  `general_half_day_starttime` varchar(255) NOT NULL,
  `general_half_day_endtime` varchar(255) NOT NULL,
  `general_full_dat_starttime` varchar(255) NOT NULL,
  `general_full_dat_endtime` varchar(255) NOT NULL,
  `general_mendetory_holiday` varchar(255) NOT NULL,
  `general_additionweek_holiday` int(11) NOT NULL DEFAULT 0 COMMENT '0=no, 1yes',
  `general_additianl_day` varchar(255) NOT NULL,
  `general_week` varchar(255) NOT NULL,
  `general_holiday_count_leave_status` int(11) NOT NULL DEFAULT 0 COMMENT '0=not count,1=count',
  `general_week_off` int(11) NOT NULL DEFAULT 1 COMMENT '1=count,0=not count',
  `general_leave_carry_forword` int(11) NOT NULL DEFAULT 1 COMMENT '1=forword,0=not forword',
  `general_holiday_start_date` varchar(255) NOT NULL,
  `general_holiday_end_date` varchar(255) NOT NULL,
  `general_highest_auth` varchar(255) NOT NULL,
  `general_fax` varchar(255) NOT NULL,
  `general_iframe_address` text NOT NULL,
  `general_facebook` text NOT NULL,
  `general_twitter` text NOT NULL,
  `general_linkedin` text NOT NULL,
  `general_pinterest` text NOT NULL,
  `general_whatsapp` text NOT NULL,
  `general_instagram` text NOT NULL,
  `general_googleplus` text NOT NULL,
  `general_skype` text NOT NULL,
  `general_about_us` text NOT NULL,
  `site_background_color` varchar(255) DEFAULT NULL,
  `site_header_type` varchar(255) DEFAULT NULL,
  `site_layout` varchar(255) DEFAULT NULL,
  `site_theam_color` varchar(255) DEFAULT NULL,
  `general_gstno_per` varchar(255) NOT NULL,
  `travel_link` varchar(255) NOT NULL,
  `accommodation_link` varchar(255) NOT NULL,
  `image_2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `general_tbl`
--

INSERT INTO `general_tbl` (`general_id`, `general_imgicon`, `general_companyname`, `general_contactpersonname`, `general_address`, `general_pincode`, `general_city`, `general_county`, `general_currancy`, `general_sessionid`, `general_sessionmonth`, `general_phoneno`, `general_emailid`, `general_entrydt`, `general_status`, `genaral_addby`, `general_currencysysmbol`, `general_gstno`, `general_gstpercentage`, `general_numberemi`, `general_numberlatepay`, `general_adnacepaymnetpercentage`, `general_mobilno`, `general_website`, `general_panno`, `general_financial_start_date`, `general_financial_end_date`, `genaral_statename`, `general_half_day_starttime`, `general_half_day_endtime`, `general_full_dat_starttime`, `general_full_dat_endtime`, `general_mendetory_holiday`, `general_additionweek_holiday`, `general_additianl_day`, `general_week`, `general_holiday_count_leave_status`, `general_week_off`, `general_leave_carry_forword`, `general_holiday_start_date`, `general_holiday_end_date`, `general_highest_auth`, `general_fax`, `general_iframe_address`, `general_facebook`, `general_twitter`, `general_linkedin`, `general_pinterest`, `general_whatsapp`, `general_instagram`, `general_googleplus`, `general_skype`, `general_about_us`, `site_background_color`, `site_header_type`, `site_layout`, `site_theam_color`, `general_gstno_per`, `travel_link`, `accommodation_link`, `image_2`) VALUES
(1, 'Untitled.png', 'IT Solutions', 'It Solutions', 'Address Atech Solution telangana india 50000', '50000', 'Hyderabad', 'India', '', '0', '0', '+1 773 644 1424', 'No@gmail.com', '16-08-24 03:07:29am', 1, 4, '', '1234567890', '0', '0', '0', '0', '132-134-425', '#', '1234567890', '01-04-2021', '31-03-2022', 'Telangana', '10:00 AM', '01:00 PM', '09:00 AM', '06:00 PM', 'Sunday', 0, 'Saturday', '2,4', 1, 1, 1, '01-01-2022', '31-12-2022', '2', '123-12445-132', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d238.04283386078257!2d78.44538624880722!3d17.33072459601644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcbbd5dce46619f%3A0xdcab2ac8e5fdaccc!2sKhadeer%20Manzil!5e0!3m2!1sen!2sin!4v1703160737149!5m2!1sen!2sin', 'Facebook.com', 'Twitter.com', 'linkedin.com', '#', 'https://wa.me/919701590097', 'instagram.com', 'google.com', 'skype.com', 'We provide 360Â°  IT Solutions across the entire IT spectrum, from optimizing resources to maintaining infrastructure making sure that your information is secure.', NULL, NULL, NULL, NULL, '3.75', '#', '#', 'Untitled.png');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `home_id` int(11) NOT NULL,
  `home_title` varchar(255) NOT NULL,
  `home_subtile` varchar(255) NOT NULL,
  `home_image` varchar(255) NOT NULL,
  `home_title_1` varchar(255) NOT NULL,
  `home_subtitle_1` varchar(255) NOT NULL,
  `home_description` text NOT NULL,
  `home_boxone` varchar(255) NOT NULL,
  `home_boxtwo` varchar(255) NOT NULL,
  `home_boxthree` varchar(255) NOT NULL,
  `home_boxfour` varchar(255) NOT NULL,
  `home_boxfive` varchar(255) NOT NULL,
  `home_boxsix` varchar(255) NOT NULL,
  `home_title_2` varchar(255) NOT NULL,
  `home_subtile_2` varchar(255) NOT NULL,
  `home_title_3` varchar(255) NOT NULL,
  `home_subtitle_3` varchar(255) NOT NULL,
  `home_status` int(11) NOT NULL DEFAULT 1,
  `home_datetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`home_id`, `home_title`, `home_subtile`, `home_image`, `home_title_1`, `home_subtitle_1`, `home_description`, `home_boxone`, `home_boxtwo`, `home_boxthree`, `home_boxfour`, `home_boxfive`, `home_boxsix`, `home_title_2`, `home_subtile_2`, `home_title_3`, `home_subtitle_3`, `home_status`, `home_datetime`) VALUES
(1, 'Our Solutions', 'What We Provide', 'choose-1.jpg', 'Safeguard Your Brand with Cyber Security and IT Solutions', 'Why Choose Us?', '<p>Safeguarding your brand with cyber security and IT solutions is crucial in today&#39;s digital landscape where businesses face numerous cyber threats. Here&#39;s some information on how businesses can protect their brand.</p>\r\n', 'Remote IT Assistances', 'Cloud Services', 'Managed IT Service', 'IT Security Services', 'Practice IT Management', 'Solving IT Problems', 'Client Feedback', 'Our Testimonial', 'Our Popular Blog', 'Trusted By Over 1500', 1, '14-04-24 11:20:41am');

-- --------------------------------------------------------

--
-- Table structure for table `message_enquiry`
--

CREATE TABLE `message_enquiry` (
  `message_enquiry_id` int(11) NOT NULL,
  `message_enquiry_name` varchar(255) NOT NULL,
  `message_enquiry_email` varchar(255) NOT NULL,
  `message_enquiry_phone` varchar(255) NOT NULL,
  `message_enquiry_subject` varchar(255) NOT NULL,
  `message_enquiry_message` varchar(255) NOT NULL,
  `message_enquiry_status` int(11) NOT NULL DEFAULT 1,
  `message_enquiry_datetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `message_enquiry`
--

INSERT INTO `message_enquiry` (`message_enquiry_id`, `message_enquiry_name`, `message_enquiry_email`, `message_enquiry_phone`, `message_enquiry_subject`, `message_enquiry_message`, `message_enquiry_status`, `message_enquiry_datetime`) VALUES
(1, 'syed ahtesham', 'syed@gmail.com', '97015', 'clove', 'hi', 1, '03-11-23 02:55:06'),
(2, 'anas', 'hito@gmail.com', '8743456379864', 'digital marketing', 'maku 2 months me couser htkjtgub', 1, '06-03-24 03:53:20'),
(3, 'hi bye', 'wwwww@gmail.com', '78954566', 'post', 'need to touch with you', 1, '19-03-24 10:03:13'),
(4, 'name', 'test@gmail.com', '0123456789', 'subject', 'Message', 1, '03-04-24 01:33:34'),
(5, 'test7', 'bro@gmail.com', '78954566', 'wwww', 'hhyjuyi', 1, '14-04-24 11:37:46'),
(6, 'syed ahtesham', 'bro@gmail.com', '909877', 'new Post', 'xumtujgjuy', 1, '21-04-24 03:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_enquiry`
--

CREATE TABLE `product_enquiry` (
  `product_enquiry_id` int(11) NOT NULL,
  `product_enquiry_service_id` varchar(255) NOT NULL,
  `product_enquiry_name` varchar(255) NOT NULL,
  `product_enquiry_phone` varchar(255) NOT NULL,
  `product_enquiry_moblie` varchar(255) NOT NULL,
  `product_enquiry_email` varchar(255) NOT NULL,
  `product_enquiry_interest` text NOT NULL,
  `product_enquiry_details` varchar(255) NOT NULL,
  `product_enquiry_status` int(11) NOT NULL DEFAULT 1,
  `product_enquiry_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_enquiry`
--

INSERT INTO `product_enquiry` (`product_enquiry_id`, `product_enquiry_service_id`, `product_enquiry_name`, `product_enquiry_phone`, `product_enquiry_moblie`, `product_enquiry_email`, `product_enquiry_interest`, `product_enquiry_details`, `product_enquiry_status`, `product_enquiry_date`) VALUES
(1, '5', 'test', '0123456789', '0123456789', 'test@gmail.com', 'service test', 'Construction Service', 0, '04-03-24 06:44:26pm'),
(2, '4', 'hi', '0123456789', '0123456789', 'test@gmail.com', 'sadd', 'Real Estate Consultancy', 0, '06-03-24 10:09:17am'),
(3, '5', 'ds', '0212465', '', 'test@gmail.com', '', 'IT Infrstructure Solution', 0, '03-04-24 09:29:21pm'),
(4, '5', 'fsdf', '0123456789', '', 'test@gmail.com', '', 'IT Infrstructure Solution', 0, '03-04-24 09:30:39pm'),
(5, '5', 'fdsds', '012345679', '', 'test@gmail.com', 'fdsfd', 'IT Infrstructure Solution', 1, '03-04-24 09:32:36pm'),
(6, '4', 'syed', '11111111111', '', 'syed@gmail.com', 'i want to leanr web', 'Web & App Development', 1, '20-04-24 01:16:51pm'),
(7, '11', 'syed', '11111111111', '', 'syed@gmail.com', 'fyjhfjtu', ' Digital Marketing ', 1, '21-04-24 03:34:34am');

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `seo_id` int(11) NOT NULL,
  `seo_page_slug` varchar(255) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `seo_keyword` varchar(255) NOT NULL,
  `seo_description` varchar(255) NOT NULL,
  `seo_datetime` varchar(255) NOT NULL,
  `seo_status` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`seo_id`, `seo_page_slug`, `seo_title`, `seo_keyword`, `seo_description`, `seo_datetime`, `seo_status`) VALUES
(1, 'about-us.php', 'About Us | IT Sulotion', 'SEO Keyword', 'SEO Description', '2024-08-16 03:05:23am', '1'),
(2, 'index.php', 'Home | Atech Sulotion', 'Keyword', 'Keyword', '2024-05-05 05:45:59pm', '1'),
(3, 'contact-us.php', 'Contact Us | Atech Sulotion', 'Keyword', 'Description', '2024-05-05 05:47:57pm', '1'),
(4, 'our-solutions.php', 'Our Solutions | It Sulotion', 'KEYWORD', 'DESCRIPTION\r\n', '2024-08-16 03:05:12am', '1'),
(5, 'blog.php', 'Blog | ITSolution', 'keyeword', 'seo description', '2024-08-16 03:05:01am', '1');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `services_id` int(11) NOT NULL,
  `services_title` varchar(255) NOT NULL,
  `services_image` varchar(255) NOT NULL,
  `services_status` int(11) NOT NULL DEFAULT 1,
  `services_datetime` varchar(255) NOT NULL,
  `services_description` text NOT NULL,
  `services_slug` varchar(255) NOT NULL,
  `services_cover_image` varchar(255) NOT NULL,
  `services_small_description` text NOT NULL,
  `services_add_by` varchar(255) NOT NULL,
  `seo_keyword` text NOT NULL,
  `seo_description` text NOT NULL,
  `services_features_status` varchar(255) NOT NULL COMMENT '1 = features ',
  `services_about` varchar(255) NOT NULL COMMENT '1 = ''about_page'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`services_id`, `services_title`, `services_image`, `services_status`, `services_datetime`, `services_description`, `services_slug`, `services_cover_image`, `services_small_description`, `services_add_by`, `seo_keyword`, `seo_description`, `services_features_status`, `services_about`) VALUES
(1, 'Residential Sales and Lettings', '8578.jpg', 0, '04-Mar-24', '<p>Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete</p>\r\n', 'residential-sales-and-lettings', 'detail.jpg', 'Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete ', 'admin', 'Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete ', 'Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete ', '0', '0'),
(2, 'Rent a Property', '585.jpg', 0, '04-Mar-2024', '<p>Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete</p>\r\n', 'rent-a-property', 'detail22.jpg', 'Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete ', 'admin', 'Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete ', 'Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete ', '0', '0'),
(3, 'Commercial Real Estate', '4253.jpg', 0, '04-Mar-2024', '<p>Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete</p>\r\n', 'commercial-real-estate', '55+6.jpg', 'Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete ', 'admin', 'Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete ', 'Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete ', '1', '1'),
(4, 'Web & App Development', 'blog-5.jpg', 0, '03-Apr-24', '<p>Web and App Development is the most integrated part of one&rsquo;s business which is why we at ATECH Solutions provide you with the leading web and app development solutions. We offer you 360-degree support in maintaining your website and mobile applications. Be it any technical issue, from UX/UI to compatibility, we address every glitch and aid you with suitable solutions.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Despite having a fully functional website, sometimes businesses fail to make a mark among their targeted market. Investing in the right areas like custom web application and web software development could lead your business to success and help you climb higher on the professional ladder. Now, hitting the right note and making an impressive web presence is possible through exclusive web application development services offered by Atech Solutions.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Being a solution provider in this domain for many years, we have the right mix of expert talent and industry insight to help you emerge productive on the digital front. We pride ourselves on being a professional web design company for clients in various locations such as the USA, UK, Europe, Canada, Australia, Singapore, and the UAE. Whether you are looking to increase efficiency or looking for future growth, we can build your company a custom web application that delivers results above and beyond your expectations.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h5>Custom Website Design &amp; Application Development</h5>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>CMS Web Design &amp; Development Services</p>\r\n\r\n<p>Custom SharePoint Portal Development</p>\r\n\r\n<p>Responsive Web Design</p>\r\n\r\n<p>eCommerce Web Design &amp; Development</p>\r\n', 'web-&-app-development', 'cdv.jpg', 'Our Web & App Development services provide you with the best UX/UI experience for consistent utilization', 'admin', 'Our Web & App Development services provide you with the best UX/UI experience for consistent utilization', 'Our Web & App Development services provide you with the best UX/UI experience for consistent utilization', '1', '0'),
(5, 'IT Infrstructure Solution', 'blog-2.jpg', 0, '03-Apr-24', '<div class=\"container\">\r\n<p>We, at ATech Solutions, provide you with well-planned IT Solutions. In an era that is heavily tech-dependent, every business needs to adapt to the new methods of the latest technology to keep up with the competitive market. We dispense operating systems such as ERP, CRM, and other networking solutions for your integrated software enablement and security. Our team at ATECH Solutions is well versed in architecting, implementing, and delivering end-to-end Infrastructure solutions.</p>\r\n&nbsp;\r\n\r\n<p>Our IT Infrastructure solutions are solely focused on your requirements and the growth of your business. We make sure to deliver you the best solutions based on our team&rsquo;s professional and consistent hard work.</p>\r\n&nbsp;\r\n\r\n<p>ATECH&rsquo;s Infrastructure Solutions matches the best standards and we have been providing services that include IT strategies and infrastructure to our trusted clients. We make sure to work for you in order to achieve a reliable and cost-effective solution for your organization.</p>\r\n</div>\r\n', 'it-infrstructure-solution', '1.jpg', 'We support businesses with modern IT Infrastructure Solutions by our methodical operations.', 'admin', 'We support businesses with modern IT Infrastructure Solutions by our methodical operations.', 'We support businesses with modern IT Infrastructure Solutions by our methodical operations.', '1', '1'),
(6, 'fsdf', 'dsfsd', 0, 'sdfsd', 'sdds', '', '', '', '', '', '', '', ''),
(7, 'IT Security Solutions', 'blog-4.jpg', 1, '20-Apr-24', '<p>\r\nAt Atech solutions, we work with our experienced expert team of IT professionals to offer you the best security solutions in IT. Our IT Solutions aim to improve your organizationâ€™s flexibility and cost-effectiveness. We ensure to scrutinize and access the areas of data protection, cybersecurity management, etc. The comprehensive approach that we take on securing and ensuring the safety of your data is structural and unique.</p>\r\n\r\n<p></p>\r\n<p>Every approach for securing requires solutions and services that ensure the safety of your data, infrastructure, and user experience throughout the complete threat lifecycle. Hence, we help you manage those challenges with the three pillars of security management: Protect, Detect, and React.</p>\r\n\r\n<h4>We assist you with the following IT Security Solutions:</h4>\r\n<p>Identity and Access Managemen <br>\r\n       Application Security  <br>\r\n       Data Loss Prevention  <br>\r\n      Content Security for Web and Email <br>\r\n      Security Health Check  <br> \r\n     Compromise  <br>\r\n    Enterprise Security <br>\r\n   Cloud Security <br> \r\nEnd Point Security <br>\r\nNetwork Security</p>\r\n', 'it-security-solutions', 'blog-4.jpg', 'We provide IT security services that empower you to control your data and disperse it with protection.', 'admin', 'We provide IT security services that empower you to control your data and disperse it with protection.', 'We provide IT security services that empower you to control your data and disperse it with protection.', '1', ''),
(8, 'Cloud Solutions', 'gddfg.webp', 1, '16-Aug-24', '<P> \r\nThe fast-evolving innovation, cloud has become a necessary option for every business in todayâ€™s tech-driven world. We, at ATECH Solutions, understand the art of delivering you the best Cloud solutions to help you design and execute distinctive business strategies. Our solutions provides you a better understanding of deployment model that would suit your organizationâ€™s requirement.</p>\r\n<p></p>\r\n\r\n<h4>Software as a Service (SaaS)<h4>\r\n<p>It is a type of Cloud service that offers an application to customers or organizations through a web browser. Data for the application runs on a network server, not via an app from the userâ€™s computer. This software is sold through subscription. Salesforce, Google Docs, Office 365, etc. are some of the examples of SaaS.</p>\r\n\r\n<p></p>\r\n\r\n<h4>Infrastructure as a Service (IaaS)<h4>\r\n<p>Iaas provides the hardware and usually virtualized OS to its customers. Software is charged only for the computing power that gets used by CPU hours utilized per month. It is highly accessible by multiple users. Amazon EC2, Rackspace, Google Compute Engine, etc., are some of the practical examples of IaaS.</p>\r\n\r\n<p></p>\r\n\r\n<h4>Platform as a Service (PaaS<h4>\r\n<p>PaaS provides networked computers running in a hosted domain and also adds support for the development environment. PaaS offerings generally support a specific program language or development environment. PaaS is an additional cost on top of the IaaS charges as it is accessible through any device. Google App Engine, Cloud Foundry, Engine Yard etc. are some of the examples of PaaS..</p>', 'cloud-solutions', 'pexels-photo-7014337.webp', 'We contribute a competitive edge to the organizations with our state-of-the-art cloud solutions.', 'admin', 'We contribute a competitive edge to the organizations with our state-of-the-art cloud solutions.', 'We contribute a competitive edge to the organizations with our state-of-the-art cloud solutions.', '1', ''),
(9, 'Database Solutions', 'blog-8.jpg', 1, '20-Apr-2024', '<P>\r\nTransform your firmâ€™s performance and productivity with our leading database solutions. Considering how important it is for maintaining the companyâ€™s database of day-to-day activities and transactions, you must utilize your potential to the maximum. In todayâ€™s world, where everything is digital and electronic, storing and collecting data via database management is equally necessary. Your organized, collected data may face technical issues like breach of data security, performance glitch or limits, or scalability. Be it any of those challenges, Atech provides solutions for all the database types to resume their functioning efficiently.</P>\r\n\r\n<P></P>\r\n\r\n<h4>Database Services</h4>\r\n<P>Our staff has experience with both the large and the small. We offer services ranging from implementing mission-critical high-end systems to the setup and configuration of databases for small office and website systems. We offer many Oracle services that include:</P>\r\n<br>\r\n<P>\r\nDatabase health check <br>\r\nDatabase installation (both single instance and RAC) <br>\r\nImplementation of Oracle Maximum Availability Architecture <br>\r\nDatabase consolidation to drive down your costs</P>\r\n\r\n<P></P>\r\n<h4>We also offer MySQL services that include:</h4>\r\n<P>\r\nDatabase installation <br>\r\nDatabase tuning<br>\r\nDatabase consolidation</P>\r\n', 'database-solutions', 'blog-8.jpg', 'We manage and secure your software information with our Database Solutions. Our services range according to your requirements.', 'admin', 'We manage and secure your software information with our Database Solutions. Our services range according to your requirements.', 'We manage and secure your software information with our Database Solutions. Our services range according to your requirements.', '1', ''),
(10, 'Outsourcing', 'gddfg.webp', 1, '16-Aug-24', '<P>\r\nRecruitment Process Outsourcing (RPO): The business approach of outsourcing involves a process where an organization externalizes the management procedure of the recruitment function. (To a third-party authority in order to drive quality and efficient scalability). We craft elegant & beneficial solutions for you. We pass on to you the benefits of favorable exchange rates with our lower operational costs at no reduction in our level of commitment, service, and quality. </P>\r\n\r\n<P></P>\r\n<P>Every candidate submittal is approved after our recruiters speak to the candidate and qualify them based on the interest and suitability of the position. At ATech Solutions, our expert team works with hiring managers to reveal the reasons as to why someone would want a job that you offer. We also assist you in determining what specific skills and experience are required for success in a job role.</P>', 'outsourcing', 'gddfg.webp', 'With our exceptional outsourcing services, we pass on to you the benefits of a favorable exchange rate and our lower operational costs.', 'admin', 'With our exceptional outsourcing services, we pass on to you the benefits of a favorable exchange rate and our lower operational costs.', 'With our exceptional outsourcing services, we pass on to you the benefits of a favorable exchange rate and our lower operational costs.', '1', ''),
(11, ' Digital Marketing ', 'free-photo-of-an-artist-s-illustration-of-artificial-intelligence-ai-this-image-depicts-how-ai-could-adapt-to-an-infinite-amount-of-uses-it-was-created-by-nidia-dias-as-part-of-the-visualising-ai-pr.jpg', 1, '16-Aug-24', '<P>Owning a business and not having Digital exposure is the most unacceptable thing in todayâ€™s tech-savvy world. A businessâ€™s digital marketing impacts the audience worldwide and can help you get massive recognition. With the Digital Marketing solutions that Atech provides for your business, you as a business owner can have a positive outreach to potential customers. Our Digital Marketing solutions comprise every necessary marketing strategy and guidance that helps you boost your digital presence in the market.</P>\r\n\r\n<P></P>\r\n<h4>Search Engine Optimization</h4>\r\n<P></P>\r\n<p>We analyze your websiteâ€™s health and fix indexing errors, manual actions, etc. to keep your website functioning smoothly. Our SEO experts convert traffic into regular customers by fully optimizing the website to achieve the best rankings in the SERP and gaining strong Domain authority. Our organic methods of working will lead your website to reach as many people as possible all across the globe. </p>\r\n\r\n<P></P>\r\n<h4>Search Engine Marketing</h4>\r\n<P></P>\r\n<p>This Digital marketing strategy will help you gain instant and profitable results within no time. Our digital marketing team experts will ensure your outreach by establishing the process of PPC (pay per click). This step helps you gain traffic promptly and may lead to sizable conversions. Our SEM services reach the consumers at the right time. </p>\r\n\r\n\r\n<P></P>\r\n<h4>Social Media Marketing</h4>\r\n<P></P>\r\n<p>The promotion of goods and services through social media, SMM is an essential marketing strategy that we provide for your business to reach a maximum target audience. We run promotional campaigns and increase traffic for your website with our SMM  team experts. We enhance your social media presence with regular posting and interactions for exposure.</p>\r\n\r\n\r\n<P></P>\r\n<h4>Content Marketing</h4>\r\n<P></P>\r\n<p>The most important and sustainable form of marketing strategy, content marketing, comprises quality content and information for the consumers to gain and understand your business perspective. Atechâ€™s content marketing team ensures to guide you with the content that is necessary for your websiteâ€™s growth. <br><br>\r\n\r\nIf you require services and solutions throughout your business journey with an extensive support system, make sure to avail our services at the best cost-effective prices. Atechâ€™s Digital Marketing Solutions aims to strengthen your websiteâ€™s performance and exposure. Our professional team provides you with the leading marketing strategies that will work for your business type.</p>', '-digital-marketing-', 'free-photo-of-an-artist-s-illustration-of-artificial-intelligence-ai-this-image-depicts-how-ai-could-adapt-to-an-infinite-amount-of-uses-it-was-created-by-nidia-dias-as-part-of-the-visualising-ai-pr.jpg', 'Digital marketing, also called online marketing, is the promotion of brands to connect with potential customers using the internet and other forms of digital communication.', 'admin', 'Digital marketing, also called online marketing, is the promotion of brands to connect with potential customers using the internet and other forms of digital communication.', 'Digital marketing, also called online marketing, is the promotion of brands to connect with potential customers using the internet and other forms of digital communication.', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_title` text DEFAULT NULL,
  `slider_sub_title` text DEFAULT NULL,
  `slider_status` int(11) NOT NULL DEFAULT 1,
  `slider_datetime` varchar(255) NOT NULL,
  `slider_addby` varchar(255) NOT NULL,
  `slider_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_title`, `slider_sub_title`, `slider_status`, `slider_datetime`, `slider_addby`, `slider_image`) VALUES
(1, 'Spices Brings Taste To Your', 'Bacon ipsum dolor amet ball tip pork chop cow tenderloin andouille. Pastrami pork picanha tongue venison strip steakd', 0, '14-09-23 03:04:34pm', '', 'hjkjh.jpg'),
(2, 'Spices Brings Taste To Your', 'Bacon ipsum dolor amet ball tip pork chop cow tenderloin andouille. Pastrami pork picanha tongue venison strip steak', 0, '14-09-23 03:08:28pm', '', 'hjkjh.jpg'),
(3, 'ATECH Solutions', ' Providing Leading Digital Solutions for your Business About Us ', 1, '16-08-24 03:04:28am', '', 'pexels-photo-7282818.webp'),
(4, 'Digital Transformation', 'Reduce the Carbon Footprint ', 1, '16-08-24 03:04:14am', '', 'gddfg.webp'),
(5, 'Advanced IT Solutions', 'Avail Infinite Possibilities with our IT Solutions & Services ', 1, '16-08-24 03:03:56am', '', 'pexels-photo-17485706.webp'),
(6, 'Cloud Services', 'We Implement & Manage Your Choice of Cloud Services ', 1, '16-08-24 03:03:45am', '', 'free-photo-of-an-artist-s-illustration-of-artificial-intelligence-ai-this-image-represents-the-boundaries-set-in-place-to-secure-safe-accountable-biotechnology-it-was-created-by-artist-khyati-treha.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `term_codition`
--

CREATE TABLE `term_codition` (
  `term_codition_id` int(11) NOT NULL,
  `term_pravicy_description` text NOT NULL,
  `term_pravicy_title` varchar(255) NOT NULL,
  `term_codition_description` text NOT NULL,
  `term_condition_title` varchar(255) NOT NULL,
  `term_codition_status` int(11) NOT NULL DEFAULT 1,
  `term_codition_datetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `term_codition`
--

INSERT INTO `term_codition` (`term_codition_id`, `term_pravicy_description`, `term_pravicy_title`, `term_codition_description`, `term_condition_title`, `term_codition_status`, `term_codition_datetime`) VALUES
(3, '<p>2The standard Lorem Ipsum passage, used since the 1500s &quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot; Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC &quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot; 1914 translation by H. Rackham &quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot; Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC &quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot; 1914 translation by H. Rackham &quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>\r\n', 'Term Pravicy Titleeses', '<p><span style=\"font-size:12px\">The standard Lorem Ipsum passage, used since the 1500s &quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot; Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC &quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam</span><span style=\"font-size:12px\">, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot; 1914 translation by H. Rackham &quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot; Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC &quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot; 1914 translation by H. Rackham &quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.</span></p>\r\n', 'Term Conditionses', 1, '06-04-24 01:01:41pm');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_id` int(11) NOT NULL,
  `testimonial_page` varchar(255) NOT NULL,
  `testimonial_name` varchar(255) NOT NULL,
  `testimonial_work` varchar(255) NOT NULL,
  `testimonial_image` varchar(255) NOT NULL,
  `testimonial_comments` text NOT NULL,
  `testimonial_status` int(11) NOT NULL DEFAULT 1,
  `testimonial_datetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonial_id`, `testimonial_page`, `testimonial_name`, `testimonial_work`, `testimonial_image`, `testimonial_comments`, `testimonial_status`, `testimonial_datetime`) VALUES
(1, 'about-us.php', 'Somen Simth', 'Digital Marketinge', 'photo2.jpg', 'We are extremly thrilled with the result of our digital marketing campign ,our online precense has improved. Great job team ', 1, '20-04-24 01:59:53pm'),
(2, 'about_us.php', 'Mohit Ramaes', 'Worker', '040324072844outher-02.jpg', 'one of the most popular real estate company all around USA. You can find your dream property or the build erty with us. We always provide imp', 0, '04-03-24 07:31:21am'),
(3, 'about_us.php', 'Ramesh Builder', 'Construction', '0403240733262.jpg', 'one of the most popular real estate company all around USA. You can find your dream property or the build erty with us. We always provide imp', 0, '04-03-24 07:33:26am'),
(4, 'index.php', 'Suresh Bhai', 'Builder', '040324073448fdgfd.jpg', 'one of the most popular real estate company all around USA. You can find your dream property or the build erty with us. We always provide imp', 0, '04-03-24 07:34:48am'),
(5, 'index.php', 'Mahesh Builder', 'Builder', '040324073559dfdf.jpg', 'one of the most popular real estate company all around USA. You can find your dream property or the build erty with us. We always provide imp', 0, '04-03-24 07:35:59am'),
(6, 'index.php', 'Paveeer Bhai', 'Woker', '040324073658outher-02.jpg', 'one of the most popular real estate company all around USA. You can find your dream property or the build erty with us. We always provide imp', 0, '04-03-24 07:36:58am'),
(7, 'index.php', 'Munna', ' It Infrastructure', 'dsda.jpg', 'Before I enter in  the IT field i learn it infrastructure form this website they give me best sources to build  the skills . they are best', 1, '03-05-24 02:53:55pm'),
(8, 'about-us.php', 'syed', 'web dev', 'profile photo.jpg', 'thw thehgvkgkl giuuklghiul gigi', 0, '14-04-24 11:25:39am'),
(9, 'index.php', 'Robin', 'Web Developer', 'photo3.jpg', '\"We \"', 0, '20-04-24 01:40:06pm'),
(10, 'about-us.php', 'Robin', 'Web Developer', 'testimonial-1.jpg', 'They  provide best services , and i am soo happy they support me best , now i am web developer because of this webside', 1, '20-04-24 02:04:44pm'),
(11, 'about-us.php', 'Clara', 'Database Solution', '4.jpg', 'The database solution provided by the company name has revoutionized our database management process. we are soo happy', 1, '20-04-24 02:17:10pm'),
(12, 'index.php', 'Romeo', 'Web Developer', '1.jpg', 'I learn web development form this website and they results are  best and  they provide best courses for biginers', 1, '20-04-24 02:25:04pm'),
(13, 'index.php', 'James', 'It Security', 'testimonial-1.jpg', 'IT Security is the best field i learn too much and workhard now i am doing jon in it security for database security , i get all results from ', 1, '20-04-24 02:36:19pm');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `training_id` int(11) NOT NULL,
  `training_sertification_code` varchar(255) NOT NULL,
  `training_code_title` varchar(255) NOT NULL,
  `training_duration_day` varchar(255) NOT NULL,
  `training_mode` varchar(255) NOT NULL,
  `training_audience` varchar(255) NOT NULL,
  `training_per_req` varchar(255) NOT NULL,
  `training_cost_per_student` varchar(255) NOT NULL,
  `training_status` int(11) NOT NULL DEFAULT 1,
  `training_datetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`training_id`, `training_sertification_code`, `training_code_title`, `training_duration_day`, `training_mode`, `training_audience`, `training_per_req`, `training_cost_per_student`, `training_status`, `training_datetime`) VALUES
(1, 'AZ 104s', 'Azure Administrators', '24 Hours or 3 Full Dayss', 'Online – Instructor Leds', 'IT Administratorss', '1. AZ-900 2. Knowledge of Operating Systems, Virtualization, Network, Storage & Actice Directorys', '300 USD includes AZ-900s', 0, '2024-04-05 09:35:34pm'),
(2, 'HJKGDSA', 'Azure Administrator', '24 Hours or 3 Full Days', 'Online – Instructor Led', 'IT Administrators', '1. AZ-900 2. Knowledge of Operating Systems, Virtualization, Network, Storage & Actice Directory ', '300 USD includes AZ-900', 1, '2024-08-16 03:00:34am'),
(3, 'DSAHLHDSA', 'Azure Solutions Architect Expert', '32 Hours or 4 Full Days', 'Online – Instructor Led', 'Instructor Led	IT Administrators, Architects, Consultants', '1. AZ-900 2. Knowledge of Operating Systems, Virtualization, Network, Storage & Actice Directory ', '500 USD includes AZ-900', 1, '2024-08-16 03:00:46am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `dash_home`
--
ALTER TABLE `dash_home`
  ADD PRIMARY KEY (`dash_id`);

--
-- Indexes for table `general_tbl`
--
ALTER TABLE `general_tbl`
  ADD PRIMARY KEY (`general_id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `message_enquiry`
--
ALTER TABLE `message_enquiry`
  ADD PRIMARY KEY (`message_enquiry_id`);

--
-- Indexes for table `product_enquiry`
--
ALTER TABLE `product_enquiry`
  ADD PRIMARY KEY (`product_enquiry_id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`seo_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`services_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `term_codition`
--
ALTER TABLE `term_codition`
  ADD PRIMARY KEY (`term_codition_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`training_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dash_home`
--
ALTER TABLE `dash_home`
  MODIFY `dash_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_tbl`
--
ALTER TABLE `general_tbl`
  MODIFY `general_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `home_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message_enquiry`
--
ALTER TABLE `message_enquiry`
  MODIFY `message_enquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_enquiry`
--
ALTER TABLE `product_enquiry`
  MODIFY `product_enquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `seo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `services_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `term_codition`
--
ALTER TABLE `term_codition`
  MODIFY `term_codition_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `training_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
