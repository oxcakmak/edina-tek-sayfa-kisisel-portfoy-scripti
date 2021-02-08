-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 08, 2021 at 06:44 PM
-- Server version: 10.2.33-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oxcakma1_edina`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(20) NOT NULL,
  `category_slug` char(50) COLLATE utf8_turkish_ci NOT NULL,
  `category_title` char(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_slug`, `category_title`) VALUES
(1, 'deneme', 'Deneme'),
(3, 'resim', 'Resim');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(20) NOT NULL,
  `client_hash` char(40) COLLATE utf8_turkish_ci DEFAULT NULL,
  `client_title` char(40) COLLATE utf8_turkish_ci DEFAULT NULL,
  `client_picture` char(200) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_hash`, `client_title`, `client_picture`) VALUES
(0, 'e7ab74a821e503c00c21095f475148c4', 'Veridyen', 'assets/upload/client/client_31427abee5ae285b274064989d900db4.png');

-- --------------------------------------------------------

--
-- Table structure for table `collapse`
--

CREATE TABLE `collapse` (
  `collapse_id` int(20) NOT NULL,
  `collapse_hash` char(40) COLLATE utf8_turkish_ci NOT NULL,
  `collapse_title` char(50) COLLATE utf8_turkish_ci NOT NULL,
  `collapse_content` varchar(500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `counter_id` int(20) NOT NULL,
  `counter_hash` char(40) COLLATE utf8_turkish_ci DEFAULT NULL,
  `counter_icon` char(30) COLLATE utf8_turkish_ci DEFAULT NULL,
  `counter_number` char(10) COLLATE utf8_turkish_ci DEFAULT NULL,
  `counter_title` char(30) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`counter_id`, `counter_hash`, `counter_icon`, `counter_number`, `counter_title`) VALUES
(1, '5e684c6a7968e2c2ca2bd78351b5f092', 'fa fa-smile-o', '500', 'Mutlu Müşteri');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(20) NOT NULL,
  `media_hash` char(40) COLLATE utf8_turkish_ci NOT NULL,
  `media_title` char(30) COLLATE utf8_turkish_ci NOT NULL,
  `media_fullname` char(100) COLLATE utf8_turkish_ci NOT NULL,
  `media_name` char(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `media_hash`, `media_title`, `media_fullname`, `media_name`) VALUES
(1, '00a7a644e0cbbf3b0bf3f531ff4f648d', 'Test', 'assets/upload/team/team_2a1d29aef582a58bf771e6bda6479a14.jpg', 'team_2a1d29aef582a58bf771e6bda6479a14.jpg'),
(2, 'a9b3b3cea5091f334b5c7fb2c959465a', 'Veridyen', 'assets/upload/client/client_31427abee5ae285b274064989d900db4.png', 'client_31427abee5ae285b274064989d900db4.png'),
(3, '4153c6c65f4b6577bfe1dcd642e0d468', 'portfÃ¶y', 'assets/upload/portfolio/portfolio_d95dd2bdd187e64f7236a1ef570f2d61.jpg', 'portfolio_d95dd2bdd187e64f7236a1ef570f2d61.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolio_id` int(20) NOT NULL,
  `portfolio_hash` char(50) COLLATE utf8_turkish_ci NOT NULL,
  `portfolio_picture` char(100) COLLATE utf8_turkish_ci NOT NULL,
  `portfolio_title` char(50) COLLATE utf8_turkish_ci NOT NULL,
  `portfolio_category` char(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolio_id`, `portfolio_hash`, `portfolio_picture`, `portfolio_title`, `portfolio_category`) VALUES
(1, '9ca9ecec89c44b1b2d77f455702a4e9e', 'assets/upload/client/client_31427abee5ae285b274064989d900db4.png', 'Deneme', 'deneme'),
(2, '2c9372cdcdf1c3869818450c0c5cb7c9', 'assets/upload/portfolio/portfolio_d95dd2bdd187e64f7236a1ef570f2d61.jpg', 'FormÃ¼l', 'resim');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(20) NOT NULL,
  `service_hash` char(40) COLLATE utf8_turkish_ci NOT NULL,
  `service_icon` char(30) COLLATE utf8_turkish_ci NOT NULL,
  `service_title` char(30) COLLATE utf8_turkish_ci NOT NULL,
  `service_description` char(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_hash`, `service_icon`, `service_title`, `service_description`) VALUES
(1, '455d673e000549004ca0fe1574be940b', 'fa fa-search', 'UI/UX Design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(20) NOT NULL,
  `setting_home_title` char(50) COLLATE utf8_turkish_ci NOT NULL,
  `setting_home_description` char(160) COLLATE utf8_turkish_ci NOT NULL,
  `setting_home_keyword` char(250) COLLATE utf8_turkish_ci NOT NULL,
  `setting_footer_copyright_text` char(250) COLLATE utf8_turkish_ci NOT NULL,
  `setting_logo` char(100) COLLATE utf8_turkish_ci NOT NULL,
  `setting_background` char(100) COLLATE utf8_turkish_ci NOT NULL,
  `setting_background_author` char(100) COLLATE utf8_turkish_ci NOT NULL,
  `setting_background_testimonial` char(100) COLLATE utf8_turkish_ci NOT NULL,
  `setting_background_partners` char(100) COLLATE utf8_turkish_ci NOT NULL,
  `setting_background_leftbox` char(100) COLLATE utf8_turkish_ci NOT NULL,
  `setting_about_name` char(50) COLLATE utf8_turkish_ci NOT NULL,
  `setting_about_description` char(250) COLLATE utf8_turkish_ci NOT NULL,
  `setting_about_image` char(100) COLLATE utf8_turkish_ci NOT NULL,
  `setting_sm_facebook` char(100) COLLATE utf8_turkish_ci NOT NULL,
  `setting_sm_twitter` char(100) COLLATE utf8_turkish_ci NOT NULL,
  `setting_sm_instagram` char(100) COLLATE utf8_turkish_ci NOT NULL,
  `setting_sm_linkedin` char(100) COLLATE utf8_turkish_ci NOT NULL,
  `setting_sm_behance` char(100) COLLATE utf8_turkish_ci NOT NULL,
  `setting_sm_github` char(100) COLLATE utf8_turkish_ci NOT NULL,
  `setting_meta_google_site_verification` char(50) COLLATE utf8_turkish_ci NOT NULL,
  `setting_meta_google_analytics` char(20) COLLATE utf8_turkish_ci NOT NULL,
  `setting_meta_google_adsense` char(20) COLLATE utf8_turkish_ci NOT NULL,
  `setting_mail_type` char(10) COLLATE utf8_turkish_ci NOT NULL,
  `setting_mail_sender` char(50) COLLATE utf8_turkish_ci NOT NULL,
  `setting_mail_password` char(20) COLLATE utf8_turkish_ci NOT NULL,
  `setting_mail_site` char(20) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `setting_home_title`, `setting_home_description`, `setting_home_keyword`, `setting_footer_copyright_text`, `setting_logo`, `setting_background`, `setting_background_author`, `setting_background_testimonial`, `setting_background_partners`, `setting_background_leftbox`, `setting_about_name`, `setting_about_description`, `setting_about_image`, `setting_sm_facebook`, `setting_sm_twitter`, `setting_sm_instagram`, `setting_sm_linkedin`, `setting_sm_behance`, `setting_sm_github`, `setting_meta_google_site_verification`, `setting_meta_google_analytics`, `setting_meta_google_adsense`, `setting_mail_type`, `setting_mail_sender`, `setting_mail_password`, `setting_mail_site`) VALUES
(1, 'Kurumsal Tema', 'Nandini Kurumsal Tema', 'nandini, kurumsal tema', '© %date% Coded by <a href=\"https://oxcakmak.com/\">OXCAKMAK</a>', 'assets/index/img/logo/logo.png', 'assets/index/img/hero/1.jpg', 'assets/index/img/hero/image.png', 'assets/index/img/jarallax/1.jpg', 'assets/index/img/jarallax/2.jpg', 'assets/index/img/about/2.jpg', 'Merhaba Ben Osman', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aspernatur et magnam officiis possimus, quaerat rerum voluptates!\n\n Adipisci architecto assumenda maiores nam officia quasi ut?', 'assets/index/img/about/1.jpg', 'https://www.facebook.com/oxcakmak', 'https://www.twitter.com/oxcakmak', 'https://www.instagram.com/oxcakmak', 'https://www.linkedin.com/oxcakmak', '#', 'https://www.github.com/oxcakmak', '7395fa5c8ffd1bbb6c9976fd5d95af50', '739816976', '739816912', 'mail', 'demo@oxcakmak.com', 'demo', 'demo.com');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(20) NOT NULL,
  `team_hash` char(40) COLLATE utf8_turkish_ci NOT NULL,
  `team_picture` char(100) COLLATE utf8_turkish_ci NOT NULL,
  `team_fullname` char(40) COLLATE utf8_turkish_ci NOT NULL,
  `team_job` char(40) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `team_hash`, `team_picture`, `team_fullname`, `team_job`) VALUES
(1, '8e774fe3e6158314a2687dc23cab8e89', 'assets/upload/team/team_8e774fe3e6158314a2687dc23cab8e89.jpeg', 'John DOE', 'Founder, Owner');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_id` int(20) NOT NULL,
  `testimonial_hash` char(40) COLLATE utf8_turkish_ci NOT NULL,
  `testimonial_picture` char(100) COLLATE utf8_turkish_ci NOT NULL,
  `testimonial_fullname` char(40) COLLATE utf8_turkish_ci NOT NULL,
  `testimonial_job` char(40) COLLATE utf8_turkish_ci NOT NULL,
  `testimonial_comment` char(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonial_id`, `testimonial_hash`, `testimonial_picture`, `testimonial_fullname`, `testimonial_job`, `testimonial_comment`) VALUES
(1, '1515210e270e2b24f46ef405decc9b94', 'assets/upload/testimonial/testimonial_1515210e270e2b24f46ef405decc9b94.png', 'John DOE', 'Web Designer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.'),
(2, '533dc8c677eedcf5b30b81cdcf26c0d3', 'assets/upload/team/team_2a1d29aef582a58bf771e6bda6479a14.jpg', 'Osman Ã‡akmak', 'Back-End Developer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `thread_id` int(20) NOT NULL,
  `thread_slug` char(50) COLLATE utf8_turkish_ci NOT NULL,
  `thread_picture` char(100) COLLATE utf8_turkish_ci NOT NULL,
  `thread_title` char(50) COLLATE utf8_turkish_ci NOT NULL,
  `thread_content` longtext COLLATE utf8_turkish_ci NOT NULL,
  `thread_description` char(160) COLLATE utf8_turkish_ci NOT NULL,
  `thread_keyword` char(250) COLLATE utf8_turkish_ci NOT NULL,
  `thread_owner` char(30) COLLATE utf8_turkish_ci NOT NULL,
  `thread_date` char(20) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`thread_id`, `thread_slug`, `thread_picture`, `thread_title`, `thread_content`, `thread_description`, `thread_keyword`, `thread_owner`, `thread_date`) VALUES
(2, 'lorem-apsum-ahmet', 'assets/upload/blog/blog_c27fd94b674ccba0d88b05ca7bc3028e.jpeg', 'Lorem Apsum Ahmet', '&lt;p&gt;Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. No sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.&lt;/p&gt;', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'lorem, lorem ipsum', 'admin', '28.08.2020-12:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(20) NOT NULL,
  `user_picture` char(100) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'assets/media/avatar.png',
  `user_firstname` char(30) COLLATE utf8_turkish_ci NOT NULL,
  `user_lastname` char(30) COLLATE utf8_turkish_ci NOT NULL,
  `user_username` char(30) COLLATE utf8_turkish_ci NOT NULL,
  `user_email` char(40) COLLATE utf8_turkish_ci NOT NULL,
  `user_password` char(40) COLLATE utf8_turkish_ci NOT NULL,
  `user_status` char(1) COLLATE utf8_turkish_ci NOT NULL DEFAULT '1',
  `user_key` char(40) COLLATE utf8_turkish_ci NOT NULL,
  `user_last_address` char(20) COLLATE utf8_turkish_ci NOT NULL DEFAULT '127.0.0.1',
  `user_last_date` char(20) COLLATE utf8_turkish_ci NOT NULL DEFAULT '127.0.0.1',
  `user_register_address` char(20) COLLATE utf8_turkish_ci NOT NULL DEFAULT '127.0.0.1',
  `user_register_date` char(20) COLLATE utf8_turkish_ci NOT NULL DEFAULT '127.0.0.1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_picture`, `user_firstname`, `user_lastname`, `user_username`, `user_email`, `user_password`, `user_status`, `user_key`, `user_last_address`, `user_last_date`, `user_register_address`, `user_register_date`) VALUES
(1, 'assets/media/avatar.png', 'John', 'DOE', 'admin', 'admin@gmail.com', '0c7540eb7e65b553ec1ba6b20de79608', '1', 'de3ebd7ffead3f634f56cd81ab91706e', '46.1.96.33', '05.02.2021-13:36', '127.0.0.1', '127.0.0.1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `collapse`
--
ALTER TABLE `collapse`
  ADD PRIMARY KEY (`collapse_id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`counter_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolio_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`thread_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `collapse`
--
ALTER TABLE `collapse`
  MODIFY `collapse_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `counter_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolio_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonial_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `thread_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
