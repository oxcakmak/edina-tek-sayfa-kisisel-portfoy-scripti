<?php
include("panel-inc-header.php");
$oxcakmak->metaTitle($lang['menu_login'], STUCK);
$oxcakmak->checkSessionIsLogged();
echo '
<!-- Main-signin-wrapper -->
<div class="main-signin-wrapper">
	<div class="row text-center pl-0 pr-0 ml-0 mr-0">
		<div class="col-lg-3 d-block mx-auto">
			<div class="card">
				<div class="card-body">
					<h4>'.$lang['label_login'].'</h4>
					<div class="text-left mt-3">
					<div class="form-group">
							<label>'.$lang['label_username_or_email_address'].'</label>
							<input class="form-control rounded" type="text" id="user" placeholder="'.$lang['label_username_or_email_address'].'" value="admin">
						</div>
						<div class="form-group">
							<label>'.$lang['label_password'].'</label>
							<input class="form-control rounded" type="password" placeholder="'.$lang['label_password'].'" id="password" value="admin">
						</div>
					</div>
					<button class="btn btn-success btn-block" id="actionLogin">'.$lang['button_login'].'</button>
					<div class="main-signin-footer mg-t-5">
						<p><a href="'.BASE_URL.'panel/forgot">'.$lang['label_forgot_password'].'</a><br>'.$lang['label_dont_have_account'].'<br><a href="'.BASE_URL.'panel/register">'.$lang['label_register'].'</a></p>
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
$("#actionLogin").click(function(e){
	e.preventDefault();
	$("#actionLogin").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {user:$("#user").val(), password:$("#password").val(),actionLogin:"actionLogin"},
		success: function(response){
			if($.trim(response) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_attention'].'", "error");
				$("#actionLogin").attr("disabled", false);
			}else if($.trim(response) == "not_found"){
				shortToast("'.$lang['message_not_found_user'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionLogin").attr("disabled", false);
			}else if($.trim(response) == "password_incorrect"){
				shortToast("'.$lang['message_incorrect_password'].'", "'.$lang['label_alert_title_danger'].'", "error");
				$("#actionLogin").attr("disabled", false);
			}else if($.trim(response) == "success"){
				shortToast("'.$lang['message_login_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				$("#user").val("");
				$("#password").val("");
				$("#actionLogin").attr("disabled", true);
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