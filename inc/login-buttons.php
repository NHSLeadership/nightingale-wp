<?php
// Add login/out/register link to main menu
function add_login_logout_link($items, $args) {
	if ( $args->theme_location != 'primary' ) {
  return $items;
  }
	ob_start();
	wp_loginout('index.php');
	$loginoutlink = ob_get_contents();
	ob_end_clean();
	$items .= '<li class="c-nav-primary__item login-btn">'. $loginoutlink .'</li>';
	return $items;
}
add_filter('wp_nav_menu_items', 'add_login_logout_link', 10, 2);