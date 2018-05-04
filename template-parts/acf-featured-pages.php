<?php
/**
* Template part for displaying featured pages on the home page.
*
* Each featured page is displayed in a block consisting of two elements, one above the other.
* Elements can be images, videos or quotes.
* Blocks are arranged into three columns.
*
**/

// check that the ACF plugin is activated
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {

		if( have_rows('featured_pages') ):

				echo '<hr class="c-divider">
				<div class="o-layout  o-layout--wide">';

						// loop through featured pages
						while ( have_rows('featured_pages') ) : the_row();
								echo '<div class="o-layout__item  u-4/12@lg">
										<h3><a href="' . get_sub_field('page') . '">' . get_sub_field('title') . '</a></h3>';

								// loop through feature block (which should contain two elements)
								while ( have_rows('feature_block') ) : the_row();
										// Image
										if( get_sub_field('image') ) {
											get_template_part( 'template-parts/acf', 'media' );
										}
										// Video
										elseif ( get_sub_field('video') ) {
											get_template_part( 'template-parts/acf', 'media' );
										}
										// Quote
										while ( have_rows('quote_block') ) : the_row();
												get_template_part( 'template-parts/acf', 'quote' );
										endwhile;
								endwhile;

								echo	'</div><!-- o-layout__item -->';
						endwhile;

				echo '</div><!-- o-layout -->';

	else :

	    // no layouts found

	endif;
}
?>
