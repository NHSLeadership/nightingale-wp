<?php
/**
 * Template part for displaying latest posts with thumbnails in front page
 * secondary content area
 */
?>
<div class="o-layout__item  u-4/12@lg">
		<hr class="c-divider">
		<?php
		$args = array(
				'posts_per_page'      => 2,
				'post_type' 					=> 'post',
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true,
				'orderby' 						=> 'post_date',
				'order' 							=> 'DESC',
				'nopaging'   					=> false,
				'no_found_rows'       => true,
		);
		$recent_posts = new WP_query($args);

		if ( $recent_posts->have_posts() ) {
				while ($recent_posts->have_posts()) : $recent_posts->the_post();

						get_template_part( 'template-parts/content', 'excerpt' );

				endwhile;
		}
		wp_reset_postdata();
		?>
</div><!-- o-layout__item -->
