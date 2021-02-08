<?php
@ob_start();
@session_start();
date_default_timezone_set('Europe/Istanbul');
require_once('PDODb.php');
$dbh = new PDODb([
	'type' => 'mysql',
	'host' => 'localhost',
	'username' => 'oxcakma1_oxcakmak', 
	'password' => '#SFG?A_~*S^Q@}2&+z',
	'dbname'=> 'oxcakma1_edina',
	'charset' => 'utf8'
]);
define("BASE_URL", "https://demo.oxcakmak.com/edina/"); //Website Address (Ex.: https://example.com/)
define("LANGUAGE", "tr_TR");
define("STUCK", "Edina");
define("DISPLAY_ERRORS", 1);
define("MIN_CHAR_USERNAME", 3);
define("MIN_CHAR_PASSWORD", 5);
define("CONSTANT_MONEY_TO_NUMBER", 1000);
define("DEMO_MODE", 1);
include("lang/".LANGUAGE.".php");
include("function.oxcakmak.lib.php");
$oxcakmak = new oxcakmak;
$dbh->where("user_username", @$_SESSION['user_username']);
$queryFetchUserInfoRow = $dbh->getOne("user");
define("USER_ID", $queryFetchUserInfoRow['user_id']);
define("USER_PICTURE", $queryFetchUserInfoRow['user_picture']);
define("USER_FIRSTNAME", $queryFetchUserInfoRow['user_firstname']);
define("USER_LASTNAME", $queryFetchUserInfoRow['user_lastname']);
define("USER_USERNAME", $queryFetchUserInfoRow['user_username']);
define("USER_EMAIL", $queryFetchUserInfoRow['user_email']);
define("USER_PASSWORD", $queryFetchUserInfoRow['user_password']);
define("USER_STATUS", $queryFetchUserInfoRow['user_status']);
define("USER_KEY", $queryFetchUserInfoRow['user_key']);
define("USER_REGISTER_ADDRESS", $queryFetchUserInfoRow['user_register_address']);
define("USER_REGISTER_DATE", $queryFetchUserInfoRow['user_register_date']);
define("USER_LAST_ADDRESS", $queryFetchUserInfoRow['user_last_address']);
define("USER_LAST_DATE", $queryFetchUserInfoRow['user_last_date']);
$qSRow = $dbh->getOne("setting");
define("ST_ID", $qSRow["setting_id"]);
define("ST_HOME_TITLE", $qSRow["setting_home_title"]);
define("ST_HOME_DESCRIPTION", $qSRow["setting_home_description"]);
define("ST_HOME_KEYWORD", $qSRow["setting_home_keyword"]);
define("ST_LOGO", $qSRow["setting_logo"]);
define("ST_ABOUT_NAME", $qSRow["setting_about_name"]);
define("ST_ABOUT_DESCRIPTION", $qSRow["setting_about_description"]);
define("ST_ABOUT_IMG", $qSRow["setting_about_image"]);
define("ST_FOOTER_COPYRIGHT_TEXT", $qSRow["setting_footer_copyright_text"]);
define("ST_SM_FACEBOOK", $qSRow["setting_sm_facebook"]);
define("ST_SM_TWITTER", $qSRow["setting_sm_twitter"]);
define("ST_SM_INSTAGRAM", $qSRow["setting_sm_instagram"]);
define("ST_SM_LINKEDIN", $qSRow["setting_sm_linkedin"]);
define("ST_SM_BEHANCE", $qSRow["setting_sm_behance"]);
define("ST_SM_GITHUB", $qSRow["setting_sm_github"]);
define("ST_META_GOOGLE_SITE_VERIFICATION", $qSRow["setting_meta_google_site_verification"]);
define("ST_META_GOOGLE_ANALYTICS", $qSRow["setting_meta_google_analytics"]);
define("ST_META_GOOGLE_ADSENSE", $qSRow["setting_meta_google_adsense"]);
define("ST_MAIL_TYPE", $qSRow["setting_mail_type"]);
define("ST_MAIL_SENDER", $qSRow["setting_mail_sender"]);
define("ST_MAIL_PASSWORD", $qSRow["setting_mail_password"]);
define("ST_MAIL_SITE", $qSRow["setting_mail_site"]);
define("ST_BG", $qSRow["setting_background"]);
define("ST_BG_TESTIMONIAL", $qSRow["setting_background_testimonial"]);
define("ST_BG_PARTNERS", $qSRow["setting_background_partners"]);
define("ST_BG_LEFTBOX", $qSRow["setting_background_leftbox"]);
define("ST_BG_AUTHOR", $qSRow["setting_background_author"]);
?>