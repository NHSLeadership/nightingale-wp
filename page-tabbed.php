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

			// Get list of child page IDs (to array)
			$child_pages = get_pages(
			    array (
						'parent'  => $post->post_parent,
						'depth' => 1,
			    )
			);
			$child_page_ids = wp_list_pluck( $child_pages, 'ID' );

			/* Use child page IDs to look up their page templates
			* and generate a list of page IDs to _exclude_ from tabbed navigation
			* (ones that _don't_ use the tabbed page template) */
			foreach ( $child_page_ids as $key => $value ) {
				$meta = get_post_meta( $value, '', true );
				$template_file = implode( ", ", $meta['_wp_page_template'] );
				if ( $template_file != 'page-tabbed.php' ) {
						$excluded_ids .= $value . ",";
				}
			}

			// Generate navigation tabs for child pages that use the tabbed page template
			if ( $post->post_parent ) {
			    $children = wp_list_pages ( array(
			        'title_li' => '',
			        'child_of' => $post->post_parent,
							'depth' => 1,
							'link_before' => '<span class="c-sprite  c-sprite--home  c-tabs__icon"></span><span class="c-tabs__text">',
							'link_after' => '</span>',
			        'echo'     => 0,
							'exclude' => $excluded_ids,
			    ) );
			}

			// Apply Nightigale styling to list items and links in tabbed navigation
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
