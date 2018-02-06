<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nightingale-wp
 */

?>

<article class="c-article" id="post-<?php the_ID(); ?>">
	<header>
		<?php
		if ( is_single() ) :
			the_title( '<h1>', '</h1>' );
		else :
			the_title( '<h2 class="c-article__header"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			// Display category list
			echo the_category(' | ', get_the_ID());
			// Display tag(s)
			$posttags = get_the_tags();
			if ($posttags) {
				foreach($posttags as $tag) {
					echo " | <a href='/tag/$tag->slug'>" . $tag->name . '</a>'; 
				}
			}
		endif; ?>
	</header>

	<div class="c-article__content">
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nightingale-wp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .c-article__content -->

	<footer>
		<?php nightingale_wp_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->