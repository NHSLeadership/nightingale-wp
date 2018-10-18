<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package nightingale-wp
 */

get_header(); ?>
<div class="o-layout  o-layout--wide">

		<!-- Hook for inserting ribbons before the page content (sending page/post id as a parameter) -->
		<?php do_action('nightingale_before_content', get_the_ID()); ?>

		<!-- reduce width of primary content if sidebar contains widgets -->
		<div id="primary" class="o-layout__item u-8/12@lg">

				<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', get_post_format() );

						// Commented out line below as temporary fix to stop displaying related posts
						// the_post_navigation();

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
<?php
get_footer();
