<?php
/**
 *	The header for the TAGlab theme
 *	Displays the <head> section and everything untll <div id="content">
 *
 *	@package taglab
 */
?>
<html>
	<head>
		<!--The title found in the tabs on the browser-->	
		<title><?php wp_title(''); ?></title> 
		<!--Loading the CSS and the spceified JS from the functions.php-->
		<?php wp_head();?>
	</head>
	<body class='f-topbar-fixed'>
		<!--The Navigaion Bar-->
		<header>
			<div class="fixed">
				<nav class="top-bar" data-topbar="" role="navigation" data-options='is_hover: false'>
					<!--The Title Section of the Navigation Bar-->
					<ul class="title-area">
						<li class="name">
							<!--TAGlab's LOGO-->
							<img class="logo" src="./img/Logo/3_s.jpg" alt='TAGlab'/>
						</li>
						<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
						<li class="toggle-topbar menu-icon"><a href=""><span></span></a></li>
					</ul>
					<section class="top-bar-section">
						<!--Right Nav Section-->
						<ul class="right">
							<!--The Menu Buttons-->
							<li><?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu' ) ); ?></li>
							<!--The DONATE Button-->
							<li class="has-form"> <a href="#" class='button'>Donate</a> </li>
						</ul>
					</section>
				</nav>
			</div>
		</header>