<?php

add_filter('wp_nav_menu_objects', 'custom_menu');

function custom_menu($sorted_menu_items)
{
    foreach ($sorted_menu_items as &$item) {
        switch($item->bject_id) {

            // ID de la page "parente"
            case 10:

                // post_type des "pages enfants"
                if (get_post_type() == 'voitures') {
                    $item->current = true;
                    $item->classes[] = 'current-menu-item';
                }
                break;
        }
    }
    return $sorted_menu_items;
}
