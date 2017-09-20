<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nightingale-wp
 */

 // only display sidebar if it contains widgets
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	?>
	<aside id="secondary" class="o-layout__item  u-4/12@lg" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- #secondary -->
<?php }
