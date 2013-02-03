<?php

add_filter('private_title_format', 'removePrivatePrefix');
add_filter('protected_title_format', 'removePrivatePrefix');

function removePrivatePrefix($format)
{
    return '%s';
}
