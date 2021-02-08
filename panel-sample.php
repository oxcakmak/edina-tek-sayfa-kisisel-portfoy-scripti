<?php
include("panel-inc-header.php");
$oxcakmak->metaTitle($lang['menu_support'], $config['stuck']);
include("panel-inc-menu.php");
$oxcakmak->checkSessionNotLogged();
echo '
<!--Main Content-->
<div class="main-content px-0 app-content">
	<div class="container-fluid">

		<!--Page Header-->
		<div class="page-header">
			<h3 class="page-title">'.$lang['menu_support'].'</h3>
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item"><a href="'.BASE_URL.'">'.$lang['menu_panel'].'</a></li>
				<li class="breadcrumb-item active" aria-current="page">'.$lang['menu_support'].'</li>
			</ol>
		</div>
		<!--Page Header-->

		<div class="row">
			<div class="col-lg-12">
				<div class="main-content-body d-flex flex-column">

					<div class="card p-4">
						<a class="d-flex text-dark tx-14 main-content-label mb-0" href="#"><i class="fas fa-plus-circle mr-2 text-primary"></i> <div>Add New Widget/Add New Element</div></a>
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