<?php
/**
 * The template for displaying the front page
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

				// Load up the comment template if comments or pingbacks are open.
				if ( comments_open() || pings_open() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_template_part( 'template-parts/content', 'secondary' ) ?>
	<?php get_sidebar(); ?>

</div><!-- .o-layout -->
<?php get_template_part( 'template-parts/acf', 'links' );?>
<?php get_template_part( 'template-parts/acf', 'cta-cards' );?>
<?php get_template_part( 'template-parts/acf', 'featured-content' );?>

<?php
get_footer();
