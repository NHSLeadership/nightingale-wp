<?php

// check that the ACF plugin is activated
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {

// check if the flexible content field has rows of data
if( have_rows('content') ):

		 // loop through the rows of data
		while ( have_rows('content') ) : the_row();

				get_template_part( 'template-parts/acf', 'template-switch' );

		endwhile;

else :

		// no layouts found

endif;

//End test for ACF plugin
}

?>
