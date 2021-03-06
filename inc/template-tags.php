<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package nightingale-wp
 */

if ( ! function_exists( 'nightingale_wp_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function nightingale_wp_posted_on() {

	echo '<div class="o-layout">
		<div class="o-layout__item u-9/12@lg">
			<div class="o-layout--left">
				<a class="c-comment__author" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>
			</div><!--o-layout--left-->
		</div><!--o-layout__item-->
		<div class="o-layout__item  u-3/12@lg">
			<div class="o-layout--right">
				<a class="c-comment__date" href="' . esc_url( get_day_link( get_the_time( "Y" ), get_the_time( "m" ), get_the_time( "d" ) ) ) . '" rel="bookmark">' . get_the_time( "d/m/Y" ) . '</a>
			</div><!--o-layout--right-->
		</div><!--o-layout__item-->
	</div><!--o-layout-->';

}
endif;

if ( ! function_exists( 'nightingale_wp_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function nightingale_wp_entry_footer() {

	?>
	<div class="o-layout__item u-6/12@lg">
		<div class="o-layout--left">
			<?php
			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				if (get_theme_mod('post-listing') != 'title') {
					// Don't show comment stats for posts listed as titles only
					comments_number();
				}
			}
			?>
		</div><!--o-layout--left-->
	</div><!--o-layout__item-->
	<?php

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function nightingale_wp_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'nightingale_wp_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'nightingale_wp_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so nightingale_wp_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so nightingale_wp_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in nightingale_wp_categorized_blog.
 */
function nightingale_wp_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'nightingale_wp_categories' );
}
add_action( 'edit_category', 'nightingale_wp_category_transient_flusher' );
add_action( 'save_post',     'nightingale_wp_category_transient_flusher' );
