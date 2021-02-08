<?php
include('inc-header.php');
$oxcakmak->metaRobots(1);
$oxcakmak->metaTitle(ST_HOME_TITLE, STUCK);
$oxcakmak->metaDescription(ST_HOME_DESCRIPTION);
$oxcakmak->metaKeyword(ST_HOME_KEYWORD);
$oxcakmak->metaAuthor(strtoupper(STUCK));
//$oxcakmak->metaGoogleSiteVerification(ST_META_GOOGLE_SITE_VERIFICATION);
$oxcakmak->metaGoogleAnalytics(ST_META_GOOGLE_ANALYTICS);
$oxcakmak->metaGoogleAdsense(ST_META_GOOGLE_ADSENSE);
include('inc-menu.php');
echo '
    <!-- CONTENT -->
	<div class="edina_tm_content">
	
		<!-- HERO -->
		<div class="edina_tm_section" id="home">
			<div class="edina_tm_hero_header">
				<div class="edina_tm_universal_box_wrap">
					<div class="bg_wrap">
						<div class="overlay_image hero jarallax" data-speed="0"></div>
						<div class="overlay_video"></div>
						<div class="overlay_color hero"></div>
					</div>
					<div class="content hero">
						<div class="container hero">
							<div class="hero_title"><img src="'.BASE_URL.ST_BG_AUTHOR.'" alt="'.ST_HOME_TITLE.'" /></div>
						</div>
						<div class="edina_tm_discover_wrap anchor">
							<span><a href="#about">'.$lang['menu_discover'].'</a></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /HERO -->

		<!-- ABOUT -->
		<div class="edina_tm_section" id="about">
			<div class="container">
				<div class="edina_tm_main_title_holder_wrap about">
					<div class="number_wrap">
						<span>01</span>
					</div>
					<div class="title_wrap"><span>'.$lang['menu_about'].'</span></div>
				</div>
				<div class="edina_tm_about_wrap">
					<div class="author_wrap">
						<div class="leftbox"></div>
						<div class="rightbox">
							<div class="name_holder"><h3>'.ST_ABOUT_NAME.'</h3></div>
							<div class="definition"><p>'.nl2br(ST_ABOUT_DESCRIPTION).'</p></div>
							<!--
							<div class="sharebox">
								<ul>
									<li class="wow fadeIn" data-wow-duration="1.2s"><span>'.$lang['label_share'].'</span></li>
									<li class="wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.2s"><a href="#"><i class="xcon-facebook"></i></a></li>
									<li class="wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.4s"><a href="#"><i class="xcon-twitter"></i></a></li>
									<li class="wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.6s"><a href="#"><i class="xcon-linkedin"></i></a></li>
									<li class="wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.8s"><a href="#"><i class="xcon-instagram"></i></a></li>
									<li class="wow fadeIn" data-wow-duration="1.2s" data-wow-delay="1s"><a href="#"><i class="xcon-pinterest"></i></a></li>
								</ul>
							</div>
							-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /ABOUT -->

		<!-- SERVICES -->
		<div class="edina_tm_section" id="services">
			<div class="edina_tm_services_total_wrap">
				<div class="container">
					<div class="edina_tm_main_title_holder_wrap">
						<div class="number_wrap">
							<span>02</span>
						</div>
						<div class="title_wrap"><span>'.$lang['menu_services'].'</span></div>
					</div>
					<div class="edina_tm_services_wrap">
						<div class="edina_tm_list_wrap" data-column="3" data-space="70">
							<ul class="total">';
							$dbh->orderBy("service_id", "DESC");
							foreach($dbh->get("service") as $sRow){
								echo '
								<li class="wow fadeIn" data-wow-duration="1.2s">
									<div class="inner_list">
										<div class="service_icon"><i class="'.$sRow['service_icon'].' fa-2x" style="color:#fff;"></i></div>
										<div class="service_title"><h3>'.$sRow['service_title'].'</h3></div>
										<div class="service_definition"><p>'.$sRow['service_description'].'</p></div>
										<span class="first"></span>
										<span class="second"></span>
									</div>
								</li>
								';
							}
								echo '
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /SERVICES -->
		
		<!-- PORTFOLIO -->
		<div class="edina_tm_section" id="portfolio">
			<div class="container">
				<div class="edina_tm_portfolio_wrap">
					<div class="edina_tm_main_title_holder_wrap portfolio">
						<div class="number_wrap">
							<span>03</span>
						</div>
						<div class="title_wrap"><span>'.$lang['menu_portfolio'].'</span></div>
					</div>
					<ul class="edina_tm_portfolio_filter">
						<li><a href="#" class="current" data-filter="*">'.$lang['label_all'].'</a></li>'; 
							$dbh->orderBy("category_slug", "ASC"); 
							foreach($dbh->get("category") as $catRow){ echo '<li><a href="#" data-filter=".'.$catRow['category_slug'].'">'.$catRow['category_title'].'</a></li>'; }
                        echo '</ul>
					</ul>
					<ul class="edina_tm_portfolio_list gallery_zoom">'; 
					$dbh->orderBy("portfolio_id", "DESC"); 
					foreach($dbh->get("portfolio") as $pRow){ 
					$dbh->where("category_slug", $pRow['portfolio_category']);
					$cat = $dbh->getOne("category");
					echo '
						<li class="'.$pRow['portfolio_category'].'">
							<div class="list_inner">
								<div class="image_wrap">
									<img src="'.BASE_URL.$pRow['portfolio_picture'].'" alt="'.$pRow['portfolio_title'].'" />
									<div class="main_image" style="background-image: url('.BASE_URL.$pRow['portfolio_picture'].');"></div>
								</div>
								<div class="definition_portfolio">
									<span class="first"><a class="zoom" href="'.BASE_URL.$pRow['portfolio_picture'].'">'.$pRow['portfolio_title'].'</a></span>
									<span class="second">'.$cat['category_title'].'</span>
								</div>
							</div>
						</li>'; 
						}
					echo '
					</ul>
				</div>
			</div>
		</div>
		<!-- /PORTFOLIO -->
		
		<!-- TESTIMONIALS -->
		<div class="edina_tm_section" id="testimonials">
			<div class="edina_tm_testimonial_wrap">
				<div class="edina_tm_universal_box_wrap">
					<div class="bg_wrap hero">
						<div class="overlay_image testimonial jarallax" data-speed="0"></div>
						<div class="overlay_color testimonial"></div>
					</div>
					<div class="content testimonial">
						<div class="edina_tm_main_title_holder_wrap testimonial">
							<div class="number_wrap">
								<span>04</span>
							</div>
							<div class="title_wrap"><span>'.$lang['menu_testimonial'].'</span></div>
						</div>
						<div class="container">
							<div class="carousel_wrap">
								<ul class="owl-carousel">';
								$dbh->orderBy("testimonial_id", "DESC");
								foreach($dbh->get("testimonial") as $tRow){
									echo '
									<li class="item">
										<div class="inner">
											<div class="image_holder">
												<img src="'.BASE_URL.$tRow['testimonial_picture'].'" alt="'.$tRow['testimonial_fullname'].' - '.$tRow['testimonial_job'].'" />
											</div>
											<div class="definition">
												<p>'.$tRow['testimonial_comment'].'</p>
											</div>
											<div class="svg_wrap"><i class="xcon-quote-left"></i></div>
											<div class="name_holder_wrap">
												<span class="name">'.$tRow['testimonial_fullname'].'</span>
												<span class="job">'.$tRow['testimonial_job'].'</span>
											</div>
										</div>
									</li>
									';
								}
								echo '
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /TESTIMONIALS -->

		<!-- NEWS -->
		<div class="edina_tm_section" id="news">
			<div class="edina_tm_news_wrap">
				<div class="container">
					<div class="edina_tm_main_title_holder_wrap news">
						<div class="number_wrap"><span>05</span></div>
						<div class="title_wrap"><span>'.$lang['menu_blog'].'</span></div>
					</div>
					<div class="edina_tm_list_wrap blog_list" data-column="3" data-space="30">
						<ul class="total">';
						$dbh->orderBy("thread_id", "DESC");
						foreach($dbh->get("thread", 3) as $trRow){
							echo '
							<li class="wow fadeInUp" data-wow-duration="1.2s">
								<div class="inner_list">
									<div class="image_wrap">
										<img class="small" src="'.BASE_URL.$trRow['thread_picture'].'" alt="'.$trRow['thread_title'].'" />
										<img class="big" src="'.BASE_URL.$trRow['thread_picture'].'" alt="'.$trRow['thread_title'].'" />
										<div class="news_image" data-url="'.BASE_URL.$trRow['thread_picture'].'"></div>
										<a class="link_news" href="#"></a>
									</div>
									<div class="definitions_wrap">
										<!-- <div class="date_wrap"><p>January 22, 2018 <a href="index.html">Logos</a></p></div> -->
										<div class="title_holder"><h3><a href="#">'.$trRow['thread_title'].'</a></h3></div>
										<div class="definition"><p>'.$trRow['thread_description'].'</p></div>
										<div class="full_def"><p>'.$trRow['thread_content'].'</p></div>
										<!--
										<div class="edina_tm_popup_share_wrap">
											<ul>
												<li><a href="#">Facebook</a></li>
												<li><a href="#">Twitter</a></li>
												<li><a href="#">Linkedin</a></li>
												<li><a href="#">Behance</a></li>
											</ul>
										</div>
										-->
										<div class="read_more"><a href="#"><span>'.$lang['button_read_more'].'</span></a></div>
									</div>
								</div>
							</li>
							';
						}
						echo '
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /NEWS -->

		<!-- PARTNERS -->
		<div class="edina_tm_section">
			<div class="edina_tm_partners_wrap_total">
				<div class="edina_tm_universal_box_wrap">
					<div class="bg_wrap">
						<div class="overlay_image partners jarallax" data-speed="0"></div>
						<div class="overlay_color partners"></div>
					</div>
					<div class="content partners">
						<div class="container">
							<div class="edina_tm_partners_wrap">
								<ul class="owl-carousel">';
								$dbh->orderBy("client_id", "DESC");
								foreach($dbh->get("client") as $clientRow){ echo '<li class="item"><img src="'.BASE_URL.$clientRow['client_picture'].'" alt="'.$clientRow['client_title'].'" /></li>'; }
								echo '
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /PARTNERS -->
		
		<!-- 
		<div class="edina_tm_section">
			<div class="container">
				<div class="edina_tm_work_together_total">
					<div class="edina_tm_work_together_wrap">
						<h3 class="wow fadeIn" data-wow-duration="1.2s">Lets work together</h3>
						<p class="wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.2s">Out believe has request not how comfort evident. Up delight cousins we feeling minutes. Genius has looked end piqued spring.</p>
						<div class="invite wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.4s">
							<a href="#">Send Message</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="edina_tm_section" id="contact">
			<div class="edina_tm_main_title_holder_wrap contact">
				<div class="number_wrap">
					<span>06</span>
				</div>
				<div class="title_wrap">
					<span>Contact Me</span>
				</div>
			</div>
			<div class="edina_tm_contact_wrap">
				<div class="short_info">
					<div class="container">
						<div class="subtitle">
							<p class="wow fadeIn" data-wow-duration="1.2s">Any question? Reach out to me and I will get back to you shortly.</p>
						</div>
					</div>
				</div>
				<div class="main_input_wrap">
					<form action="/" method="post" class="contact_form" id="contact_form">
						<div class="returnmessage" data-success="Your message has been received, We will contact you soon."></div>
						<div class="empty_notice"><span>Please Fill Required Fields</span></div>
						<div class="wrap wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.2s">
							<input id="name" type="text" placeholder="Your Name">
						</div>
						<div class="wrap wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.4s">
							<input id="email" type="text" placeholder="Your Email">
						</div>
						<div class="wrap wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.6s">
							<textarea id="message" placeholder="Your Message"></textarea>
						</div>
						<div class="edina_tm_button wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.8s">
							<a id="send_message" href="#">Send Message</a>
						</div>
					</form>
				</div>
			</div>
		</div>
		 -->
';
include('inc-footer.php');
include('inc-end.php');
?>