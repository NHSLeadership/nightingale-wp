<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nightingale-wp
 */

get_header(); ?>
<div class="o-layout  o-layout--wide">

	<!-- reduce width of primary content if sidebar contains widgets -->
	<div id="primary" class="o-layout__item u-8/12@lg">

		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :

			// Initialise variable to tag first post in loop
			$first_post = true;
			?>
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
				<hr class="c-divider">
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */

				 // Display horizontal rule above all but the first post
				 if ( $first_post == false ) {
					 echo '<hr class="c-divider">';
				 }
				 $first_post = false;
				 get_template_part( 'template-parts/content', get_theme_mod('post-listing') );

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
