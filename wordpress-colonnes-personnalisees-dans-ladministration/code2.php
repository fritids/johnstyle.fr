<?php

// Déclaration des nouvelles colonnes
add_filter('manage_{custom_post_type}_columns', 'register_my_custom_column');

// Affichage des nouvelles colonnes
add_filter('manage_{custom_post_type}_custom_column', 'show_my_custom_column', 10, 3);
