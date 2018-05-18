<?php
// check that the ACF plugin is activated
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {

		if( have_rows('featured_content') ):

				echo '<hr class="c-divider">';
				echo '<div class="o-layout  o-layout--wide">';

				// loop through columns
				while ( have_rows('featured_content') ) : the_row();

						if( have_rows('featured_content_item') ):

								echo '<div class="o-layout__item  u-4/12@lg">';

								// loop through rows
								while ( have_rows('featured_content_item') ) : the_row();

										get_template_part( 'template-parts/acf', 'template-switch' );

								endwhile;

								echo '</div><!-- o-layout__item -->';

						endif;

				endwhile;

				echo '</div><!-- o-layout -->';

	else :

	    // no layouts found

	endif;
}
?>
