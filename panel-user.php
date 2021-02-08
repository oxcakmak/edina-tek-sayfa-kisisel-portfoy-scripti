<?php
include("panel-inc-header.php");
$oxcakmak->metaTitle($lang['menu_user_management'], $config['stuck']);
include("panel-inc-menu.php");
$oxcakmak->checkSessionNotLogged();
if(USER_ROLE != 11){ $oxcakmak->redirect("panel"); }
echo '
<!--Main Content-->
<div class="main-content px-0 app-content">
	<div class="container-fluid">

		<!--Page Header-->
		<div class="page-header">
			<h3 class="page-title">'.$lang['menu_user_management'].'</h3>
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item"><a href="#">'.$lang['menu_panel'].'</a></li>
				<li class="breadcrumb-item active" aria-current="page">'.$lang['menu_user_management'].'</li>
			</ol>
		</div>
		<!--Page Header-->

		<div class="row row-sm">
			<div class="col-xl-3">
				<div class="card mg-b-20">
					<div class="main-content-left main-content-left-contacts">
						<nav class="nav main-nav-line main-nav-line-chat" style="text-align: center;">
							<!-- <span>'.$lang['label_all_users'].'</span> -->
							<span class="tx-danger tx-bold tx-12" style="text-align: center;">'.$lang['label_search_user'].'&nbsp;</span><input class="form-control form-control-sm rounded wd-95p" type="text placeholder="asd" id="findUser">
						</nav>
						<div class="main-contacts-list mCustomScrollbar _mCS_2 mCS-autoHide" id="mainContactList" style="overflow: visible;">
							<div id="mCSB_2" class="mCustomScrollBox mCS-minimal mCSB_vertical mCSB_outside" tabindex="0" style="max-height: none;">
								<div id="mCSB_2_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px;" dir="ltr"></div>
							</div>
							<div id="mCSB_2_scrollbar_vertical" class="mCSB_scrollTools mCSB_2_scrollbar mCS-minimal mCSB_scrollTools_vertical" style="display: block;">
								<div class="mCSB_draggerContainer">
									<div id="mCSB_2_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 249px; max-height: 466px; top: 0px;">
										<div class="mCSB_dragger_bar" style="line-height: 50px;">
										</div>
									</div>
									<div class="mCSB_draggerRail"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9"><div class="card mg-b-20" id="uic"><div class="main-content-body main-content-body-contacts"><div class="main-contact-info-header"></div></div></div></div>
		</div>
		
	</div>
</div>
<!--Main Content-->
';
include("panel-inc-footer.php");
echo '
<div class="modal" id="banUserModal">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title">'.$lang['label_ban_user'].'</h6>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<div class="form-group">
				  <label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_banned_reason'].'</label>
				  <textarea class="form-control rounded" rows="3" placeholder="'.$lang['label_banned_reason'].'" id="banReason" maxlength="500" /></textarea>
				</div>
				<div class="form-group">
					<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_banned_date'].'</label>
					<select class="form-control rounded" placeholder="'.$lang['label_banned_date'].'" id="banFinishDate">
						<option value="select" selected disabled>'.$lang['label_select'].'</option>
						<option value="'.date("d.m.Y-H:i", strtotime("+1 days")).'">1&nbsp;'.$lang['label_date_day'].'&nbsp;('.date("d.m.Y-H:i", strtotime("+1 days")).')</option>
						<option value="'.date("d.m.Y-H:i", strtotime("+1 weeks")).'">1&nbsp;'.$lang['label_date_week'].'&nbsp;('.date("d.m.Y-H:i", strtotime("+1 weeks")).')</option>
						<option value="'.date("d.m.Y-H:i", strtotime("+1 months")).'">1&nbsp;'.$lang['label_date_month'].'&nbsp;('.date("d.m.Y-H:i", strtotime("+1 months")).')</option>
						<option value="'.date("d.m.Y-H:i", strtotime("+6 months")).'">6&nbsp;'.$lang['label_date_month'].'&nbsp;('.date("d.m.Y-H:i", strtotime("+6 months")).')</option>
						<option value="'.date("d.m.Y-H:i", strtotime("+1 years")).'">1&nbsp;'.$lang['label_date_year'].'&nbsp;('.date("d.m.Y-H:i", strtotime("+1 years")).')</option>
						<option value="'.date("d.m.Y-H:i", strtotime("+6 years")).'">6&nbsp;'.$lang['label_date_year'].'&nbsp;('.date("d.m.Y-H:i", strtotime("+6 years")).')</option>
						<option value="infinite">'.$lang['label_infinite'].'</option>
					</select>
				</div>
				<label class="main-content-label tx-11 tx-medium tx-gray-600">'.$lang['label_username'].':&nbsp;<b id="banUsername">-</b></label>
			</div>
			<div class="modal-footer justify-content-right">
				<button class="btn btn-success" type="button" id="actionBanUser">'.$lang['button_send'].'</button>
				<button class="btn btn-danger" data-dismiss="modal" type="button">'.$lang['button_cancel'].'</button>
			</div>
		</div>
	</div>
</div>
<script>
var un = "";
$(document).ready(function(){
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {actionGetUserList:"actionGetUserList"},
		success: function(response){
			$("#mCSB_2_container").html(response);
		}
	});
});
function editUser(username){
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {username:username,actionGetUserInfo:"actionGetUserInfo"},
		success: function(response){
			$("#uic").html(response);
		}
	});
}
function renameUsername(username){
	un = username;
	$("#banUsername").text(username);
}
$("#actionBanUser").click(function(e){
	e.preventDefault();
	$("#actionBanUser").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {banUsername:$("#banUsername").text(), banReason:$("#banReason").val(), banFinishDate:$("#banFinishDate").val(), actionBanUser:"actionBanUser"},
		success: function(response){
			if($.trim(response) == "success"){
				shortToast("'.$lang['message_ban_user_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}else if($.trim(response) == "exists"){
				shortToast("'.$lang['message_ban_user_exists'].'", "'.$lang['label_alert_title_warning'].'", "error");
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}
		}
	});
});
function unbanUser(username){
	$("#actionUnBanUser").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {banUsername:username, actionUnBanUser:"actionUnBanUser"},
		success: function(response){
			if($.trim(response) == "success"){
				shortToast("'.$lang['message_unban_user_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}else{
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}
		}
	});
}
function addPremium(username){
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {premiumUser:username, actionAddPremium:"actionAddPremium"},
		success: function(response){
			if($.trim(response) == "success"){
				shortToast("'.$lang['message_premium_add_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}else if($.trim(response) == "failed"){
				shortToast("'.$lang['message_premium_add_failed'].'", "'.$lang['label_alert_title_danger'].'", "error");
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}
		}
	});
}
function removePremium(username){
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {premiumUser:username, actionRemovePremium:"actionRemovePremium"},
		success: function(response){
			if($.trim(response) == "success"){
				shortToast("'.$lang['message_premium_remove_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}else if($.trim(response) == "failed"){
				shortToast("'.$lang['message_premium_remove_failed'].'", "'.$lang['label_alert_title_danger'].'", "error");
				window.setTimeout(function(){
					window.location.reload();
				}, 1000);
			}
		}
	});
}
$("#findUser").on("keyup", function(){
	var matcher = new RegExp($(this).val(), "gi");
	$("#userInfoList").show().not(function(){
		return matcher.test($(this).find(".usrnme").text())
	}).hide();
});
</script>
';
include("inc-end.php");
?>