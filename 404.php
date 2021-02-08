<?php
include("panel-inc-header.php");
$oxcakmak->metaTitle($lang['label_not_found_title'], STUCK);
echo '
<!--Main Error Wrapper-->
<div class="page h-100">
	<div class="main-error-wrapper">
		<h1>404</h1>
		<h2>'.$lang['label_not_found_title'].'</h2>
		<h6>'.$lang['label_not_found_description'].'</h6>
		<a class="btn btn-primary" href="'.BASE_URL.'">'.$lang['label_home'].'</a>
	</div>
</div>
<!--Main Error Wrapper-->
';
include("panel-inc-footer.php");
include("inc-end.php");
?>