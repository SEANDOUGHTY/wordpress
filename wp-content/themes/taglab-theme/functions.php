<?php
//Allowing the Theme to support menus
add_theme_support('menus');
//Registering the Menus
function register_theme_menus(){
	register_nav_menus(
		array(
			'primary-menu' => __('Primary Menu'),
		)
	);
}

wp_nav_menu(array('theme_location' => 'primary-menu', 'walker'=> 'Top_Bar_Walker'));

//To add the register_theme_menus() function to the init() function
add_action('init','register_theme_menus');
//Allowing the theme to support thumbnails
add_theme_support('post-thumbnails');
//Sets the length of an exerpt
function wp_excerpt_length($length){
  return 16;
}
//To add the wp_excerpt_length() function to the excerpt_length() function
add_filter('excerpt_length','wp_excerpt_length',999);

function wp_theme_styles() {
	wp_enqueue_style('foundation_css', get_template_directory_uri() . '/css/foundation.css');
	wp_enqueue_style('fonts_css', 'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,600italic,700italic,800,800italic,400italic,300,300italic');
	wp_enqueue_style('main_css', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('typography_css', get_template_directory_uri() . '/css/typography.css');
}
//To add the wp_theme_styles() function to the wp_enqueue_scripts() function
add_action('wp_enqueue_scripts', 'wp_theme_styles');

function wp_theme_js(){
	wp_enqueue_script('modernizr_js', get_template_directory_uri().'/js/vendor/modernizr.js','','',false);
	wp_enqueue_script('foundation_min_js', get_template_directory_uri().'/js/foundaion.js',array('jquery'),'',false);
	wp_enqueue_script('jquery_js', get_template_directory_uri().'/js/vendor/jquery.js','','',true);
	wp_enqueue_script('foundation_js', get_template_directory_uri().'/js/foundation/foundation.js',array('jquery_js'),'',true);
	wp_enqueue_script('topbar_js', get_template_directory_uri().'/js/foundation/foundation.topbar.js','','',true);
	wp_enqueue_script('equalizer_js', get_template_directory_uri().'/js/foundation/foundation.equalizer.js','','',true);
	wp_enqueue_script('fastclick_js', get_template_directory_uri().'/js/vendor/fastclick.js','','',true);
	wp_enqueue_script('main_js', get_template_directory_uri().'/js/app.js','','',true);
}

//To add the wp_theme_js() function to the wp_enqueue_scripts() function
add_action('wp_enqueue_scripts','wp_theme_js');
//To add the create_post_type() function to the init() function
add_action( 'init', 'create_post_type' );

/**To create new post type (i.e. News Feed, Publications, etc)
  *To create a new post type add to the end of the function the following,
  *register_post_type("name of post variable", 
  *   array('labels'=>__("Name which appears on the Dashboard"),'singular_name'=>__("The name of single post(i.e. Article)"))
  *         'public'=>true,
  *         'has_archive'=>true/false Depends if you would like an archive for tags)
  *);
  */
function create_post_type() {
  register_post_type( 'news_feed',
    array(
      'labels' => array('name' => __( 'News Blog' ), 'singular_name' => __( 'Article' )),
      'public' => true,
      'has_archive' => false,
    )
  );
  register_post_type( 'Publications',
    array(
      'labels' => array('name' => __( 'Publications' ), 'singular_name' => __( 'Publication' )),
      'public' => true,
      'has_archive' => false,
    )
  );
}
/**
 * Top Bar Walker
 *
 * @since 1.0.0
 */
class Top_Bar_Walker extends Walker_Nav_Menu {
  /**
    * @see Walker_Nav_Menu::start_lvl()
   * @since 1.0.0
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param int $depth Depth of page. Used for padding.
  */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "\n<ul class=\"sub-menu dropdown\">\n";
    }

    /**
     * @see Walker_Nav_Menu::start_el()
     * @since 1.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param object $args
     */

    function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
        $item_html = '';
        parent::start_el( $item_html, $object, $depth, $args );  

        $output .= ( $depth == 0 ) ? '<li class="divider"></li>' : '';

        $classes = empty( $object->classes ) ? array() : ( array ) $object->classes;  

        if ( in_array('label', $classes) ) {
            $item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '<label>$1</label>', $item_html );
        }

    if ( in_array('divider', $classes) ) {
      $item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '', $item_html );
    }

        $output .= $item_html;
    }

  /**
     * @see Walker::display_element()
     * @since 1.0.0
   * 
   * @param object $element Data object
   * @param array $children_elements List of elements to continue traversing.
   * @param int $max_depth Max depth to traverse.
   * @param int $depth Depth of current element.
   * @param array $args
   * @param string $output Passed by reference. Used to append additional content.
   * @return null Null on failure with no changes to parameters.
   */
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $element->has_children = !empty( $children_elements[$element->ID] );
        $element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
        $element->classes[] = ( $element->has_children ) ? 'has-dropdown' : '';

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

}

?>