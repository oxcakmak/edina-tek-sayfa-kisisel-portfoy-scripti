<?php
include("panel-inc-header.php");
$oxcakmak->metaTitle($lang['menu_settings'], STUCK);
include("panel-inc-menu.php");
$oxcakmak->checkSessionNotLogged();
echo '
<!--Main Content-->
<div class="main-content px-0 app-content">
	<div class="container-fluid">

<!--Page Header-->
		<div class="page-header">
			<h3 class="page-title">'.$lang['label_settings'].'</h3>
			<ol class="breadcrumb mb-0">
				<li class="breadcrumb-item"><a href="'.BASE_URL.'">'.$lang['menu_panel'].'</a></li>
				<li class="breadcrumb-item active" aria-current="page">'.$lang['menu_settings'].'</li>
			</ol>
		</div>
		<!--Page Header-->

		<div class="row row-sm">
			<div class="col-lg-12">
				<div class="main-content-body d-flex flex-column">
					<div class="card p-4">
					
						<div class="d-md-flex">
							<div>
								<div class="panel panel-primary tabs-style-3">
									<div class="tab-menu-heading">
										<div class="tabs-menu ">
											<!-- Tabs -->
											<ul class="nav panel-tabs">
												<li><a href="#tabPassword" class="active" data-toggle="tab">'.$lang['label_st_tab_password'].'</a></li>
												<li><a href="#tabStHome" data-toggle="tab">'.$lang['label_st_tab_home'].'</a></li>
												<li><a href="#tabStBackground" data-toggle="tab">'.$lang['label_st_tab_background'].'</a></li>
												<li><a href="#tabStAbout" data-toggle="tab">'.$lang['label_st_tab_about'].'</a></li>
												<li><a href="#tabStSocialMedia" data-toggle="tab">'.$lang['label_st_tab_sm'].'</a></li>
												<li><a href="#tabStMeta" data-toggle="tab">'.$lang['label_st_tab_meta'].'</a></li>
												<li><a href="#tabStMail" data-toggle="tab">'.$lang['label_st_tab_mail'].'</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs-style-3">
								<div class="panel-body tabs-menu-body">
									<div class="tab-content w-auto">
										<div class="tab-pane active" id="tabPassword">
											<div class="row">
												<div class="col-md-6">
													<b>'.$lang['label_last_password'].'</b>
													<input class="form-control rounded" type="password" placeholder="'.$lang['label_last_password'].'" id="iLastPassword">
												</div>
												<div class="col-md-6"></div>
												<div class="col-md-6 mt-3">
													<b>'.$lang['label_new_password'].'</b>
													<input class="form-control rounded" type="password" placeholder="'.$lang['label_new_password'].'" id="iNewPassword">
												</div>
												<div class="col-md-6 mt-3">
													<b>'.$lang['label_new_repassword'].'</b>
													<input class="form-control rounded" type="password" placeholder="'.$lang['label_new_repassword'].'" id="iNewRePassword">
												</div>
												<div class="col-md-12 pt-3">
													<button class="btn btn-success pull-right" id="actionUpdatePassword">'.$lang['button_update'].'</button>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tabStHome">
											<div class="row">
												<div class="col-md-12">
													<b>'.$lang['label_st_home_title'].'</b>
													<input class="form-control rounded" type="text" placeholder="'.$lang['label_st_home_title'].'" id="stHomeTitle" value="'.ST_HOME_TITLE.'">
												</div>
												<div class="col-md-12 mt-3">
													<b>'.$lang['label_st_home_description'].'</b>
													<textarea class="form-control rounded" type="text" rows="3" placeholder="'.$lang['label_st_home_description'].'" id="stHomeDescription">'.ST_HOME_DESCRIPTION.'</textarea>
												</div>
												<div class="col-md-12 mt-3">
													<b>'.$lang['label_st_home_keyword'].'</b>
													<textarea class="form-control rounded" type="text" rows="3" placeholder="'.$lang['label_st_home_keyword'].'" id="stHomeKeyword">'.ST_HOME_KEYWORD.'</textarea>
												</div>
												<div class="col-md-12 mt-3">
													<b>'.$lang['label_st_footer_copyright_text'].'</b>
													<textarea class="form-control rounded" type="text" rows="3" placeholder="'.$lang['label_st_footer_copyright_text'].'" id="stHomeFooter">'.ST_FOOTER_COPYRIGHT_TEXT.'</textarea>
												</div>
												<div class="col-md-12 pt-3">
													<button class="btn btn-success pull-right" id="actionUpdateHome">'.$lang['button_update'].'</button>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tabStBackground">
											<div class="row">
												<div class="col-md-12">
													<b>'.$lang['label_st_background_banner'].'</b>
													<input class="form-control rounded" type="text" placeholder="'.$lang['label_st_background_banner'].'" id="stBackgroundBanner" value="'.ST_BG.'" />
												</div>
												<div class="col-md-12 mt-3">
													<b>'.$lang['label_st_background_testimonial'].'</b>
													<input class="form-control rounded" type="text" placeholder="'.$lang['label_st_background_testimonial'].'" id="stBackgroundTestimonial" value="'.ST_BG_TESTIMONIAL.'" />
												</div>
												<div class="col-md-12 mt-3">
													<b>'.$lang['label_st_background_partners'].'</b>
													<input class="form-control rounded" type="text" placeholder="'.$lang['label_st_background_partners'].'" id="stBackgroundPartners" value="'.ST_BG_PARTNERS.'" />
												</div>
												<div class="col-md-12 mt-3">
													<b>'.$lang['label_st_background_leftbox'].'</b>
													<input class="form-control rounded" type="text" placeholder="'.$lang['label_st_background_leftbox'].'" id="stBackgroundLeftbox" value="'.ST_BG_LEFTBOX.'" />
												</div>
												<div class="col-md-12 pt-3">
													<button class="btn btn-success pull-right" id="actionUpdateBackground">'.$lang['button_update'].'</button>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tabStAbout">
											<div class="row">
												<div class="col-md-12">
													<b>'.$lang['label_st_about_name'].'</b>
													<input class="form-control rounded" type="text" placeholder="'.$lang['label_st_about_name'].'" id="stAboutName" value="'.ST_ABOUT_NAME.'" />
												</div>
												<div class="col-md-12 mt-3">
													<b>'.$lang['label_st_about_description'].'</b>
													<textarea class="form-control rounded" type="text" rows="9" placeholder="'.$lang['label_st_about_description'].'" id="stAboutDescription">'.ST_ABOUT_DESCRIPTION.'</textarea>
												</div>
												<div class="col-md-12 mt-3">
													<b>'.$lang['label_st_about_image'].'</b>
													<input class="form-control rounded" type="text" placeholder="'.$lang['label_st_about_image'].'" id="stAboutImage" value="'.ST_ABOUT_IMG.'" />
												</div>
												<div class="col-md-12 pt-3">
													<button class="btn btn-success pull-right" id="actionUpdateAbout">'.$lang['button_update'].'</button>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tabStSocialMedia">
											<div class="row">
												<div class="col-md-12">
													<b>'.$lang['label_st_sm_facebook'].'</b>
													<textarea class="form-control rounded" type="text" placeholder="'.$lang['label_st_sm_facebook'].'" id="stSmFacebook" rows="3">'.ST_SM_FACEBOOK.'</textarea>
												</div>
												<div class="col-md-12 mt-3">
													<b>'.$lang['label_st_sm_twitter'].'</b>
													<textarea class="form-control rounded" type="text" placeholder="'.$lang['label_st_sm_twitter'].'" id="stSmTwitter" rows="3">'.ST_SM_TWITTER.'</textarea>
												</div>
												<div class="col-md-12 mt-3">
													<b>'.$lang['label_st_sm_instagram'].'</b>
													<textarea class="form-control rounded" type="text" placeholder="'.$lang['label_st_sm_instagram'].'" id="stSmInstagram" rows="3">'.ST_SM_INSTAGRAM.'</textarea>
												</div>
												<div class="col-md-12 mt-3">
													<b>'.$lang['label_st_sm_linkedin'].'</b>
													<textarea class="form-control rounded" type="text" placeholder="'.$lang['label_st_sm_linkedin'].'" id="stSmLinkedIn" rows="3">'.ST_SM_LINKEDIN.'</textarea>
												</div>
												<div class="col-md-12 mt-3">
													<b>'.$lang['label_st_sm_behance'].'</b>
													<textarea class="form-control rounded" type="text" placeholder="'.$lang['label_st_sm_behance'].'" id="stSmBehance" rows="3">'.ST_SM_BEHANCE.'</textarea>
												</div>
												<div class="col-md-12 mt-3">
													<b>'.$lang['label_st_sm_github'].'</b>
													<textarea class="form-control rounded" type="text" placeholder="'.$lang['label_st_sm_github'].'" id="stSmGithub" rows="3">'.ST_SM_GITHUB.'</textarea>
												</div>
												<div class="col-md-12 pt-3">
													<button class="btn btn-success pull-right" id="actionUpdateSocialMedia">'.$lang['button_update'].'</button>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tabStMeta">
											<div class="row">
												<div class="col-md-8">
													<b>'.$lang['label_st_meta_google_site_verification'].'</b>
													<input class="form-control rounded" type="text" placeholder="'.$lang['label_st_meta_google_site_verification'].'" id="stMetaGoogleSiteVerification" value="'.ST_META_GOOGLE_SITE_VERIFICATION.'" />
												</div>
												<div class="col-md-4">
													<b>'.$lang['label_st_meta_google_adsense'].'</b>
													<input class="form-control rounded" type="text" placeholder="'.$lang['label_st_meta_google_adsense'].'" id="stMetaGoogleAdsense" value="'.ST_META_GOOGLE_ADSENSE.'" />
												</div>
												<div class="col-md-6 mt-3">
													<b>'.$lang['label_st_meta_google_analytics'].'</b>
													<input class="form-control rounded" type="text" placeholder="'.$lang['label_st_meta_google_analytics'].'" id="stMetaGoogleAnalytics" value="'.ST_META_GOOGLE_ANALYTICS.'" />
												</div>
												<div class="col-md-6 mt-3"></div>
												<div class="col-md-12 pt-3">
													<button class="btn btn-success pull-right" id="actionUpdateMeta">'.$lang['button_update'].'</button>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tabStMail">
											<div class="row">
												<div class="col-md-6">
													<b>'.$lang['label_st_mail_type'].'</b>
													<input class="form-control rounded" type="text" placeholder="'.$lang['label_st_mail_type'].'" id="stMailType" value="'.ST_MAIL_TYPE.'" />
												</div>
												<div class="col-md-6">
													<b>'.$lang['label_st_mail_site'].'</b>
													<input class="form-control rounded" type="text" placeholder="'.$lang['label_st_mail_site'].'" id="stMailSite" value="'.ST_MAIL_SITE.'" />
												</div>
												<div class="col-md-6 mt-3">
													<b>'.$lang['label_st_mail_sender'].'</b>
													<input class="form-control rounded" type="text" placeholder="'.$lang['label_st_mail_sender'].'" id="stMailSender" value="'.ST_MAIL_SENDER.'" />
												</div>
												<div class="col-md-6 mt-3">
													<b>'.$lang['label_st_mail_password'].'</b>
													<input class="form-control rounded" type="text" placeholder="'.$lang['label_st_mail_password'].'" id="stMailPassword" value="'.ST_MAIL_PASSWORD.'" />
												</div>
												<div class="col-md-12 pt-3">
													<button class="btn btn-success pull-right" id="actionUpdateMail">'.$lang['button_update'].'</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Main Content-->';
include("panel-inc-footer.php");
echo '<script>
/* Update Password */
$("#actionUpdatePassword").click(function(e){
	e.preventDefault();
	$("#actionUpdatePassword").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {userLastPassword:$("#iLastPassword").val(),userNewPassword: $("#iNewPassword").val(), userNewRePassword: $("#iNewRePassword").val(), actionUpdatePassword:"actionUpdatePassword"},
		success: function(result){
			if($.trim(result) == "success"){
				shortToast("'.$lang['message_update_password_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				setInterval(function(){ location.reload(); }, 1000);
			}else if($.trim(result) == "min_char_new_password"){
				shortToast("'.str_replace("%s", $config['min_char_uap'], $lang['message_update_password_min_char_new_password']).'", "'.$lang['label_alert_title_warning'].'", "error");
				$("#actionUpdatePassword").attr("disabled", false);
			}else if($.trim(result) == "min_char_new_repassword"){
				shortToast("'.str_replace("%s", $config['min_char_uap'], $lang['message_update_password_min_char_new_repassword']).'", "'.$lang['label_alert_title_warning'].'", "error");
				$("#actionUpdatePassword").attr("disabled", false);
			}else if($.trim(result) == "not_match_last_password"){
				shortToast("'.$lang['message_update_password_not_match_last_password'].'", "'.$lang['label_alert_title_warning'].'", "error");
				$("#actionUpdatePassword").attr("disabled", false);
			}else if($.trim(result) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_warning'].'", "error");
				$("#actionUpdatePassword").attr("disabled", false);
			}
		}
	});
});
/* Update Mail */
$("#actionUpdateMail").click(function(e){
	e.preventDefault();
	$("#actionUpdateMail").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {stMailType:$("#stMailType").val(), stMailSender:$("#stMailSender").val(), stMailPassword:$("#stMailPassword").val(), stMailSite:$("#stMailSite").val(), actionUpdateMail:"actionUpdateMail"},
		success: function(result){
			if($.trim(result) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_warning'].'", "error");
				$("#actionUpdateMail").attr("disabled", false);
			}else if($.trim(result) == "success"){
				shortToast("'.$lang['message_update_system_setting_mail_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				setInterval(function(){ location.reload(); }, 1000);
			}
		}
	});
});
/* Update Home */
$("#actionUpdateHome").click(function(e){
	e.preventDefault();
	$("#actionUpdateHome").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {stHomeTitle:$("#stHomeTitle").val(), stHomeDescription:$("#stHomeDescription").val(), stHomeKeyword:$("#stHomeKeyword").val(), stHomeFooter:$("#stHomeFooter").val(), actionUpdateHome:"actionUpdateHome"},
		success: function(result){
			if($.trim(result) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_warning'].'", "error");
				$("#actionUpdateHome").attr("disabled", false);
			}else if($.trim(result) == "success"){
				shortToast("'.$lang['message_update_system_setting_home_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				setInterval(function(){ location.reload(); }, 1000);
			}
		}
	});
});
/* Update Meta */
$("#actionUpdateMeta").click(function(e){
	e.preventDefault();
	$("#actionUpdateMeta").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {stMetaGoogleSiteVerification:$("#stMetaGoogleSiteVerification").val(), stMetaGoogleAdsense:$("#stMetaGoogleAdsense").val(), stMetaGoogleAnalytics:$("#stMetaGoogleAnalytics").val(), actionUpdateMeta:"actionUpdateMeta"},
		success: function(result){
			if($.trim(result) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_warning'].'", "error");
				$("#actionUpdateMeta").attr("disabled", false);
			}else if($.trim(result) == "success"){
				shortToast("'.$lang['message_update_system_setting_meta_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				setInterval(function(){ location.reload(); }, 1000);
			}
		}
	});
});
/* Update About */
$("#actionUpdateAbout").click(function(e){
	e.preventDefault();
	$("#actionUpdateAbout").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {stAboutName:$("#stAboutName").val(), stAboutDescription:$("#stAboutDescription").val(), stAboutImage:$("#stAboutImage").val(), actionUpdateAbout:"actionUpdateAbout"},
		success: function(result){
			if($.trim(result) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_warning'].'", "error");
				$("#actionUpdate").attr("disabled", false);
			}else if($.trim(result) == "success"){
				shortToast("'.$lang['message_update_system_setting_about_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				setInterval(function(){ location.reload(); }, 1000);
			}
		}
	});
});
/* Update Social Media */
$("#actionUpdateSocialMedia").click(function(e){
	e.preventDefault();
	$("#actionUpdateSocialMedia").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {stSmFacebook:$("#stSmFacebook").val(), 
		stSmTwitter:$("#stSmTwitter").val(), 
		stSmInstagram:$("#stSmInstagram").val(), 
		stSmLinkedIn:$("#stSmLinkedIn").val(), 
		stSmBehance:$("#stSmBehance").val(), 
		stSmGithub:$("#stSmGithub").val(),  
		actionUpdateSocialMedia:"actionUpdateSocialMedia"},
		success: function(result){
			if($.trim(result) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_warning'].'", "error");
				$("#actionUpdateSocialMedia").attr("disabled", false);
			}else if($.trim(result) == "success"){
				shortToast("'.$lang['message_update_system_setting_description_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				setInterval(function(){ location.reload(); }, 1000);
			}
		}
	});
});
/* Update Background */
$("#actionUpdateBackground").click(function(e){
	e.preventDefault();
	$("#actionUpdateBackground").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.BASE_URL.'action",
		data: {stBackgroundBanner:$("#stBackgroundBanner").val(), stBackgroundLeftbox:$("#stBackgroundLeftbox").val(), stBackgroundPartners:$("#stBackgroundPartners").val(), stBackgroundTestimonial:$("#stBackgroundTestimonial").val(), actionUpdateBackground:"actionUpdateBackground"},
		success: function(result){
			if($.trim(result) == "space"){
				shortToast("'.$lang['message_space'].'", "'.$lang['label_alert_title_warning'].'", "error");
				$("#actionUpdateBackground").attr("disabled", false);
			}else if($.trim(result) == "success"){
				shortToast("'.$lang['message_update_system_setting_background_success'].'", "'.$lang['label_alert_title_success'].'", "success");
				setInterval(function(){ location.reload(); }, 1000);
			}
		}
	});
});
</script>';
include("inc-end.php");
?>