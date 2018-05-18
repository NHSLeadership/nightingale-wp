<?php
// check that the ACF plugin is activated
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {

		if( have_rows('cards') ):

				echo '<hr class="c-divider">
				<div class="o-layout  o-layout--wide">';

				// loop through the rows of data
				while ( have_rows('cards') ) : the_row();
						echo '<div class="o-layout__item  u-4/12@lg">
								<div class="c-card  c-card--information">
										<h4>' . get_sub_field('title') . '</h4>
										<small>' . get_sub_field('text') . '</small>';
										while ( have_rows('button') ) : the_row();
												get_template_part( 'template-parts/acf', 'button' );
										endwhile;
								echo '</div><!-- c-card -->
						</div><!-- o-layout__item -->';
				endwhile;

				echo '</div><!-- o-layout -->';

	else :

	    // no layouts found

	endif;
}
?>
