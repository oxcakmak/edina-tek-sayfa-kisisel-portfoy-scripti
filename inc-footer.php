<?php
echo '
<!-- FOOTER -->
<div class="edina_tm_section"><div class="edina_tm_footer_wrap"><p class="wow fadeIn"  data-wow-duration="1.2s">'.str_replace("%date%", date("Y"), ST_FOOTER_COPYRIGHT_TEXT).'</p></div></div>
<!-- /FOOTER -->
		
	</div>
	<!-- /CONTENT -->
  	
  	<!-- TOP TOP -->
	<div class="edina_tm_to_top_wrap"><a href="#">'.$lang['label_turn_back_top'].'</a>  </div>	
 	<!-- /TO TOP -->       	
  	       	
</div>
<!-- / WRAPPER ALL -->
	<!-- SCRIPTS -->
<script src="'.BASE_URL.'assets/index/js/jquery.js"></script>
<!--[if lt IE 10]> <script type="text/javascript" src="js/ie8.js"></script> <![endif]-->	
<script src="'.BASE_URL.'assets/index/js/plugins.js"></script>
<script src="'.BASE_URL.'assets/index/js/init.js"></script>
<!-- /SCRIPTS -->
';
?>