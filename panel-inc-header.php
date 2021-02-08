<?php
require_once("config.php");
$baseAddress = BASE_URL;
if(DISPLAY_ERRORS == 1){
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}else{
	error_reporting(0);
}
echo '
<!DOCTYPE html><html><head><base href="'.BASE_URL.'" /><meta charset="utf-8"><meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

		<!-- Favicon -->
		<link rel="icon" href="'.BASE_URL.'assets/panel/img/oxcakmak_favicon.png" type="image/x-icon"/>

		<!-- Font Awesome -->
		<link href="'.BASE_URL.'assets/panel/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">

		<!-- Bootstrap -->
		<link href="'.BASE_URL.'assets/panel/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Sidebar css -->
		<link href="'.BASE_URL.'assets/panel/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!-- Side menu css-->
		<link href="'.BASE_URL.'assets/panel/plugins/sidemenu/sidemenu.css" rel="stylesheet">

		<!-- Custom Scroll bar-->
		<link href="'.BASE_URL.'assets/panel/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

		<!-- Prism Css -->
		<link href="'.BASE_URL.'assets/panel/plugins/prism/prism.css" rel="stylesheet">

		<!-- Style Css-->
		<link href="'.BASE_URL.'assets/panel/css/dashboard-one.css" rel="stylesheet">

		<!-- Icon Style -->
		<link href="'.BASE_URL.'assets/panel/css/icons.css" rel="stylesheet">
		
		<!-- Toast Css-->
		<link href="'.BASE_URL.'assets/panel/plugins/toast/css/jquery.toast.css" rel="stylesheet">
';
?>