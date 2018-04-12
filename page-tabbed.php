<?php
/**
 * Template Name: TabbedPage
 *
 * The template for displaying pages with tabbed navigation at the top.
 *
 * Note: the parent page is not shown or included in the navigation.
 * Only its child pages which use this template are shown
 * so, instead of linking to the parent page, link to the first child page.
 * Any links to the parent page will show that page without tabs.
 *
 * The order of the tabs is controlled by the child pages' 'order' fields.
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
			if(! empty($post->post_parent) ) {

				// Get sibling pages that use tabbed page template
				$args = array(
					'post_type' => 'page',
					'post_parent' => $post->post_parent,
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

				// Display tabbed navigation links to sibling pages
				echo '<ul class="c-tabs">';
					while ( $my_query->have_posts() ) {
				    $my_query->the_post();
						$link = '<li class="c-tabs__item"><a class="c-tabs__link';
						if ( is_page($post) ) {
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
			}

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
