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

/**
 * Set the theme colors
 */
add_action( 'after_setup_theme', 'prefix_register_colors' );
function prefix_register_colors() {
	add_theme_support(
		'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'NHS Blue', 'prefix_textdomain' ),
				'slug' => 'nhs_blue',
				'color' => '#005eb8',
			),
			array(
				'name'  => esc_html__( 'NHS Dark Blue', 'prefix_textdomain' ),
				'slug' => 'nhs_dark_blue',
				'color' => '#003087',
			),
			array(
				'name'  => esc_html__( 'NHS Bright Blue', 'prefix_textdomain' ),
				'slug' => 'nhs_bright_blue',
				'color' => '#0072ce',
			),
			array(
				'name'  => esc_html__( 'NHS Light Blue', 'prefix_textdomain' ),
				'slug' => 'nhs_light_blue',
				'color' => '#41b6e6',
			),
			array(
				'name'  => esc_html__( 'NHS Mid Grey', 'prefix_textdomain' ),
				'slug' => 'nhs_mid_grey',
				'color' => '#768692',
			),
			array(
				'name'  => esc_html__( 'NHS Light Grey', 'prefix_textdomain' ),
				'slug' => 'nhs_light_grey',
				'color' => '#e8edee',
			),
			array(
				'name'  => esc_html__( 'NHS Purple', 'prefix_textdomain' ),
				'slug' => 'nhs_purple',
				'color' => '#330072',
			),
			array(
				'name'  => esc_html__( 'NHS Pink', 'prefix_textdomain' ),
				'slug' => 'nhs_pink',
				'color' => '#ae2573',
			),
			array(
				'name'  => esc_html__( 'NHS Light Purple', 'prefix_textdomain' ),
				'slug' => 'nhs_light_purple',
				'color' => '#704c9c',
			),
			array(
				'name'  => esc_html__( 'NHS Light Green', 'prefix_textdomain' ),
				'slug' => 'nhs_light_green',
				'color' => '#78be20',
			),
			array(
				'name'  => esc_html__( 'NHS Dark Green', 'prefix_textdomain' ),
				'slug' => 'nhs_dark_green',
				'color' => '#006747',
			),
			array(
				'name'  => esc_html__( 'NHS Aqua Green', 'prefix_textdomain' ),
				'slug' => 'nhs_aqua_green',
				'color' => '#00a499',
			),
			array(
				'name'  => esc_html__( 'NHS Black', 'prefix_textdomain' ),
				'slug' => 'nhs_black',
				'color' => '#231f20',
			),
			array(
				'name'  => esc_html__( 'Emergency Services Red', 'prefix_textdomain' ),
				'slug' => 'emergency_red',
				'color' => '#da291c',
			),
			array(
				'name'  => esc_html__( 'NHS Yellow', 'prefix_textdomain' ),
				'slug' => 'nhs_yellow',
				'color' => '#fae100',
			),
			array(
				'name'  => esc_html__( 'NHS Warm Yellow', 'prefix_textdomain' ),
				'slug' => 'nhs_warm_yellow',
				'color' => '#ffb81c',
			),
			array(
				'name'  => esc_html__( 'NHS Dark Grey', 'prefix_textdomain' ),
				'slug' => 'nhs_grey_dark',
				'color' => '#425563',
			),
			array(
				'name'  => esc_html__( 'White', 'prefix_textdomain' ),
				'slug' => 'white',
				'color' => '#ffffff',
			),
		)
	);
}

/**
 * Get the colors formatted for use with Iris, Automattic's color picker
 */
function output_the_colors() {

	// get the colors
	$color_palette = current( (array) get_theme_support( 'editor-color-palette' ) );

	// bail if there aren't any colors found
	if ( !$color_palette )
		return;

	// output begins
	ob_start();

	// output the names in a string
	echo '[';
	foreach ( $color_palette as $color ) {
		echo "'" . $color['color'] . "', ";
	}
	echo ']';

	return ob_get_clean();

}


/**
 * Add the colors into Iris
 */
add_action( 'acf/input/admin_footer', 'gutenberg_sections_register_acf_color_palette' );
function gutenberg_sections_register_acf_color_palette() {

	$color_palette = output_the_colors();
	if ( !$color_palette )
		return;

	?>
	<script type="text/javascript">
		(function( $ ) {
			acf.add_filter( 'color_picker_args', function( args, $field ){
				// add the hexadecimal codes here for the colors you want to appear as swatches
				args.palettes = <?php echo $color_palette; ?>
				// return colors
				return args;
			});
		})(jQuery);
	</script>
	<?php
}


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
require get_template_directory(). '/inc/gravity-flow.php';

/**
 * Prevent Advanced Custom Fields from disabling standard custom fields.
 */
require get_template_directory() . '/inc/advanced-custom-fields.php';

/**
 * Provide shortcode for dispaying child pages within a parent page.
 */
require get_template_directory() . '/inc/display-child-pages.php';
