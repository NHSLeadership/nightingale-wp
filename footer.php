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

	</div><!-- #content -->

	<footer id="colophon" class="c-page-footer" role="contentinfo">

		<aside class="o-wrapper" role="complementary">
			<div class="o-layout">
        <?php dynamic_sidebar( 'footer-widget-area-1' ); ?>
        <?php dynamic_sidebar( 'footer-widget-area-2' ); ?>
        <?php dynamic_sidebar( 'footer-widget-area-3' ); ?>
			</div>
		</aside><!-- #fatfooter -->

		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'nightingale-wp' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'nightingale-wp' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'nightingale-wp' ), 'nightingale-wp', '<a href="https://automattic.com/" rel="designer">NHS Leadership Academy</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
