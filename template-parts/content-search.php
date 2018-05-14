<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nightingale-wp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="c-article__header"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php nightingale_wp_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="c-article__content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="o-layout--right">
		<?php echo '<a href="' . get_permalink() . '">Read more</a>'; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
