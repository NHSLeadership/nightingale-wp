<?php
// check that the ACF plugin is activated
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {

		$text = get_sub_field('link_block_title');
		echo '<hr class="c-divider"><h3>' . $text . '</h3>';

		if( have_rows('link') ):

			echo '<ul class="o-list-bare">';

	     // loop through the rows of data
	    while ( have_rows('link') ) : the_row();

				$url = get_sub_field('url');
				$link_text = get_sub_field('link_text');
				$title = get_sub_field('title');
				echo '<li><a href="' . $url . '" title="' . $title . '">' . $link_text . '</a></li>';

	    endwhile;

			echo '</ul><hr class="c-divider">';

		else :

		    // no layouts found

		endif;
}
?>
