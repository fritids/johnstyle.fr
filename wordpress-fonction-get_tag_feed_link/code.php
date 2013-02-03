<?php

function get_tag_feed_link($tag_id, $feed = '')
{
    return get_term_feed_link($tag_id, 'post_tag', $feed);
}
