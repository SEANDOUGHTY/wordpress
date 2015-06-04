<?php
/*
Plugin Name: Tabs
Plugin URI: http://paratheme.com/items/tabs-html-css3-responsive-tabs-for-wordpress/
Description: Fully responsive and mobile ready content tabs grid for wordpress.
Version: 1.2
Author: paratheme
Author URI: http://paratheme.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

define('tabs_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('tabs_plugin_dir', plugin_dir_path( __FILE__ ) );
define('tabs_wp_url', 'http://wordpress.org/plugins/timeline-ultimate' );
define('tabs_wp_reviews', 'http://wordpress.org/support/view/plugin-reviews/tabs' );
define('tabs_pro_url', 'http://paratheme.com/items/tabs-html-css3-responsive-tabs-for-wordpress/' );
define('tabs_demo_url', 'http://paratheme.com' );
define('tabs_conatct_url', 'http://paratheme.com/contact' );
define('tabs_qa_url', 'http://paratheme.com/qa/' );
define('tabs_plugin_name', 'Tabs' );
define('tabs_share_url', 'https://wordpress.org/plugins/tabs/' );
define('tabs_tutorial_video_url', '//www.youtube.com/embed/8OiNCDavSQg?rel=0' );

require_once( plugin_dir_path( __FILE__ ) . 'includes/tabs-meta.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/tabs-functions.php');


//Themes php files
require_once( plugin_dir_path( __FILE__ ) . 'themes/flat/index.php');



function tabs_init_scripts()
	{
		wp_enqueue_script('jquery');
		wp_enqueue_script('tabs_js', plugins_url( '/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_enqueue_script('jquery.responsiveTabs', plugins_url( '/js/jquery.responsiveTabs.js' , __FILE__ ) , array( 'jquery' ));		
		wp_enqueue_style('tabs_style', tabs_plugin_url.'css/style.css');
		wp_enqueue_style('responsive-tabs', tabs_plugin_url.'css/responsive-tabs.css');		

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'tabs_color_picker', plugins_url('/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		


		//ParaAdmin
		wp_enqueue_style('ParaAdmin', tabs_plugin_url.'ParaAdmin/css/ParaAdmin.css');
		wp_enqueue_style('ParaIcons', tabs_plugin_url.'ParaAdmin/css/ParaIcons.css');		
		wp_enqueue_script('ParaAdmin', plugins_url( 'ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));







		
		// Style for themes
		wp_enqueue_style('tabs-style-flat', tabs_plugin_url.'themes/flat/style.css');			

		
	}
add_action("init","tabs_init_scripts");


register_activation_hook(__FILE__, 'tabs_activation');


function tabs_activation()
	{
		$tabs_version= "1.2";
		update_option('tabs_version', $tabs_version); //update plugin version.
		
		$tabs_customer_type= "free"; //customer_type "free"
		update_option('tabs_customer_type', $tabs_customer_type); //update plugin version.
	}


function tabs_display($atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'id' => "",

				), $atts);


			$post_id = $atts['id'];

			$tabs_themes = get_post_meta( $post_id, 'tabs_themes', true );

			$tabs_display ="";

			if($tabs_themes== "flat")
				{
					$tabs_display.= tabs_body_flat($post_id);
				}

return $tabs_display;



}

add_shortcode('tabs', 'tabs_display');









add_action('admin_menu', 'tabs_menu_init');


	
function tabs_menu_help(){
	include('tabs-help.php');	
}





function tabs_menu_init()
	{

			
		add_submenu_page('edit.php?post_type=tabs', __('Help & Upgrade','menu-wpt'), __('Help & Upgrade','menu-wpt'), 'manage_options', 'tabs_menu_help', 'tabs_menu_help');

	}





?>