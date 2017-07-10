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
* Create ribbon settings page
*/
function ribbon_settings_page()
{
    ?>
	    <div class="wrap">
	    <h1>Ribbon Settings</h1>
			<p>This is where you can switch various ribbons on and off, as well as customise their settings.</p>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
							do_settings_sections("cookies-ribbon-options");
	            do_settings_sections("dev-ribbon-options");
							do_settings_sections("partner-ribbon-options");
	            submit_button();
	        ?>
	    </form>
		</div>
	<?php
}

function add_theme_menu_item()
{
	add_options_page("Ribbon Settings", "Ribbons", "manage_options", "ribbon-settings", "ribbon_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

function add_cookies_ribbon_checkbox()
{
	?>
		<input type="checkbox" name="cookies_ribbon_checkbox" id="cookies_ribbon_checkbox" value="0" <?php checked(0, get_option('cookies_ribbon_checkbox'), true); ?> />
	<?php
}

function add_cookies_ribbon_cookies_url()
{
	if ( get_option( 'cookies_ribbon_cookies_url' ) == null ) // if not set, offer default value
		update_option( 'cookies_ribbon_cookies_url', 'https://www.gov.uk/help/cookies' );
	?>
		<input class="widefat" type="text" name="cookies_ribbon_cookies_url" id="cookies_ribbon_cookies_url" value="<?php echo get_option('cookies_ribbon_cookies_url'); ?>" />
	<?php
}

function add_cookies_ribbon_browser_url()
{
	if ( get_option( 'cookies_ribbon_browser_url' ) == null ) // if not set, offer default value
		update_option( 'cookies_ribbon_browser_url', 'https://www.aboutcookies.org/' );
	?>
		<input class="widefat" type="text" name="cookies_ribbon_browser_url" id="cookies_ribbon_browser_url" value="<?php echo get_option('cookies_ribbon_browser_url'); ?>" />
	<?php
}

function add_dev_ribbon_selection()
{
	if ( get_option( 'dev_ribbon_selection' ) == false ) // default to 'none'
		update_option( 'dev_ribbon_selection', 'none' );
	?>
		<input type="radio" name="dev_ribbon_selection" id="dev_ribbon_selection" value="alpha" <?php checked('alpha', get_option('dev_ribbon_selection'), true); ?>>Alpha
		<input type="radio" name="dev_ribbon_selection" id="dev_ribbon_selection" value="beta" <?php checked('beta', get_option('dev_ribbon_selection'), true); ?>>Beta
		<input type="radio" name="dev_ribbon_selection" id="dev_ribbon_selection" value="none" <?php checked('none', get_option('dev_ribbon_selection'), true); ?>>None
	<?php
}

function add_dev_ribbon_url()
{
	?>
		<input class="widefat" type="text" name="dev_ribbon_url" id="dev_ribbon_url" value="<?php echo get_option('dev_ribbon_url'); ?>" />
	<?php
}

function add_partner_ribbon_checkbox()
{
	?>
		<input type="checkbox" name="partner_ribbon_checkbox" id="partner_ribbon_checkbox" value="0" <?php checked(0, get_option('partner_ribbon_checkbox'), true); ?> />
	<?php
}

function add_partner_ribbon_pages()
{
	?>
	<input class="widefat" type="textarea" name="partner_ribbon_pages" id="partner_ribbon_pages" value="<?php echo get_option('partner_ribbon_pages'); ?>" />
	<?php
}

function add_partner_ribbon_text()
{
	?>
	<input class="widefat" type="textarea" name="partner_ribbon_text" id="partner_ribbon_text" value="<?php echo get_option('partner_ribbon_text'); ?>" />
	<?php
}

function add_theme_panel_fields()
{
//	add_settings_section("section", "Cookies Ribbon", null, "cookies-ribbon-options", $icon_url = get_template_directory_uri().'/node_modules/nightingale/assets/img/logo-nhs.png');
	add_settings_section("section", "Cookies Ribbon", null, "cookies-ribbon-options");
		add_settings_field("cookies_ribbon_checkbox", "Display Cookies Ribbon?", "add_cookies_ribbon_checkbox", "cookies-ribbon-options", "section");
		add_settings_field("cookies_ribbon_cookies_url", "Cookies Information URL:", "add_cookies_ribbon_cookies_url", "cookies-ribbon-options", "section");
		add_settings_field("cookies_ribbon_browser_url", "Browser Settings URL:", "add_cookies_ribbon_browser_url", "cookies-ribbon-options", "section");
		register_setting("section", "cookies_ribbon_checkbox");
		register_setting("section", "cookies_ribbon_cookies_url");
		register_setting("section", "cookies_ribbon_browser_url");
	add_settings_section("section", "Development Ribbon", null, "dev-ribbon-options");
		add_settings_field("dev_ribbon_selection", "Ribbon Type:", "add_dev_ribbon_selection", "dev-ribbon-options", "section");
		add_settings_field("dev_ribbon_url", "Ribbon URL:", "add_dev_ribbon_url", "dev-ribbon-options", "section");
		register_setting("section", "dev_ribbon_selection");
		register_setting("section", "dev_ribbon_url");
	add_settings_section("section", "Partnership Ribbon", null, "partner-ribbon-options");
		add_settings_field("partner_ribbon_checkbox", "Display Partnership Ribbon?", "add_partner_ribbon_checkbox", "partner-ribbon-options", "section");
		add_settings_field("partner_ribbon_pages", "Ribbon Pages:", "add_partner_ribbon_pages", "partner-ribbon-options", "section");
		add_settings_field("partner_ribbon_text", "Ribbon Text:", "add_partner_ribbon_text", "partner-ribbon-options", "section");
		register_setting("section", "partner_ribbon_checkbox");
		register_setting("section", "partner_ribbon_pages");
		register_setting("section", "partner_ribbon_text");
}

add_action("admin_init", "add_theme_panel_fields");

/**
* Add ribbons after body tag
*/
function display_cookies_ribbon() {
// If cookies ribbon checkbox is selected, display cookies ribbon with URLs from settings
	if (get_option('cookies_ribbon_checkbox') != null) {
		echo 	'<div class="c-ribbon u-margin-bottom">
						<strong class="c-ribbon__body">By default this site uses <a href='.get_option('cookies_ribbon_cookies_url').' target="_blank">cookies</a> to collect information and improve. To control cookies, you can <a href='.get_option('cookies_ribbon_browser_url').' target="_blank">adjust your browser settings</a>.</strong>
					</div>';
	}
}
add_action('nightingale_before_header','display_cookies_ribbon');

function display_dev_ribbon() {
// If alpha or beta option is selected, display appropriate dev ribbon with URL from settings
// Note: the selection is used to define the CSS class that is used (e.g. c-ribbon--alpha or c-ribbon--beta) as well as the ribbon title
	$dev_ribbon_selection = get_option('dev_ribbon_selection');
	if ($dev_ribbon_selection == 'alpha' || $dev_ribbon_selection == 'beta') {
		echo 	'<div class="c-ribbon  c-ribbon--'.$dev_ribbon_selection.' u-margin-bottom">
						<div class="c-ribbon__icon">
							<strong class="c-ribbon__tag">'.$dev_ribbon_selection.'</strong>
						</div>
						<strong class="c-ribbon__body">This page is part of a new service - your <a href='.get_option('dev_ribbon_url').' target="_blank">feedback</a> will help us to improve it.</strong>
					</div>';
	}
}
add_action('nightingale_before_header','display_dev_ribbon');

function display_partner_ribbon($pageid) {
// Display partnership ribbon with text from settings
	// Read list of specified pages into array
	$pages_array = explode(',',get_option('partner_ribbon_pages'));
	// Loop through list of specified pages
	foreach($pages_array as $page_id) {
		// If current page matches, or no pages specified, display ribbon
		if ($page_id==null || $pageid==$page_id) {
			echo 	'<div class="c-ribbon  c-ribbon--live u-margin-bottom">
							<strong class="c-ribbon__body">In partnership with: '.get_option('partner_ribbon_text').'</strong>
						</div>';
		}
	}
}
// If partnership ribbon checkbox is selected, display partnership ribbon with text from settings
if (get_option('partner_ribbon_checkbox') != null) {
	// If specific pages set, display partnership ribbon above page content for those pages
	if(get_option('partner_ribbon_pages')!=null) {
		add_action('nightingale_before_content','display_partner_ribbon',10,1);	
	}
	// If no page specified, display partnership ribbon above page header for all pages
	else {
		add_action('nightingale_before_header','display_partner_ribbon');
	}
}