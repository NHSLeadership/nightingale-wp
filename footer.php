
<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nightingale-wp
 */

?>

	</div><!-- #o-wrapper -->

	<footer class="c-page-footer">
		<div class="o-wrapper">
			<?php if (is_active_sidebar('footer-widget-area-1') || is_active_sidebar('footer-widget-area-2') || is_active_sidebar('footer-widget-area-3')) {
				echo '<div class="o-layout">';
					dynamic_sidebar( 'footer-widget-area-1' );
					dynamic_sidebar( 'footer-widget-area-2' );
					dynamic_sidebar( 'footer-widget-area-3' );
				echo '</div>';
				echo '<hr class="c-divider">';
			}
			wp_nav_menu(
			  array(
			    'theme_location' => 'footer-menu',
					'menu_class' => 'c-page-footer__nav',
			    'container' => false
			  )
			); 
			?>
			<p class="c-page-footer__smallprint"><small>Copyright © <?php echo get_bloginfo( 'name' ) ." ". date('Y'); ?>. All rights reserved.</small></p>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>