<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nightingale-wp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		
		
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php nightingale_wp_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif;
 	
	?></header><!-- .entry-header -->

	<div class="entry-content">
		<?php

			// Display featured image
			the_post_thumbnail();

			/* translators: %s: Name of current post. */
			$post_parameters = sprintf(wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'nightingale-wp' ), array( 'span' => array( 'class' => array() ) ) ), the_title( '<span class="screen-reader-text">"', '"</span>', false ));

			// Display excerpts on home page, category page and archive pages only. Otherwise display full post
			if ( is_home () || is_category() || is_archive() ) {
				 the_excerpt( $post_parameters );
			} else {
				the_content( $post_parameters );
			}
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nightingale-wp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="u-margin-bottom-small entry-footer">
		<?php nightingale_wp_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
