<?php
include("panel-inc-header.php");
$oxcakmak->metaRobots(0);
$oxcakmak->metaTitle($lang['menu_blog_new_post'], STUCK);
include("panel-inc-menu.php");
if(USER_STATUS == 0){ $oxcakmak->redirect("panel/banned"); }
$oxcakmak->checkSessionNotLogged();
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
				<li class="breadcrumb-item active" aria-current="page">'.$lang['menu_blog_new_post'].'</li>
			</ol>
		</div>
		<!--Page Header-->

		<div class="row">
			
			<div class="col-lg-8 mb-2">
				<div class="main-content-body d-flex flex-column">
					<div class="card p-4">
						<textarea class="form-control rounded" rows="16" id="threadContent"></textarea>
					</div>
				</div>
			</div>
			
			<div class="col-lg-4">
				<div class="main-content-body d-flex flex-column">
					<div class="card pt-4 pl-4 pr-4 pb-1">
						<div class="form-group">
							<span>'.$lang['label_title'].'</span>
							<input class="form-control rounded" placeholder="'.$lang['label_title'].'" type="text" id="threadTitle" maxlength="80">
						</div>
						<div class="form-group">
							<span>'.$lang['label_thumbnail'].'</span>
							<input class="form-control rounded" placeholder="'.$lang['label_image'].' (assets/media/blog/image.png)" type="text" id="threadPicture" maxlength="100">
						</div>
						<div class="form-group">
							<span>'.$lang['label_description'].'</span>
							<textarea class="form-control rounded" placeholder="'.$lang['label_description'].'" type="text" rows="3" id="threadDescription" maxlength="160"></textarea>
						</div>
						<div class="form-group">
							<span>'.$lang['label_keywords'].'</span>
							<input class="form-control rounded" placeholder="'.$lang['label_keywords'].'" type="text" id="threadKeyword" maxlength="250" rows="3">
						</div>
						<div class="form-group"><button class="btn btn-success btn-lg btn-block" id="actionAddThread">'.$lang['button_publish'].'</button></div>
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
$("#actionAddThread").click(function(e){
	e.preventDefault();
	$("#actionAddThread").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {threadPicture:$("#threadPicture").val(), threadTitle:$("#threadTitle").val(), threadContent:CKEDITOR.instances.threadContent.getData(), threadDescription:$("#threadDescription").val(), threadKeyword:$("#threadKeyword").val(), actionAddThread:"actionAddThread"},
		success: function(response){
			if($.trim(response) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionAddThread").attr("disabled", false);
			}else if($.trim(response) == "exists"){
				shortToast("'.$lang['message_thread_add_exists'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionAddThread").attr("disabled", false);
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_thread_add_success'].'", "'.$lang['label_alert_title_success'].'", "success");
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