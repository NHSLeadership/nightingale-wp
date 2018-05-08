<?php

// get iframe HTML
$iframe = get_sub_field('video');

// Remove hard coded dimensions from iframe and apply Nightigale styling
$iframe = str_replace ('<iframe width="640" height="360"', '<iframe class="c-media__media"', $iframe);

// Display iframe
echo $iframe;

?>
