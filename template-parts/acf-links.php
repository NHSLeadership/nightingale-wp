<?php
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
    //Check that the ACF plugin is activated

	if( have_rows('links') ):

		echo '<hr class="c-divider"><div class="o-layout  o-layout--wide">';

	     // loop through the rows of data
	    while ( have_rows('links') ) : the_row();

					echo '<div class="o-layout__item  u-4/12@lg"><h3><a href="' . get_sub_field('url') . '">' . get_sub_field('title') . '</a></h3>';
					echo '<p>' . get_sub_field('description') . '</p></div><!-- o-layout__item -->';

	    endwhile;

		echo '</div><hr class="c-divider">';

	else :

	    // no layouts found

	endif;
}
?>
