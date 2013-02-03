<?php

// Déclaration des nouvelles colonnes
add_filter('manage_posts_columns', 'register_my_custom_column');

// Affichage des nouvelles colonnes
add_filter('manage_posts_custom_column', 'show_my_custom_column', 10, 3);

// Fonction de déclaration des nouvelles colonnes
function register_my_custom_column($columns)
{
    return order_my_custom_column($columns, array( array(

            // Identifiant unique de la colonne
            'name' => 'thumbnail',

            // Nom de la colonne
            'label' => __('Thumbnail'),

            // Position de la colonne (-1 = fin, 0 = début)
            'position' => 1
        )));
}

// Fonction de l'ordre d'affichage des nouvelles colonnes
function order_my_custom_column($columns, $items)
{
    foreach ($items as $item) {
        if ($item['position'] != -1) {
            $tmp = $columns;
            $columns = false;
            $i = 0;
            foreach ($tmp as $key => $val) {
                if ($i == $item['position'])
                    $columns[$item['name']] = $item['label'];
                $columns[$key] = $val;
                $i++;
            }
        } else
            $columns[$item['name']] = $item['label'];
    }
    return $columns;
}

// Fonction d'affichage des nouvelles colonnes
function show_my_custom_column($name)
{
    global $post;
    switch($name) {

        // Identifiant unique de la colonne
        case 'thumbnail':

            // Affichage de la miniature de l'article
            echo get_the_post_thumbnail($post->ID, array(
                100,
                100
            ));
            break;
    }
}
