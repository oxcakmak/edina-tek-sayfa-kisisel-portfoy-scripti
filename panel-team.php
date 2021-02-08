<?php
include("panel-inc-header.php");
$oxcakmak->metaTitle($lang['menu_team_txt'], STUCK);
include("panel-inc-menu.php");
if(USER_STATUS == 0){ $oxcakmak->redirect("/banned"); }
$oxcakmak->checkSessionNotLogged();
echo '
<!--Main Content-->
<div class="main-content px-0 app-content">
	<div class="container-fluid">

<!--Page Header-->
		<div class="page-header">
			<h3 class="page-title">'.$lang['menu_team_txt'].'</h3>
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['menu_panel'].'</a></li>
				<li class="breadcrumb-item active" aria-current="page">'.$lang['menu_team_txt'].'</li>
			</ol>
		</div>
		<!--Page Header-->

		<div class="row">
			<div class="col-lg-12">
			';
			$dbh->orderBy("team_id", "ASC");
			$queryTeamList = $dbh->get("team");
			echo '
				<div class="main-content-body d-flex flex-column">
					<div class="card p-4">
						<div><button class="btn btn-success mb-4" data-target="#addTeamPersonModal" data-toggle="modal">'.$lang['label_create_new_team_person_item'].'</button></div>
						<div class="modal" id="addTeamPersonModal">
							<div class="modal-dialog modal-sm" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h6 class="modal-title">'.$lang['label_create_new_team_person_item'].'</h6>
										<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_picture'].'</label>
											<input class="form-control rounded" type="text" placeholder="assets/upload/team/image.jpg" id="teamPersonPicture" />
											<br>
											<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_fullname'].'</label>
											<input class="form-control rounded" type="text" placeholder="'.$lang['label_fullname'].'" id="teamPersonFullname" />
											<br>
											<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_job'].'</label>
											<input class="form-control rounded" type="text" placeholder="'.$lang['label_job'].'" id="teamPersonJob" />
										</div>
									</div>
									<div class="modal-footer justify-content-right">
										<button class="btn btn-success" type="button" id="actionAddTeamPerson">'.$lang['button_send'].'</button>
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
										<th>'.$lang['table_fullname'].'</th>
										<th>'.$lang['table_job'].'</th>
										<th>'.$lang['table_management'].'</th>
									</tr>
								</thead>
								<tbody>
								';
								$i=0;
								foreach($queryTeamList as $tRow){
									$i++;
									echo '
										<tr>
											<th scope="row">'.$i.'</th>
											<td>'.$tRow['team_fullname'].'</td>
											<td>'.$tRow['team_job'].'</td>
											<td><b style="cursor:pointer;" onclick="deleteTeamPerson(\''.$tRow['team_hash'].'\');" id="delete">'.$lang['label_delete'].'</b></td>
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
function deleteTeamPerson(hash){
	$("#delete").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {teamPersonHash:hash,actionDeleteTeamPerson:"actionDeleteTeamPerson"},
		success: function(response){
			if($.trim(response) == "not_found"){
				shortToast("'.$lang['message_team_delete_not_found'].'", "'.$lang['label_alert_title_danger'].'", "error");
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_team_delete_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				$("#delete").attr("disabled", true);
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}
		}
	});
}
$("#actionAddTeamPerson").click(function(e){
	e.preventDefault();
	$("#actionAddTeamPerson").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {teamPersonPicture:$("#teamPersonPicture").val(), teamPersonFullname:$("#teamPersonFullname").val(), teamPersonJob:$("#teamPersonJob").val(), actionAddTeamPerson:"actionAddTeamPerson"},
		success: function(response){
			if($.trim(response) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionAddTeamPerson").attr("disabled", false);
			}else if($.trim(response) == "exists"){
				shortToast("'.$lang['message_team_add_exists'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionAddTeamPerson").attr("disabled", false);
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_team_add_success'].'", "'.$lang['label_alert_title_success'].'", "success");
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