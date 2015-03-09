<?php

function custom_theme_setup() {
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'medium-large', 780 ); // 300 pixels wide (and unlimited height)
}

add_action( 'after_setup_theme', 'custom_theme_setup' );

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'medium-large' => __( 'Medium Large' ),
    ) );
}
add_filter( 'image_size_names_choose', 'my_custom_sizes' );

