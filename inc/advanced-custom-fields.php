<?php
/**
* Advanced Custom Fields prevents standard custom fields from being
* presented as an option in page screen options.
* This filter gets around this so that we can use both ACF and standard
* custom fields on a page.
*/
// check that the ACF plugin is activated
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
	add_filter( 'acf/settings/remove_wp_meta_box', '__return_false' );
}
