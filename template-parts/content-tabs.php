<?php
/**
 * Template part for displaying navigation tabs
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nightingale-wp
 */

	// Check that page is a child (has a parent) or is a parent (has child pages)
	$args = array(
		'post_type' => 'page',
		'post_parent' => $post->ID,
		'depth' => 1,
		'post_status' => 'publish',
		'meta_query' => array(
			array(
				'key' => '_wp_page_template',
				'value' => 'page-tabbed.php',
			),
		),
	);
	if( !empty($post->post_parent) || !empty(get_children($args)) ) {

	 // Start unordered list
	 echo '<ul class="c-tabs">';

		 // Start first "Overview" link to parent page
		 $link = '<li class="c-tabs__item"><a class="c-tabs__link';

		 // Only show siblings if current page has no parent or parent doesn't have tabbed navigation
		 $parent_template = get_post_meta($post->post_parent, '_wp_page_template', true);
		 if( empty($post->post_parent) || ($parent_template!='page-tabbed.php') ) {
			 // On first arrival at the parent page, the Overview link is current (and therefore inactive)
			 // and all the other links are to child pages...
			 $link .= ' is-current';
			 $post_parent = $post->ID;
		 }
		 else {
			 // ...but, once a child page is opened, the Overview link should point to the parent page
			 // and all the other links to sibling pages
			 $post_parent = $post->post_parent;
		 }

		 // Finish building and displaying Overview tab
		 $link .= '" href="';
		 $link .= get_permalink($post_parent);
		 $link .= '"><span class="c-sprite  c-sprite--home  c-tabs__icon"></span><span class="c-tabs__text">';
		 $link .= 'Overview';
		 $link .= '</span></a></li>';
		 echo $link;

		 // Get all child/sibling pages (depending on whether this is a parent or child page) that use this tabbed page template
		 $args = array(
			 'post_type' => 'page',
			 'post_parent' => $post_parent,
			 'orderby' => 'menu_order',
			 'order' => 'ASC',
			 'depth' => 1,
			 'post_status' => 'publish',
			 'meta_query' => array(
				 array(
					 'key' => '_wp_page_template',
					 'value' => 'page-tabbed.php',
				 ),
			 ),
		 );
		 $children = new WP_Query($args);

		 // Define tab icons (based on image sprite definitions in Nightingale)
		 $icons = array ( "user", "menu", "info", "pencil", "currency", "speaker");

		 // Display child/sibling tabs
		 while ( $children->have_posts() ) {
			 $children->the_post();
			 // Define tab icon
			 $icon = current ( $icons );
			 // Build tab
			 $link = '<li class="c-tabs__item"><a class="c-tabs__link';
			 if ( is_page($post->ID) ) {
				 $link .= ' is-current';
			 }
			 $link .= '" href="';
			 $link .= get_permalink($post);
			 $link .= '"><span class="c-sprite  c-sprite--'.$icon.'  c-tabs__icon"></span><span class="c-tabs__text">';
			 $link .= $post->post_title;
			 $link .= '</span></a></li>';
			 // If number of tabs exceeds number of icons, reset to start of icon array (icons will repeat from the start)
			 if ( ! next ( $icons ) ) {
				 reset ( $icons );
			 }
			 // Display tab
			 echo $link;
		 }
		 echo '</ul>';
		 wp_reset_query();
}
