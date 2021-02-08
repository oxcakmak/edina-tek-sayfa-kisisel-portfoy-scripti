<?php
include("panel-inc-header.php");
$oxcakmak->metaTitle($lang['menu_testimonial'], STUCK);
include("panel-inc-menu.php");
if(USER_STATUS == 0){ $oxcakmak->redirect("panel/banned"); }
$oxcakmak->checkSessionNotLogged();
echo '
<!--Main Content-->
<div class="main-content px-0 app-content">
	<div class="container-fluid">

<!--Page Header-->
		<div class="page-header">
			<h3 class="page-title">'.$lang['menu_testimonial'].'</h3>
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['menu_panel'].'</a></li>
				<li class="breadcrumb-item active" aria-current="page">'.$lang['menu_testimonial'].'</li>
			</ol>
		</div>
		<!--Page Header-->

		<div class="row">
			<div class="col-lg-12">';
			$dbh->orderBy("testimonial_id", "ASC");
			$queryTestimonialList = $dbh->get("testimonial");
			echo '
				<div class="main-content-body d-flex flex-column">
				
					<div class="card p-4">
						<div><button class="btn btn-success mb-4" data-target="#addTestimonialItemModal" data-toggle="modal">'.$lang['label_create_new_testimonial_item'].'</button></div>
						<div class="modal" id="addTestimonialItemModal">
							<div class="modal-dialog modal-sm" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h6 class="modal-title">'.$lang['label_create_new_testimonial_item'].'</h6>
										<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_picture'].'</label>
											<input class="form-control rounded" type="text" placeholder="assets/upload/team/image.jpg" id="testimonial_picture" />
											<br>
											<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_fullname'].'</label>
											<input class="form-control rounded" type="text" placeholder="'.$lang['label_title'].'" id="testimonial_fullname" />
											<br>
											<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_job'].'</label>
											<input class="form-control rounded" type="text" placeholder="'.$lang['label_title'].'" id="testimonial_job" />
											<br>
											<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_description'].'</label>
											<textarea class="form-control rounded" rows="3" placeholder="'.$lang['label_description'].'" id="testimonial_comment" maxlength="250" /></textarea>
										</div>
									</div>
									<div class="modal-footer justify-content-right">
										<button class="btn btn-success" type="button" id="actionAddTestimonialItem">'.$lang['button_send'].'</button>
										<button class="btn btn-danger" data-dismiss="modal" type="button">'.$lang['button_cancel'].'</button>
									</div>
								</div>
							</div>
						</div>

						<div class="table-responsive">
							<table class="table table-bordered mg-b-0 text-md-nowrap">
								<thead>
									<tr>
										<th>ID</th>
										<th style="display:none;">'.$lang['table_icon'].'</th>
										<th>'.$lang['table_fullname'].'</th>
										<th>'.$lang['table_title'].'</th>
										<th>'.$lang['table_description'].'</th>
										<th>'.$lang['table_management'].'</th>
									</tr>
								</thead>
								<tbody>
								';
								$i=0;
								foreach($queryTestimonialList as $tRow){
									$i++;
									echo '
										<tr id="'.$tRow['testimonial_hash'].'">
											<th scope="row">'.$i.'</th>
											<td id="testimonialPicture" style="display:none;">'.$tRow['testimonial_picture'].'</td>
											<td id="testimonialFullname">'.$tRow['testimonial_fullname'].'</td>
											<td id="testimonialJob">'.$tRow['testimonial_job'].'</td>
											<td id="testimonialComment">'.$tRow['testimonial_comment'].'</td>
											<td><b class="edit" style="cursor:pointer;" data-target="#editTestimonialItemModal" data-toggle="modal id="edit" onclick="changeHash(\''.$tRow['testimonial_hash'].'\')" hash="'.$tRow['testimonial_hash'].'">'.$lang['label_edit'].'</b>&nbsp;/&nbsp;<b style="cursor:pointer;" onclick="deleteTestimonialItem(\''.$tRow['testimonial_hash'].'\');" id="delete">'.$lang['label_delete'].'</b></td>
										</tr>
									';
								}									
									echo '
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Main Content-->
<div class="modal" id="editTestimonialItemModal">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title">'.$lang['label_edit_testimonial_item'].'</h6>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_picture'].'</label>
					<input class="form-control rounded" type="text" placeholder="assets/upload/team/image.jpg" id="testimonial_picture_modal" />
					<br>
					<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_fullname'].'</label>
					<input class="form-control rounded" type="text" placeholder="'.$lang['label_title'].'" id="testimonial_fullname_modal" />
					<br>
					<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_job'].'</label>
					<input class="form-control rounded" type="text" placeholder="'.$lang['label_title'].'" id="testimonial_job_modal" />
					<br>
					<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_description'].'</label>
					<textarea class="form-control rounded" rows="3" placeholder="'.$lang['label_description'].'" id="testimonial_comment_modal" maxlength="250" /></textarea>
				</div>
			</div>
			<div class="modal-footer justify-content-right">
				<button class="btn btn-success" type="button" id="actionUpdateTestimonial">'.$lang['button_update'].'</button>
				<button class="btn btn-danger" data-dismiss="modal" type="button" id="cancelModal">'.$lang['button_cancel'].'</button>
			</div>
		</div>
	</div>
</div>
';
include("panel-inc-footer.php");
echo '

<script>
var lh = "";
function changeHash(hash){
	$("#testimonial_picture_modal").val($("tr[id^="+hash+"] > td[id=testimonialPicture]").text());
	$("#testimonial_fullname_modal").val($("tr[id^="+hash+"] > td[id=testimonialFullname]").text());
	$("#testimonial_job_modal").val($("tr[id^="+hash+"] > td[id=testimonialJob]").text());
	$("#testimonial_comment_modal").val($("tr[id^="+hash+"] > td[id=testimonialComment]").text());
	lh = hash;
	$("#editServiceItemModal").toggle();
}
/*
$("body .edit").click(function(){
	$("#testimonial_icon_modal").val($("tr[id^="+$("body .edit").attr("hash")+"] > td[id=testimonialIcon]").text());
	$("#testimonial_title_modal").val($("tr[id^="+$("body .edit").attr("hash")+"] > td[id=testimonialTitle]").text());
	$("#testimonial_description_modal").val($("tr[id^="+$("body .edit").attr("hash")+"] > td[id=testimonialDescription]").text());
	lh = $("body .edit").attr("hash");
	$("#editTestimonialItemModal").toggle();
});
*/
$("body #cancelModal").click(function(){
	$("#editTestimonialItemModal").toggle();
});
$("body .close").click(function(){
	$("#editTestimonialItemModal").toggle();
});
$("#actionUpdateTestimonial").click(function(e){
	e.preventDefault();
	$("#actionUpdateTestimonial").attr("disabled", true);
	$("#edit").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {testimonialHash:lh, testimonialPicture:$("#testimonial_picture_modal").val(), testimonialFullname:$("#testimonial_fullname_modal").val(), testimonialJob:$("#testimonial_job_modal").val(), testimonialComment:$("#testimonial_comment_modal").val(),actionUpdateTestimonial:"actionUpdateTestimonial"},
		success: function(response){
			if($.trim(response) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_attention'].'", "error");
				$("#actionUpdateTestimonial").attr("disabled", false);
			}else if($.trim(response) == "not_exists"){
				shortToast("'.$lang['message_testimonial_update_not_exists'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionUpdateTestimonial").attr("disabled", false);
			}else if($.trim(response) == "failed"){
				shortToast("'.$lang['message_testimonial_update_failed'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionUpdateTestimonial").attr("disabled", false);
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_testimonial_update_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				$("#edit").attr("disabled", true);
				$("#faq_title_modal").val("");
				$("#faq_content_modal").val("");
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}
		}
	});
});
function deleteTestimonialItem(hash){
	$("#delete").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {serviceHash:hash,actionDeleteTestimonialItem:"actionDeleteTestimonialItem"},
		success: function(response){
			if($.trim(response) == "not_found"){
				shortToast("'.$lang['message_testimonial_delete_not_found'].'", "'.$lang['label_alert_title_danger'].'", "error");
			}else if($.trim(response) == "failed"){
				shortToast("'.$lang['message_testimonial_delete_failed'].'", "'.$lang['label_alert_title_danger'].'", "error");
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_testimonial_delete_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				$("#delete").attr("disabled", true);
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}
		}
	});
}
$("#actionAddTestimonialItem").click(function(e){
	e.preventDefault();
	$("#actionAddTestimonialItem").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {testimonialPicture:$("#testimonial_picture").val(), testimonialFullname:$("#testimonial_fullname").val(), testimonialJob:$("#testimonial_job").val(), testimonialComment:$("#testimonial_comment").val(), actionAddTestimonialItem:"actionAddTestimonialItem"},
		success: function(response){
			if($.trim(response) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionAddTestimonialItem").attr("disabled", false);
			}else if($.trim(response) == "exists"){
				shortToast("'.$lang['message_testimonial_add_exists'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionAddTestimonialItem").attr("disabled", false);
			}else if($.trim(response) == "failed"){
				shortToast("'.$lang['message_testimonial_add_failed'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionAddTestimonialItem").attr("disabled", false);
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_testimonial_add_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				$("#testimonial_picture").val("");
				$("#testimonial_fullname").val("");
				$("#testimonial_job").val("");
				$("#testimonial_comment").val("");
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}
		}
	});
});
</script>
';
include("inc-end.php");
?>