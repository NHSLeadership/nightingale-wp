<?php
/**
 * Template part for displaying post titles only
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
			the_title( '<h2 class="c-article__header--titles-only"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			// Display post author and date
			nightingale_wp_posted_on();
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
		<div class="o-layout">
			<?php nightingale_wp_entry_footer(); ?>
		</div><!--o-layout-->
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
