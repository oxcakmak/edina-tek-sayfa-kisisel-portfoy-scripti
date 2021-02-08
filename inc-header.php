<?php
require_once('config.php');
echo '
<!DOCTYPE html>
<html>
<head>
    <!--meta tags-->
    <meta charset="utf-8">
	<base href="'.BASE_URL.'" />
	<link rel="canonical" href="'.BASE_URL.'"/>
	'; $oxcakmak->metaLanguage("tr"); echo '
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- STYLES -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="'.BASE_URL.'assets/index/css/plugins.css" />
	<link rel="stylesheet" type="text/css" href="'.BASE_URL.'assets/index/css/style.css" />
	<link rel="stylesheet" type="text/css" href="'.BASE_URL.'assets/index/css/font-awesome.min.css" />
	<!--[if lt IE 9]> <script type="text/javascript" src="'.BASE_URL.'assets/index/js/modernizr.custom.js"></script> <![endif]-->
	<!-- /STYLES -->
';
?>