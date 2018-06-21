<?php

// get video iframe HTML
$video = get_sub_field('video');

// Remove hard coded dimensions from video iframe and apply Nightigale class
$video = preg_replace ('/<iframe width="(.*?)" height="(.*?)"/', '<iframe class="c-media__media"', $video);

// Display video
?>
<figure class="c-media embed-container">
		<?php echo $video; ?>
</figure>

<!-- Make embed responsive (from https://www.advancedcustomfields.com/resources/oembed/) -->
<style>
	.embed-container {
		position: relative;
		padding-bottom: 56.25%;
		overflow: hidden;
		max-width: 100%;
		height: auto;
	}

	.embed-container iframe,
	.embed-container object,
	.embed-container embed {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}
</style>
