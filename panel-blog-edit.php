<?php
include("panel-inc-header.php");
$oxcakmak->metaRobots(0);
$threadSlug = $oxcakmak->cleanString($_GET['thread']);
$dbh->where("thread_slug", $threadSlug);
$tRow = $dbh->getOne("thread");
$oxcakmak->metaTitle($tRow['thread_title']." | ".$lang['menu_blog_edit_post'], STUCK);
include("panel-inc-menu.php");
$oxcakmak->checkSessionNotLogged();
if(empty($tRow['thread_slug']) || empty($threadSlug)){ $oxcakmak->redirect("blog"); }
echo '
<!-- select2.min css -->
<link href="'.BASE_URL.'assets/panel/plugins/bootstrap-tokenfield/css/bootstrap-tokenfield.min.css" rel="stylesheet">

<!--Main Content-->
<div class="main-content px-0 app-content">
	<div class="container-fluid">

<!--Page Header-->
		<div class="page-header">
			<h3 class="page-title">'.$lang['menu_blog_new_post'].'</h3>
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['menu_panel'].'</a></li>
				<li class="breadcrumb-item active" aria-current="page">'.$lang['menu_blog_edit_post'].'</li>
			</ol>
		</div>
		<!--Page Header-->

		<div class="row">
			
			<div class="col-lg-8 mb-4">
				<div class="main-content-body d-flex flex-column">
					<div class="card p-4">
						<textarea class="form-control rounded" rows="16" id="threadContent">'.$tRow['thread_content'].'</textarea>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="main-content-body d-flex flex-column">
					<div class="card pt-4 pl-4 pr-4 pb-1">
						<div class="form-group">
							<span>'.$lang['label_title'].'</span>
							<input class="form-control rounded" placeholder="'.$lang['label_title'].'" type="text" id="threadTitle" maxlength="80" value="'.$tRow['thread_title'].'">
						</div>
						<div class="form-group">
							<span>'.$lang['label_thumbnail'].'</span>
							<input class="form-control rounded" placeholder="'.$lang['label_image'].' (assets/media/blog/image.png)" type="text" id="threadPicture" maxlength="100" value="'.$tRow['thread_picture'].'">
						</div>
						<div class="form-group">
							<span>'.$lang['label_description'].'</span>
							<textarea class="form-control rounded" placeholder="'.$lang['label_description'].'" type="text" rows="3" id="threadDescription" maxlength="160">'.$tRow['thread_description'].'</textarea>
						</div>
						<div class="form-group">
							<span>'.$lang['label_keywords'].'</span>
							<input class="form-control rounded" placeholder="'.$lang['label_keywords'].'" type="text" id="threadKeyword" maxlength="250" rows="3" value="'.$tRow['thread_keyword'].'">
						</div>
						<div class="form-group"><button class="btn btn-success btn-lg btn-block" id="actionUpdateThread">'.$lang['button_update'].'</button></div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<!--Main Content-->
';
include("panel-inc-footer.php");
echo '
<!-- ckeditor js -->
<script src="'.BASE_URL.'assets/panel/plugins/ckeditor/ckeditor.js"></script>
<!-- select2.min js -->
<script src="'.BASE_URL.'assets/panel/plugins/bootstrap-tokenfield/js/bootstrap-tokenfield.min.js"></script>
<script>

CKEDITOR.replace("threadContent");
$("#threadKeyword").tokenfield();
$("#actionUpdateThread").click(function(e){
	e.preventDefault();
	$("#actionUpdateThread").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {threadLastSlug:"'.$tRow['thread_slug'].'", threadPicture:$("#threadPicture").val(), threadTitle:$("#threadTitle").val(), threadContent:CKEDITOR.instances.threadContent.getData(), threadDescription:$("#threadDescription").val(), threadKeyword:$("#threadKeyword").val(), actionUpdateThread:"actionUpdateThread"},
		success: function(response){
			if($.trim(response) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionUpdateThread").attr("disabled", false);
			}else if($.trim(response) == "not_exists"){
				shortToast("'.$lang['message_thread_edit_not_exists'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionUpdateThread").attr("disabled", false);
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_thread_edit_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				$("#threadTitle").val("");
				$("#threadPicture").val("");
				$("#threadContent").val("");
				$("#threadDescription").val("");
				$("#threadKeyword").val("");
				window.setTimeout(function(){
					window.location.href="'.BASE_URL.'panel/blog";
				}, 1000);
			}
		}
	});
});
</script>
';
include("inc-end.php");
?>