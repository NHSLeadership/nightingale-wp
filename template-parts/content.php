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
			<?php
			// For posts that are listed as titles only, show categories and tags only
			if (get_theme_mod('post-listing') == 'titles') {
				// Display category list
				echo the_category(' | ', get_the_ID());
				// Display tag(s)
				$posttags = get_the_tags();
				if ($posttags) {
					foreach($posttags as $tag) {
						echo " | <a href='/tag/$tag->slug'>" . $tag->name . '</a>'; 
					}
				}
			}
			// For posts that are listed in full or as excerpts, show full set of meta data
			else {
				nightingale_wp_posted_on();
			}
			?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if (get_theme_mod('post-listing') == 'excerpts') {
			// Excerpts only
			the_excerpt( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'nightingale-wp' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );		
		}
		elseif (get_theme_mod('post-listing') != 'titles') {
			// Full posts (i.e. not excerpts or titles only)
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'nightingale-wp' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );		
		}
		
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nightingale-wp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php nightingale_wp_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->