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

	<div id="primary" class="content-area">
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
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

//			the_posts_navigation();
			$pagination = get_the_posts_pagination( array(
				'type'               => 'list',
				'screen_reader_text' => 'Other Posts'
			));
			$pagination = str_replace("<ul class='page-numbers'>","<ul class='c-pagination'>",$pagination);
			$pagination = str_replace("<li>","<li class='c-pagination__item'>",$pagination);
			$pagination = str_replace("<a class='page-numbers'","<a class='c-pagination__link'",$pagination);
			$pagination = str_replace('<a class="prev page-numbers"','<a class="c-sprite c-sprite--prev-blue"',$pagination);
			$pagination = str_replace('<a class="next page-numbers"','<a class="c-sprite c-sprite--next-blue"',$pagination);
			echo $pagination;
			
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
