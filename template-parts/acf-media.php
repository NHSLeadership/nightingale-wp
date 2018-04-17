<?php 

$image = get_sub_field('image');

if( !empty($image) ): 

	// vars
	$url = $image['url'];
	$title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];

	// thumbnail
	$size = 'large';
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];

?>

<figure class="c-media">

    <div class="c-media__masthead">
        <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"  class="c-media__media">
    </div>

    <?php if( $caption ): ?>

    	<figcaption class="c-media__content"><?php echo $caption; ?></figcaption>

	<?php endif; ?>

</figure>

<?php endif; ?>