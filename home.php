<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nightingale-wp
 */

get_header(); ?>
<div class="o-layout  o-layout--wide">

	<!-- reduce width of primary content if sidebar contains widgets -->
	<div id="primary" class="o-layout__item<?php if ( is_active_sidebar( 'sidebar-1' ) ) { echo ' u-8/12@lg'; }?>">
		
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
			
				// Depending on customizer setting, display posts as excerpts, titles or in full
				if (get_theme_mod('post-listing') == 'excerpts') {
					// Excerpts only
					get_template_part( 'template-parts/content', 'excerpt' );
				}
				elseif (get_theme_mod('post-listing') == 'titles') {
					// Titles only
					get_template_part( 'template-parts/content', 'title' );
				}
				else {
					// Full posts
					get_template_part( 'template-parts/content', get_post_format() );
				}
				
			endwhile;

			nightingale_pagination();
			
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .o-layout -->
<?php
get_footer();