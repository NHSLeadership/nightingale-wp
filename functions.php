<?php
/**
 * nightingale-wp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nightingale-wp
 */

if ( ! function_exists( 'nightingale_wp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nightingale_wp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on nightingale-wp, use a find and replace
	 * to change 'nightingale-wp' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'nightingale-wp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'nightingale-wp' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'nightingale_wp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'nightingale_wp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nightingale_wp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nightingale_wp_content_width', 640 );
}
add_action( 'after_setup_theme', 'nightingale_wp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nightingale_wp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nightingale-wp' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'nightingale-wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// First header widget area, located in the header. Empty by default.
	register_sidebar( array(
		'name' => esc_html__( 'Header Widget Area 1', 'nightingale-wp' ),
		'id' => 'header-widget-area-1',
		'description' => esc_html__( 'The first header widget area', 'nightingale-wp' ),
		'before_widget' => '<div class="o-layout__item  u-4/12@lg">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	// First footer widget area, located in the footer. Empty by default.
	register_sidebar( array(
			'name' => esc_html__( 'Footer Widget Area 1', 'nightingale-wp' ),
			'id' => 'footer-widget-area-1',
			'description' => esc_html__( 'The first footer widget area', 'nightingale-wp' ),
			'before_widget' => '<div class="o-layout__item  u-4/12@lg">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
	) );

	// Second Footer Widget Area, located in the footer. Empty by default.
	register_sidebar( array(
			'name' => esc_html__( 'Footer Widget Area 2', 'nightingale-wp' ),
			'id' => 'footer-widget-area-2',
			'description' => esc_html__( 'The second footer widget area', 'nightingale-wp' ),
			'before_widget' => '<div class="o-layout__item  u-4/12@lg">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
	) );

	// Third Footer Widget Area, located in the footer. Empty by default.
	register_sidebar( array(
			'name' => esc_html__( 'Footer Widget Area 3', 'nightingale-wp' ),
			'id' => 'footer-widget-area-3',
			'description' => esc_html__( 'The third footer widget area', 'nightingale-wp' ),
			'before_widget' => '<div class="o-layout__item  u-4/12@lg">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
	) );

}
add_action( 'widgets_init', 'nightingale_wp_widgets_init' );

/**
* Nightingale banner widgets
*/
// Register and load the widgets
function load_banner_widgets() {
	register_widget( 'beta_banner_widget' );
}
add_action( 'widgets_init', 'load_banner_widgets' );

/**
* BETA banner widget
*/
// Creating the widget 
class beta_banner_widget extends WP_Widget {

function __construct() {
parent::__construct(

// Base ID of the widget
'beta_banner_widget', 

// Widget name will appear in UI
__('BETA Banner Widget', 'beta_banner_widget_domain'), 

// Widget description
array( 'description' => __( 'Beta banner widget', 'beta_banner_widget_domain' ), ) 
);
}

// Creating widget front-end

public function widget( $args, $instance ) {
$url = apply_filters( 'url', $instance['url'] );

$banner_text = '<div class="c-ribbon  c-ribbon--alpha  u-margin-bottom">
    <div class="c-ribbon__icon">
      <strong class="c-ribbon__tag">Beta</strong>
    </div>
    <strong class="c-ribbon__body">This page is part of a new service - your <a href=';
$banner_text .=	$url;
$banner_text .=	' target="_blank">feedback</a> will help us to improve it.</strong>
  </div>';

// Display the widget output
echo __( $banner_text, 'beta_banner_widget_domain' );
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'url' ] ) ) {
$url = $instance[ 'url' ];
}
else {
$url = __( 'New url', 'beta_banner_widget_domain' );
}
// Widget admin form
?>
<p>This widget displays a banner announcing that the website is currently in beta testing. You can define the URL that is linked to in the feedback link. Please note that this widget should only ever be used in a <strong>Header Widget area</strong>.</p>
<p>
<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'Feedback URL:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
return $instance;
}
} // Class beta_banner_widget ends here

/**
 * Enqueue scripts and styles.
 */
function nightingale_wp_scripts() {
	wp_enqueue_style( 'nightingale-wp-style', get_stylesheet_uri() );

	wp_enqueue_script( 'nightingale-wp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'nightingale-wp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nightingale_wp_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';