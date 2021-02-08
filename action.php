<?php
require_once('config.php');
require_once('class.phpmailer.php');
if(isset($_SESSION['user_username'])){ /* Session If Exists */
	
if(DEMO_MODE == 0){
	/* Update Mail System Setting */
	if(isset($_POST['actionUpdateMail'])){
		$stMailType = $oxcakmak->cleanString($_POST['stMailType']);
		$stMailSender = $oxcakmak->cleanString($_POST['stMailSender']);
		$stMailPassword = $oxcakmak->cleanString($_POST['stMailPassword']);
		$stMailSite = $oxcakmak->cleanString($_POST['stMailSite']);
		if(empty($stMailType) || empty($stMailSender) || empty($stMailPassword) || empty($stMailSite)){
			echo "space";
		}else{
			$updateMailType = [
				"setting_mail_type" => $stMailType
			];
			$updateMailSender = [
				"setting_mail_sender" => $stMailSender
			];
			$updateMailPassword = [
				"setting_mail_password" => $stMailPassword
			];
			$updateMailSite = [
				"setting_mail_site" => $stMailSite
			];
			$dbh->where('setting_id', 1);
			$dbh->update('setting', $updateMailType);
			$dbh->update('setting', $updateMailSender);
			$dbh->update('setting', $updateMailPassword);
			$dbh->update('setting', $updateMailSite);
			echo "success";
		}
	}
	
	/* Update Home System Setting */
	if(isset($_POST['actionUpdateHome'])){
		$stHomeTitle = $oxcakmak->cleanString($_POST['stHomeTitle']);
		$stHomeDescription = $oxcakmak->cleanString($_POST['stHomeDescription']);
		$stHomeKeyword = $oxcakmak->cleanString($_POST['stHomeKeyword']);
		$stHomeFooter = $_POST['stHomeFooter'];
		if(empty($stHomeTitle) || empty($stHomeDescription) || empty($stHomeKeyword) || empty($stHomeFooter)){
			echo "space";
		}else{
			$updateHomeTitle = [
				"setting_home_title" => $stHomeTitle
			];
			$updateHomeDescription = [
				"setting_home_description" => $stHomeDescription
			];
			$updateHomeKeyword = [
				"setting_home_keyword" => $stHomeKeyword
			];
			$updateHomeFooter = [
				"setting_footer_copyright_text" => $stHomeFooter
			];
			$dbh->where('setting_id', 1);
			$dbh->update('setting', $updateHomeTitle);
			$dbh->update('setting', $updateHomeDescription);
			$dbh->update('setting', $updateHomeKeyword);
			$dbh->update('setting', $updateHomeFooter);
			echo "success";
		}
	}
	
	/* Update Meta System Setting */
	if(isset($_POST['actionUpdateMeta'])){
		$stMetaGoogleSiteVerification = $oxcakmak->cleanString($_POST['stMetaGoogleSiteVerification']);
		$stMetaGoogleAdsense = $oxcakmak->cleanString($_POST['stMetaGoogleAdsense']);
		$stMetaGoogleAnalytics = $oxcakmak->cleanString($_POST['stMetaGoogleAnalytics']);
		if(empty($stMetaGoogleSiteVerification) || empty($stMetaGoogleAdsense) || empty($stMetaGoogleAnalytics)){
			echo "space";
		}else{
			$updateMetaGoogleSiteVerification = [
				"setting_meta_google_site_verification" => $stMetaGoogleSiteVerification
			];
			$updateMetaGoogleAdsense = [
				"setting_meta_google_adsense" => $stMetaGoogleAdsense
			];
			$updateMetaGoogleAnalytics = [
				"setting_meta_google_analytics" => $stMetaGoogleAnalytics
			];
			$dbh->where('setting_id', 1);
			$dbh->update('setting', $updateMetaGoogleSiteVerification);
			$dbh->update('setting', $updateMetaGoogleAdsense);
			$dbh->update('setting', $updateMetaGoogleAnalytics);
			echo "success";
		}
	}
	/* Update About System Setting */
	if(isset($_POST['actionUpdateAbout'])){
		$stAboutName = $oxcakmak->cleanString($_POST['stAboutName']);
		$stAboutDescription = $oxcakmak->cleanString($_POST['stAboutDescription']);
		$stAboutImage = $oxcakmak->cleanString($_POST['stAboutImage']);
		if(empty($stAboutName)|| empty($stAboutDescription) || empty($stAboutImage)){
			echo "space";
		}else{
			$updateAboutName = [
				"setting_about_name" => $stAboutName
			];
			$updateAboutDescription = [
				"setting_about_description" => $stAboutDescription
			];
			$updateAboutImage = [
				"setting_about_image" => $stAboutImage
			];
			$dbh->where('setting_id', 1);
			$dbh->update('setting', $updateAboutName);
			$dbh->update('setting', $updateAboutDescription);
			$dbh->update('setting', $updateAboutImage);
			echo "success";
		}
	}
	/* Update SocialMedia System Setting */
	if(isset($_POST['actionUpdateSocialMedia'])){
		$stSmFacebook = $oxcakmak->cleanString($_POST['stSmFacebook']);
		$stSmTwitter = $oxcakmak->cleanString($_POST['stSmTwitter']);
		$stSmInstagram = $oxcakmak->cleanString($_POST['stSmInstagram']);
		$stSmLinkedIn = $oxcakmak->cleanString($_POST['stSmLinkedIn']);
		$stSmBehance = $oxcakmak->cleanString($_POST['stSmBehance']);
		$stSmGithub = $oxcakmak->cleanString($_POST['stSmGithub']);
		if(empty($stSmFacebook) || empty($stSmTwitter) || empty($stSmInstagram) || empty($stSmLinkedIn) || empty($stSmBehance) || empty($stSmGithub)){
			echo "space";
		}else{
			$updateSmFacebook = [
				"setting_sm_facebook" => $stSmFacebook
			];
			$updateSmTwitter = [
				"setting_sm_twitter" => $stSmTwitter
			];
			$updateSmInstagram = [
				"setting_sm_instagram" => $stSmInstagram
			];
			$updateSmLinkedIn = [
				"setting_sm_linkedin" => $stSmLinkedIn
			];
			$updateSmBehance = [
				"setting_sm_behance" => $stSmBehance
			];
			$updateSmGithub = [
				"setting_sm_github" => $stSmGithub
			];
			$dbh->where('setting_id', 1);
			$dbh->update('setting', $updateSmFacebook);
			$dbh->update('setting', $updateSmTwitter);
			$dbh->update('setting', $updateSmInstagram);
			$dbh->update('setting', $updateSmLinkedIn);
			$dbh->update('setting', $updateSmBehance);
			$dbh->update('setting', $updateSmGithub);
			echo "success";
		}
	}
	
	/* Update Background System Setting */
	if(isset($_POST['actionUpdateBackground'])){
		$stBackgroundBanner = $oxcakmak->cleanString($_POST['stBackgroundBanner']);
		$stBackgroundLeftbox = $oxcakmak->cleanString($_POST['stBackgroundLeftbox']);
		$stBackgroundPartners = $oxcakmak->cleanString($_POST['stBackgroundPartners']);
		$stBackgroundTestimonial = $oxcakmak->cleanString($_POST['stBackgroundTestimonial']);
		if(empty($stBackgroundBanner) || empty($stBackgroundLeftbox) || empty($stBackgroundPartners) || empty($stBackgroundTestimonial)){
			echo "space";
		}else{
			$updateBackgroundBanner = [
				"setting_background_banner" => $stBackgroundBanner
			];
			$updateBackgroundLeftbox = [
				"setting_background_leftbox" => $stBackgroundLeftbox
			];
			$updateBackgroundPartners = [
				"setting_background_partners" => $stBackgroundPartners
			];
			$updateBackgroundTestimonial = [
				"setting_background_testimonial" => $stBackgroundTestimonial
			];
			$dbh->where('setting_id', 1);
			$dbh->update('setting', $updateBackgroundBanner);
			$dbh->update('setting', $updateBackgroundLeftbox);
			$dbh->update('setting', $updateBackgroundPartners);
			$dbh->update('setting', $updateBackgroundTestimonial);
			echo "success";
		}
	}
	
	
	/* Upload Media Action*/
	if(isset($_POST['actionUploadMedia'])){
		$fileSpecificTitle = $oxcakmak->cleanString($_POST['fileSpecificTitle']);
		$fileCategory = $oxcakmak->cleanString($_POST['fileCategory']);
		$fileName = @$_FILES['filePicture']['name'];
		$fileSize = @$_FILES['filePicture']['size'];
		$fileTmpName = @$_FILES['filePicture']['tmp_name'];
		$fileType = @$_FILES['filePicture']['type'];
		$fileExtensions = ['jpeg','jpg','png'];
		$fileExtension = strtolower(end(explode('.',$fileName)));
		if(empty($fileName) || empty($fileCategory) || empty($fileName)){
			echo "space";
		}else{
			if($fileCategory == "blog"){
				$fileNameEncoded = "blog_".$oxcakmak->specificMD5("blog_".basename($fileName), 30).".".$fileExtension;
				$uploadPath = "assets/upload/blog/".$fileNameEncoded;
			}else if($fileCategory == "portfolio"){
				$fileNameEncoded = "portfolio_".$oxcakmak->specificMD5("portfolio_".basename($fileName), 30).".".$fileExtension;
				$uploadPath = "assets/upload/portfolio/".$fileNameEncoded;
			}else if($fileCategory == "client"){
				$fileNameEncoded = "client_".$oxcakmak->specificMD5("client_".basename($fileName), 30).".".$fileExtension;
				$uploadPath = "assets/upload/client/".$fileNameEncoded;
			}else if($fileCategory == "service"){
				$fileNameEncoded = "service_".$oxcakmak->specificMD5("service_".basename($fileName), 30).".".$fileExtension;
				$uploadPath = "assets/upload/service/".$fileNameEncoded;
			}else if($fileCategory == "team"){
				$fileNameEncoded = "team_".$oxcakmak->specificMD5("team_".basename($fileName), 30).".".$fileExtension;
				$uploadPath = "assets/upload/team/".$fileNameEncoded;
			}else if($fileCategory == "testimonial"){
				$fileNameEncoded = "testimonial_".$oxcakmak->specificMD5("testimonial_".basename($fileName), 30).".".$fileExtension;
				$uploadPath = "assets/upload/testimonial/".$fileNameEncoded;
			}else if($fileCategory == "other"){
				$fileNameEncoded = "other_".$oxcakmak->specificMD5("other_".basename($fileName), 30).".".$fileExtension;
				$uploadPath = "assets/upload/other/".$fileNameEncoded;
			}else{
				$fileNameEncoded = $oxcakmak->specificMD5(basename($fileName), 30).".".$fileExtension;
				$uploadPath = "assets/upload/other/".$fileNameEncoded;
			}
			$uploadHash = $oxcakmak->specificMD5($fileNameEncoded, 30);
			if (!in_array($fileExtension,$fileExtensions)) {
				echo "extension";
			}else{
				if ($fileSize > 5000000) { 
					echo "limit";
				}else{
					$insertUploadData = [
						"media_hash" => $uploadHash, 
						"media_title" => $fileSpecificTitle, 
						"media_fullname" => $uploadPath, 
						"media_name" => $fileNameEncoded
					];
					$dbh->insert('media', $insertUploadData);
					@move_uploaded_file($fileTmpName, $uploadPath);
					echo "success";
				}
			}
		}
	}
	
	/* Add Service Action */
	if(isset($_POST['actionAddServiceItem'])){
		$serviceIcon = $oxcakmak->cleanString($_POST['serviceIcon']);
		$serviceTitle = $oxcakmak->cleanString($_POST['serviceTitle']);
		$serviceDescription = $oxcakmak->cleanString($_POST['serviceDescription']);
		$serviceHash = $oxcakmak->specificHashing($serviceIcon."-".$serviceTitle);
		$dbh->where("service_hash", $serviceHash);
		if(empty($serviceIcon) || empty($serviceTitle) || empty($serviceDescription)){
			echo "space";
		}else{
			if($dbh->has("service")){
				echo "exists";
			}else{
				$serviceData = [
					"service_hash" => $serviceHash,
					"service_icon" => $serviceIcon,
					"service_title" => $serviceTitle,
					"service_description" => $serviceDescription
				];
				$queryInsertServiceItem = $dbh->insert('service', $serviceData);
				if ($queryInsertServiceItem) {
					echo "success";
				} else {
					echo "failed";
				}
			}
		}
	}
	
	/* Update Service Action */
	if(isset($_POST['actionUpdateService'])){
		$serviceIcon = $oxcakmak->cleanString($_POST['serviceIcon']);
		$serviceTitle = $oxcakmak->cleanString($_POST['serviceTitle']);
		$serviceDescription = $oxcakmak->cleanString($_POST['serviceDescription']);
		$serviceHash = $oxcakmak->cleanString($_POST['serviceHash']);
		$dbh->where("service_hash", $serviceHash);
		if(empty($serviceIcon) || empty($serviceTitle) || empty($serviceDescription)){
			echo "space";
		}else{
			if($dbh->has("service")){
				$serviceData = [
					"service_icon" => $serviceIcon,
					"service_title" => $serviceTitle,
					"service_description" => $serviceDescription
				];
				$dbh->where("service_hash", $serviceHash);
				$queryUpdateServiceItem = $dbh->update('service', $serviceData);
				if ($queryUpdateServiceItem) {
					echo "success";
				} else {
					echo "failed";
				}
			}else{
				echo "not_exists";
			}
		}
	}
	
	/* Delete Service Action */
	if(isset($_POST['actionDeleteServiceItem'])){
		$serviceHash = $oxcakmak->cleanString($_POST['serviceHash']);
		$dbh->where("service_hash", $serviceHash);
		if($dbh->has("service")){
			$dbh->where('service_hash', $serviceHash);
			if(!$dbh->delete('service')){ echo 'success'; }else{ echo 'failed'; }
		}else{
			echo "not_found";
		}
	}
	
	/* Add Testimonial Action */
	if(isset($_POST['actionAddTestimonialItem'])){
		$testimonialPicture = $oxcakmak->cleanString($_POST['testimonialPicture']);
		$testimonialFullname = $oxcakmak->cleanString($_POST['testimonialFullname']);
		$testimonialJob = $oxcakmak->cleanString($_POST['testimonialJob']);
		$testimonialComment = $oxcakmak->cleanString($_POST['testimonialComment']);
		$testimonialHash = $oxcakmak->specificHashing($testimonialFullname."-".$testimonialJob);
		$dbh->where("testimonial_hash", $testimonialHash);
		if(empty($testimonialPicture) || empty($testimonialFullname) || empty($testimonialJob) || empty($testimonialComment)){
			echo "space";
		}else{
			if($dbh->has("testimonial")){
				echo "exists";
			}else{
				$testimonialData = [
					"testimonial_hash" => $testimonialHash,
					"testimonial_picture" => $testimonialPicture,
					"testimonial_fullname" => $testimonialFullname,
					"testimonial_job" => $testimonialJob,
					"testimonial_comment" => $testimonialComment
				];
				$queryInsertTestimonialItem = $dbh->insert('testimonial', $testimonialData);
				if ($queryInsertTestimonialItem) {
					echo "success";
				} else {
					echo "failed";
				}
			}
		}
	}
	
	/* Update Service Action */
	if(isset($_POST['actionUpdateService'])){
		$testimonialPicture = $oxcakmak->cleanString($_POST['testimonialPicture']);
		$testimonialFullname = $oxcakmak->cleanString($_POST['testimonialFullname']);
		$testimonialJob = $oxcakmak->cleanString($_POST['testimonialJob']);
		$testimonialComment = $oxcakmak->cleanString($_POST['testimonialComment']);
		$testimonialHash = $oxcakmak->specificHashing($testimonialFullname."-".$testimonialJob);
		$dbh->where("testimonial_hash", $testimonialHash);
		if(empty($testimonialPicture) || empty($testimonialFullname) || empty($testimonialJob) || empty($testimonialComment)){
			echo "space";
		}else{
			if($dbh->has("testimonial")){
				$testimonialData = [
					"testimonial_hash" => $testimonialHash,
					"testimonial_picture" => $testimonialPicture,
					"testimonial_fullname" => $testimonialFullname,
					"testimonial_job" => $testimonialJob,
					"testimonial_comment" => $testimonialComment
				];
				$dbh->where("testimonial_hash", $testimonialHash);
				$queryUpdateTestimonialItem = $dbh->update('testimonial', $testimonialData);
				if ($queryUpdateTestimonialItem) {
					echo "success";
				} else {
					echo "failed";
				}
			}else{
				echo "not_exists";
			}
		}
	}
	
	/* Delete Service Action */
	if(isset($_POST['actionDeleteServiceItem'])){
		$testimonialHash = $oxcakmak->cleanString($_POST['testimonialHash']);
		$dbh->where("testimonial_hash", $testimonialHash);
		if($dbh->has("testimonial")){
			$dbh->where('testimonial_hash', $testimonialHash);
			if(!$dbh->delete('testimonial')){ echo 'success'; }else{ echo 'failed'; }
		}else{
			echo "not_found";
		}
	}
	
	/* Add Thread Action */	
	if(isset($_POST['actionAddThread'])){
		$threadTitle = $oxcakmak->cleanString($_POST['threadTitle']);
		$threadPicture = $oxcakmak->cleanString($_POST['threadPicture']);
		$threadContent = $_POST['threadContent'];
		$threadDescription = $oxcakmak->cleanString($_POST['threadDescription']);
		$threadKeyword = $oxcakmak->cleanString($_POST['threadKeyword']);
		$threadOwner = USER_USERNAME;
		$threadDate = $oxcakmak->getTime();
		$threadSlug = $oxcakmak->slugify($threadTitle);
		if(empty($threadTitle) || empty($threadPicture) || empty($threadContent) || empty($threadDescription) || empty($threadKeyword)){
			echo "space";
		}else{
			$dbh->where("thread_slug", $threadSlug);
			if($dbh->has("thread")){
				echo "exists";
			}else{
				$threadInsertData = [
					"thread_slug" => $threadSlug,
					"thread_picture" => $threadPicture,
					"thread_title" => $threadTitle,
					"thread_content" => $threadContent,
					"thread_description" => $threadDescription,
					"thread_keyword" => $threadKeyword,
					"thread_owner" => $threadOwner,
					"thread_date" => $threadDate
				];
				$queryInsertThread = $dbh->insert('thread', $threadInsertData);
				if ($queryInsertThread) {
					echo "success";
				} else {
					echo "failed";
				}
			}
		}
	}
	
	/* Update Thread Action */
	if(isset($_POST['actionUpdateThread'])){
		$threadLastSlug = $oxcakmak->cleanString($_POST['threadLastSlug']);
		$threadTitle = $oxcakmak->cleanString($_POST['threadTitle']);
		$threadPicture = $oxcakmak->cleanString($_POST['threadPicture']);
		$threadContent = $_POST['threadContent'];
		$threadDescription = $oxcakmak->cleanString($_POST['threadDescription']);
		$threadKeyword = $oxcakmak->cleanString($_POST['threadKeyword']);
		$threadNewSlug = $oxcakmak->slugify($threadTitle);
		if(empty($threadTitle) || empty($threadPicture) || empty($threadContent) || empty($threadDescription) || empty($threadKeyword)){
			echo "space";
		}else{
			$dbh->where("thread_slug", $threadLastSlug);
			if($dbh->has("thread")){
				$threadUpdateData = [
					"thread_slug" => $threadNewSlug,
					"thread_picture" => $threadPicture,
					"thread_title" => $threadTitle,
					"thread_content" => $threadContent,
					"thread_description" => $threadDescription,
					"thread_keyword" => $threadKeyword
				];
				$dbh->where('thread_slug', $threadLastSlug);
				$updateThread = $dbh->update('thread', $threadUpdateData);
				if ($updateThread) {
					echo "success";
				} else {
					echo "failed";
				}
			}else{
				echo "not_exists";
			}
		}
	}
	
	/* Delete Thread Action */
	if(isset($_POST['actionRemoveThread'])){
		$threadSlug = $oxcakmak->cleanString($_POST['slug']);
		$dbh->where("thread_slug", $threadSlug);
		if($dbh->has("thread")){
			$dbh->where('thread_slug', $threadSlug);
			if(!$dbh->delete('thread')){ echo 'success'; }else{ echo 'failed'; }
		}else{
			echo "not_found";
		}
	}
	
	/* Add Category Action */
	if(isset($_POST['actionAddCategory'])){
		$categoryTitle = $oxcakmak->cleanString($_POST['categoryTitle']);
		$categorySlug = $oxcakmak->slugify($categoryTitle);
		$dbh->where("category_slug", $categorySlug);
		if(empty($categoryTitle)){
			echo "space";
		}else{
			if($dbh->has("category")){
				echo "exists";
			}else{
				$categoryInsertData = [
					"category_slug" => $categorySlug,
					"category_title" => $categoryTitle
				];
				$queryInsertCategory = $dbh->insert('category', $categoryInsertData);
				if ($queryInsertCategory) {
					echo "success";
				} else {
					echo "failed";
				}
			}
		}
	}
	
	/* Delete Category Action */
	if(isset($_POST['actionDeleteCategory'])){
		$categorySlug = $oxcakmak->cleanString($_POST['categorySlug']);
		$dbh->where("category_slug", $categorySlug);
		if($dbh->has("category")){
			$dbh->where('category_slug', $categorySlug);
			if(!$dbh->delete('category')){ echo 'success'; }else{ echo 'failed'; }
		}else{
			echo "not_found";
		}
	}
	
	/* Add Team Person Action */
	if(isset($_POST['actionAddTeamPerson'])){
		$teamPersonPicture = $oxcakmak->cleanString($_POST['teamPersonPicture']);
		$teamPersonFullname = $oxcakmak->cleanString($_POST['teamPersonFullname']);
		$teamPersonJob = $oxcakmak->cleanString($_POST['teamPersonJob']);
		$teamPersonHash = $oxcakmak->hashPassword($teamPersonFullname."-".$teamPersonJob);
		$dbh->where("team_hash", $teamPersonHash);
		if(empty($teamPersonPicture) || empty($teamPersonFullname) || empty($teamPersonJob)){
			echo "space";
		}else{
			if($dbh->has("team")){
				echo "exists";
			}else{
				$teamInsertData = [
					"team_hash" => $teamPersonHash,
					"team_picture" => $teamPersonPicture,
					"team_fullname" => $teamPersonFullname,
					"team_job" => $teamPersonJob
				];
				$queryInsertTeam = $dbh->insert('team', $teamInsertData);
				if ($queryInsertTeam) {
					echo "success";
				} else {
					echo "failed";
				}
			}
		}
	}
	
	/* Delete Team Person Action */
	if(isset($_POST['actionDeleteTeamPerson'])){
		$teamPersonHash = $oxcakmak->cleanString($_POST['teamPersonHash']);
		$dbh->where("team_hash", $teamPersonHash);
		if($dbh->has("team")){
			$dbh->where('team_hash', $teamPersonHash);
			if(!$dbh->delete('team')){ echo 'success'; }else{ echo 'failed'; }
		}else{
			echo "not_found";
		}
	}
	
	/* Add Client Action */
	if(isset($_POST['actionAddClient'])){
		$clientPicture = $oxcakmak->cleanString($_POST['clientPicture']);
		$clientTitle = $oxcakmak->cleanString($_POST['clientTitle']);
		$clientHash = $oxcakmak->hashPassword($clientTitle);
		$dbh->where("client_hash", $clientHash);
		if(empty($clientPicture) || empty($clientTitle)){
			echo "space";
		}else{
			if($dbh->has("client")){
				echo "exists";
			}else{
				$clientInsertData = [
					"client_hash" => $clientHash,
					"client_picture" => $clientPicture,
					"client_title" => $clientTitle
				];
				$queryInsertClient = $dbh->insert('client', $clientInsertData);
				if ($queryInsertClient) {
					echo "success";
				} else {
					echo "failed";
				}
			}
		}
	}
	
	/* Delete Client Action */
	if(isset($_POST['actionDeleteClient'])){
		$clientHash = $oxcakmak->cleanString($_POST['clientHash']);
		$dbh->where("client_hash", $clientHash);
		if($dbh->has("client")){
			$dbh->where('client_hash', $clientHash);
			if(!$dbh->delete('client')){ echo 'success'; }else{ echo 'failed'; }
		}else{
			echo "not_found";
		}
	}
	
	/* Add Portfolio Action */
	if(isset($_POST['actionAddPortfolio'])){
		$portfolioPicture = $oxcakmak->cleanString($_POST['portfolioPicture']);
		$portfolioTitle = $oxcakmak->cleanString($_POST['portfolioTitle']);
		$portfolioCategory = $oxcakmak->cleanString($_POST['portfolioCategory']);
		$portfolioHash = $oxcakmak->hashPassword($portfolioTitle);
		$dbh->where("portfolio_hash", $portfolioHash);
		if(empty($portfolioPicture) || empty($portfolioTitle) || empty($portfolioCategory)){
			echo "space";
		}else{
			if($dbh->has("portfolio")){
				echo "exists";
			}else{
				$portfolioInsertData = [
					"portfolio_hash" => $portfolioHash,
					"portfolio_picture" => $portfolioPicture,
					"portfolio_title" => $portfolioTitle,
					"portfolio_category" => $portfolioCategory
				];
				$queryInsertPortfolio = $dbh->insert('portfolio', $portfolioInsertData);
				if ($queryInsertPortfolio) {
					echo "success";
				} else {
					echo "failed";
				}
			}
		}
	}
	
	/* Delete Portfolio Action */
	if(isset($_POST['actionDeletePortfolio'])){
		$portfolioHash = $oxcakmak->cleanString($_POST['portfolioHash']);
		$dbh->where("portfolio_hash", $portfolioHash);
		if($dbh->has("portfolio")){
			$dbh->where('portfolio_hash', $portfolioHash);
			if(!$dbh->delete('portfolio')){ echo 'success'; }else{ echo 'failed'; }
		}else{
			echo "not_found";
		}
	}
	
	/* Add Counter Action */	
	if(isset($_POST['actionAddCounter'])){
		$counterIcon = $oxcakmak->cleanString($_POST['counterIcon']);
		$counterNumber = $oxcakmak->cleanString($_POST['counterNumber']);
		$counterTitle = $oxcakmak->cleanString($_POST['counterTitle']);
		$counterHash = $oxcakmak->hashPassword($counterTitle);
		if(empty($counterIcon) || empty($counterNumber) || empty($counterTitle)){
			echo "space";
		}else{
			$dbh->where("counter_hash", $counterHash);
			if($dbh->has("counter")){
				echo "exists";
			}else{
				$counterInsertData = [
					"counter_hash" => $counterHash,
					"counter_icon" => $counterIcon,
					"counter_number" => $counterNumber,
					"counter_title" => $counterTitle
				];
				$queryInsertCounter = $dbh->insert('counter', $counterInsertData);
				if ($queryInsertCounter) {
					echo "success";
				} else {
					echo "failed";
				}
			}
		}
	}
	
	/* Update Counter Action */
	if(isset($_POST['actionUpdateCounter'])){
		$counterIcon = $oxcakmak->cleanString($_POST['counterIcon']);
		$counterNumber = $oxcakmak->cleanString($_POST['counterNumber']);
		$counterTitle = $oxcakmak->cleanString($_POST['counterTitle']);
		$counterHash = $oxcakmak->cleanString($_POST['counterHash']);
		if(empty($counterIcon) || empty($counterNumber) || empty($counterTitle)){
			echo "space";
		}else{
			$dbh->where("counter_hash", $counterHash);
			if($dbh->has("counter")){
				$counterUpdateData = [
					"counter_icon" => $counterIcon,
					"counter_number" => $counterNumber,
					"counter_title" => $counterTitle
				];
				$dbh->where('counter_hash', $counterHash);
				$updateCounter = $dbh->update('counter', $counterUpdateData);
				if ($updateCounter) {
					echo "success";
				} else {
					echo "failed";
				}
			}else{
				echo "not_exists";
			}
		}
	}
	
	/* Delete Counter Action */
	if(isset($_POST['actionDeleteCounter'])){
		$counterHash = $oxcakmak->cleanString($_POST['counterHash']);
		$dbh->where("counter_hash", $counterHash);
		if($dbh->has("counter")){
			$dbh->where('counter_hash', $counterHash);
			if(!$dbh->delete('counter')){ echo 'success'; }else{ echo 'failed'; }
		}else{
			echo "not_found";
		}
	}
	
	/* Update Password Action */
	if(isset($_POST['actionUpdatePassword'])){
		$userLastPassword = $oxcakmak->cleanString($_POST['userLastPassword']);
		$userNewPassword = $oxcakmak->cleanString($_POST['userNewPassword']);
		$userNewRePassword = $oxcakmak->cleanString($_POST['userNewRePassword']);
		$userLastPasswordHashed = $oxcakmak->hashPassword($userLastPassword);
		$userNewPasswordHashed = $oxcakmak->hashPassword($userNewPassword);
		$userNewRePasswordHashed = $oxcakmak->hashPassword($userNewRePassword);
		if(empty($userLastPassword) || empty($userNewPassword) || empty($userNewRePassword)){
			echo "space";
		}else{
			if($userLastPasswordHashed==USER_PASSWORD){
				if(strlen($userNewPassword) < MIN_CHAR_PASSWORD){
					echo "min_char_new_password";
				}else{
					if(strlen($userNewRePassword) < MIN_CHAR_PASSWORD){
						echo "min_char_new_repassword";
					}else{
						/*
						$phpMail = new PHPMailer();
						$phpMail->Host = ST_MAIL_TYPE.".".ST_MAIL_SITE;
						$phpMail->SMTPAuth = true;
						$phpMail->Username = ST_MAIL_SENDER;
						$phpMail->Password = $config['mail_password'];
						$phpMail->IsSMTP();
						$phpMail->IsHTML(true);
						$phpMail->AddAddress($queryForgotCheckUser['user_email']);
						$phpMail->From = ST_MAIL_SENDER;
						$phpMail->FromName = $lang['label_update_password_mail_title'];
						$phpMail->CharSet = "UTF-8";;
						$phpMail->Subject = STUCK;
						$phpMailContent = '<p>'.$lang['label_mail_template_hi'].'&nbsp;<b>'.$queryForgotCheckUser['user_username'].'!</b></p><br /><br /><p>'.$lang['label_update_password_mail_content'].'<br>'.str_replace("%address", $oxcakmak->getIPAddress(), str_replace("%date%", $oxcakmak->getTime(), $lang['label_mail_last_address_and_date'])).'</p><br /><br />'.$lang['label_mail_dont_do_this'];
						$phpMail->MsgHTML($phpMailContent);
						if($phpMail->Send()) {
							$data = [
								"user_password" => $userNewPasswordHashed
							];
							$dbh->where('user_username', USER_USERNAME);
							$updateUserPassword = $dbh->update('user', $data);
							if ($updateUserPassword) {
								echo "success";
							} else {
								echo "failed";
							}
						}else{
							echo "failed";
						}
						*/
						$data = [
							"user_password" => $userNewPasswordHashed
						];
						$dbh->where('user_username', USER_USERNAME);
						$updateUserPassword = $dbh->update('user', $data);
						if ($updateUserPassword) {
							echo "success";
						} else {
							echo "failed";
						}
					}
				}
			}else{
				echo "not_match_last_password";
			}
		}
	}
	
	/* Send Verification Mail Action */
	if(isset($_POST['actionVerificationMail'])){
		$phpMail = new PHPMailer();
		$phpMail->Host = ST_MAIL_TYPE.".".ST_MAIL_SITE;
		$phpMail->SMTPAuth = true;
		$phpMail->Username = ST_MAIL_SENDER;
		$phpMail->Password = ST_MAIL_PASSWORD;
		$phpMail->IsSMTP();
		$phpMail->IsHTML(true);
		$phpMail->AddAddress(USER_EMAIL);
		$phpMail->From = ST_MAIL_SENDER;
		$phpMail->FromName = $lang['label_update_password_mail_title'];
		$phpMail->CharSet = CHARSET;
		$phpMail->Subject = STUCK;
		$phpMailContent = '<p>'.$lang['label_mail_template_hi'].'&nbsp;<b>'.USER_USERNAME.'!</b></p><br /><br /><p>'.$lang['label_update_password_mail_content'].'<br>'.str_replace("%address", $oxcakmak->getIPAddress(), str_replace("%date%", $oxcakmak->getTime(), $lang['label_mail_last_address_and_date'])).'</p><br /><br />'.$lang['label_mail_dont_do_this'];
		$phpMail->MsgHTML($phpMailContent);
		if($phpMail->Send()) {
			echo "success";
		}else{
			echo "failed";
		}
	}
	
	
	
}

}else{ /* Session If Not Exists */

	/* Login Action */
	if(isset($_POST['actionLogin'])){
		$user = strtolower($oxcakmak->cleanString($_POST['user']));
		$password = $oxcakmak->hashPassword($_POST['password']);
		if(empty($user) || empty($_POST['password'])){
			echo "space";
		}else{
			if(@$oxcakmak->verifyMail($user)){
				$dbh->where("user_email", $user);
			}else{
				$dbh->where("user_username", $user);
			}
			$queryLoginCheckUserRow = $dbh->getOne("user");
			if($queryLoginCheckUserRow['user_username']){
				if($password == $queryLoginCheckUserRow['user_password']){
					if($queryLoginCheckUserRow['user_status']==0){
						echo "banned";
					}else{
						$data = [
							"user_last_address" => $oxcakmak->getIPAddress(),
							"user_last_date" => $oxcakmak->getTime(),
						];
						$dbh->where('user_username', $queryLoginCheckUserRow['user_username']);
						$dbh->update('user', $data);
						$_SESSION['user_session'] = true;
						$_SESSION['user_username'] = $queryLoginCheckUserRow['user_username'];
						echo "success";
					}
				}else{
					echo "password_incorrect";
				}
			}else{
				echo "not_found";
			}
		}
	}
	
if(DEMO_MODE == 0){
	
	/* Forgot Action */
	if(isset($_POST['actionForgot'])){
		$user = strtolower($oxcakmak->cleanString($_POST['user']));
		if(empty($user)){
			echo "space";
		}else{
			if(@$oxcakmak->verifyMail($user)){
				$dbh->where("user_email", $user);
				$queryForgotCheckUser = $dbh->getOne("user");
			}else{
				$dbh->where("user_username", $user);
				$queryForgotCheckUser = $dbh->getOne("user");
			}
			if($queryForgotCheckUser){
				$phpMail = new PHPMailer();
				$phpMail->Host = ST_MAIL_TYPE.".".ST_MAIL_SITE;
				$phpMail->SMTPAuth = true;
				$phpMail->Username = ST_MAIL_SENDER;
				$phpMail->Password = $config['mail_password'];
				$phpMail->IsSMTP();
				$phpMail->IsHTML(true);
				$phpMail->AddAddress($queryForgotCheckUser['user_email']);
				$phpMail->From = ST_MAIL_SENDER;
				$phpMail->FromName = $lang['label_forgot_request_mail_template_header'];
				$phpMail->CharSet = "UTF-8";;
				$phpMail->Subject = STUCK;
				$phpMailContent = '<p>'.$lang['label_mail_template_hi'].'&nbsp;<b>'.$queryForgotCheckUser['user_username'].'!</b></p>'.str_replace("%link%", BASE_URL."/panel/reset/".$queryForgotCheckUser['user_key'], str_replace("%href%", "".BASE_URL."/panel/reset/".$queryForgotCheckUser['user_key'], $lang['label_forgot_request_mail_template_content'])).'<br /><br />'.$lang['label_forgot_request_mail_template_content_us_know'];
				$phpMail->MsgHTML($phpMailContent);
				if($phpMail->Send()) {
					echo "success_".$queryForgotCheckUser['user_email'];
				}else{
					echo "failed";
				}
			}else{
				echo "not_found";
			}
		}
	}
	
	/* Reset Action */
	if(isset($_POST['actionReset'])){
		$userNewPassword = $oxcakmak->cleanString($_POST['userNewPassword']);
		$userNewRePassword = $oxcakmak->cleanString($_POST['userNewRePassword']);
		$userNewPasswordHashed = $oxcakmak->hashPassword($_POST['userNewPassword']);
		$userNewRePasswordHashed = $oxcakmak->hashPassword($_POST['userNewRePassword']);
		$userKey = $oxcakmak->cleanString($_POST['userKey']);
		if(empty($userNewPassword) || empty($userNewRePassword)){
			echo "space";
		}else{
			if(strlen($userNewPassword) < MIN_CHAR_PASSWORD){
				echo "min_char_password";
			}else{
				if(strlen($userNewRePassword) < MIN_CHAR_PASSWORD){
					echo "min_char_password";
				}else{
					if($userNewPasswordHashed == $userNewRePasswordHashed){
						$dbh->where('user_key', $userKey);
						$queryCheckUserAPIRow = $dbh->getOne("user");
						if($queryCheckUserAPIRow['user_key']){
							if($userKey == $queryCheckUserAPIRow['user_key']){
								$dataUserStatus = [
									"user_password" => $userNewPasswordHashed,
									"user_new_key" => $oxcakmak->specificMD5($queryCheckUserAPIRow['user_username'], 25)
								];
								$dbh->where('user_last_key', $userKey);
								$queryUpdateUserAPIForPassword = $dbh->update('user', $dataUserStatus);
								echo "success";
							}else{
								echo "not_found_or_error";
							}
						}else{
							echo "not_found_or_error";
						}
					}else{
						echo "not_equal";
					}
				}
			}
		}
	}
	
}
	
}
if(DEMO_MODE == 0){
	/*
	*******************
	*** Normal Area ***
	*******************
	*/

	/* Verification Action */
	if(isset($_POST['actionVerification'])){
		$userKey = $oxcakmak->cleanString($_POST['userKey']);
		$dbh->where("user_key", $userKey);
		$queryFetchUserByKeyRow = $dbh->getOne("user");
		if($userKey == $queryFetchUserByKeyRow['user_key']){
			$dataUserKey = [
				"user_status" => 1,
				"user_key" => $oxcakmak->specificMD5($queryFetchUserByKeyRow['user_username']."-user_key", 30)
			];
			$dbh->where('user_username', $queryFetchUserByKeyRow['user_username']);
			$queryUpdateUserKey = $dbh->update('user', $dataUserKey);
			echo "success";
		}else{
			echo "failed";
		}
	}
	
}
?>