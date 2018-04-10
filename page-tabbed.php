<?php
/**
 * Template Name: TabbedPage
 *
 * The template for displaying pages with tabbed navigation at the top
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

			// Display tabs if post/page has a parent
			if ( $post->post_parent ) {
			    $children = wp_list_pages( array(
			        'title_li' => '',
			        'child_of' => $post->post_parent,
							'depth' => 1,
							'link_before' => '<span class="c-sprite  c-sprite--home  c-tabs__icon"></span><span class="c-tabs__text">',
							'link_after' => '</span>',
			        'echo'     => 0
			    ) );
			}

			// Apply Nightigale styling to list items and links
			$children = str_replace('<li class="', '<li class="c-tabs__item  ', $children);
			$children = str_replace('<a href=', '<a class="c-tabs__link" href=', $children);
			$children = preg_replace('#<li(.*?)current_page_item(.*?)<a class="#', '<li$1current_page_item$2<a class="is-current  ', $children);

			// Output tabs as unordered list
			if ( $children ) : ?>
			    <ul class="c-tabs">
			        <?php echo $children; ?>
			    </ul>
			<?php endif;

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
<?php get_sidebar(); ?>
</div><!-- .o-layout -->
<?php
get_footer();
