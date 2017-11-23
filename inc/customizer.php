<?php
/**
 * nightingale-wp Theme Customizer
 *
 * @package nightingale-wp
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function nightingale_wp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Add "Theme Settings" section
	// This appears in the WordPress dashboard under Appearance > Customize
	$wp_customize->add_section( 'theme_settings', array(
		'title'    => __( 'Theme Settings' ),
		'priority' => 999,
	) );

	// Add "Login Button" setting within "Theme Settings" section (see above)
	$wp_customize->add_setting( 'login_button' , array(
    'default'     => true,
    'transport'   => 'refresh',
	) );

	// Add "Login Button" control within "Theme Settings" setting (see above)
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'login_button', array(
		'label'        => 'Display Login Button in Menu(s)',
		'section'    => 'theme_settings',
		'settings'   => 'login_button',
		'type'      => 'checkbox',
	) ) );

	// Add "Breadcrumbs" setting within "Theme Settings" section (see above)
	$wp_customize->add_setting( 'breadcrumbs' , array(
    'default'     => true,
    'transport'   => 'refresh',
	) );

	// Add "Breadcrumbs" control within "Theme Settings" setting (see above)
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'breadcrumbs', array(
		'label'        => 'Display Breadcrumbs in Header',
		'section'    => 'theme_settings',
		'settings'   => 'breadcrumbs',
		'type'      => 'checkbox',
	) ) );

	// Add "Post Listing" setting within "Theme Settings" section (see above)
	$wp_customize->add_setting( 'post-listing' , array(
    'default'     => 'full',
    'transport'   => 'refresh',
	) );

	// Add "Post Listing" control within "post-listing" setting (see above)
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post-listing', array(
		'label'        => 'Post Listing Page Settings',
		'section'    => 'theme_settings',
		'settings'   => 'post-listing',
		'type'      => 'select',
		'choices'  => array(
			'full'  => 'Display full posts',
			'excerpts' => 'Display post excerpts only',
			'titles' => 'Display post titles only',
		),
	) ) );

}
add_action( 'customize_register', 'nightingale_wp_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function nightingale_wp_customize_preview_js() {
	wp_enqueue_script( 'nightingale_wp_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'nightingale_wp_customize_preview_js' );
