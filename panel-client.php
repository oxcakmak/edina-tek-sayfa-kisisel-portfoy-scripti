<?php
include("panel-inc-header.php");
$oxcakmak->metaTitle($lang['menu_client'], STUCK);
include("panel-inc-menu.php");
if(USER_STATUS == 0){ $oxcakmak->redirect("/banned"); }
$oxcakmak->checkSessionNotLogged();
echo '
<!--Main Content-->
<div class="main-content px-0 app-content">
	<div class="container-fluid">

<!--Page Header-->
		<div class="page-header">
			<h3 class="page-title">'.$lang['menu_client'].'</h3>
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['menu_panel'].'</a></li>
				<li class="breadcrumb-item active" aria-current="page">'.$lang['menu_client'].'</li>
			</ol>
		</div>
		<!--Page Header-->

		<div class="row">
			<div class="col-lg-12">
			';
			$dbh->orderBy("client_id", "ASC");
			$queryClientList = $dbh->get("client");
			echo '
				<div class="main-content-body d-flex flex-column">
					<div class="card p-4">
						<div><button class="btn btn-success mb-4" data-target="#addTeamPersonModal" data-toggle="modal">'.$lang['label_create_new_client_item'].'</button></div>
						<div class="modal" id="addTeamPersonModal">
							<div class="modal-dialog modal-sm" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h6 class="modal-title">'.$lang['label_create_new_client_item'].'</h6>
										<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_picture'].'</label>
											<input class="form-control rounded" type="text" placeholder="assets/upload/client/client.jpg" id="clientPicture" />
											<br>
											<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_title'].'</label>
											<input class="form-control rounded" type="text" placeholder="'.$lang['label_title'].'" id="clientTitle" />
										</div>
									</div>
									<div class="modal-footer justify-content-right">
										<button class="btn btn-success" type="button" id="actionAddClient">'.$lang['button_send'].'</button>
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
										<th>'.$lang['table_title'].'</th>
										<th>'.$lang['table_management'].'</th>
									</tr>
								</thead>
								<tbody>
								';
								$i=0;
								foreach($queryClientList as $cRow){
									$i++;
									echo '
										<tr>
											<th scope="row">'.$i.'</th>
											<td>'.$cRow['client_title'].'</td>
											<td><b style="cursor:pointer;" onclick="deleteClient(\''.$cRow['client_hash'].'\');" id="delete">'.$lang['label_delete'].'</b></td>
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
';
include("panel-inc-footer.php");
echo '
<script>
function deleteClient(hash){
	$("#delete").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {clientHash:hash,actionDeleteClient:"actionDeleteClient"},
		success: function(response){
			if($.trim(response) == "not_found"){
				shortToast("'.$lang['message_client_delete_not_found'].'", "'.$lang['label_alert_title_danger'].'", "error");
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_client_delete_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				$("#delete").attr("disabled", true);
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}
		}
	});
}
$("#actionAddClient").click(function(e){
	e.preventDefault();
	$("#actionAddClient").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {clientPicture:$("#clientPicture").val(), clientTitle:$("#clientTitle").val(), actionAddClient:"actionAddClient"},
		success: function(response){
			if($.trim(response) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionAddClient").attr("disabled", false);
			}else if($.trim(response) == "exists"){
				shortToast("'.$lang['message_client_add_exists'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionAddClient").attr("disabled", false);
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_client_add_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				$("#categoryTitle").val("");
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