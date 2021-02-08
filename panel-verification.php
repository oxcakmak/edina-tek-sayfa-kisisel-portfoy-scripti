<?php
include("panel-inc-header.php");
$oxcakmak->metaTitle($lang['menu_verification'], $config['stuck']);
$userKey = $oxcakmak->cleanString($_GET['user_key']);
echo '
<!-- Main-signin-wrapper -->
<div class="main-signin-wrapper">
	<div class="row text-center pl-0 pr-0 ml-0 mr-0">
		<div class="col-lg-3 d-block mx-auto">
			<div class="card">
				<div class="card-body">
					<h4>'.$lang['menu_verification'].'</h4>
					<div class="text-left mt-3">
						<div class="form-group"><label id="verificationStatusLabel" style="font-weight:bold;">-</label></div>
					</div>
					<p class="tx-secondary" id="href">'.$lang['label_forgot_password'].'</p>
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
$(document).ready(function(){
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {userKey:"'.$userKey.'", actionVerification:"actionVerification"},
		success: function(response){
			if($.trim(response) == "failed"){
				$("#actionForgot").attr("disabled", false);
				$("#verificationStatusLabel").text("'.$lang['message_user_verified_failed'].'");
				$("#verificationStatusLabel").attr("class", "tx-danger");
				$("#href").text("'.$lang['label_user_verified_failed'].'");
				window.setTimeout(function(){
					window.location.href = "'.BASE_URL.'panel/forgot";
				}, 5000);
			}else if($.trim(response) == "success"){
				$("#verificationStatusLabel").text("'.$lang['message_user_verified_success'].'");
				$("#verificationStatusLabel").attr("class", "tx-success");
				$("#href").text("'.$lang['label_user_verified_success'].'");
				window.setTimeout(function(){
					window.location.href = "'.BASE_URL.'panel";
				}, 5000);
			}
		}
	});
});
</script>
';
include("inc-end.php");
?>