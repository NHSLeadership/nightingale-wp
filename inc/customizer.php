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

	$wp_customize->add_setting( 'logo_image' , array(
	    'transport'   => 'refresh',
	) );	
	
	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'logo_image', array(
	'label'        => 'Logo Image (Standard)',
	'description' => 'Choose a logo to be used on standard displays',
	'section'    => 'title_tagline',
	'settings'   => 'logo_image',
	) ) );
	
	$wp_customize->add_setting( 'logo_retina_image' , array(
	    'transport'   => 'refresh',
	) );	

	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'logo_retina_image', array(
	'label'        => 'Logo Image (Retina)',
	'description' => 'Choose a double-size logo to be used on retina displays',
	'section'    => 'title_tagline',
	'settings'   => 'logo_retina_image',
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
