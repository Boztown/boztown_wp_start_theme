<?php

function custom_theme_setup() {
  add_theme_support( 'post-thumbnails' );
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
