<?php

// Set up footer menu
function register_footer_menu() {
  register_nav_menu( 'footer-menu', 'Footer Menu' );
}
add_action( 'init', 'register_footer_menu' );
 
// Style footer menu list items
function nightingale_menu_classes($classes, $item, $args) {
  if($args->theme_location == 'footer-menu') {
    $classes[] = 'c-page-footer__nav-item';
  }
  return $classes;
}
add_filter('nav_menu_css_class','nightingale_menu_classes',1,3);