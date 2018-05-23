<?php
/**
* Generate breadcrumbs
*/
function nightingale_breadcrumb() {

  // Check that breadcrumbs are enabled in customizer
  if (get_theme_mod('breadcrumbs')) {

    // Check current page is NOT the home page
    if (!is_front_page()) {
      ?>
      <nav class="c-breadcrumb">
        <ol class="c-breadcrumb__list">

          <!-- Start breadcrumb with link to home page -->
          <li class="c-breadcrumb__item"><a href="\" class="c-breadcrumb__link  c-sprite c-sprite--home">Home</a></li>

          <!-- Check if the current page is a category, an archive or a single page. If so link to category or archive -->
          <?php
          if (is_category() || is_single() ){
            echo '<li class="c-breadcrumb__item"><a href="';
            $perma_cat = get_post_meta(get_the_ID(), '_category_permalink', true);
            if ( $perma_cat != null ) {
              $cat_id = $perma_cat['category'];
              $category = get_category($cat_id);
            }
            else {
              $categories = get_the_category();
              $category = $categories[0];
            }
            $category_link = get_category_link($category);
            $category_name = $category->name;
            echo $category_link.'" class="c-breadcrumb__link">'.$category_name.'</a></li>';
          }

					// If this is a child page, add links to its ancestors
					if( is_page() && get_post_field( 'post_parent' ) ) {
						$parents = get_post_ancestors( get_the_id() );
						foreach ( array_reverse($parents) as $parent ) {
							echo '<li class="c-breadcrumb__item"><a href =' . get_permalink( $parent ) . '>' . get_the_title( $parent ) . '</a></li>';
						}
					}

					// If this is search results page, show search term
					if ( is_search() ) {
						echo '<li class="c-breadcrumb__item">Search Results</li>';
						echo '<li class="c-breadcrumb__item">' . get_search_query() . '</li>';
					}
					else {
          ?>
	          <!-- Display title current post/page as last item in breadcrumb -->
	          <li class="c-breadcrumb__item"><?php echo the_title(); ?></li>
					<?php
					}
					?>
        </ol>
      </nav>
      <?php
    }
  }
}
