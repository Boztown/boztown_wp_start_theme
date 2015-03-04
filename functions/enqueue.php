<?php 

function theme_scripts() {
    wp_enqueue_script( 'theme-general', get_template_directory_uri() . '/js/general.js', array('jquery'), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );


function theme_styles() {
    wp_enqueue_style( 'normalize', get_stylesheet_directory_uri() . '/bower_components/normalize.css/normalize.css' );
    wp_enqueue_style( 'skeleton', get_stylesheet_directory_uri() . '/bower_components/skeleton/css/skeleton.css' );
    wp_enqueue_style( 'main', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'theme_styles' );


function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/style.css', false );
}

add_action( 'login_enqueue_scripts', 'my_login_stylesheet', 10 );
