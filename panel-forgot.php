<?php
include("panel-inc-header.php");
$oxcakmak->metaTitle($lang['menu_forgot'], $config['stuck']);
$oxcakmak->checkSessionIsLogged();
echo '
<!-- Main-signin-wrapper -->
<div class="main-signin-wrapper">
	<div class="row text-center pl-0 pr-0 ml-0 mr-0">
		<div class="col-lg-3 d-block mx-auto">
			<div class="card">
				<div class="card-body">
					<h4>'.$lang['menu_forgot'].'</h4>
					<div class="text-left mt-3">
						<div class="form-group">
							<label>'.$lang['label_username_or_email'].'</label><input maxlength="50" class="form-control rounded" type="text" placeholder="'.$lang['label_username_or_email'].'" id="user"">
						</div>
					</div>
					<button class="btn btn-success btn-block" id="actionForgot">'.$lang['button_send'].'</button>
					<div class="main-signin-footer mg-t-5">
						<p>'.$lang['label_have_account'].'<br><a href="'.BASE_URL.'panel/login">'.$lang['label_login'].'</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Main-signin-wrapper -->
';
include("panel-inc-footer.php");
echo '
<script type="text/javascript">
var rText = "";
var rSuccess = "";
$("#actionForgot").click(function(e){
	e.preventDefault();
	$("#actionForgot").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {user:$("#user").val(), actionForgot:"actionForgot"},
		success: function(response){
			rText = response;
			rSuccess = rText.split("_")[0];
			if($.trim(response) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_attention'].'", "error");
				$("#actionForgot").attr("disabled", false);
			}else if($.trim(response) == "not_found"){
				shortToast("'.$lang['message_not_found_user'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionForgot").attr("disabled", false);
			}else if($.trim(response) == "failed"){
				shortToast("'.$lang['message_forgot_request_failed'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionForgot").attr("disabled", false);
			}else if(rSuccess = "success"){
				console.log(rText);
				var rMail = rText.split("_")[1];
				var rmName = rMail.split("@")[0];
				var rmServer = rMail.split("@")[1];
				var rStr = "'.$lang['message_forgot_request_success'].'";
				var rmNc = rmName.length-1;
				var rmSc = rmServer.length-4;
				var star = "";
				for(var i = 0; i < rmNc; i++){ star += "*"; }
				var rSFull = rStr.replace("%mail%", rmName.replace(rmName.substring(1,rmNc), star)+"@"+rmServer.replace(rmServer.substring(1,rmSc), star));
				shortToast(rSFull, "'.$lang['label_alert_title_success'].'", "success");
				$("#user").val("");
				window.setTimeout(function(){
					window.location.href = "'.BASE_URL.'panel";
				}, 3000);
			}
		}
	});
});
</script>
';
include("inc-end.php");
?>