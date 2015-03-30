<?php

function remove_menus (){
  
  // remove "Posts" menu
  remove_menu_page( 'edit.php' );                   
}

add_action( 'admin_menu', 'remove_menus' );

function disable_dashboard_widgets() {  
  
  remove_meta_box('dashboard_primary', 'dashboard', 'side');  
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');  
  remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side');    
}  
add_action('wp_dashboard_setup', 'disable_dashboard_widgets');

add_action('add_meta_boxes', 'yoast_is_toast', 99);
function yoast_is_toast(){
    //capability of 'manage_plugins' equals admin, therefore if NOT administrator
    //hide the meta box from all other roles on the following 'post_type' 
    //such as post, page, custom_post_type, etc
    remove_meta_box('wpseo_meta', 'resident', 'normal');
}