<?php
function nightingale_wp_widgets_init() {
  // Sidebar widget area. Empty by default.
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
