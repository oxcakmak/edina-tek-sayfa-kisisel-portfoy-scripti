<?php
include("panel-inc-header.php");
$oxcakmak->metaTitle($lang['menu_counter'], STUCK);
include("panel-inc-menu.php");
if(USER_STATUS == 0){ $oxcakmak->redirect("panel/banned"); }
$oxcakmak->checkSessionNotLogged();
echo '
<!--Main Content-->
<div class="main-content px-0 app-content">
	<div class="container-fluid">

<!--Page Header-->
		<div class="page-header">
			<h3 class="page-title">'.$lang['menu_counter'].'</h3>
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['menu_panel'].'</a></li>
				<li class="breadcrumb-item active" aria-current="page">'.$lang['menu_counter'].'</li>
			</ol>
		</div>
		<!--Page Header-->

		<div class="row">
			<div class="col-lg-12">
			';
			$dbh->orderBy("counter_id", "ASC");
			$queryCounterList = $dbh->get("counter");
			echo '
				<div class="main-content-body d-flex flex-column">
				
					<div class="card p-4">
						<div><button class="btn btn-success mb-4" data-target="#addCounterModal" data-toggle="modal">'.$lang['label_create_new_counter_item'].'</button></div>
						<div class="modal" id="addCounterModal">
							<div class="modal-dialog modal-sm" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h6 class="modal-title">'.$lang['label_create_new_counter_item'].'</h6>
										<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_title'].'</label>
											<select class="form-control rounded" type="text" placeholder="'.$lang['label_title'].'" id="counter_icon">
												<option value="" selected>'.$lang['label_select'].'</option>
												'.file_get_contents('fa.php').'
											</select>
											<a class="main-content-label tx-11 text-primary" href="'.BASE_URL.'fa.html" target="_blank">'.$lang['label_icon_list'].'</a>
											<br>
											<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_target'].'</label>
											<input class="form-control rounded" type="text" placeholder="'.$lang['label_target'].'" id="counter_number" />
											<br>
											<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_title'].'</label>
											<input class="form-control rounded" type="text" placeholder="'.$lang['label_title'].'" id="counter_title" />
										</div>
									</div>
									<div class="modal-footer justify-content-right">
										<button class="btn btn-success" type="button" id="actionAddCounter">'.$lang['button_send'].'</button>
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
								foreach($queryCounterList as $counterRow){
									$i++;
									echo '
										<tr id="'.$counterRow['counter_hash'].'">
											<th scope="row">'.$i.'</th>
											<td id="counterIcon">'.$counterRow['counter_icon'].'</td>
											<td id="counterNumber">'.$counterRow['counter_number'].'</td>
											<td id="counterDescription">'.$counterRow['counter_title'].'</td>
											<td><b class="edit" style="cursor:pointer;" data-target="#editCounterModal" data-toggle="modal id="edit" onclick="changeHash(\''.$counterRow['counter_hash'].'\')" hash="'.$counterRow['counter_hash'].'">'.$lang['label_edit'].'</b>&nbsp;/&nbsp;<b style="cursor:pointer;" onclick="deleteCounter(\''.$counterRow['counter_hash'].'\');" id="delete">'.$lang['label_delete'].'</b></td>
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
<div class="modal" id="editCounterModal">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title">'.$lang['label_edit_counter_item'].'</h6>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_title'].'</label>
					<select class="form-control rounded" type="text" placeholder="'.$lang['label_title'].'" id="counter_icon_modal">
						<option value="" selected>'.$lang['label_select'].'</option>
						'.file_get_contents('fa.php').'
					</select>
					<a class="main-content-label tx-11 text-primary" href="'.BASE_URL.'fa.html" target="_blank">'.$lang['label_icon_list'].'</a>
					<br>
					<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_target'].'</label>
					<input class="form-control rounded" type="text" placeholder="'.$lang['label_target'].'" id="counter_number_modal" />
					<br>
					<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_title'].'</label>
					<input class="form-control rounded" type="text" placeholder="'.$lang['label_title'].'" id="counter_title_modal" />
				</div>
			</div>
			<div class="modal-footer justify-content-right">
				<button class="btn btn-success" type="button" id="actionUpdateCounter">'.$lang['button_update'].'</button>
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
	$("#counter_icon_modal").val($("tr[id^="+hash+"] > td[id=counterIcon]").text());
	$("#counter_number_modal").val($("tr[id^="+hash+"] > td[id=counterNumber]").text());
	$("#counter_title_modal").val($("tr[id^="+hash+"] > td[id=counterDescription]").text());
	lh = hash;
	$("#editCounterModal").toggle();
}
/*
$("body .edit").click(function(){
	$("#counter_icon_modal").val($("tr[id^="+$("body .edit").attr("hash")+"] > td[id=counterIcon]").text());
	$("#counter_number_modal").val($("tr[id^="+$("body .edit").attr("hash")+"] > td[id=counterNumber]").text());
	$("#counter_title_modal").val($("tr[id^="+$("body .edit").attr("hash")+"] > td[id=counterDescription]").text());
	lh = $("body .edit").attr("hash");
	$("#editCounterModal").toggle();
});
*/
$("body #cancelModal").click(function(){
	$("#editCounterModal").toggle();
});
$("body .close").click(function(){
	$("#editCounterModal").toggle();
});
$("#actionUpdateCounter").click(function(e){
	e.preventDefault();
	$("#actionUpdateCounter").attr("disabled", true);
	$("#edit").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {counterHash:lh, counterIcon:$("#counter_icon_modal").val(), counterNumber:$("#counter_number_modal").val(), counterTitle:$("#counter_title_modal").val(),actionUpdateCounter:"actionUpdateCounter"},
		success: function(response){
			if($.trim(response) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_attention'].'", "error");
				$("#actionUpdateCounter").attr("disabled", false);
			}else if($.trim(response) == "not_exists"){
				shortToast("'.$lang['message_counter_update_not_exists'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionUpdateCounter").attr("disabled", false);
			}else if($.trim(response) == "failed"){
				shortToast("'.$lang['message_counter_update_failed'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionUpdateCounter").attr("disabled", false);
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_counter_update_success'].'", "'.$lang['label_alert_title_success'].'", "success");
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
function deleteCounter(hash){
	$("#delete").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {counterHash:hash, actionDeleteCounter:"actionDeleteCounter"},
		success: function(response){
			if($.trim(response) == "not_found"){
				shortToast("'.$lang['message_counter_delete_not_found'].'", "'.$lang['label_alert_title_danger'].'", "error");
			}else if($.trim(response) == "failed"){
				shortToast("'.$lang['message_counter_delete_failed'].'", "'.$lang['label_alert_title_danger'].'", "error");
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_counter_delete_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				$("#delete").attr("disabled", true);
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}
		}
	});
}
$("#actionAddCounter").click(function(e){
	e.preventDefault();
	$("#actionAddCounter").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {counterIcon:$("#counter_icon").val(), counterNumber:$("#counter_number").val(), counterTitle:$("#counter_title").val(), actionAddCounter:"actionAddCounter"},
		success: function(response){
			if($.trim(response) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionAddCounter").attr("disabled", false);
			}else if($.trim(response) == "exists"){
				shortToast("'.$lang['message_counter_add_exists'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionAddCounter").attr("disabled", false);
			}else if($.trim(response) == "failed"){
				shortToast("'.$lang['message_counter_add_failed'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionAddCounter").attr("disabled", false);
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_counter_add_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				$("#counter_icon").val("select");
				$("#counter_number").val("");
				$("#counter_title").val("");
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