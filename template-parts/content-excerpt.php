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
			echo '<hr class="c-divider">';
			the_title( '<h2 class="c-article__header"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			// Display post author and date
			nightingale_wp_posted_on();
		endif; ?>
	</header>

	<div class="c-article__content">
		<?php
			the_excerpt( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'nightingale-wp' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );		
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
