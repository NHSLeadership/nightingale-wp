<?php

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
	//Check that the ACF plugin is activated

// check if the flexible content field has rows of data

if( have_rows('content') ):

		 // loop through the rows of data
		while ( have_rows('content') ) : the_row();

				if( get_row_layout() == 'heading' ):

					get_template_part( 'template-parts/acf', 'heading' );

				elseif( get_row_layout() == 'text' ):

					get_template_part( 'template-parts/acf', 'text' );

				elseif( get_row_layout() == 'quote' ):

					get_template_part( 'template-parts/acf', 'quote' );

				elseif( get_row_layout() == 'leading_paragraph' ):

					get_template_part( 'template-parts/acf', 'leading-paragraph' );

				elseif( get_row_layout() == 'button' ):

					get_template_part( 'template-parts/acf', 'button' );

				elseif( get_row_layout() == 'image' ):

					get_template_part( 'template-parts/acf', 'media' );

				endif;

		endwhile;

else :

		// no layouts found

endif;

//End test for ACF plugin
}

?>
