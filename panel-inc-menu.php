<?php
echo '
</head><body class="main-body app sidebar-mini">
<!-- main-header -->
		<div class="main-header">
			<div class="container-fluid">
				<div class="main-header-left">
					<!--logo-->
					<div>
						<a class="main-logo desktop-logo" href="'.BASE_URL.'panel">'.STUCK.'</a>
						<a class="main-logo mobile-logo" href="'.BASE_URL.'panel">'.STUCK.'</a>
						<a class="main-logo dark-theme-logo" href="'.BASE_URL.'panel">'.STUCK.'</a>
					</div>
					<!--/logo-->
					<!-- sidebar-toggle-->
					<div class="app-sidebar__toggle" data-toggle="sidebar">
						<a class="open-toggle" href="#"><i class="header-icons" data-eva="menu-outline"></i></a>
						<a class="close-toggle" href="#"><i class="header-icons" data-eva="close-outline"></i></a>
					</div>
					<!-- /sidebar-toggle-->
				</div>
				<div class="main-header-right ml-auto">
					<!--
					<div class="dropdown main-profile-menu">
						<a class="main-img-user" href="">
							<img  id="member_image">
						</a>
						<div class="dropdown-menu">
							<div class="main-header-profile"><h6 id="member_fullname">Peter Hill</h6><span id="member_role">Administrator</span></div>
							<a class="dropdown-item" href="'.BASE_URL.'panel/profile"><i class="si si-user"></i>&nbsp;'.$lang['menu_profile'].'</a>
							<a class="dropdown-item" href="'.BASE_URL.'panel/"><i class="si si-envelope-open"></i>&nbsp;Inbox</a>
							<a class="dropdown-item" href="'.BASE_URL.'panel/"><i class="si si-calendar"></i>&nbsp;Activity</a>
							<a class="dropdown-item" href="'.BASE_URL.'panel/profile"><i class="si si-settings"></i>&nbsp;'.$lang['label_settings'].'</a>
							<a class="dropdown-item" href="'.BASE_URL.'panel/logout"><i class="si si-power"></i>&nbsp;'.$lang['label_logout'].'</a>
						</div>
					</div>
					-->
				</div>
			</div>
		</div>
		<!--/main-header-->

		<!--App Sidebar-->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar">
			
			<div class="app-sidebar__user clearfix">
				<div class="user-pro-body">
					<div class="sideuser-img"><img id="member_image"> <span class="sidebar-icon"></span>
					</div>
					<div class="user-info">
						<h2 class="app-sidebar__user-name" id="member_fullname">-</h2>
						<span class="app-sidebar__title"><div id="member_role_left"></div></span>
					</div>
				</div>
			</div>
			
			<ul class="side-menu">
				<li><h3>'.$lang['menu_panel'].'</h3></li>
				<li><a class="side-menu__item" href="'.BASE_URL.'panel/dashboard"><span class="side-menu__label">'.$lang['menu_panel'].'</span></a></li>
				<!--
				<li><h3>'.$lang['menu_home'].'</h3></li>
				<li class="slide">
					<a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">'.$lang['menu_home'].'</span><i class="angle fe fe-chevron-down"></i></a>
					<ul class="slide-menu">
						<li><a class="slide-item" href="'.BASE_URL.'panel/">'.$lang['menu_home'].'</a></li>
						<li><a class="slide-item" href="'.BASE_URL.'panel/">'.$lang['menu_home'].'</a></li>
						<li><a class="slide-item" href="'.BASE_URL.'panel/">'.$lang['menu_home'].'</a></li>
						<li><a class="slide-item" href="'.BASE_URL.'panel/">'.$lang['menu_home'].'</a></li>
					</ul>
				</li>
				-->
				<li><a class="side-menu__item" href="'.BASE_URL.'panel/blog"><span class="side-menu__label">'.$lang['menu_blog'].'</span></a></li>
				<li><a class="side-menu__item" href="'.BASE_URL.'panel/portfolio"><span class="side-menu__label">'.$lang['menu_portfolio'].'</span></a></li>
				<li><a class="side-menu__item" href="'.BASE_URL.'panel/category"><span class="side-menu__label">'.$lang['menu_category'].'</span></a></li>
				<li><a class="side-menu__item" href="'.BASE_URL.'panel/media"><span class="side-menu__label">'.$lang['menu_media_management'].'</span></a></li>
				<li><a class="side-menu__item" href="'.BASE_URL.'panel/testimonial"><span class="side-menu__label">'.$lang['menu_testimonial'].'</span></a></li>
				<li><a class="side-menu__item" href="'.BASE_URL.'panel/service"><span class="side-menu__label">'.$lang['menu_services'].'</span></a></li>
				<li><a class="side-menu__item" href="'.BASE_URL.'panel/team"><span class="side-menu__label">'.$lang['menu_team'].'</span></a></li>
				<li><a class="side-menu__item" href="'.BASE_URL.'panel/client"><span class="side-menu__label">'.$lang['menu_client'].'</span></a></li>
				<li><a class="side-menu__item" href="'.BASE_URL.'panel/counter"><span class="side-menu__label">'.$lang['menu_counter'].'</span></a></li>
				<li><a class="side-menu__item" href="'.BASE_URL.'panel/settings"><span class="side-menu__label">'.$lang['menu_settings'].'</span></a></li>
				<li><a class="side-menu__item" href="'.BASE_URL.'panel/logout"><span class="side-menu__label">'.$lang['menu_logout'].'</span></a></li>
			</ul>
		</aside>
		<!--/App Sidebar-->
';
?>