<?php
include("panel-inc-header.php");
if(USER_STATUS == 0){ $oxcakmak->redirect("panel/banned"); }
$oxcakmak->metaTitle($lang['menu_panel'], STUCK);
include("panel-inc-menu.php");
$oxcakmak->checkSessionNotLogged();
echo '
<!--Main Content-->
<div class="main-content px-0 app-content">
	<div class="container-fluid">

<!--Page Header-->
		<div class="page-header">
			<h3 class="page-title">'.$lang['menu_panel'].'</h3>
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['menu_panel'].'</a></li>
				<li class="breadcrumb-item active" aria-current="page">'.$lang['menu_panel'].'</li>
			</ol>
		</div>
		<!--Page Header-->
		<div class="row row-sm">
			<div class="col-lg-12">
				<div class="card mg-b-20 rounded mb-4">
					<div class="card-body">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Main Content-->
';
include("panel-inc-footer.php");
include("inc-end.php");
?>