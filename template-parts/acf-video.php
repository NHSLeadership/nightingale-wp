<?php

// get video iframe HTML
$video = get_sub_field('video');

// Remove hard coded dimensions from video iframe and apply Nightigale class
$video = preg_replace ('/<iframe width="(.*?)" height="(.*?)"/', '<iframe class="c-media__media"', $video);

// Display video
?>
<figure class="c-media">
		<?php echo $video; ?>
</figure>
