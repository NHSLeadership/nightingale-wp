<?php
function nightingale_wp_widgets_init() {
  // Sidebar widget area. Empty by default.
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nightingale-wp' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'nightingale-wp' ),
		'before_widget' => '<section class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

  // Three widget areas, located in the footer. Empty by default.
  register_sidebars( 3, array(
    'id' => 'footer-widget-area',
    'name' => esc_html__( 'Footer Widget Area %d', 'nightingale-wp' ),
    'description' => esc_html__( 'Add widgets here', 'nightingale-wp' ),
    'before_widget' => '<div class="widget o-layout__item  u-4/12@lg">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ) );

	// Header widget area for search box.
	register_sidebar( array(
		'name'          => esc_html__( 'Header', 'nightingale-wp' ),
		'id'            => 'header-widget-area',
		'description'   => esc_html__( 'Add widgets here.', 'nightingale-wp' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// Front page sidebar (AKA secondary content area) widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Sidebar', 'nightingale-wp' ),
		'id'            => 'front-page-sidebar-widget-area',
		'description'   => esc_html__( 'Add widgets here.', 'nightingale-wp' ),
		'before_widget' => '',
    'after_widget' 	=> '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

}
add_action( 'widgets_init', 'nightingale_wp_widgets_init' );

// For new sites only, add search box widget to header widget area
function nightingale_wp_widgets_add( $blog_id ) {

	add_option( 'widget_categories',
	array( 'title' => 'My Categories' ));

	add_option("sidebars_widgets",
	array("header-widget-area" => array("Search"),
	));

}
add_action('populate_options', 'nightingale_wp_widgets_add');
