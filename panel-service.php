<?php
include("panel-inc-header.php");
$oxcakmak->metaTitle($lang['menu_services'], STUCK);
include("panel-inc-menu.php");
if(USER_STATUS == 0){ $oxcakmak->redirect("panel/banned"); }
$oxcakmak->checkSessionNotLogged();
echo '
<!--Main Content-->
<div class="main-content px-0 app-content">
	<div class="container-fluid">

<!--Page Header-->
		<div class="page-header">
			<h3 class="page-title">'.$lang['menu_services'].'</h3>
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['menu_panel'].'</a></li>
				<li class="breadcrumb-item active" aria-current="page">'.$lang['menu_services'].'</li>
			</ol>
		</div>
		<!--Page Header-->

		<div class="row">
			<div class="col-lg-12">
			';
			$dbh->orderBy("service_id", "ASC");
			$queryServiceList = $dbh->get("service");
			echo '
				<div class="main-content-body d-flex flex-column">
				
					<div class="card p-4">
						<div><button class="btn btn-success mb-4" data-target="#addServiceItemModal" data-toggle="modal">'.$lang['label_create_new_service_item'].'</button></div>
						<div class="modal" id="addServiceItemModal">
							<div class="modal-dialog modal-sm" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h6 class="modal-title">'.$lang['label_create_new_service_item'].'</h6>
										<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_title'].'</label>
											<select class="form-control rounded" type="text" placeholder="'.$lang['label_title'].'" id="service_icon">
												<option value="" selected>'.$lang['label_select'].'</option>
												'.file_get_contents('fa.php').'
											</select>
											<a class="main-content-label tx-11 text-primary" href="'.BASE_URL.'fa.html" target="_blank">'.$lang['label_icon_list'].'</a>
											<br>
											<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_title'].'</label>
											<input class="form-control rounded" type="text" placeholder="'.$lang['label_title'].'" id="service_title" />
											<br>
											<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_description'].'</label>
											<textarea class="form-control rounded" rows="3" placeholder="'.$lang['label_description'].'" id="service_description" maxlength="250" /></textarea>
										</div>
									</div>
									<div class="modal-footer justify-content-right">
										<button class="btn btn-success" type="button" id="actionAddServiceItem">'.$lang['button_send'].'</button>
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
										<th>'.$lang['table_icon'].'</th>
										<th>'.$lang['table_title'].'</th>
										<th>'.$lang['table_description'].'</th>
										<th>'.$lang['table_management'].'</th>
									</tr>
								</thead>
								<tbody>
								';
								$i=0;
								foreach($queryServiceList as $serviceRow){
									$i++;
									echo '
										<tr id="'.$serviceRow['service_hash'].'">
											<th scope="row">'.$i.'</th>
											<td id="serviceIcon">'.$serviceRow['service_icon'].'</td>
											<td id="serviceTitle">'.$serviceRow['service_title'].'</td>
											<td id="serviceDescription">'.$serviceRow['service_description'].'</td>
											<td><b class="edit" style="cursor:pointer;" data-target="#editServiceItemModal" data-toggle="modal id="edit" onclick="changeHash(\''.$serviceRow['service_hash'].'\')" hash="'.$serviceRow['service_hash'].'">'.$lang['label_edit'].'</b>&nbsp;/&nbsp;<b style="cursor:pointer;" onclick="deleteServiceItem(\''.$serviceRow['service_hash'].'\');" id="delete">'.$lang['label_delete'].'</b></td>
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
<div class="modal" id="editServiceItemModal">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title">'.$lang['label_edit_service_item'].'</h6>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_title'].'</label>
					<select class="form-control rounded" type="text" placeholder="'.$lang['label_title'].'" id="service_icon_modal">
						<option value="" selected>'.$lang['label_select'].'</option>
						'.file_get_contents('fa.php').'
					</select>
					<a class="main-content-label tx-11 text-primary" href="'.BASE_URL.'fa.html" target="_blank">'.$lang['label_icon_list'].'</a>
					<br>
					<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_title'].'</label>
					<input class="form-control rounded" type="text" placeholder="'.$lang['label_title'].'" id="service_title_modal" />
					<br>
					<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_description'].'</label>
					<textarea class="form-control rounded" rows="3" placeholder="'.$lang['label_description'].'" id="service_description_modal" maxlength="250" /></textarea>
				</div>
			</div>
			<div class="modal-footer justify-content-right">
				<button class="btn btn-success" type="button" id="actionUpdateService">'.$lang['button_update'].'</button>
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
	$("#service_icon_modal").val($("tr[id^="+hash+"] > td[id=serviceIcon]").text());
	$("#service_title_modal").val($("tr[id^="+hash+"] > td[id=serviceTitle]").text());
	$("#service_description_modal").val($("tr[id^="+hash+"] > td[id=serviceDescription]").text());
	lh = hash;
	$("#editServiceItemModal").toggle();
}
/*
$("body .edit").click(function(){
	$("#service_icon_modal").val($("tr[id^="+$("body .edit").attr("hash")+"] > td[id=serviceIcon]").text());
	$("#service_title_modal").val($("tr[id^="+$("body .edit").attr("hash")+"] > td[id=serviceTitle]").text());
	$("#service_description_modal").val($("tr[id^="+$("body .edit").attr("hash")+"] > td[id=serviceDescription]").text());
	lh = $("body .edit").attr("hash");
	$("#editServiceItemModal").toggle();
});
*/
$("body #cancelModal").click(function(){
	$("#editServiceItemModal").toggle();
});
$("body .close").click(function(){
	$("#editServiceItemModal").toggle();
});
$("#actionUpdateService").click(function(e){
	e.preventDefault();
	$("#actionUpdateService").attr("disabled", true);
	$("#edit").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {serviceHash:lh,serviceIcon:$("#service_icon_modal").val(), serviceTitle:$("#service_title_modal").val(), serviceDescription:$("#service_description_modal").val(),actionUpdateService:"actionUpdateService"},
		success: function(response){
			if($.trim(response) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_attention'].'", "error");
				$("#actionUpdateService").attr("disabled", false);
			}else if($.trim(response) == "not_exists"){
				shortToast("'.$lang['message_service_update_not_exists'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionUpdateService").attr("disabled", false);
			}else if($.trim(response) == "failed"){
				shortToast("'.$lang['message_service_update_failed'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionUpdateService").attr("disabled", false);
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_service_update_success'].'", "'.$lang['label_alert_title_success'].'", "success");
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
function deleteServiceItem(hash){
	$("#delete").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {serviceHash:hash,actionDeleteServiceItem:"actionDeleteServiceItem"},
		success: function(response){
			if($.trim(response) == "not_found"){
				shortToast("'.$lang['message_service_delete_not_found'].'", "'.$lang['label_alert_title_danger'].'", "error");
			}else if($.trim(response) == "failed"){
				shortToast("'.$lang['message_service_delete_failed'].'", "'.$lang['label_alert_title_danger'].'", "error");
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_service_delete_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				$("#delete").attr("disabled", true);
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}
		}
	});
}
$("#actionAddServiceItem").click(function(e){
	e.preventDefault();
	$("#actionAddServiceItem").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {serviceIcon:$("#service_icon").val(), serviceTitle:$("#service_title").val(), serviceDescription:$("#service_description").val(), actionAddServiceItem:"actionAddServiceItem"},
		success: function(response){
			if($.trim(response) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionAddServiceItem").attr("disabled", false);
			}else if($.trim(response) == "exists"){
				shortToast("'.$lang['message_service_add_exists'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionAddServiceItem").attr("disabled", false);
			}else if($.trim(response) == "failed"){
				shortToast("'.$lang['message_service_add_failed'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionAddServiceItem").attr("disabled", false);
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_service_add_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				$("#service_icon").val("select");
				$("#service_title").val("");
				$("#service_description").val("");
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