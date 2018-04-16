<?php

$quote_text = get_sub_field('quote');
$quote_author = get_sub_field('quote_author');
$quote_description = get_sub_field('author_description');
$quote_style = get_sub_field('quote_style');

if ( $quote_style == 'standard' ){
	$quote_style = '';
} else {
	$quote_style = ' c-quote--' . $quote_style;
}
?>

<blockquote class="c-quote<?php echo $quote_style; ?>">
    <p><?php echo $quote_text; ?></p>
    <span class="c-quote__meta">
    <b><?php echo $quote_author; ?></b><br />
    <?php echo $quote_description; ?>
    </span>
</blockquote>