<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nightingale-wp
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
// only display sidebar if set in dashboard
if (! get_theme_mod('show_sidebar')) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
