<?php
// Carica gli stili del tema child
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style(
        'simone-dev-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array(),
        wp_get_theme()->get('Version')
    );
});
