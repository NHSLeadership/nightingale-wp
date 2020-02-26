<?php
function display_child_pages() {
	// use shortcode to display in full all direct child pages of current page
	global $post;
	$child_pages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'menu_order', 'sort_order' => 'asc' ) );
	foreach ( $child_pages as $child_page ) {
		$content = $child_page->post_content;
		$page_title = $child_page->post_title;
		$page_link = get_page_link( $child_page->ID );
		$childpages .= '<h3><a href="'.$page_link.'">'.$page_title.'</a></h3>';
		$childpages .= apply_filters( 'the_content', $child_page->post_content );
	}
	return $childpages;
}
add_shortcode('display_child_pages', 'display_child_pages');
?>
