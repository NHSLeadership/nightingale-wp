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
	$wp_customize->add_setting( 'login_button' , array(
    'default'     => true,
    'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'login_button', array(
		'label'        => 'Display Login Button in Menu(s)',
		'section'    => 'title_tagline',
		'settings'   => 'login_button',
		'type'      => 'checkbox',
	) ) );

	// Customizer theme settings section
	$wp_customize->add_section( 'theme_settings', array(
		'title'    => __( 'Theme Settings' ),
		'priority' => 999,
	) );

// Customizer show sidebar section
	$wp_customize->add_setting( 'show_sidebar' , array(
    'default'     => true,
    'transport'   => 'refresh',
	) );
	// Customizer show sidebar control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'show_sidebar', array(
		'label'        => 'Display Sidebar',
		'section'    => 'theme_settings',
		'settings'   => 'show_sidebar',
		'type'      => 'checkbox',
		'default'     => true
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
