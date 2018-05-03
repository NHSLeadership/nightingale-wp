<?php
/**
 * Template part for displaying latest posts with thumbnails in front page
 * secondary content area
 */
?>
<div class="o-layout__item  u-4/12@lg">
	<hr class="c-divider">
	<?php
		$args = array( 'numberposts' => '20', 'post_type' => 'post', 'post_status' => 'publish', 'orderby' => 'post_date', 'order' => 'DESC', );
		$recent_posts = wp_get_recent_posts( $args );
		foreach( $recent_posts as $recent ){
			echo '<h3 class="c-article__header"><a href="' . get_permalink($recent["ID"]) . '">' . __($recent["post_title"]).'</a></h3>';
			// Author and date
			echo '<div class="o-layout">
				<div class="o-layout__item u-9/12@lg">
					<div class="o-layout--left">
						<a class="c-comment__author" href="' . esc_url( get_author_posts_url( $recent["post_author"] ) ) . '">' . esc_html( get_the_author_meta('display_name', $recent["post_author"]) ) . '</a>
					</div><!--o-layout--left-->
				</div><!--o-layout__item-->
				<div class="o-layout__item  u-3/12@lg">
					<div class="o-layout--right">
						<a class="c-comment__date" href="' . esc_url( get_day_link( get_the_time( "Y", $recent["ID"] ), get_the_time( "m", $recent["ID"] ), get_the_time( "d", $recent["ID"] ) ) ) . '" rel="bookmark">' . get_the_time( "d/m/Y", $recent["ID"] ) . '</a>
					</div><!--o-layout--right-->
				</div><!--o-layout__item-->
			</div><!--o-layout-->';
			// Featured image
			if (has_post_thumbnail( $recent["ID"] ) ):
			  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $recent["ID"] ), 'single-post-thumbnail' ); ?>
			  <div id="custom-bg" style="background-image: url('<?php echo $image[0]; ?>')">
			  </div>
			<?php endif;
			// Start of post content
			if ($recent["post_content"]) {
				echo '<div class="o-layout">
					<div class="o-layout__item">
						<small>' . strip_tags(substr($recent["post_content"],0,45)) . '...' . '</small>
					</div><!--o-layout__item-->
				</div><!--o-layout-->';
			}
			// Comment count and read more link
			echo '<div class="o-layout">
				<div class="o-layout__item u-6/12@lg">
					<div class="o-layout--left">
						<small>' . $recent["comment_count"] . ' Comments</small>
					</div><!--o-layout--left-->
				</div><!--o-layout__item-->
				<div class="o-layout__item  u-6/12@lg">
					<div class="o-layout--right">
						<small><a href="' . get_permalink($recent["ID"]) . '">Read more</a></small>
					</div><!--o-layout--right-->
				</div><!--o-layout__item-->
			</div><!--o-layout-->';
		}
		wp_reset_query();
		?>
	<hr class="c-divider">
</div><!-- o-layout__item -->
