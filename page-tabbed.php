<?php
/**
 * Template Name: TabbedPage
 *
 * The template for displaying pages with tabbed navigation at the top.
 *
 * Note: the parent page is shown under the "Overview" tab and
 * the order of the other tabs is controlled by the child pages' 'order' fields.
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

			// Start unordered list
			echo '<ul class="c-tabs">';

				// Start first "Overview" link to parent page
				$link = '<li class="c-tabs__item"><a class="c-tabs__link';

				if( empty($post->post_parent) ) {
					// On first arrival at the parent page, the Overview link is current (and therefore inactive)
					// and all the other links are to child pages...
					$link .= ' is-current';
					$post_parent = $post->ID;
				}
				else {
					// ...but, once a child page is opened, the Overview link should point to the parent page
					// and all the other links to sibling pages
					$post_parent = $post->post_parent;
				}

				// Finish building and displaying Overview tab
				$link .= '" href="';
				$link .= get_permalink($post_parent);
				$link .= '"><span class="c-sprite  c-sprite--home  c-tabs__icon"></span><span class="c-tabs__text">';
				$link .= 'Overview';
				$link .= '</span></a></li>';
				echo $link;

				// Get all child/sibling pages (depending on whether this is a parent or child page) that use this tabbed page template
				$args = array(
					'post_type' => 'page',
					'post_parent' => $post_parent,
					'order' => 'ASC',
					'depth' => 1,
					'post_status' => 'publish',
					'meta_query' => array(
						array(
							'key' => '_wp_page_template',
							'value' => 'page-tabbed.php',
						),
					),
				);
				$my_query = new WP_Query($args);

				// Display child/sibling tabs
				while ( $my_query->have_posts() ) {
					$my_query->the_post();
					$link = '<li class="c-tabs__item"><a class="c-tabs__link';
					if ( is_page($post->ID) ) {
						$link .= ' is-current';
					}
					$link .= '" href="';
					$link .= get_permalink($post);
					$link .= '"><span class="c-sprite  c-sprite--home  c-tabs__icon"></span><span class="c-tabs__text">';
					$link .= $post->post_title;
					$link .= '</span></a></li>';
					echo $link;
				}
				echo '</ul>';

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
