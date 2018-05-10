<?php

/*
* get the relevant template part to correctly display ACF field based on type
*/

switch ( get_row_layout() ) {

		case 'heading':

				get_template_part( 'template-parts/acf', 'heading' );
				break;

		case 'text':

				get_template_part( 'template-parts/acf', 'text' );
				break;

		case 'quote':

				get_template_part( 'template-parts/acf', 'quote' );
				break;

		case 'leading_paragraph':

				get_template_part( 'template-parts/acf', 'leading-paragraph' );
				break;

		case 'button':

				get_template_part( 'template-parts/acf', 'button' );
				break;

		case 'image':

				get_template_part( 'template-parts/acf', 'media' );
				break;

		case 'video':

				get_template_part( 'template-parts/acf', 'video' );
				break;

		case 'link_block':

				get_template_part( 'template-parts/acf', 'link-block' );
				break;

}

?>
