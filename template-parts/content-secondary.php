<div class="o-layout__item  u-4/12@lg">

<?php

if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
    //Check that the ACF plugin is activated

	if( have_rows('secondary_content') ):
	
	     // loop through the rows of data
	    while ( have_rows('secondary_content') ) : the_row();
	
	    	echo get_field('button');
	
	        if( get_row_layout() == 'heading' ):
	
	        	get_template_part( 'template-parts/acf', 'heading' );
	
	        elseif( get_row_layout() == 'text' ): 
	
	        	get_template_part( 'template-parts/acf', 'text' );
	
	        elseif( get_row_layout() == 'button' ):
	
	        	get_template_part( 'template-parts/acf', 'button' );
	
	        elseif( get_row_layout() == 'image' ):
	
	        	get_template_part( 'template-parts/acf', 'media' );
	        
	        elseif( get_row_layout() == 'quote' ):
	
	        	get_template_part( 'template-parts/acf', 'quote' );
	
	        endif;
	
	    endwhile;
	
	else :
	
	    // no layouts found
	
	endif;

//End test for ACF plugin
}

?>

</div>