<?php

	$button_text = get_sub_field('button_text');
	$button_url = get_sub_field('button_url');
	$button_style = get_sub_field('button_style');
	$button_size = get_sub_field('button_size');

	if ( $button_size == 'default' ){
		$button_size = '';
	} else {
		$button_size = ' c-btn--' . $button_size;
	}

	// Get url from array, if necessary
	if ( is_array ( $button_url ) ):
		$url = $button_url['url'];
	else :
		$url = $button_url;
	endif;

	echo '<p><a href="' . $url . '" class="c-btn c-btn--' . $button_style . $button_size . ' ">' . $button_text . '</a></p>';

?>
