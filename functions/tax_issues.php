<?php

add_action( 'init', 'register_taxonomy_issues' );

function register_taxonomy_issues() {

    $labels = array( 
        'name' => _x( 'Issues', 'issues' ),
        'singular_name' => _x( 'Issue', 'issues' ),
        'search_items' => _x( 'Search Issues', 'issues' ),
        'popular_items' => _x( 'Popular Issues', 'issues' ),
        'all_items' => _x( 'All Issues', 'issues' ),
        'parent_item' => _x( 'Parent Issue', 'issues' ),
        'parent_item_colon' => _x( 'Parent Issue:', 'issues' ),
        'edit_item' => _x( 'Edit Issue', 'issues' ),
        'update_item' => _x( 'Update Issue', 'issues' ),
        'add_new_item' => _x( 'Add New Issue', 'issues' ),
        'new_item_name' => _x( 'New Issue', 'issues' ),
        'separate_items_with_commas' => _x( 'Separate issues with commas', 'issues' ),
        'add_or_remove_items' => _x( 'Add or remove issues', 'issues' ),
        'choose_from_most_used' => _x( 'Choose from the most used issues', 'issues' ),
        'menu_name' => _x( 'Issues', 'issues' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => false,
        'show_admin_column' => false,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'issues', array('journal_entry'), $args );
}