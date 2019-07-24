<?php

// token extension tweak as per https://docs.gravityflow.io/article/56-gravityflow-type-token-expiration-days

// approval token extended to one year
add_filter( 'gravityflow_approval_token_expiration_days', 'sh_gravityflow_email_token_expiration_days', 10, 2);
function sh_gravityflow_email_token_expiration_days( $days, $assignee ) {
	return 365;
}

// cancel token extended to one year
add_filter( 'gravityflow_cancel_token_expiration_days', 'sh_gravityflow_cancel_token_expiration_days', 10, 2);
function sh_gravityflow_cancel_token_expiration_days( $days, $assignee ) {
	return 365;
}

// entry token extended to one year
add_filter( 'gravityflow_entry_token_expiration_days', 'sh_gravityflow_entry_token_expiration_days', 10, 2);
function sh_gravityflow_entry_token_expiration_days( $days, $assignee ) {
	return 365;
}

// form submission token extended to one year
add_filter( 'gravityflowformconnector_form_submission_token_expiration_days', 'sh_gravityflowformconnector_form_submission_token_expiration_days', 10, 2);
function sh_gravityflowformconnector_form_submission_token_expiration_days( $days, $assignee ) {
	return 365;
}

// end token submission tweak

// gravityflow_site_cookie_path
add_filter( 'gravityflow_site_cookie_path', function( $path ) {
     return '/';
});
