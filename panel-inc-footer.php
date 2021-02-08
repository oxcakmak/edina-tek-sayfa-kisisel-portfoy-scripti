<?php
echo '
		<!-- JQuery min js -->
		<script src="'.BASE_URL.'assets/panel/plugins/jquery/jquery.min.js"></script>

		<!-- Bootstrap Bundle js -->
		<script src="'.BASE_URL.'assets/panel/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Moment js -->
		<script src="'.BASE_URL.'assets/panel/plugins/moment/moment.js"></script>

		<!-- Sidebar js -->
		<script src="'.BASE_URL.'assets/panel/plugins/sidebar/sidebar.js"></script>
		<script src="'.BASE_URL.'assets/panel/plugins/sidebar/sidebar-custom.js"></script>

		<!-- Eva-Icons js -->
		<script src="'.BASE_URL.'assets/panel/plugins/web-fonts/eva.min.js"></script>

		<!-- Custom Scroll bar Js-->
		<script src="'.BASE_URL.'assets/panel/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!-- Side-menu JS-->
		<script src="'.BASE_URL.'assets/panel/plugins/sidemenu/sidemenu.js"></script>

		<!-- Perfect-scrollbar js -->
		<script src="'.BASE_URL.'assets/panel/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		
		<!-- Prism js -->
		<script src="'.BASE_URL.'assets/panel/plugins/prism/prism.js"></script>

		<!-- Rightside js -->
		<script src="'.BASE_URL.'assets/panel/js/right-side.js"></script>
		
		<!-- Perfect-scrollbar js -->
		<script src="'.BASE_URL.'assets/panel/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		
		<!-- Custom js -->
		<script src="'.BASE_URL.'assets/panel/js/custom.js"></script>
		
		<!-- Toast js -->
		<script src="'.BASE_URL.'assets/panel/plugins/toast/js/jquery.toast.js"></script>
		<script src="'.BASE_URL.'assets/panel/js/toast.js"></script>
		<script src="'.BASE_URL.'assets/panel/js/toastjs.js"></script>
		<script>
		function shortToast(tsText, tsHeading, tsIcon){
			return $.toast({
				text: tsText,
				heading: tsHeading,
				icon: tsIcon,
				showHideTransition: "fade",
				allowToastClose: true,
				hideAfter: 3000,
				stack: 5,
				position: "top-center",
				textAlign: "left",
				loader: true,
				loaderBg: "#9EC600",
			});
		}
		</script>';
		if(DEMO_MODE == 1){
			echo '
			<script>
			var _send = XMLHttpRequest.prototype.send;
			XMLHttpRequest.prototype.send = function() {
				/* Wrap onreadystaechange callback */
				var callback = this.onreadystatechange;
				this.onreadystatechange = function() {             
					if (this.readyState == 4) { shortToast("'.$lang['message_demo_mode'].'", "'.$lang['label_alert_title_danger'].'", "information"); }
					callback.apply(this, arguments);
				}
				_send.apply(this, arguments);
			}
			</script>
			';
		}
		if(isset($_SESSION['user_session'])){ echo '
		<script>
		var widgetArea = document.getElementsByClassName("app-content");
		$(".card").addClass("rounded");
		$(".page-header").addClass("mb-3 p-0");
		$(".user-info").css("display", "block");
		$(document).ready(function(){
			$("[id^=member_fullname]").text("'.USER_FIRSTNAME.' '.USER_LASTNAME.'");
			$("[id^=member_image]").attr("alt", "'.BASE_URL.USER_PICTURE.'");
			$("[id^=member_image]").attr("src", "'.BASE_URL.USER_PICTURE.'");
			$("[id^=member_role]").html(\'<span class="badge badge-success rounded">'.$lang['label_user_role_user'].'</span>\');
			$("#member_role_left").html(\'<span class="badge badge-success rounded">'.$lang['label_user_role_user'].'</span>\');
		});
		</script>'; }
?>