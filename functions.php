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

/**
 * Read more links.
 */
function nightingale_excerpt_more( $more ) {
    return ' <a href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'nightingale') . '</a>';
}
add_filter( 'excerpt_more', 'nightingale_excerpt_more' );