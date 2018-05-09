<?php
// check that the ACF plugin is activated
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {

		if( have_rows('featured_pages') ):

				echo '<hr class="c-divider">';
				echo '<div class="o-layout  o-layout--wide">';

				// loop through the rows of data
				while ( have_rows('featured_pages') ) : the_row();

						echo '<div class="o-layout__item  u-4/12@lg">';

						// page header with title link
						if ( have_rows('page_header') ) :

								while ( have_rows('page_header') ) : the_row();
										echo '<h3><a href="' . get_sub_field('page_link') . '">' . get_sub_field('page_title') . '</a></h3>';
								endwhile;

						endif;

						// page body with any combination of videos, images, quotes, etc.
						if ( have_rows('page_body') ) :

								while ( have_rows('page_body') ) : the_row();

										if( get_sub_field('video') ):

												get_template_part( 'template-parts/acf', 'video' );

										elseif( get_sub_field('image') ):

												get_template_part( 'template-parts/acf', 'media' );

										elseif( get_sub_field('quote') ):

												get_template_part( 'template-parts/acf', 'quote' );

										elseif( get_sub_field('text') ):

												get_template_part( 'template-parts/acf', 'text' );

										elseif( get_sub_field('button') ):

												get_template_part( 'template-parts/acf', 'button' );

										endif;

								endwhile;

						endif;

						echo '</div><!-- o-layout__item -->';

				endwhile;

				echo '</div><!-- o-layout -->';

	else :

	    // no layouts found

	endif;
}
?>
