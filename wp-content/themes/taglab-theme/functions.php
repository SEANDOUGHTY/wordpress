<?php
//To add the register_theme_menus() function to the init() function
add_action('init','register_theme_menus');
//Sets the length of an exerpt
function wp_excerpt_length($length){
  return 16;
}
//To add the wp_excerpt_length() function to the excerpt_length() function
add_filter('excerpt_length','wp_excerpt_length',999);

function wp_theme_styles() {
	wp_enqueue_style('foundation_css', get_template_directory_uri() . '/css/foundation.css');
	wp_enqueue_style('fonts_css', 'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,600italic,700italic,800,800italic,400italic,300,300italic');
	wp_enqueue_style('typography_css', get_template_directory_uri() . '/css/typography.css');
  wp_enqueue_style('main_css', get_template_directory_uri() . '/style.css');
}
//To add the wp_theme_styles() function to the wp_enqueue_scripts() function
add_action('wp_enqueue_scripts', 'wp_theme_styles');

function wp_theme_js(){
	wp_enqueue_script('modernizr_js', get_template_directory_uri().'/js/vendor/modernizr.js','','',false);
	wp_enqueue_script('foundation_min_js', get_template_directory_uri().'/js/foundaion.js',array('jquery'),'',false);
	wp_enqueue_script('jquery_js', get_template_directory_uri().'/js/vendor/jquery.js','','',true);
	wp_enqueue_script('foundation_js', get_template_directory_uri().'/js/foundation/foundation.js',array('jquery_js'),'',true);
	wp_enqueue_script('topbar_js', get_template_directory_uri().'/js/foundation/foundation.topbar.js','','',true);
	wp_enqueue_script('reveal_js', get_template_directory_uri().'/js/foundation/foundation.reveal.js','','',true);
  wp_enqueue_script('equalizer_js', get_template_directory_uri().'/js/foundation/foundation.equalizer.js','','',true);
	wp_enqueue_script('fastclick_js', get_template_directory_uri().'/js/vendor/fastclick.js','','',true);
	wp_enqueue_script('main_js', get_template_directory_uri().'/js/app.js','','',true);
}

//Allowing the Theme to support menus
add_theme_support('menus');
//Registering the Menus
function register_theme_menus(){
  register_nav_menus(
    array(
      'primary-menu' => __('Primary Menu')
    )
  );
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
 register_post_type( 'news',
    array(
      'labels' => array('name' => __( 'News Blog' ), 'singular_name' => __( 'Article' )),
      'public' => true,
      'has_archive' => false,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt'),
    )
  );
  register_post_type( 'publications',
    array(
      'labels' => array('name' => __( 'Publications' ), 'singular_name' => __( 'Publication' )),
      'public' => true,
      'has_archive' => false,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt'),
    )
  );
  register_post_type( 'people',
    array(
      'labels' => array('name' => __( 'People' ), 'singular_name' => __( 'Person' )),
      'public' => true,
      'has_archive' => false,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt'),
      )
  );
  register_post_type( 'projects',
    array(
      'labels' => array('name' => __( 'Projects' ), 'singular_name' => __( 'Project' )),
      'public' => true,
      'has_archive' => false,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields'),
      )
  );
  register_post_type( 'sponsors',
    array(
      'labels' => array('name' => __( 'Sponsors' ), 'singular_name' => __( 'Sponsor' )),
      'public' => true,
      'has_archive' => false,
      'supports' => array( 'title', 'thumbnail'),
      )
  );
}

function category_init() {
  // create a new taxonomy
  register_taxonomy(
    'connection',
    array('news_feed','news','publications','projects','people'),
    array(
      'hierarchical'      => true,
      'label' => __( 'Connections' ),
      'rewrite' => array( 'slug' => 'connection', 'hierarchical'      => true)
      )
    );
    register_taxonomy(
    'related_projects',
    array('publications','people','sponsors'),
    array(
      'hierarchical'      => true,
      'label' => __( 'Related Projects' ),
      'rewrite' => array( 'slug' => 'related_projects', 'hierarchical'      => true)
      )
    );
 }
add_action( 'init', 'category_init' );


/**IMPORTANT: If any menu item of the navigation bar is required to be an action button
  *           then add the button to the below code (Follow steps 1 and 2 below)
  */
class button_walker extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth, $args) {
    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );

    /**STEP 1:  Add/Change the following code,
      *         if($item->title=='Menu Name Here' (OPTIONAL && $item->title=='Second Menu Name Here'...)){...}
      */
    if($item->title=='Contact'){
       $class_names = ' class="'. esc_attr( $class_names ) . ' has-form"';   
    } else {
      $class_names = ' class="'. esc_attr( $class_names ) . '"';
    }

    $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    $item_output = $args->before;
    
      /**STEP 2:  Add/Change the following code,
        *         if($item->title=='Menu Name Here' (OPTIONAL && $item->title=='Second Menu Name Here'...)){...}
        */
    if($item->title=='Contact'){
      $item_output .= '<a class="button"'. $attributes .'>';
    } else {
      $item_output .= '<a '. $attributes .'>';
    }
    $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
    $item_output .= $description.$args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}

  add_theme_support('post-thumbnails');
?>
