<?php

add_theme_support('menus');

function register_theme_menus(){
	register_nav_menus(
		array(
			'primary-menu' => __('Primary Menu')
		)
	);
}

add_action('init','register_theme_menus');

function wp_theme_styles() {
	wp_enqueue_style('foundation_css', get_template_directory_uri() . '/css/foundation.css');
	wp_enqueue_style('fonts_css', 'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,600italic,700italic,800,800italic,400italic,300,300italic');
	wp_enqueue_style('main_css', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'wp_theme_styles');

function wp_theme_js(){
	wp_enqueue_script('modernizr_js', get_template_directory_uri().'/js/vendor/modernizr.js','','',false);
	wp_enqueue_script('jquery_js', get_template_directory_uri().'/js/vendor/jquery.js','','',true);
	wp_enqueue_script('foundation_min_js', get_template_directory_uri().'/js/foundaion.min.js',array('jquery'),'',false);
	wp_enqueue_script('foundation_js', get_template_directory_uri().'/js/foundation/foundation.js',array('jquery_js'),'',true);
	wp_enqueue_script('topbar_js', get_template_directory_uri().'/js/foundation/foundation.topbar.js','','',true);
	wp_enqueue_script('fastclick_js', get_template_directory_uri().'/js/vendor/fastclick.js','','',true);
	wp_enqueue_script('main_js', get_template_directory_uri().'/js/app.js','','',true);
}


add_action('wp_enqueue_scripts','wp_theme_js');
?>