<?php
/**
 *	The header for the TAGlab theme
 *	Displays the <head> section and everything tll <div id="content">
 *
 *	@package taglab
 */
?>
<html>
	<head>
		<title><?php wp_title(); ?></title> 
		<?php wp_head();?>
	</head>
	<body class='f-topbar-fixed'>
		<header>
			<div class="fixed">
  				<nav class="top-bar" data-topbar="" role="navigation" data-options='is_hover: false'>
  					<ul class="title-area">
    					<li class="name">
      						<h1><a href="">TAGlab</a></h1>
 					   </li>
					     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    					<li class="toggle-topbar menu-icon"><a href=""><span></span></a></li>
  					</ul>
  					<section class="top-bar-section">
   					<!-- Right Nav Section -->
 						<ul class="right">
 					    <li><?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu' ) ); ?></li>
              <li class="has-form"> <a href="#" class='button'>Donate</a> </li>
   					</ul>
 					 </section>
				</nav>
			</div>
		</header>