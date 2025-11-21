<?php
/*Twenty Seventeen Child Theme functions and definitions*/

// 1. Meng-enqueue stylesheet tema induk
// Fungsi ini memastikan CSS dari tema Twenty Seventeen dimuat sebelum CSS child theme.
function twentyseventeen_child_enqueue_styles() {
    // Memuat style dari tema induk
    wp_enqueue_style( 
        'twentyseventeen-style', 
        get_template_directory_uri() . '/style.css' 
    );
    
    // Memuat style dari child theme (style.css di folder child theme)
    // WordPress secara otomatis meng-enqueue style.css dari child theme, 
    // tetapi memanggilnya secara eksplisit setelah parent theme dapat memastikan urutan yang benar.
    wp_enqueue_style( 
        'twentyseventeen-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('twentyseventeen-style'), // Pastikan ini dimuat setelah style induk
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_child_enqueue_styles' );


// 2. Fungsi untuk Shortcode [simple_event_count]
// Fungsi ini menghitung jumlah event dari array dummy dan mengembalikan output.
function simple_event_count_shortcode() {
    // Definisi array events
    $events = [
        ["event_name" => "Lomba Basket"],
        ["event_name" => "Turnamen Mobile Legend"],
        ["event_name" => "Festival Lampion"],
    ];
    
    // Menghitung jumlah elemen dalam array
    $count = count($events);
    
    // Mengembalikan string output (PENTING: menggunakan return, bukan echo)
    return "Total Events: " . $count; 
}

// Mendaftarkan fungsi PHP ke WordPress sebagai shortcode
add_shortcode('simple_event_count', 'simple_event_count_shortcode');

// Akhir dari functions.php
?>