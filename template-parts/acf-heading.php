<?php

/*
* Display heading, as link if required, as h2 unless other level specified
*/

$level = get_sub_field('level');
$link = get_sub_field('link');
$heading = get_sub_field('heading');

if (empty($level)) {
		$level = 'h2';
}

if (! empty($link)) {
		$heading = '<a href="' . $link . '">' . $heading . '</a>';
}

echo '<'.$level.'>' . $heading . '</'.$level.'>';

?>
