<?php
include("panel-inc-header.php");
$oxcakmak->metaTitle($lang['menu_reset'], $config['stuck']);
$oxcakmak->checkSessionIsLogged();
$extraScript = "";
$userKey = $oxcakmak->cleanString($_GET['key']);
$dbh->where("user_key", $userKey);
$queryCheckUserAPIRow = $dbh->getOne("user");
if($queryCheckUserAPIRow['user_key']){
echo '
<!-- Main-signin-wrapper -->
<div class="main-signin-wrapper">
	<div class="row text-center pl-0 pr-0 ml-0 mr-0">
		<div class="col-lg-3 d-block mx-auto">
			<div class="card">
				<div class="card-body">
					<h4>'.$lang['label_reset'].'</h4>
					<div class="text-left mt-3">
						<div class="form-group">
							<label>'.$lang['label_api_key'].'</label><br>
							<input maxlength="40" class="form-control rounded" type="text" placeholder="'.$lang['label_api_key'].'" value="'.$userKey.'" disabled>
						</div>
						<div class="form-group">
							<label>'.$lang['label_new_password'].'</label><input maxlength="20" class="form-control rounded" type="password" placeholder="'.$lang['label_new_password'].'" id="iUserNewPassword">
						</div>
						<div class="form-group">
							<label>'.$lang['label_new_repassword'].'</label><input maxlength="20" class="form-control rounded" type="password" placeholder="'.$lang['label_new_repassword'].'" id="iUserNewRePassword">
						</div>
					</div>
					<button class="btn btn-main-primary btn-block" id="actionReset">'.$lang['button_reset'].'</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Main-signin-wrapper -->
';
$extraScript .= '
<script type="text/javascript">
$("#actionReset").click(function(e){
	e.preventDefault();
	$("#actionReset").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {userNewPassword:$("#iUserNewPassword").val(), userNewRePassword:$("#iUserNewRePassword").val(), userKey:"'.$userKey.'", actionReset:"actionReset"},
		success: function(response){
			if($.trim(response) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_attention'].'", "error");
				$("#actionReset").attr("disabled", false);
			}else if($.trim(response) == "min_char_password"){
				shortToast("'.str_replace("%s", $config['min_char_uap'], $lang['message_min_password']).'", "'.$lang['label_alert_title_attention'].'", "error");
				$("#actionReset").attr("disabled", false);
			}else if($.trim(response) == "not_equal"){
				shortToast("'.$lang['message_not_equal'].'", "'.$lang['label_alert_title_attention'].'", "error");
				$("#actionReset").attr("disabled", false);
			}else if($.trim(response) == "message_reset_password_not_found_or_error"){
				shortToast("'.$lang['message_reset_password_not_found_or_error'].'", "'.$lang['label_alert_title_attention'].'", "error");
				$("#actionReset").attr("disabled", false);
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_reset_password_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				$("#iUserNewPassword").val("");
				$("#iUserNewRePassword").val("");
				window.setTimeout(function(){
					window.location.href = "'.BASE_URL.'panel";
				}, 1500);
			}
		}
	})
});
</script>
';
}else{ $oxcakmak->redirect("panel"); }
include("panel-inc-footer.php");
echo $extraScript;
include("inc-end.php");
?>