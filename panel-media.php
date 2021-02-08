<?php
include("panel-inc-header.php");
$oxcakmak->metaRobots(0);
$oxcakmak->metaTitle($lang['menu_media_management'], STUCK);
include("panel-inc-menu.php");
if(USER_STATUS == 0){ $oxcakmak->redirect("panel/banned"); }
$oxcakmak->checkSessionNotLogged();
$page = @intval($_GET['page']); if(!$page){ $page = 1; }
$totalDataCount = 0;
$totalDataCount = $dbh->getValue("media", "COUNT(*)");
$pageLimit = 20;
$pageNumber = ceil($totalDataCount/$pageLimit); if($page > $pageNumber){ $page = 1;}
$viewData = $page * $pageLimit - $pageLimit;
$viewPerPage = 5;
echo '
<style>
.custom-file-input:lang(en)~.custom-file-label::after {
	content: "'.$lang['label_browse'].'";
}
.custom-file-label::after {
	content: "'.$lang['label_browse'].'";
}
</style>
<!--Main Content-->
<div class="main-content px-0 app-content">
	<div class="container-fluid">

<!--Page Header-->
		<div class="page-header mb-0">
			<h3 class="page-title">'.$lang['menu_media_management'].'</h3>
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['menu_panel'].'</a></li>
				<li class="breadcrumb-item active" aria-current="page">'.$lang['menu_media_management'].'</li>
			</ol>
		</div>
		<!--Page Header-->
		<button class="btn btn-success rounded mb-4" style="cursor:pointer;" data-target="#editPicture" data-toggle="modal">'.$lang['label_choose_file'].'</button>
		<div class="modal" id="editPicture">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h6 class="modal-title">'.$lang['label_choose_file'].'</h6>
						<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>'.$lang['label_title'].'</label>
							<input class="form-control rounded" type="text" placeholder="'.$lang['label_title'].'" id="fileSpecificTitle" />
						</div>
						<div class="form-group">
							<label>'.$lang['label_category'].'</label>
							<select class="form-control rounded" id="fileCategory">
								<option value="" selected>'.$lang['label_select'].'</option>
								<option value="blog">'.$lang['label_blog'].'</option>
								<option value="service">'.$lang['label_service'].'</option>
								<option value="portfolio">'.$lang['label_portfolio'].'</option>
								<option value="testimonial">'.$lang['label_testimonial'].'</option>
								<option value="team">'.$lang['label_team'].'</option>
								<option value="client">'.$lang['label_client'].'</option>
								<option value="other">'.$lang['label_other'].'</option>
							</select>
						</div>
						<div class="form-group">
							<label>'.$lang['label_media_file'].'</label>
							<div class="custom-file">
								<input class="custom-file-input" id="filePicture" type="file" />
								<label class="custom-file-label" for="filePicture" id="filePictureStr">'.$lang['label_choose_file'].'</label>
							</div>
						</div>
					</div>
					<div class="modal-footer justify-content-right">
						<button class="btn btn-success" type="button" id="actionUploadMedia">'.$lang['button_send'].'</button>
						<button class="btn btn-danger" data-dismiss="modal" type="button">'.$lang['button_cancel'].'</button>
					</div>
				</div>
			</div>
		</div>
			
				<div class="list-unstyled">
					<div class="row" id="mediaList">
					';
						foreach($dbh->rawQuery('SELECT * FROM media ORDER BY media_id DESC LIMIT ?, ?', [$viewData, $pageLimit]) as $mediaRow){
							echo '
							<div class="col-sm-6 col-lg-3 mb-4">
								<div class="card p-0">
									<img alt="Image" src="'.BASE_URL.$mediaRow['media_fullname'].'" style="height:168px;">
									<div class="card-body p-1"><b>'.$lang['label_title'].'</b>:&nbsp;'.$mediaRow['media_title'].'<br><b>'.$lang['label_category'].'</b>:&nbsp;'; $fileCat = explode("_", $mediaRow['media_name'])[0]; if($fileCat == "blog"){ echo $lang['label_category_blog']; }else if($fileCat == "portfolio"){ echo $lang['label_portfolio']; }else if($fileCat == "product"){ echo $lang['label_category_product']; }else if($fileCat == "other"){ echo $lang['label_category_other']; }else{ echo $lang['label_category_other']; } echo '</div>
									<div class="card-footer bd-t tx-center p-0">
										<div class="row">
											<div class="col-sm-6 col-lg-6 p-0 pt-2 pb-2 pl-2" style="border-right: 1px solid #e9edf4;"><a class="tx-success tx-bold" href="'.BASE_URL.$mediaRow['media_fullname'].'" target="_blank">'.$lang['label_preview'].'</a></div>
											<div class="col-sm-6 col-lg-5 p-0 pt-2 pb-2 pl-2"><b class="tx-danger tx-bold removeMediaHref" onclick="removeMedia(\''.$mediaRow['media_hash'].'\')" style="cursor: pointer;">'.$lang['label_remove'].'</b></div>
										</div>
									</div>
								</div>
							</div>
							'; 
						}
					echo '
					</div>
					<br>
						<div class="row row-sm">
							<div class="dataTables_paginate">
								<ul class="pagination justify-content-center">
								';
								if($page > 1){ 
									echo '
									<li class="paginate_button page-item previous"><a href="'.BASE_URL.'panel/media?page=1" class="page-link"><i class="fa fa-angle-double-left"></i></a></li>
									<li class="paginate_button page-item"><a href="'.BASE_URL.'panel/media?page='.($page - 1).'" class="page-link"><i class="fa fa-angle-left"></i></a></li>
									';
								}
								for($i = $page - $viewPerPage; $i < $page + $viewPerPage +1; $i++){ 
									if($i > 0 && $i <= $pageNumber){
										if($i == $page){
											echo '<li class="paginate_button page-item active"><a href="'.BASE_URL.'panel/media?page='.$i.'" class="page-link">'.$i.'</a></li>';
										}else{
											echo '<li class="paginate_button page-item"><a href="'.BASE_URL.'panel/media?page='.$i.'" class="page-link">'.$i.'</a></li>';
										}
									}
								}
								if($page != $pageNumber){
									echo '
									<li class="paginate_button page-item"><a href="'.BASE_URL.'panel/media?page='.($page + 1).'" class="page-link"><i class="fa fa-angle-right"></i></a></li>
									<li class="paginate_button page-item next"><a href="'.BASE_URL.'panel/media?page='.$pageNumber.'" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
									';
								}
								echo '
								</ul>
							</div>
						</div>
				</div>
				
	</div>
</div>
<!--Main Content-->
';
include("panel-inc-footer.php");
echo '
<script>
$("#filePicture").change(function(e){
	var fileName = e.target.files[0].name;
	$("#filePictureStr").html(fileName);
});
$("#actionUploadMedia").click(function(e){
	e.preventDefault();
	var formData = new FormData();
	formData.append("fileSpecificTitle", $("#fileSpecificTitle").val());
	formData.append("fileCategory", $("#fileCategory").val());
	formData.append("filePicture", $("#filePicture").prop("files")[0]);
	formData.append("actionUploadMedia", "actionUploadMedia");
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		cache: false,
		contentType: false,
		processData: false,
		data: formData,
		success: function(result){
			if($.trim(result) == "success"){
				shortToast("'.$lang['message_fu_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				$("#filePictureStr").html("");
				$("#fileSpecificTitle").val("");
				$("#fileCategory").val("");
				setInterval(function(){ location.reload(); }, 1000);
			}else if($.trim(result) == "limit"){
				shortToast("'.$lang['message_fu_limit'].'", "'.$lang['label_alert_title_danger'].'", "error");
			}else if($.trim(result) == "extension"){
				shortToast("'.$lang['message_fu_extension'].'", "'.$lang['label_alert_title_danger'].'", "error");
			}
		}
	});
});
function removeMedia(hash){
	$("#removeMediaHref").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {mediaHash:hash, actionRemoveMedia:"actionRemoveMedia"},
		success: function(response){
			if($.trim(response) == "success"){
				shortToast("'.$lang['message_delete_media_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}else if($.trim(response) == "not_exists"){
				shortToast("'.$lang['message_delete_media_not_exists'].'", "'.$lang['label_alert_title_danger'].'", "error");
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}
		}
	});
}
</script>
';
include("inc-end.php");
?>