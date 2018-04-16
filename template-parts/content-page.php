<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nightingale-wp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">

	<?php

if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
    //Check that the ACF plugin is activated

	// check if the flexible content field has rows of data
	
	if( have_rows('content') ):
	
	     // loop through the rows of data
	    while ( have_rows('content') ) : the_row();
	
	        if( get_row_layout() == 'heading' ):
	
	        	get_template_part( 'template-parts/acf', 'heading' );
	
	        elseif( get_row_layout() == 'text' ): 
	
	        	get_template_part( 'template-parts/acf', 'text' );
	
	        elseif( get_row_layout() == 'button' ):
	
	        	get_template_part( 'template-parts/acf', 'button' );
	
	        elseif( get_row_layout() == 'image' ):
	
	        	get_template_part( 'template-parts/acf', 'media' );
	
	        endif;
	
	    endwhile;
	
	else :
	
	    // no layouts found
	
	endif;

//End test for ACF plugin
}

?>


		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nightingale-wp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'nightingale-wp' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
