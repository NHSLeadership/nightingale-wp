<?php
/**
 * Template Name: SiteMap
 *
 * The template for displaying a sitemap page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nightingale-wp
 */

get_header(); ?>
<div class="o-layout  o-layout--wide">

	<div id="primary" class="o-layout__item u-8/12@lg">

		<main id="main" class="site-main" role="main">

			<h2 id="pages">Pages</h2>
						<ul>
						<?php
						// Add pages you'd like to exclude in the exclude here
						wp_list_pages(
						  array(
						    'exclude' => '',
						    'title_li' => '',
						  )
						);
						?>
						</ul>

						<h2 class="mt">Posts</h2>

						<?php
						// Add categories you'd like to exclude in the exclude here
						$cats = get_categories('exclude=');
						foreach ($cats as $cat) {
						  echo '<h3 class="mt mb-">' .$cat->cat_name."</h3>";
						  echo "<ul>";
						  query_posts('posts_per_page=-1&cat='.$cat->cat_ID);
						  while(have_posts()) {
						    the_post();
						    $category = get_the_category();
						    // Only display a post link once, even if it's in multiple categories
						    if ($category[0]->cat_ID == $cat->cat_ID) {
						      echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
						    }
						  }
						  echo "</ul>";
						}
						?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .o-layout -->
<?php
get_footer();
