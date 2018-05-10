<?php

// get video iframe HTML
$video = get_sub_field('video');

// Remove hard coded dimensions from video iframe and apply Nightigale class
$video = str_replace ('<iframe width="640" height="360"', '<iframe class="c-media__media"', $video);

// Display video
?>
<figure class="c-media">

    <div class="c-media__masthead">
        <?php echo $video; ?>
    </div>

</figure>
