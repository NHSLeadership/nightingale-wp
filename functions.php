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

/**
* Create banner settings page
*/
function banner_settings_page()
{
    ?>
	    <div class="wrap">
	    <h1>Banner Settings</h1>
			<p>This is where you can switch various banners on and off, as well as customise their settings.</p>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("banner-options");
	            submit_button();
	        ?>
	    </form>
		</div>
	<?php
}

function add_theme_menu_item()
{
	add_menu_page("Banner Settings", "Banners", "manage_options", "banner-settings", "banner_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

function add_dev_banner_selection()
{
	if ( get_option( 'dev_banner_selection' ) === false ) // default to 'none'
		update_option( 'dev_banner_selection', 'none' );
	?>
		<input type="radio" name="dev_banner_selection" value="alpha" <?php checked('alpha', get_option('dev_banner_selection'), true); ?>>Alpha
		<input type="radio" name="dev_banner_selection" value="beta" <?php checked('beta', get_option('dev_banner_selection'), true); ?>>Beta
		<input type="radio" name="dev_banner_selection" value="none" <?php checked('none', get_option('dev_banner_selection'), true); ?>>None
	<?php
}

function add_dev_banner_url()
{
	?>
		<input class="widefat" type="text" name="dev_banner_url" id="dev_banner_url" value="<?php echo get_option('dev_banner_url'); ?>" />
	<?php
}

function add_theme_panel_fields()
{
	add_settings_section("section", "Dev Banner", null, "banner-options");
		add_settings_field("dev_banner_selection", "Choose Dev Banner:", "add_dev_banner_selection", "banner-options", "section");
		add_settings_field("dev_banner_url", "Dev Banner URL:", "add_dev_banner_url", "banner-options", "section");
		register_setting("section", "dev_banner_selection");
		register_setting("section", "dev_banner_url");
}

add_action("admin_init", "add_theme_panel_fields");

/**
* Add banners after body tag
*/
function display_dev_banner() {
// If alpha or beta option is selected, display appropriate dev banner
// Note: the selection is used to define the CSS class that is used (e.g. c-ribbon--alpha or c-ribbon--beta) as well as the banner title
	$dev_banner_selection = get_option('dev_banner_selection');
	if ($dev_banner_selection == 'alpha' || $dev_banner_selection == 'beta') {
		echo 	'<div class="c-ribbon  c-ribbon--'.$dev_banner_selection.' u-margin-bottom">
						<div class="c-ribbon__icon">
							<strong class="c-ribbon__tag">'.$dev_banner_selection.'</strong>
						</div>
						<strong class="c-ribbon__body">This page is part of a new service - your <a href='.get_option('dev_banner_url').' target="_blank">feedback</a> will help us to improve it.</strong>
					</div>';
	}
}
add_action('nightingale_before_header','display_dev_banner');