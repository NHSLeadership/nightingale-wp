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

						// Post title
						the_title( '<h2 class="c-article__header"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

						// Author and date
						?>
						<div class="o-layout">
							<div class="o-layout__item u-9/12@lg">
								<div class="o-layout--left">
									<?php echo '<small><a class="c-comment__author" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></small>'; ?>
								</div><!--o-layout--left-->
							</div><!--o-layout__item-->
							<div class="o-layout__item  u-3/12@lg">
								<div class="o-layout--right">
									<?php echo '<small><a class="c-comment__date" href="' . esc_url( get_day_link( get_the_time( "Y" ), get_the_time( "m" ), get_the_time( "d" ) ) ) . '" rel="bookmark">' . get_the_time( "d/m/Y" ) . '</a></small>'; ?>
								</div><!--o-layout--right-->
							</div><!--o-layout__item-->
						</div><!--o-layout-->
						<?php

						// check that the ACF plugin is activated
						include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
						if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {

								// check if the flexible content field has rows of data
								if( have_rows('content') ):

										// loop through the rows of data
										while ( have_rows('content') ) : the_row();

												// Post image
												if( get_row_layout() == 'image' ):

														get_template_part( 'template-parts/acf', 'media' );

												endif;

												// First line of leading paragraph
												$text = get_sub_field('leading_paragraph');
												if($text) {
													echo '<small>' . substr($text,0,41) . '...</small>';
												}

										endwhile;

								else :

										// no layouts found

								endif;

						//End test for ACF plugin
						}

						// Comment count and Read more link
						?>
						<div class="o-layout">
							<div class="o-layout__item u-6/12@lg">
								<div class="o-layout--left">
									<small><?php echo comments_number(); ?></small>
								</div><!--o-layout--left-->
							</div><!--o-layout__item-->
							<div class="o-layout__item  u-6/12@lg">
								<div class="o-layout--right">
									<small><?php echo '<a href="' . esc_url( get_permalink()) . '">Read more</a>'; ?></small>
								</div><!--o-layout--right-->
							</div><!--o-layout__item-->
						</div><!--o-layout-->
						<br>
						<?php

				endwhile;
		}
		wp_reset_postdata();
		?>
</div><!-- o-layout__item -->
