<?php
echo '
<style>
.edina_tm_about_wrap .author_wrap .leftbox{background-image: url('.BASE_URL.ST_ABOUT_IMG.');}
.edina_tm_universal_box_wrap .overlay_image.testimonial{background-image: url('.BASE_URL.ST_BG_TESTIMONIAL.');}
.edina_tm_universal_box_wrap .overlay_image.partners{background-image: url('.BASE_URL.ST_BG_PARTNERS.');}
.edina_tm_about_wrap.homepage_second .leftbox{background-image: url('.BASE_URL.ST_BG_LEFTBOX.');}
.edina_tm_universal_box_wrap .overlay_image.hero{background-image: url('.BASE_URL.ST_BG.');}
</style>
</head>
<body>

<!-- WRAPPER ALL -->
<div class="edina_tm_wrapper_all">

	<div id="edina_tm_popup_blog">
		<div class="container">
			<div class="inner_popup scrollable"></div>
		</div>
		<span class="close"><a href="#"></a></span>
	</div>
	
    <!-- HEADER -->
    <header class="edina_tm_header">
		<div class="edina_tm_navigation_wrap">
			<div class="container">
				<div class="navigation_inner">
					<div class="logo">
						<a class="dark_logo" href="#"><img src="'.BASE_URL.ST_LOGO.'" alt="'.STUCK.'" /></a>
					</div>
					<div class="nav_list_wrap">
						<div class="menu">
							<ul class="anchor_nav">
								<li><a href="#home">'.$lang['menu_home'].'</a></li>
                                <li><a href="#about">'.$lang['menu_about'].'</a></li>
                                <li><a href="#services">'.$lang['menu_services'].'</a></li>
								<li><a href="#portfolio">'.$lang['menu_portfolio'].'</a></li>
								<li><a href="#testimonials">'.$lang['menu_testimonial'].'</a></li>
								<li><a href="#news">'.$lang['menu_blog'].'</a></li>
								<!-- <li><a href="#contact">'.$lang['menu_contact'].'</a></li> -->
							</ul>
						</div>
						<div class="social_icons_wrap">
							<ul>
								<li><a href="'.ST_SM_FACEBOOK.'"><i class="fa fa-facebook"></i></a></li>
								<li><a href="'.ST_SM_TWITTER.'"><i class="fa fa-twitter"></i></a></li>
								<li><a href="'.ST_SM_INSTAGRAM.'"><i class="fa fa-instagram"></i></a></li>
								<li><a href="'.ST_SM_LINKEDIN.'"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="'.ST_SM_BEHANCE.'"><i class="fa fa-behance"></i></a></li>
								<li><a href="'.ST_SM_GITHUB.'"><i class="fa fa-github"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="edina_tm_trigger">
						<div class="hamburger hamburger--collapse-r">
							<div class="hamburger-box">
								<div class="hamburger-inner"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
   		<div class="edina_tm_mobile_menu_wrap">
   			<div class="mob_menu">
				<ul class="anchor_nav">
					<li><a href="#home">'.$lang['menu_home'].'</a></li>
					<li><a href="#about">'.$lang['menu_about'].'</a></li>
					<li><a href="#services">'.$lang['menu_services'].'</a></li>
					<li><a href="#portfolio">'.$lang['menu_portfolio'].'</a></li>
					<li><a href="#testimonials">'.$lang['menu_testimonial'].'</a></li>
					<li><a href="#news">'.$lang['menu_blog'].'</a></li>
					<li><a href="#contact">'.$lang['menu_contact'].'</a></li>
				</ul>
			</div>
		</div>
    </header>
    <!-- /HEADER -->
';
?>