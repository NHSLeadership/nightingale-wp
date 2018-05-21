<?php

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
    //Check that the ACF plugin is activated

	if( have_rows('secondary_content') ):

			echo '<div class="o-layout__item  u-4/12@lg">';

	     // loop through the rows of data
	    while ( have_rows('secondary_content') ) : the_row();

	    	echo get_field('button');

				get_template_part( 'template-parts/acf', 'template-switch' );

	    endwhile;

			echo '</div><!-- o-layout__item -->';

	else :

	    // no layouts found

	endif;

//End test for ACF plugin
}

?>
