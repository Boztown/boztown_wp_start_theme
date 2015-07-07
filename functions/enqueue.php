<?php 

function theme_scripts() {
    wp_enqueue_script( 'vendor', get_template_directory_uri() . '/dist/vendor.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/dist/custom.min.js', array('jquery'), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );


function theme_styles() {
    wp_enqueue_style( 'iconate-css', get_template_directory_uri() . '/bower_components/iconate/css/iconate.css' );
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/bower_components/fontawesome/css/font-awesome.min.css' );
    wp_enqueue_style( 'photoswipe', get_template_directory_uri() . '/bower_components/photoswipe/dist/photoswipe.css' );
    wp_enqueue_style( 'photoswipe-skin', get_template_directory_uri() . '/bower_components/photoswipe/dist/default-skin/default-skin.css' );
    //wp_enqueue_style( 'sidr-light', get_stylesheet_directory_uri() . '/bower_components/sidr/stylesheets/jquery.sidr.light.css' );
    wp_enqueue_style( 'main', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'theme_styles' );


function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/style.css', false );
}

add_action( 'login_enqueue_scripts', 'my_login_stylesheet', 10 );
