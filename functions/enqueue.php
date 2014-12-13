<?php 

function theme_scripts() {
    //wp_enqueue_script( 'audiojs', get_template_directory_uri() . '/audiojs/audio.min.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );


function theme_styles() {
    wp_enqueue_style( 'main', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'theme_styles' );