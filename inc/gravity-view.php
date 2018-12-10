<?php
// Make sure import entries trigger Gravity flow workflows correctly.
// Without this code, workflows such as form submissions are triggered but
// fields are not mapped across - leaving the new form entries with missing data.
add_action('gravityview-importer/after-add', 'gravityview_importer_create_user_after_add', 10 );
add_action('gravityview-importer/after-update', 'gravityview_importer_create_user_after_add', 10 );
function gravityview_importer_create_user_after_add( $entry ) {
	$form = GFAPI::get_form( $entry['form_id'] );
		do_action('gform_post_add_entry', $entry, $form );
}
