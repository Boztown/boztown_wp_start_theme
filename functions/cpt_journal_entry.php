<?php

add_action( 'init', 'register_cpt_journal_entry' );

function register_cpt_journal_entry() {

    $labels = array( 
        'name' => _x( 'Journal Entries', 'journal_entry' ),
        'singular_name' => _x( 'Journal Entry', 'journal_entry' ),
        'add_new' => _x( 'Add New', 'journal_entry' ),
        'add_new_item' => _x( 'Add New Journal Entry', 'journal_entry' ),
        'edit_item' => _x( 'Edit Journal Entry', 'journal_entry' ),
        'new_item' => _x( 'New Journal Entry', 'journal_entry' ),
        'view_item' => _x( 'View Journal Entry', 'journal_entry' ),
        'search_items' => _x( 'Search Journal Entries', 'journal_entry' ),
        'not_found' => _x( 'No journal entries found', 'journal_entry' ),
        'not_found_in_trash' => _x( 'No journal entries found in Trash', 'journal_entry' ),
        'parent_item_colon' => _x( 'Parent Journal Entry:', 'journal_entry' ),
        'menu_name' => _x( 'Journal Entries', 'journal_entry' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        
        'supports' => array( 'title', 'excerpt', 'author', 'thumbnail', 'revisions' ),
        'taxonomies' => array( 'category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'journal_entry', $args );
}