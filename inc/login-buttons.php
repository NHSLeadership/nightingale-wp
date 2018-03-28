<?php
// Apply stying to login link
function nightingale_loginout_styling($link)
{
    $login_text_before = 'a href';
    $login_text_after = 'a class="c-btn c-btn--submit c-btn--natural c-page-header__login" href';
    $link = str_replace($login_text_before, $login_text_after ,$link);
    return $link;
}
// Use loginout filter hook (https://developer.wordpress.org/reference/hooks/loginout/)
add_filter('loginout','nightingale_loginout_styling');
