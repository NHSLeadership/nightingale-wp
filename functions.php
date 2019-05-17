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
		'primary' => esc_html__( 'Primary', 'nightingale-wp' ),
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

	// Modify comment form
	function nightingale_comment_form_defaults( $defaults ) {
		$defaults['class_form'] = 'c-form-region u-margin-bottom-small u-padding-bottom-tiny';
		$defaults['comment_notes_before'] = '';
		$defaults['logged_in_as'] = '';
		$defaults['title_reply'] = '';
		$defaults['class_submit'] = 'c-btn  c-btn--submit c-btn--full';
		$defaults['label_submit'] = __( 'Submit', 'nightingale-wp' );
		$defaults['comment_field'] = '<label for="comment">'.__( 'Leave a Comment', 'nightingale-wp' ).'</label><textarea id="comment" name="comment" cols="50" rows="8" maxlength="65525" aria-required="true" class="c-form-input c-form-comment c-form-list__item" placeholder="'.__( 'Enter your comment here… (Optional)', 'nightingale-wp' ).'"></textarea>';
		return $defaults;
	}
	add_filter( 'comment_form_defaults', 'nightingale_comment_form_defaults' );

	// Modify comment form fields
	function nightingale_comment_form_fields( $fields ) {
		unset($fields['url']);
		$fields['author'] = '<p class="comment-form-author"><label for="author">'.__( 'Full Name (Required)', 'nightingale-wp' ).'</label> <input id="author" name="author" type="text" value="" size="30" maxlength="245" aria-required="true" type="text" class="c-form-input" placeholder="'.__( 'Jane Smith', 'nightingale-wp' ).'"></p>';
		$fields['email'] = '<p class="comment-form-email"><label for="email">'.__( 'Email Address<small>Email is used only for verification and will not be published</small>', 'nightingale-wp' ).'</label> <input id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" aria-required="true" class="c-form-input" placeholder="'.__( 'name@domain.com', 'nightingale-wp' ).'"></p>';
		return $fields;
	}
	add_filter( 'comment_form_default_fields', 'nightingale_comment_form_fields' );

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
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
function nightingale_wp_scripts() {

	// load minified stylesheet, if available, otherwise use style.css
	$located = locate_template( 'style.min.css' );
	if ($located != '' ) {
		wp_enqueue_style ('nightingale-wp-style', get_template_directory_uri().'/style.min.css');
	} else {
		wp_enqueue_style( 'nightingale-wp-style', get_stylesheet_uri() );
	}

	wp_enqueue_script( 'nightingale-wp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'nightingale-wp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// JS variables
	wp_register_script('nightingale-javascript-variables', get_template_directory_uri() . '/js/javascript-variables.js', array(), '1.1', false);
	wp_enqueue_script('nightingale-javascript-variables');

	// Script for menus, sub-menus, burger-menu, etc.
	wp_register_script('nightingale-menus', get_template_directory_uri() . '/node_modules/nightingale/js/menus.js', array(), '1.1', true);
	wp_enqueue_script('nightingale-menus');

	// Heading selector script
	wp_register_script('nightingale-heading-selector', get_template_directory_uri() . '/js/heading-selector.js', array(), '1.1', true);
	wp_enqueue_script('nightingale-heading-selector');

	// Cookies script
	wp_register_script('nightingale-cookies', get_template_directory_uri() . '/node_modules/nightingale/js/cookies.js', array(), '1.1', true);
	wp_enqueue_script('nightingale-cookies');

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
 * Ribbons (also known as banners).
 */
require get_template_directory() . '/inc/ribbons.php';

/**
 * Main menu (using Walker Nav Menu).
 */
require get_template_directory() . '/inc/walker-menu.php';

/**
 * Custom menus.
 */
require get_template_directory() . '/inc/custom-menus.php';

/**
 * Login/logout button.
 */
require get_template_directory() . '/inc/login-buttons.php';
/**
* Add support for custom logos
*/
add_theme_support( 'custom-logo' );

/**
 * Custom pagination.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Breadcrumbs.
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Gravity Forms styling.
 */
require get_template_directory() . '/inc/gravity-forms.php';
require get_template_directory() . '/inc/gravity-forms--multipage.php';

/**
 * Gravity Flow Token Settings
 */
require get_template_directory(). 'inc/gravity-flow.php';

/**
 * Prevent Advanced Custom Fields from disabling standard custom fields.
 */
require get_template_directory() . '/inc/advanced-custom-fields.php';
