<?php
if( have_rows('links') ):
     // loop through the rows of data
    while ( have_rows('links') ) : the_row();

        the_sub_field('url');
        the_sub_field('title');
        the_sub_field('description');

    endwhile;

else :

    // no layouts found

endif;
?>