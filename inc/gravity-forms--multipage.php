<?php
/**
 * Styling for the extra bits that sit outside the main form area in multipage forms.
 */

// Style the previous button
add_filter( 'gform_previous_button', 'form_previous_button', 10, 2 );
function form_previous_button( $button, $form ) {
	return str_replace( "gform_previous_button button", "c-btn c-btn--secondary gform_previous_button button", $button );
}

// Style the next button
add_filter( 'gform_next_button', 'form_next_button', 10, 2 );
function form_next_button( $button, $form ) {
	return str_replace( "gform_next_button button", "c-btn c-btn--primary gform_next_button button", $button );
}
