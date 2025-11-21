<?php

function twentyseventeen_child_enqueue_styles() {
    wp_enqueue_style( 
        'twentyseventeen-style', 
        get_template_directory_uri() . '/style.css' 
    );
    
    wp_enqueue_style( 
        'twentyseventeen-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('twentyseventeen-style'),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_child_enqueue_styles' );

function simple_event_count_shortcode() {
    $events = [
        ["event_name" => "Lomba Basket"],
        ["event_name" => "Turnamen Mobile Legend"],
        ["event_name" => "Festival Lampion"],
    ];
    
    $count = count($events);
    
    return "Total Events: " . $count; 
}
add_shortcode('simple_event_count', 'simple_event_count_shortcode');

?>