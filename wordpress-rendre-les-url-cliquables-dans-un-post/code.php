<?php

add_filter('the_content', 'linkUrlInContent');
add_filter('the_excerpt', 'linkUrlInContent');

function linkUrlInContent($content)
{
    $content = preg_replace("#(^|\s|>|\(|\)|:\.)(http://[^\s<\"'\(\)]+)($|\s|<|\(|\)|\.)#si", "$1<a href=\"$2\" target=\"_blank\" rel=\"nofollow\">$2</a>$3", $content);
    $content = preg_replace("#-(http://[^\s<\"']+)($|\s|<)#si", "$1$2", $content);
    return $content;
}
