<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nightingale-wp
 */

get_header(); ?>
<div class="o-layout  o-layout--wide">

	<div id="primary" class="o-layout__item u-8/12@lg">

		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php //get_template_part( 'template-parts/content', 'secondary' ) ?>
<?php if( is_active_sidebar( 'front-page-sidebar-widget-area' ) ) :
		dynamic_sidebar( 'front-page-sidebar-widget-area' );
endif; ?>
<?php //echo nightingale_recent_posts(); ?>
<?php get_sidebar(); ?>
</div><!-- .o-layout -->

<?php get_template_part( 'template-parts/acf', 'links' );?>

<?php
get_footer();
